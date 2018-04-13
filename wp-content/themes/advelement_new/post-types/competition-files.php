<?php

add_action('init', 'course_type_init');
function course_type_init()
{
    $labels = array(
        'name' => _x('', 'post type general name', 'amadeus'),
        'singular_name' => _x('Filmy konkursowe', 'post type singular name', 'amadeus'),
        'menu_name' => _x('Filmy konkursowe', 'admin menu', 'amadeus'),
        'name_admin_bar' => _x('Filmy konkursowe', 'add new on admin bar', 'amadeus'),
        'add_new' => _x('Dodaj film konkursowy', 'challenge', 'amadeus'),
        'add_new_item' => __('Dodaj film konkursowy', 'amadeus'),
        'new_item' => __('Nowy film konkursowy', 'amadeus'),
        'edit_item' => __('Edytuj film konkursowy', 'amadeus'),
        'view_item' => __('Zobacz film konkursowy', 'amadeus'),
        'all_items' => __('Wszystkie filmy konkursowe', 'amadeus'),
        'search_items' => __('Przeszukaj filmy konkursowe', 'amadeus'),
        'parent_item_colon' => __('Nadrzędne filmy konkursowe:', 'amadeus'),
        'not_found' => __('Nie znaleziono filmów konkursowych', 'amadeus'),
        'not_found_in_trash' => __('Nie znaleziono filmów konkursowych w koszu', 'amadeus')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'competition-movies', 'with_front' => true),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'post-formats', 'page-attributes')
    );

    register_post_type('competition-movies', $args);




}