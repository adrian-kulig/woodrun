<?php

$labels = array(
    'name' => _x('Logotypy', 'post type general name', 'smartup'),
    'singular_name' => _x('Logotyp', 'post type singular name', 'smartup'),
    'menu_name' => _x('Partnerzy i Przyjaciele', 'admin menu', 'smartup'),
    'name_admin_bar' => _x('Logotyp', 'add new on admin bar', 'smartup'),
    'add_new' => _x('Dodaj nowy', 'challenge', 'smartup'),
    'add_new_item' => __('Dodaj nowy Logotyp', 'smartup'),
    'new_item' => __('Nowy Logotyp', 'smartup'),
    'edit_item' => __('Edytuj Logotyp', 'smartup'),
    'view_item' => __('Zobacz Logotyp', 'smartup'),
    'all_items' => __('Wszystkie Logotypy', 'smartup'),
    'search_items' => __('Przeszukaj Logotypy', 'smartup'),
    'parent_item_colon' => __('Nadrzędne Logotypy:', 'smartup'),
    'not_found' => __('Nie znaleziono Logotypów', 'smartup'),
    'not_found_in_trash' => __('Nie znaleziono Logotypów', 'smartup')
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

register_post_type('logotypes', $args);