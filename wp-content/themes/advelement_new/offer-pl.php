<div id="content">
    <div>
        <aside class="sidebar">
<?php if(is_page('40-2')): ?>
<?php dynamic_sidebar('Oferty 40+'); ?>

<?php else: ?>
<?php dynamic_sidebar('Oferty'); ?>
<?php
    $cur_lang = pll_current_language();

    $cur_category_stringID = '4, -22';
    $currentOfferCategoryID = 4;
    $currentOfferCategoryTermID = 5;
    $stempelClass = 'stempel-pl';
    $allText = 'Wszystkie';
    $gotoOfferText = 'Przejdź do oferty';
    $parentCategory = 2;


    if($cur_lang =='en'){
        $cur_category_stringID = '161, -22';
        $currentOfferCategoryID = 161;
        $currentOfferCategoryTermID = 135;
        $stempelClass = 'stempel-en';
        $allText = 'All';
        $gotoOfferText = 'See more';
        $parentCategory = 5240;

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

        else {
            $args = array( 'category__and' => $e,  'orderby' => 'menu_order',
                'order' => 'DESC');
            global $wp_query;
            $wp_query->set('cat', $e[1]);
        }
    }
?>
    <form action="/" method="get">
        <fieldset>
            <label><?php _e('Dyscyplina', 'woodrun'); ?></label>
            <?php wp_dropdown_categories('child_of='.$currentOfferCategoryID.'&hide_empty=0&show_option_all='.$allText.'&selected='.$e[0]); ?>
            <label><?php _e('Miesiąc', 'woodrun'); ?></label>
            <?php wp_dropdown_categories('child_of='.$currentOfferCategoryTermID.'&hide_empty=0&show_option_all='.$allText.'&selected='.(count($e) == 1 ? $e[0] : $e[1])); ?>
            <input type="hidden" id="cat" name="cat" value="" />
            <input type="submit" value="" />
        </fieldset>
    </form>
<?php endif; ?>
        </aside>
        <div id="offers">
<?php if(!is_page('40-2')): ?>
            <nav>
                <ul>
                    <li<?php if(is_page($parentCategory) || is_category(99) || is_category(101)): echo ' class="current-cat"'; endif; ?>><a href="<?php echo get_permalink($parentCategory); ?>" title="Wszystkie oferty"><?php _e('Wszystkie oferty', 'woodrun'); ?></a></li>
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
        if ($cat->parent == $currentOfferCategoryTermID) $date = $cat;
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

    $nextTerm = get_field('najblizsza_data');
    $slots = get_field('wolne_miejsca');


//<?php _e('Przejdź do oferty', 'woodrun');

    $offer = '<li class="offer-entry black-entry">
        <a href="' . adv_permalink() . '" title="Przejdź do oferty">
            <article>
                <header>
                    <h3>' . the_title('', '', false) . ', <br />' . $nextTerm . '</h3>
                    <h2>' . implode(", ", $cats) . '</h2>
                </header>
                ' . adv_excerpt() . '
                <div class="stempel '.$stempelClass.'">' .$slots. '</div>
                <span class="more">'.$gotoOfferText.'</span>
            </article>
        </a>
    </li>';

    $result_html[$meta_time.uniqid()] = $offer;
}
//ksort($result_html);

wp_reset_postdata();
?>
            <ul>
                <?= implode('',$result_html) ?>
            </ul>
        </div>
    </div>
</div>