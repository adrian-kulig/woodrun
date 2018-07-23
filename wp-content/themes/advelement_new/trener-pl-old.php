<div id="content">
    <div>
        <aside class="sidebar">
            <?php if(is_page('40-2')): ?>
                <?php dynamic_sidebar('Oferty 40+'); ?>

            <?php else: ?>
                <?php dynamic_sidebar('Trener-online'); ?>
                <?php

                $cur_lang = pll_current_language();

                $cur_category_stringID = '113, -22';
                $currentOfferCategoryID = 113;
                $parentCategory = 4645;
                $stempelClass = 'stempel-pl';
                $allText = 'Wszystkie';
                $goToOfferText = 'Przejdź do oferty';



                if($cur_lang =='en'){
                    $cur_category_stringID = '181, -22';
                    $currentOfferCategoryID = 181;
                    $parentCategory = 5235;
                    $stempelClass = 'stempel-en';
                    $allText = 'All deals';
                    $goToOfferText = 'See more';
                }

                $args = array(
                    'numberposts' => -1,
                    'cat' => $cur_category_stringID,
                    'orderby' => 'menu_order',
                    'order' => 'DESC'
                );


                if(is_category()){
                    $e = explode(',', (isset($_GET['cat']) ? $_GET['cat'] : get_query_var('cat')));
                    if(count($e) == 1){
                        $args = array(
                            'numberposts' => -1,
                            'cat' => '-22,'. $e[0],
                            'orderby' => 'menu_order',
                            'order' => 'DESC'
                        );
                    }
//                        $args = 'cat=-22,' . $e[0];
                    else {
                        $args = array( 'category__and' => $e, 'orderby' => 'menu_order',
                            'order' => 'DESC' );
                        global $wp_query;
                        $wp_query->set('cat', $e[1]);
                    }
                }

                ?>
                <form action="/" method="get">
                    <fieldset>
                        <label><?php _e('Kategoria', 'woodrun'); ?></label>
                        <?php wp_dropdown_categories('child_of='.$currentOfferCategoryID.'&hide_empty=0&show_option_all='.$allText.'&selected='.$e[0]); ?>
                        <input type="hidden" id="cat" name="cat" value="" />
                        <input type="submit" value="" />
                    </fieldset>
                </form>
            <?php endif; ?>
        </aside>
        <div class="sidebar-ankieta ankieta">
            <h3><?php _e('Wypełnij ankietę - daj nam znać co Cię interesuje z naszej oferty', 'woodrun'); ?></h3>
        </div>
        <div id="offers">
            <?php if(is_category(99) || is_category(101)): ?>
                <div style="width:400px; margin: 0 auto; text-align: center;"><?php
                    $post = get_post($parentCategory);
                    $content = $post->post_content;
                    $name = is_category(101) ? 'Adventure Snow Team' : 'Adventure Bike Team';
                    $content = preg_replace('/\[advbutton page="'.$name.'"\]/','', $content);
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                    ?></div>
            <?php endif; ?>
            <?php if(!is_page('40-2')): ?>
                <nav>
                    <ul>
                        <li<?php if(is_page($parentCategory) || is_category(99) || is_category(101)): echo ' class="current-cat"'; endif; ?>><a href="<?php echo get_permalink($parentCategory); ?>" title="Wszystkie oferty"><?php _e('Wszystkie pakiety', 'woodrun'); ?></a></li>
                        <?php wp_list_categories('child_of='.$currentOfferCategoryID.'&title_li=&hide_empty=0'); ?>
                    </ul>
                </nav>
            <?php endif; ?>
            <?php
            $the_query = new WP_Query($args);
            $result_html = array();
            while ( $the_query->have_posts() ) {

                $the_query->the_post();
                $date = false;
                $sport = false;

                foreach (wp_get_post_categories($post->ID) as $c) {
                    $cat = get_category($c);
                    if ($cat->parent == 5) $date = $cat;
                    if ($cat->parent == $currentOfferCategoryID) $sport = $cat;
                }

                $categories = (wp_get_post_categories($post->ID));
                $cats = array();
                foreach ($categories as $category){
                    if(get_category($category)->parent == $currentOfferCategoryID){
                        $cats[] = get_cat_name($category);
                    }
                }

                $meta_date = explode('-', get_post_meta($post->ID, 'Data', true));
                if(count($meta_date) == 2) {
                    $meta_date[1] = explode('.', $meta_date[1]);
                    if(count($meta_date[1]) == 3) $meta_time = mktime(0, 0, 0, $meta_date[1][1], $meta_date[0], $meta_date[1][2]);
                    else $meta_time = $meta_date;
                }
                else $meta_time = $meta_date[0];

                $price = get_post_meta($post->ID, 'Cena', true);

                $nextTerm = get_field('najblizsza_data');
                $slots = get_field('wolne_miejsca');




                $offer = '<li class="offer-entry black-entry">
            <a href="' . adv_permalink() . '" title="Przejdź do oferty">
                <article>
                    <header>
                        <h3>' . the_title('', '', false) . ', <br />' . get_post_meta($post->ID, 'Data', true) . '</h3>
                        <h2>' . implode(", ", $cats). '</h2>
                    </header>
                    ' . adv_excerpt() . '
                    <div class="stempel '.$stempelClass.'">' .$slots. '</div>
                    <span class="more">'.$goToOfferText.'</span>
                </article>
            </a>
        </li>';

                $result_html[$meta_time.uniqid()] = $offer;
            }
//            ksort($result_html);

            wp_reset_postdata();
            ?>
            <ul>
                <?= implode('',$result_html) ?>
            </ul>
        </div>
    </div>
</div>


<div id="ankieta-modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php _e('Wypełnij ankietę, abyśmy mogli jak najlepiej dobrać i zaproponować Ci ofertę', 'woodrun'); ?></h2>
        </div>
        <div class="modal-body">
            <?= do_shortcode('[contact-form-7 id="4693" title="Ankieta"]'); ?>
        </div>
    </div>
</div>