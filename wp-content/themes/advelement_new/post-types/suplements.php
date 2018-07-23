<?php

$labels = array(
    'name' => _x('Suplementy', 'post type general name', 'smartup'),
    'singular_name' => _x('Suplement', 'post type singular name', 'smartup'),
    'menu_name' => _x('Suplementy', 'admin menu', 'smartup'),
    'name_admin_bar' => _x('Suplement', 'add new on admin bar', 'smartup'),
    'add_new' => _x('Dodaj nowy', 'challenge', 'smartup'),
    'add_new_item' => __('Dodaj nowy Suplement', 'smartup'),
    'new_item' => __('Nowy Suplement', 'smartup'),
    'edit_item' => __('Edytuj Suplement', 'smartup'),
    'view_item' => __('Zobacz Suplement', 'smartup'),
    'all_items' => __('Wszystkie Suplementy', 'smartup'),
    'search_items' => __('Przeszukaj Suplementy', 'smartup'),
    'parent_item_colon' => __('Nadrzędne Suplementy:', 'smartup'),
    'not_found' => __('Nie znaleziono Suplementów', 'smartup'),
    'not_found_in_trash' => __('Nie znaleziono Suplement', 'smartup')
);

$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'website', 'with_front' => false),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 9,
    'menu_icon' => 'dashicons-admin-links',
    'supports' => array('title', 'thumbnail', 'page-attributes')
);

register_post_type('suplements', $args);