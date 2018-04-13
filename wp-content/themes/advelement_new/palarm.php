<div id="content">
	<div>
		<aside class="sidebar">
            <?php dynamic_sidebar('Powder_alarm'); ?>
		</aside>
        <?php while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <div id="entries">
                <?php the_content(); ?> <!-- Page Content -->
            </div><!-- .entry-content-page -->
        <?php endwhile; ?>
        <div id="newsletter">
            <?php dynamic_sidebar('Freshmail'); ?>
        </div>
	</div>
</div>