<?php
// Register Custom Post Type slider
function create_slider_cpt()
{
    $labels = array(
        'name' => __('slider', 'textdomain'),
        'singular_name' => __('slider', 'textdomain'),
        'menu_name' => __('slider', 'textdomain'),
        'name_admin_bar' => __('slider', 'textdomain'),
     
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into slider', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this slider', 'textdomain'),
        'items_list' => __('slider list', 'textdomain'),
        'items_list_navigation' => __('slider list navigation', 'textdomain'),
        'filter_items_list' => __('Filter slider list', 'textdomain'),
    );
    $args = array(
        'label' => __('slider', 'textdomain'),
        'description' => __('A custom post type for slider', 'textdomain'),
        'labels' => $labels,
        'supports' => array('title', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-car',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'slider'),
    );
    register_post_type('slider', $args);
}
add_action('init', 'create_slider_cpt', 0);

// Register Custom Taxonomy for slider Category
function create_slider_taxonomy()
{
    $labels = array(
        'name' => _x('slider Categories', 'taxonomy general name', 'theme_learn'),
        'singular_name' => _x('slider Category', 'taxonomy singular name', 'theme_learn'),
        'search_items' => __('Search slider Categories', 'theme_learn'),
        'all_items' => __('All slider Categories', 'theme_learn'),
        'parent_item' => __('Parent slider Category', 'theme_learn'),
        'parent_item_colon' => __('Parent slider Category:', 'theme_learn'),
        'edit_item' => __('Edit slider Category', 'theme_learn'),
        'update_item' => __('Update slider Category', 'theme_learn'),
        'add_new_item' => __('Add New slider Category', 'theme_learn'),
        'new_item_name' => __('New slider Category Name', 'theme_learn'),
        'menu_name' => __('slider Categories', 'theme_learn'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'slider-category'),
    );
    register_taxonomy('slider_category', array('slider'), $args);
}
add_action('init', 'create_slider_taxonomy', 0);
?>