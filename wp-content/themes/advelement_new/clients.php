<?php
/* 
Template name: Clients 
*/
?>
<?php get_header(); ?>
<div id="content">
    <div>
        <aside class="sidebar">
<?php dynamic_sidebar('Klienci'); ?>
        </aside>
<?php the_post(); ?>
<?php comments_template(); ?>
    </div>
</div>
<?php get_footer(); ?>