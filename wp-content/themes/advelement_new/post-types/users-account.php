<?php

add_action('init', 'users_account_init');
function users_account_init()
{
    $labels = array(
        'name' => _x('', 'post type general name', 'amadeus'),
        'singular_name' => _x('Użytkownicy pakietów', 'post type singular name', 'amadeus'),
        'menu_name' => _x('Użytkownicy pakietów', 'admin menu', 'amadeus'),
        'name_admin_bar' => _x('Użytkownicy pakietów', 'add new on admin bar', 'amadeus'),
        'add_new' => _x('Dodaj Użytkownika pakietu ', 'challenge', 'amadeus'),
        'add_new_item' => __('Dodaj Użytkownika pakietu ', 'amadeus'),
        'new_item' => __('Nowy Użytkownika pakietu ', 'amadeus'),
        'edit_item' => __('Edytuj Użytkownika pakietu ', 'amadeus'),
        'view_item' => __('Zobacz Użytkownika pakietu ', 'amadeus'),
        'all_items' => __('Wszystkie Użytkownicy pakietów', 'amadeus'),
        'search_items' => __('Przeszukaj Użytkownicy pakietów', 'amadeus'),
        'parent_item_colon' => __('Nadrzędne Użytkownicy pakietów:', 'amadeus'),
        'not_found' => __('Nie znaleziono Użytkownika pakietów ', 'amadeus'),
        'not_found_in_trash' => __('Nie znaleziono Użytkownika pakietów w koszu', 'amadeus')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'users-account', 'with_front' => true),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'post-formats', 'page-attributes')
    );

    register_post_type('users-account', $args);




}