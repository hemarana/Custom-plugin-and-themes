<?php
// Register Custom Post Type Product
function create_product_cpt()
{
    $labels = array(
        'name' => __('Products', 'textdomain'),
        'singular_name' => __('Product', 'textdomain'),
        'menu_name' => __('Products', 'textdomain'),
        'name_admin_bar' => __('Product', 'textdomain'),
        'archives' => __('Product Archives', 'textdomain'),
        'attributes' => __('Product Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent Product:', 'textdomain'),
        'all_items' => __('All Products', 'textdomain'),
        'add_new_item' => __('Add New Product', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New Product', 'textdomain'),
        'edit_item' => __('Edit Product', 'textdomain'),
        'update_item' => __('Update Product', 'textdomain'),
        'view_item' => __('View Product', 'textdomain'),
        'view_items' => __('View Products', 'textdomain'),
        'search_items' => __('Search Products', 'textdomain'),
        'not_found' => __('No products found', 'textdomain'),
        'not_found_in_trash' => __('No products found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into product', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this product', 'textdomain'),
        'items_list' => __('Products list', 'textdomain'),
        'items_list_navigation' => __('Products list navigation', 'textdomain'),
        'filter_items_list' => __('Filter products list', 'textdomain'),
    );
    $args = array(
        'label' => __('Product', 'textdomain'),
        'description' => __('A custom post type for products', 'textdomain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'post-formats', 'custom-fields'),
        'taxonomies' => array('product_category', 'post_tag'), // Associating taxonomy and tags
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-products',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'products'),
    );
    register_post_type('product', $args);
}
add_action('init', 'create_product_cpt', 0);

// Register Custom Taxonomy for Product Category
function create_product_taxonomy()
{
    $labels = array(
        'name' => _x('Product Categories', 'taxonomy general name', 'theme_learn'),
        'singular_name' => _x('Product Category', 'taxonomy singular name', 'theme_learn'),
        'search_items' => __('Search Product Categories', 'theme_learn'),
        'all_items' => __('All Product Categories', 'theme_learn'),
        'parent_item' => __('Parent Product Category', 'theme_learn'),
        'parent_item_colon' => __('Parent Product Category:', 'theme_learn'),
        'edit_item' => __('Edit Product Category', 'theme_learn'),
        'update_item' => __('Update Product Category', 'theme_learn'),
        'add_new_item' => __('Add New Product Category', 'theme_learn'),
        'new_item_name' => __('New Product Category Name', 'theme_learn'),
        'menu_name' => __('Product Categories', 'theme_learn'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product-category'),
    );
    register_taxonomy('product_category', array('product'), $args);
}
add_action('init', 'create_product_taxonomy', 0);
?>