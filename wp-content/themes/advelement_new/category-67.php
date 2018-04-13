<?php get_header(); ?>

	<div id="content">

		<div>

			<aside class="sidebar">

				<?php dynamic_sidebar( 'Przygoda' ); ?>

			</aside>

			<div id="entries">

				<div class="entry">

					<ul class="post-list">

						<?php while(have_posts()): the_post(); ?>

							<li>

								<?php if ( has_post_thumbnail() ) { ?>

									<p class="img">

										<a href="<?php the_permalink(); ?>">

											<?php

											$args = array(

												'title'	=> ''

											);

											the_post_thumbnail( array(400,300), $args );

											?>

										</a>

									</p>

								<?php }; ?>

								<div style="width: 370px;">

									<time pubdate datetime="<?php echo get_the_date('c'); ?>"><?php echo adv_date(get_the_date('U')); ?></time>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="excerpt"><?php echo $post->post_excerpt; ?></p>
									<p class="more"><a href="<?php the_permalink(); ?>">Czytaj więcej</a></p>

								</div>

							</li>

						<?php endwhile; ?>

					</ul>

				</div>

				<?php wp_pagenavi(); ?>

			</div>

		</div>

	</div>

<?php get_footer(); ?>