<div id="content">

    <div>
	
        <aside class="sidebar">
			
			<?php
				if(in_category(66)) $name = 'Ekspres_narty';
				elseif(in_category(67)) $name = 'Przygoda';
				elseif(in_category(76)) $name = 'Adventure_dla_Ciebie';
				else $name = 'Blog';
				dynamic_sidebar( $name );
			?>
			
        </aside>
		
        <div id="entries">
		
			<?php while(have_posts()): the_post(); ?>
			
            <article class="entry">
			
                <header>
				
                    <time pubdate datetime="<?php echo get_the_date('c'); ?>"><?php echo adv_date(get_the_date('U')); ?></time>
                    <h2><?php the_title(); ?></h2>
               
			   </header>
				
                <?php if ( has_post_thumbnail() ) { ?>
				
				<p>
				
				<?php
				
					$args = array(
					
						'title'	=> ''
					
					);
					
					the_post_thumbnail( '780xX', $args );
					
				?>
				
				</p>
				
				<?php }; ?>
				
				<?php the_content(); ?>
				
				<?php $url = urlencode( get_permalink( $post->ID ) ); ?>
				
				<div class="facebook">
				
					<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $url; ?>&amp;send=false&amp;layout=button_count&amp;width=500&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=21&amp;appId=139785929442479" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:21px;" allowTransparency="true"></iframe>
					<a href="http://www.facebook.com/share.php?u=<?php echo $url; ?>">Udostępnij na Facebooku</a>
				
				</div>
				
            </article>
			
			<?php endwhile; ?>
			
        </div>
		
    </div>
	
</div>