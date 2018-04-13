<footer id="footer">
    <div>
        <div id="banners">
            <div class="carousel-container">
                <div class="logotypes-przyjaciel owl-carousel">

                    <?php

                    $posts = get_posts(array(
                        'post_type' => 'logotypes',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'typ',
                                'value' => 'Przyjaciel',
                                'compare' => 'LIKE'
                            )
                        ),
                        'order' => 'ASC'
                    ));

                    foreach ($posts as $post):?>
                        <div class="logotype-item">
                            <a target="_blank" href="<?php echo get_field('link');?>">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID)?>">
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
<!--            <ul>-->
<?php
//    wp_list_bookmarks('categorize=0&title_li=&title_before=&title_after=&orderby=id&category_name=Partnerzy');
//?>
<!--            </ul>-->
        </div>

<?php if(is_front_page()): ?>
        <div>
<?php dynamic_sidebar('Stopka'); ?>
        </div>
        <aside id="footer-side">
<?php //dynamic_sidebar('Reklama'); ?>
		
			<div id="likebox">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FWoodrunpl&amp;width=255&amp;height=200&amp;colorscheme=dark&amp;show_faces=true&amp;border_color=yellow&amp;stream=false&amp;header=false&amp;appId=139785929442479" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:255px; height:200px;" allowTransparency="true"></iframe>
			</div>
		
        </aside>
        <p id="visits">Ilość odwiedzin: <?php echo get_option('visits'); ?></p>
<?php endif; ?>
    </div>
</footer>
<div class="ajax-spinner"></div>


<div id="konkrus-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php _e('Zgłoszenie do konkursu', 'woodrun'); ?></h2>
        </div>
        <div class="modal-body">
            <?php
            if(pll_current_language() =='en'):?>
                <?= do_shortcode('[contact-form-7 id="5515" title="Formularz - konkurs EN"]'); ?>
            <?php else:?>
                <?= do_shortcode('[contact-form-7 id="5514" title="Formularz - Konkrus"]'); ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<script type="text/javascript">Cufon.now()</script>
<?php wp_footer(); ?>
</body>
</html>