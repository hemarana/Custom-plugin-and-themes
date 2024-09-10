<?php
/*
Plugin Name: My First Plugin
Plugin URI: http://yourwebsite.com/your-plugin
Description: A brief description of what your plugin does.
Version: 1.0
Author: Your Name
Author URI: http://yourwebsite.com


*/
if(!defined('ABSPATH')){
    header("location:/theme_learn");
    die ("Sorry you cont' access");
}

register_activation_hook(__FILE__, 'my_plugin_activation');
function my_plugin_activation() {
    add_option('my_plugin_activation', true);
}
// Function to execute on plugin deactivation
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');
function my_plugin_deactivation() {
    add_option('my_plugin_deactivation', true);
}
// Function to execute on plugin uninstall
function my_plugin_uninstall() {
    add_option('my_plugin_uninstalled', true);
}
register_uninstall_hook(__FILE__, 'my_plugin_uninstall');
// Function to display admin notice after activation, deactivation, and uninstallation
function my_plugin_admin_notice() {
    if (get_option('my_plugin_activation')) {
        echo '<div class="notice notice-success is-dismissible">';
        echo '<p>My First Plugin has been activated!</p>';
        echo '</div>';
        delete_option('my_plugin_activation');
    }
 }
add_action('admin_notices', 'my_plugin_admin_notice');

function short_code(){
echo "here is short code";
}
add_shortcode('myshort', 'short_code')
?>