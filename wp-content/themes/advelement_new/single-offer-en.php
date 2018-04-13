<?php
wp_enqueue_script('mousewheel', get_template_directory_uri() . '/fancybox/jquery.mousewheel-3.0.6.pack.js');
wp_enqueue_script('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', '2.0.6');
wp_enqueue_script('home', get_template_directory_uri() . '/js/single.js');
wp_enqueue_style('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', '2.0.6');
get_header();
?>
<div id="content">
    <div>
        <article class="single-entry">
            <a href="<?php echo get_permalink(2296); ?>" title="Zobacz wszystkie">See all</a>
            <?php the_post(); the_content(); ?>
        </article>
        <aside class="sidebar">
            <p class="price"><?php echo get_post_meta($post->ID, 'Cena', true); ?></p>
            <?php dynamic_sidebar('Rezerwacja'); ?>
            <p class="reservation"><a href="<?php echo add_query_arg('oferta', $post->ID, get_permalink(262)); ?>" title="Rezerwuj online">Book online</a></p>
            <?php echo wpautop(get_post_meta($post->ID, 'Informacje', true)); ?>
            <p class="return"><a href="<?php echo get_permalink(2296); ?>" title="Powrót do listy ofert">Return to list</a></p>
        </aside>
    </div>
</div>
<?php get_footer(); ?>