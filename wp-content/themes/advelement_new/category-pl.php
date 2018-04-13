<?php get_header(); ?>

<div id="content">

    <div>
	
        <aside class="sidebar">

			<?php 
				if(is_category(105)) $name = 'Adventure Snow Team';
                elseif(is_category(103)) $name = 'Adventure Bike Team';
				else $name = 'Blog';
			dynamic_sidebar( $name ); 
			?>
			
        </aside>
		
        <div id="entries">
            <div>
                <?php
                    if(is_category(105)) $id = 2369;
                    elseif(is_category(103)) $id = 2256;
                    $post = get_post($id);
                    if(isset($id)) echo $post->post_content;
                ?>
            </div>
		
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
							
							the_post_thumbnail( '167x148', $args );
							
						?>
						
							</a>
						
						</p>
						
						<?php }; ?>	

						<div>
					
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