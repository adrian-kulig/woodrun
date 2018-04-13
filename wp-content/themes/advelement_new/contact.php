<?php
/* 
Template name: Contact 
*/
?>
<?php get_header(); ?>
<div id="content">
    <div>
        <aside class="sidebar">
<?php dynamic_sidebar('Kontakt'); ?>
        </aside>
<?php the_post(); the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>