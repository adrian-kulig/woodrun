<?php
/*
Template name: Baza
*/
?>
<?php get_header(); ?>
    <div id="content" class="base-page-content">
        <div>
            <?php the_post(); the_content(); ?>

        </div>

    </div>
<?php get_footer(); ?>