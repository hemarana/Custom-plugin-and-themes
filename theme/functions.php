<?php
require get_template_directory() .'/inc/customize.php';
// custom post type
require get_template_directory(). '/inc/custom-post-car.php';

require get_template_directory(). '/inc/custom-slider.php';

require get_template_directory(). '/inc/metabox-url.php';

// add_theme_support('menus');

function mytheme_support()
{
  add_theme_support('custom-logo');

  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'extra-menu' => __('Extra Menu'),
      'mobile-menu' => __('mobile menu')
    )
  );

  add_theme_support('title-tag');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
  $defaults = array(
		// Default Header Image to display.
		'default-image'          => get_template_directory_uri() . '/assets/images/header.png',
		// Display the header text along with the image.
		'header-text'            => false,
		// Header text color default.
		'default-text-color'     => '000',
		// Header image width (in pixels).
		'width'                  => 1000,
		// Header image height (in pixels).
		'height'                 => 200,
		// Header image random rotation default.
		'random-default'         => true,
		// Enable upload of image file in admin.
		'uploads'                => true,
		'admin-head-callback'    => 'adminhead_cb',
		// Function to produce preview markup in the admin screen.
		'admin-preview-callback' => 'adminpreview_cb',
    'flex-width'  => true,
      'flex-height' => true,
	);
  add_theme_support('custom-header', $defaults);
  add_theme_support('automatic-feed-links');

  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mytheme_support');

// Add 'nav-link' class to each <a> element
function add_link_atts($atts, $item, $args)
{
  if (isset($args->a_class)) {
    $atts['class'] = $args->a_class;
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_link_atts', 1, 3);

function register_my_menus()
{

}
add_action('init', 'register_my_menus');



function add_menu_item_classes($classes, $item, $args)
{
  // Add 'dropdown' class to menu items that have children
  if (in_array('menu-item-has-children', $item->classes)) {
    $classes[] = 'dropdown';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_item_classes', 10, 23);


class Custom_Submenu_Walker extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    if (isset($args->submenu_class)) {
      $submenu_class = $args->submenu_class;
    } else {
      $submenu_class = 'sub-menu';
    }

    $output .= '<ul class="' . esc_attr($submenu_class) . ' dropdown-menu">';
  }
}



/* function link_css(){
   // wp_enqueue_style('theme_css', get_stylesheet_uri());
   wp_enqueue_style('bootstrap1', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
   wp_enqueue_style('bootstrap3', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
   wp_enqueue_style('bootstrap4', get_template_directory_uri() . '/assets/css/bootstrap.rtl.min.css');
   wp_enqueue_style('bootstrap5', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css');
   wp_enqueue_style('bootstrap6', get_template_directory_uri() . '/assets/css/bootstrap-grid.rtl.min.css');
   wp_enqueue_style('bootstrap7', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css');
   wp_enqueue_style('bootstrap8', get_template_directory_uri() . '/assets/css/bootstrap-reboot.rtl.min.css');
   wp_enqueue_style('bootstrap9', get_template_directory_uri() . '/assets/css/bootstrap-utilities.min.css');
   wp_enqueue_style('bootstrap10', get_template_directory_uri() . '/assets/css/bootstrap-utilities.rtl.min.css');
   wp_enqueue_style('style.css', get_template_directory_uri() . '/assets/css/style.css');
   
}*/

function link_css()
{
  // wp_enqueue_style('theme_css', get_stylesheet_uri());
  wp_enqueue_style('bootstrap1', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');


}
add_action('wp_enqueue_scripts', 'link_css');

function link_script()
{
  wp_enqueue_script('js1', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '', true);
  // wp_enqueue_script('bootstrap.bundle', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', array(), '', true );

}

add_action('wp_enqueue_scripts', 'link_script');




function mytheme_widgets_init()
{
  register_sidebar(
    array(
      'name' => __('Primary Sidebar', 'theme_name'),
      'id' => 'sidebar-1',
      'before_widget' => '<aside id="Hema1" class="Hema2">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="Test10">',
      'after_title' => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name' => __('footer 1', 'theme_name'),
      'id' => 'footer',
      'before_widget' => '<ul><li id="footer" class="widget footer">',
      'after_widget' => '</li></ul>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );


  register_sidebar(
    array(
      'name' => __('footer 2', 'theme_name'),
      'id' => 'footer1',
      'before_widget' => '<ul><li id="footer" class="widget footer">',
      'after_widget' => '</li></ul>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );


  register_sidebar(
    array(
      'name' => __('footer 3', 'theme_name'),
      'id' => 'footer2',
      'before_widget' => '<ul><li id="footer" class="widget footer">',
      'after_widget' => '</li></ul>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

}

add_action('widgets_init', 'mytheme_widgets_init');




function set_posts_per_page_for_archive($query)
{
  if ($query->is_archive() && !is_admin() && $query->is_main_query()) {
    $query->set('posts_per_page', 5);
  }
}
add_action('pre_get_posts', 'set_posts_per_page_for_archive');



function wporg_custom_post_type() {
	register_post_type('Mobile',
		array(
			'labels'      => array(
				'name'          => __( 'Mobile ', 'textdomain' ),
				'singular_name' => __( 'Mobile Data', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'Mobile_data' ), // my custom slug
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
		)
	);
}
add_action('init', 'wporg_custom_post_type');

function wporg_custom_taxonomy() {
  $labels = array(
      'name'                       => _x( 'Mobile Categories', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Mobile Category', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Mobile Categories', 'textdomain' ),
      'all_items'                  => __( 'All Mobile Categories', 'textdomain' ),
      'parent_item'                => __( 'Parent Mobile Category', 'textdomain' ),
      'parent_item_colon'          => __( 'Parent Mobile Category:', 'textdomain' ),
      'edit_item'                  => __( 'Edit Mobile Category', 'textdomain' ),
      'update_item'                => __( 'Update Mobile Category', 'textdomain' ),
      'add_new_item'               => __( 'Add New Mobile Category', 'textdomain' ),
      'new_item_name'              => __( 'New Mobile Category Name', 'textdomain' ),
      'menu_name'                  => __( 'Mobile Categories', 'textdomain' ),
  );

  $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'mobile-category' ),
  );

  register_taxonomy( 'mobile_category', array( 'mobile' ), $args );
}
add_action( 'init', 'wporg_custom_taxonomy' );


// Add custom metabox
function custom_metabox() {
  add_meta_box(
      'custom_metabox_id',            // Metabox ID
      'Custom Metabox Title',         // Metabox Title
      'custom_metabox_callback',      // Callback function to render the metabox content
      'post',                         // Post type to add the metabox to (in this case, 'post')
      'normal',                       // Context (where to display the metabox: 'normal', 'advanced', or 'side')
      'high'                          // Priority (high, core, default, or low)
  );
}
add_action('add_meta_boxes', 'custom_metabox');

// Callback function to render the metabox content
function custom_metabox_callback($post) {
  // Retrieve the current value of the custom field
  $custom_field_value = get_post_meta($post->ID, 'custom_field_name', true);

  // Output the HTML for the metabox content
  ?>
  <label for="custom_field">Custom Field:</label>
  <input type="text" id="custom_field" name="custom_field" value="<?php echo esc_attr($custom_field_value); ?>" />
  <?php
}

// Save custom metabox data
function save_custom_metabox_data($post_id) {
  // Check if nonce is set and valid
  if (!isset($_POST['custom_metabox_nonce']) || !wp_verify_nonce($_POST['custom_metabox_nonce'], 'custom_metabox_nonce')) {
      return;
  }

  // Check if this is an autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
  }

  // Check the post type
  if ('post' !== $_POST['post_type']) {
      return;
  }

  // Check if the current user has permission to edit the post
  if (!current_user_can('edit_post', $post_id)) {
      return;
  }

  // Save the custom field data
  if (isset($_POST['custom_field'])) {
      update_post_meta($post_id, 'custom_field_name', sanitize_text_field($_POST['custom_field']));
  }
}
add_action('save_post', 'save_custom_metabox_data');
