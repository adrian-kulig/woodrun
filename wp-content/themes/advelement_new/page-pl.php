<?php get_header(); ?>
    <div id="content">
        <div>
            <div class="pagecontent">
                <?php the_post(); the_content(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>