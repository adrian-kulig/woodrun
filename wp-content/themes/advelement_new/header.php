<?php
    if(!isset($_COOKIE['visited'])){
        setcookie('visited', 1);
        $v = get_option('visits');
        update_option('visits', intval($v) + 1);
    }
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/images/thumb.jpg" /> 
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	wp_head();
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/font.js" type="text/javascript"></script>
<?php if(is_page('Kontakt')): ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/vForm.js" type="text/javascript"></script>
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/layout.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php if ( is_single() && in_category(array(11,66,67,76)) ) { ?>
<?php
	global $post;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium');
?>
<!--<meta property="og:description" content="--><?php //echo $post->post_excerpt; ?><!--" />-->
<!--<meta property="og:image" content="--><?php //echo $img[0] ?><!--" />-->

<?php } else { ?>
<meta property="og:description" content="Bieganie terenowe, canicross, MTB, treningi personalne, obozy odchudzeniowe i wiele więcej!" />
<?php }; ?>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/owl.carousel.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js?v=<?php echo md5_file(get_template_directory_uri().'/js/main.js');?>" type="text/javascript"></script>
    <link rel="stylesheet"  href="<?php echo get_template_directory_uri();?>/less/main.css?v=<?php echo md5_file(get_template_directory_uri().'/less/main.css');?>">
<meta property="og:image" content="http://woodrun.pl/wp-content/themes/advelement_new/images/woodrun.png" />
<meta property="og:title" content="Woodrun.pl" />


</head>
<?php if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>
<body <?php body_class($page_slug); ?>>
<header id="header">
    <div>
        <a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="logotype">
            <hgroup>
                <h1><?php bloginfo( 'name' ); ?></h1>
                <h2><?php bloginfo( 'description' ); ?></h2>
            </hgroup>
        </a>
<!--        <div class="site-language">--><?php //pll_the_languages(array('show_flags' => 1, 'hide_current' => 0, 'display_names_as' => 'slug')); ?><!--</div>-->

        <?php
$defaults = array(
    'theme_location'  => 'nav',
    'container'       => 'nav',
    'container_id'    => 'nav',
    'walker'          => new Adv_Walker
);

wp_nav_menu( $defaults );

?>
        <nav id="socials">

            <ul>
                <?php
//                    if(function_exists('pll_the_languages'))
//                        pll_the_languages(array('show_names' => 0, 'show_flags' => 1));
                ?>
                <li><a target="_blank" href="http://www.instagram.com/woodrun.pl/"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_ig.png" alt="Instagram" /></a></li>
                <li><a target="_blank" href="http://vimeo.com/adventureelement" title="Youtube"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_yt.png" alt="Youtube" /></a></li>
                <!--<li><a href="#" title="Skype"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_skype.png" alt="Skype" /></a></li>//-->
                <li><a target="_blank" href="https://www.facebook.com/woodrunpl/" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_facebook.png" alt="Facebook" /></a></li>
            </ul>
        </nav>
        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fwoodrunpl&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=234833229900216" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
</header>

