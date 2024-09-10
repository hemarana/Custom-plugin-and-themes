<?php

add_action('customize_register', 'my_customize_register');

function my_customize_register($wp_customize) {
    // Add a panel
    $wp_customize->add_panel('new_panel', array(
        'title' => __('New Panel', 'textdomain'),
        'description' => __('A description of the new panel.', 'textdomain'),
        'priority' => 10,
    ));

    // Add a section within the panel
    $wp_customize->add_section('new_section', array(
        'title' => __('New Section', 'textdomain'),
        'priority' => 30,
        'panel' => 'new_panel', // Assigning this section to the new panel
    ));

    // Add a setting
    $wp_customize->add_setting('setting_id', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add another setting for accent color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#f72525',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a third setting
    $wp_customize->add_setting('myplugin_options[color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '#ff2525',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for the first setting
    $wp_customize->add_control('setting_id_control', array(
        'label' => __('Setting ID Control', 'textdomain'),
        'section' => 'new_section',
        'settings' => 'setting_id',
        'type' => 'text',
    ));

    // Add a control for the accent color setting
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color_control', array(
        'label' => __('Accent Color', 'textdomain'),
        'section' => 'new_section',
        'settings' => 'accent_color',
    )));
}

?>
