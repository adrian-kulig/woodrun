<div id="content">
<!--    <a class="button-panel" target="_blank" href="http://woodrun.sportpanel.pl">-->
<!--        <strong>--><?php //_e('Trenuj z nami', 'woodrun'); ?><!--</strong>-->
<!--        <p>-->
<!--            --><?php //_e('Panel Woodrun - załóż konto i wykup pakiet z opieką! Możesz też korzystać z panelu darmowo jako dzienniczka treningowego.', 'woodrun'); ?>
<!--        </p>-->
<!--    </a>-->
<?php adv_home_background(); ?>
    <div>
<?php dynamic_sidebar('Dyscyplina'); ?>
        <aside id="offer">
            <h3><?php _e('Najnowsza oferta', 'woodrun'); ?></h3>
<?php
    $posts = get_posts(array(
        'numberposts'   => 1,
        'post_status'   => 'publish',
        'category'      => 8,
    ));

    query_posts('cat='.wp_get_post_categories($posts[0]->ID));

    if(!empty($posts)){
        if(in_array(8,wp_get_post_categories($posts[0]->ID))){
            query_posts('cat=8');
        }
    }


    if ( have_posts() ) : the_post();
    
    $date = false;
    $sport = false;
        
    foreach(wp_get_post_categories($post->ID) as $c){
        $cat = get_category( $c );
        if($cat->parent == 5) $date = $cat;
        if($cat->parent == 4) $sport = $cat;
    }

    $categories = (wp_get_post_categories($post->ID));
    $cats = array();
    foreach ($categories as $category){
        if(get_category($category)->parent == 4 || get_category($category)->parent == 113){
            $cats[] = get_cat_name($category);
        }
    }
?>
            <a href="<?php the_permalink(); ?>" title="Przejdź do oferty">
                <article>
                    <header>
                        <h3><?php echo get_field('najblizsza_data'); ?></h3>
                        <h2><?php the_title(); ?>,<br> <span class="categories-name"><?php echo implode(", ", $cats) ?></span></h2>
                    </header>
                    <?php the_excerpt(); ?>
                    <footer>
                        <!--<time pubdate datetime="<?php echo get_the_date('c'); ?>"><?php echo adv_date(get_the_date('U')); ?></time>//-->
                        <span class="more"><?php _e('przejdź do oferty', 'woodrun'); ?></span>
                    </footer>
                </article>
            </a>
<?php
    endif;
    
    wp_reset_query();
?>
        </aside>
        <?php /* <a href="<?php echo get_permalink(2); ?>" title="Zobacz wszystkie" id="list-all">Zobacz wszystkie</a> */ ?>
		
    </div>
</div>

<div id="ankieta-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php _e('Wypełnij ankietę, abyśmy mogli jak najlepiej dobrać i zaproponować Ci ofertę', 'woodrun'); ?></h2>
        </div>
        <div class="modal-body">
            <?php
            if(pll_current_language() =='en'):?>
                <?= do_shortcode('[contact-form-7 id="5302" title="Ankieta - EN"]'); ?>
            <?php else:?>
                <?= do_shortcode('[contact-form-7 id="4693" title="Ankieta"]'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<div id="ankieta-dietetyk-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php _e('Ankieta wstępna dla osób, które wykupiły pakiet z dietetykiem', 'woodrun'); ?></h2>
        </div>
        <div class="modal-body">
            <?php
            if(pll_current_language() =='en'):?>
                <?= do_shortcode('[contact-form-7 id="5301" title="Ankieta dietetyk - EN"]'); ?>
            <?php else:?>
                <?= do_shortcode('[contact-form-7 id="5300" title="Ankieta - dietetyk"]'); ?>
            <?php endif; ?>

        </div>
    </div>
</div>
