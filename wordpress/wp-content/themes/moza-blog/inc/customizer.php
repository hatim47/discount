<?php
/**
 * Moza Blog Theme Customizer
 *
 * @package Moza Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function moza_blog_customize_register( $wp_customize ) {
	// Add koyel options section
	$wp_customize->add_section('moza_blog_options', array(
		'title'          => __('Social Options', 'moza-blog'),
		'capability'     => 'edit_theme_options',
		'description'    => __('Add social section options', 'moza-blog'),
		'priority'       => 20,

	));

	// Facebook Url
    $wp_customize->add_setting('fb_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('fa_url_control', array(
        'label'      => __('Facebook Url', 'moza-blog'),
        'description'=> __('Type your facebook profile link.', 'moza-blog'),
        'section'    => 'moza_blog_options',
        'settings'   => 'fb_url',
        'type'       => 'url',
    ));

	// Twitter Url
    $wp_customize->add_setting('tw_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('tw_url_control', array(
        'label'      => __('Twitter Url', 'moza-blog'),
        'description'=> __('Type your twitter profile link.', 'moza-blog'),
        'section'    => 'moza_blog_options',
        'settings'   => 'tw_url',
        'type'       => 'url',
    ));

	// Linkedin Url
    $wp_customize->add_setting('link_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('link_url_control', array(
        'label'      => __('Linkedin Url', 'moza-blog'),
        'description'=> __('Type your linkedin profile link.', 'moza-blog'),
        'section'    => 'moza_blog_options',
        'settings'   => 'link_url',
        'type'       => 'url',
    ));

	// instagram Url
    $wp_customize->add_setting('instagram_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('instagram_url_control', array(
        'label'      => __('Instagram Url', 'moza-blog'),
        'description'=> __('Type your instagram profile link.', 'moza-blog'),
        'section'    => 'moza_blog_options',
        'settings'   => 'instagram_url',
        'type'       => 'url',
    ));

     // Add koyel Styling Options Section
    $wp_customize->add_section('moza_blog_styling_options', array(
        'title'          => esc_html__('Styling Settings', 'moza-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select styling settings from here.', 'moza-blog'),
        'priority'       => 23,
    ));

    // Display Theme Color
    $wp_customize->add_setting('moza_blog_theme_color', array(
        'default'           => '#ff5671',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'moza_blog_theme_color', array(
                'label'          => esc_html__('Primary Color','moza-blog'),
                'description'    => esc_html__('Select theme color from here.', 'moza-blog'),
                'section'        => 'moza_blog_styling_options'
            )
        )
    );

    // Display Secondary Color
    $wp_customize->add_setting('moza_blog_secondary_color', array(
        'default'           => '#ffa21e',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'moza_blog_secondary_color', array(
                'label'          => esc_html__('Theme Secondary Color','moza-blog'),
                'description'    => esc_html__('Select theme secondary color from here.', 'moza-blog'),
                'section'        => 'moza_blog_styling_options'
            )
        )
    );

}
add_action( 'customize_register', 'moza_blog_customize_register' );