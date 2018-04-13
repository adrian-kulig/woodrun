<?php

if (function_exists('pll_current_language')) {
    $cur_lang = pll_current_language();
} else {
    $cur_lang = 'pl';
}


$current_language = pll_current_language();

$cur_category_stringID = '4, -22';
$currentOfferCategoryID = 4;
$currentOfferCategoryTermID = 5;

if($current_language =='en'){
    $cur_category_stringID = '161, -22';
    $currentOfferCategoryID = 161;
    $currentOfferCategoryTermID = 135;
}


switch ($cur_lang) {
    case 'en':
        $parent = $currentOfferCategoryID;
        $month = $currentOfferCategoryTermID;
        $redir = 2296;
        break;
    default:
        $parent = $currentOfferCategoryID;
        $month = $currentOfferCategoryTermID;
        $redir = 2;
}


$cur_lang = 'pl';


if (is_404()): wp_redirect(esc_url(home_url('/'))); endif;
if (isset($_GET['cat']) && $_GET['cat'] == '0,0'): wp_redirect(get_permalink($redir)); endif;

if (is_front_page()):
    wp_enqueue_script('mousewheel', get_template_directory_uri() . '/fancybox/jquery.mousewheel-3.0.6.pack.js');
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', '2.0.6');
    wp_enqueue_script('media', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-media.js', '1.0.2');
    wp_enqueue_script('home', get_template_directory_uri() . '/js/home.js');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', '2.0.6');
endif;

if (is_category()):
    global $_cat;
    $_cat = get_category(get_query_var('cat'), false);
endif;
?>
<?php get_header(); ?>
<?php
$cats = get_categories(array('hide_empty' => 0, 'child_of' => $parent, 'type' => 'category'));
$months = get_categories(array('hide_empty' => 0, 'child_of' => $month, 'type' => 'category'));
foreach ($cats as &$item) {
    $item = $item->slug;
}
foreach ($months as &$item) {
    $item = $item->cat_ID;
}
$getdata = explode(',', $_GET['cat']);


$currentTrenerCategoryID = 113;
$parentTrenerCategory = 4645;
$trenerOnlineText = 'trener-online';

if($current_language =='en'){
    $currentTrenerCategoryID = 181;
    $parentTrenerCategory = 5235;
    $trenerOnlineText = 'online-coach';
}


if(is_category() && get_parent_category() == $currentTrenerCategoryID){
    $trener_cats = get_categories(array('hide_empty' => 0, 'child_of' => $currentTrenerCategoryID, 'type' => 'category'));
}

if(get_the_category()[0]->category_parent == $currentTrenerCategoryID || get_the_category()[1]->category_parent == $currentTrenerCategoryID){
    $trener_categories = get_categories(array('hide_empty' => 0, 'child_of' => $currentTrenerCategoryID, 'type' => 'category'));
}



?>

<?php if (is_front_page()): ?>
    <?php get_template_part('homepage'); ?>

<?php elseif (is_page($trenerOnlineText) || !empty($trener_cats)): ?>
    <?php get_template_part('trener-pl'); ?>

<?php elseif (is_page('powder-alarm')): ?>
    <?php get_template_part('palarm'); ?>

<?php elseif (is_page('oferty') || is_page('offers') || (!empty($cats) && is_category($cats) && get_parent_category() == $currentOfferCategoryID) || (!empty($months) && is_category($months) && get_parent_category() == $currentOfferCategoryTermID ) || (isset($_GET['cat']) && array_intersect($months, $getdata))): ?>
    <?php get_template_part('offer-pl'); ?>

<?php elseif (is_category()): ?>
    <?php get_template_part('category-pl'); ?>

<?php elseif (is_page()): ?>
    <?php get_template_part('page-pl'); ?>

<?php elseif (is_single() && (!empty($cats) && in_category($cats))): ?>
    <?php get_template_part('single-offer-pl'); ?>

<?php elseif (is_single() && (!empty($trener_categories))): ?>
    <?php get_template_part('single-trener-pl'); ?>

<?php elseif (is_single()): ?>
    <?php get_template_part('single-article'); /*artykuły są dość podobne, póki co bez podziału na język */ ?>
<?php endif; ?>

<?php get_footer(); ?>