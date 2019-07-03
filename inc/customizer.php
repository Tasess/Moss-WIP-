<?php
/**
 * Moss: Customizer
 * 
 * @package Moss
 * @since 1.0
 * 
 * Add postMessage support for site title and description for the Theme Customizer.
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
/**
 * JUMBOTRON IMAGES
 */
function moss_customizer_register( $wp_customize ) {

    $wp_customize->add_section( 'Images', array(
    'description' => __('<h3>Allows you to change the Images for the different jumbotrons.</h3><br><br> For best results, get an image at least 3200x2400!', 'moss'),
    'title'         => __( 'Images', 'moss' ),
    'priority'      => 30,
    ) );

    $wp_customize->add_setting( 'header_image', array(
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_header', array(
        'label'         => __( 'Header Image', 'moss' ),
        'section'       => 'Images',
        'settings'      => 'header_image',
    )));

    //Display_Portrait

    $wp_customize->add_setting( 'display_portrait', array(
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_portrait', array(
        'label'         => __( 'Portrait Image', 'moss' ),
        'section'       => 'Images',
        'settings'      => 'display_portrait',
    ) ) );

    //Display_craft
    $wp_customize->add_setting( 'display_craft', array(
        'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_craft', array(
        'label'         => __( 'Craft Image', 'moss' ),
        'section'       => 'Images',
        'settings'      => 'display_craft',
    ) ) );
    
    /**
     * Custom Text 
     */
    $wp_customize->add_section( 'custom_footer_text', array(
        'title'                 => __( 'Footer Text', 'moss' ),
        'priority'              => 50
    ) );
    $wp_customize->add_setting( 'footer_text', array(
        'default'               => __( 'default text', 'moss' ),
        'sanitize_callback'     => 'sanitize_text'
    ) );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'custom_footer_text', array(
            'label'             => __( 'Text', 'moss' ),
            'section'           => 'custom_footer_text',
            'settings'           => 'footer_text',
            'type'              => 'text'
        )
    ) );
 	// Sanitize text
    function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}
add_action( 'customize_register', 'moss_customizer_register' );