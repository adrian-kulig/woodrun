<?php
/* 
Template name: Gallery 
*/
wp_enqueue_script('mousewheel', get_template_directory_uri() . '/fancybox/jquery.mousewheel-3.0.6.pack.js');
wp_enqueue_script('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', '2.0.6');
wp_enqueue_script('buttons', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-buttons.js', '1.0.2');
wp_enqueue_script('thumbs', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-thumbs.js', '1.0.2');
wp_enqueue_script('gallery', get_template_directory_uri() . '/js/gallery.js');
wp_enqueue_style('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', '2.0.6');
wp_enqueue_style('buttons', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-buttons.css', '1.0.2');
wp_enqueue_style('thumbs', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-thumbs.css', '1.0.2');
?>
<?php get_header(); ?>
<div id="content">
    <div>
        <aside class="sidebar">
<?php dynamic_sidebar('Galeria'); ?>
        </aside>
<?php the_post(); the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>