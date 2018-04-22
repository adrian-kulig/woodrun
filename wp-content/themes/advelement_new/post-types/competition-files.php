<?php

add_action('init', 'course_type_init');
function course_type_init()
{
    $labels = array(
        'name' => _x('', 'post type general name', 'amadeus'),
        'singular_name' => _x('Woodrunners - Filmy', 'post type singular name', 'amadeus'),
        'menu_name' => _x('Woodrunners - Filmy', 'admin menu', 'amadeus'),
        'name_admin_bar' => _x('Woodrunners - Filmy', 'add new on admin bar', 'amadeus'),
        'add_new' => _x('Dodaj film ', 'challenge', 'amadeus'),
        'add_new_item' => __('Dodaj film ', 'amadeus'),
        'new_item' => __('Nowy film ', 'amadeus'),
        'edit_item' => __('Edytuj film ', 'amadeus'),
        'view_item' => __('Zobacz film ', 'amadeus'),
        'all_items' => __('Wszystkie Woodrunners - Filmy', 'amadeus'),
        'search_items' => __('Przeszukaj Woodrunners - Filmy', 'amadeus'),
        'parent_item_colon' => __('Nadrzędne Woodrunners - Filmy:', 'amadeus'),
        'not_found' => __('Nie znaleziono filmów ', 'amadeus'),
        'not_found_in_trash' => __('Nie znaleziono filmów w koszu', 'amadeus')
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