<?php

$labels = array(
    'name' => _x('Repozytorium', 'post type general name', 'smartup'),
    'singular_name' => _x('Repozytorium', 'post type singular name', 'smartup'),
    'menu_name' => _x('Repozytorium ćwiczeń', 'admin menu', 'smartup'),
    'name_admin_bar' => _x('Repozytorium', 'add new on admin bar', 'smartup'),
    'add_new' => _x('Dodaj nowe ćwiczenie', 'challenge', 'smartup'),
    'add_new_item' => __('Dodaj nowe ćwiczenie', 'smartup'),
    'new_item' => __('Nowe ćwiczenie', 'smartup'),
    'edit_item' => __('Edytuj ćwiczenie', 'smartup'),
    'view_item' => __('Zobacz ćwiczenie', 'smartup'),
    'all_items' => __('Wszystkie ćwiczenie', 'smartup'),
    'search_items' => __('Przeszukaj Repozytorium', 'smartup'),
    'parent_item_colon' => __('Nadrzędne Repozytorium:', 'smartup'),
    'not_found' => __('Nie znaleziono Repozytoriumów', 'smartup'),
    'not_found_in_trash' => __('Nie znaleziono Repozytoriumów', 'smartup')
);


$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'repository-files', 'with_front' => true),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-book-alt',
    'supports' => array('title', 'editor', 'author', 'comments', 'thumbnail', 'excerpt', 'post-formats', 'page-attributes')
);

register_post_type('repository-files', $args);