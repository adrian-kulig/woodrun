<?php
/* 
Plugin Name: Custom Users Order 
Plugin URI: http://wordpress.org/plugins/custom-users-order/
Description: Allows you to order the users with simple Drag and Drop Sortable capability. 
Version: 1.1
Author: Nidhi Parikh, Hiren Patel
Author URI: http://www.betterinfo.in/hiren-patel
License: GPLv2 or later
*/
//-------------------Connection -----------------------------
global $wpdb; 
include_once('addsection.php');
	
register_activation_hook(__FILE__,'user_order');
function user_order(){  /* Function to add option name in wp_options table */
	add_option("section_name");
}

// Add settings link on plugin page
function user_order_settings_link($links) { 
  $settings_link = '<a href="users.php?page=addsection">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'user_order_settings_link' );
add_action('user_register', 'update_user_details');
function update_user_details($user_id){
	$all_sections=get_option('section_name');
	$all_sections = explode(",",$all_sections);
	for($i=0;$i<count($all_sections);$i++)
	{
		$users = get_option('section_name_'.$all_sections[$i]);
		update_option("section_name_".$all_sections[$i], $users.','.$user_id);			
	}
}

add_action( 'delete_user', 'delete_user' );
function delete_user($user_id){
	$all_sections=get_option('section_name');
	$all_sections = explode(",",$all_sections);
	for($i=0;$i<count($all_sections);$i++)
	{
		$updatestring = get_option('section_name_'.$all_sections[$i]);
		$string = str_replace($user_id.',', "", $updatestring.',');
		$string = substr($string,0, -1);
		update_option( "section_name_".$all_sections[$i], $string); 
	}
}

register_uninstall_hook(__FILE__,'user_uninstall');
function user_uninstall(){
	delete_option('usersdetails');
}

add_action( 'admin_enqueue_scripts', 'custom_order_scripts' );
function custom_order_scripts() { /*  Proper way to enqueue scripts and styles  */
	wp_enqueue_style( 'customstyle', plugin_dir_url(__FILE__). 'css/style.css' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'orderusers', plugin_dir_url(__FILE__). 'js/orderusers.js', array(), true );
}

add_action( 'wp_enqueue_scripts', 'custom_display_style' );
function custom_display_style() {
	wp_enqueue_style( 'customstyle', plugin_dir_url(__FILE__). 'css/customdisplay.css' );
}
add_filter('widget_text', 'do_shortcode');

add_shortcode('users_order','users_listing');
function users_listing($atts){ /* Front-End Display*/
	global $wp_roles;
	if(empty($atts['section'])){
		$all_sections=get_option('section_name');
		$all_sections =explode(',', $all_sections);
		$atts['section']=$all_sections[0];
	}
	$options=get_option('section_name_'.$atts['section']);
	$user_id = explode(",", $options);
	$getroles = get_option( 'section_name_roles_'.$atts['section']);
	$getroles = explode(",",$getroles);
	if($atts['users']==""){$atts['users']=3; }
	$wp_total_users_array= count_users();
	$wp_total_users=  $wp_total_users_array['total_users'];
	$plugin_content = '<ul id="authors">';
	$count=0;
	for($i=0;$i<count($user_id);$i++){ //we omit admin account
		$userrole = get_userdata($user_id[$i]); 
		if (in_array(ucfirst($userrole->roles[0]), $getroles) && $user_id[$i] != 1){ //we omit admin acc
			$count++;
			$author = get_userdata($user_id[$i]);
			preg_match('#src="([^"]+)"#', get_avatar($author->ID), $src);
			$author = get_userdata($author->ID);
			$plugin_content .= '<li>
				<h3>' . $author->first_name . ' ' . $author->last_name . '</h3>
				<p class="photo"><img src="' . str_replace('.thumbnail.', '.', end($src)) . '" alt="2" width="330" height="245" /></p>
				<p>' . get_the_author_meta('interests', $author->ID) . '</p>
				<p class="author-description">' . $author->description . '</p>
			</li>';
		}
	}
	$plugin_content = $plugin_content.'</ul>'; /*User info ends */
	return "{$plugin_content}";
}

add_action('admin_menu', 'manageuser');
function manageuser(){	
	add_submenu_page( 'users.php', 'Custom Users Order Page', 'Custom Users Order', 'manage_options', 'addsection', 'addsection'); 
}?>