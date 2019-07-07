<?php

/* 
    ----------

    I. E S S E N T I A L S

    ----------
*/

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
    ----------
    A. S E T U P
    ----------
*/
if ( ! function_exists( 'moss_setup' ) ):

    function moss_setup() {

        add_filter( 'widget_text', 'shortcode_unautop');
        add_filter( 'widget_text', 'do_shortcode');

        /**
         * Let's WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );

        /**
         * Adds support for thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 250, 250 );

        add_image_size( 'moss-article', 400, 400, true );

        /**
         * add support for menus
         */
        register_nav_menus(
            array(
                'menu-1'    => __( 'Primary', 'moss' ),
                'footer'    => __( 'Footer Menu', 'moss' ),
                'social'    => __( 'Social Links Menu', 'moss' ),
            )
        );

        /**
         * 
         * Add support for core custom logo.
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'            => 64,
                'width'             => 64,
                'flex-height'       => true,
                'flex-width'        => true,
                'header-text'       => array( 'site-title', 'site-description'),
            )
        );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
        
        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'moss_setup' );


/*
    ----------
    B. S C R I P T  -A N D-  S T Y L E
    ----------
*/

add_action( 'wp_enqueue_scripts', 'moss_scripts' );

function moss_scripts() {

/* G O O G L E  F O N T */
wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Raleway|Roboto|Montserrat|Poiret+One|Open+Sans' );

/* T H E M E  C S S  */

wp_enqueue_style( 'moss-css', get_template_directory_uri() . '/library/styles/moss.css' );

/* B O O T S T R A P  */

wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ) );

/* F O N T A W E S O M E */

wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );

/* T H E M E  J S */
wp_enqueue_script( 'moss-js', get_template_directory_uri() . '/library/js/moss.js', array('jquery'), '1.0', true );

}

/*
    ----------

    II. G E N E R A L  B L O G G I N G

    ----------

/*
    ----------
    A. M E N U  S E T U P  -A N D-  S I D E B A R S
    ----------
*/

function moss_portfolio_widgets() {
    $sidebars   = array(
        'sidebar'   => array(
            'name'          => __( 'Sidebar', 'moss' ),
            'id'            => 'sidebar',
            'description'   => __( 'Default Sidebar', 'moss' ),
        ),
        'about'     => array(
            'name'          => __( 'About Section', 'moss' ),
            'id'            => 'about',
            'description'   => __( 'Widgets for the about section. Best to use the html widget and talk about yourself or what you do.', 'moss' ),
        ),
        'services'  => array(
            'name'          => __( 'Services Section', 'moss' ),
            'id'            => 'service',
            'description'   => __( 'Widgets for the services section. Best to use the html widget and talk about what you have to offer.', 'moss' ),
        ),
    );

    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
            'name'          => esc_html( $sidebar['name'] ),
            'id'            => esc_html( $sidebar['id'] ),
            'description'   => esc_html( $sidebar['description'] ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title" itemprop="name">',
            'after_title'   => '</h2>',
        ) );
    }
}
add_action( 'widgets_init', 'moss_portfolio_widgets' );

remove_filter( 'the_content', 'wpautop' );

/*
    ----------
    C. N A V I G A T I O N
    ----------
*/



function special_nav_class ( $classes, $item) {
    if ( in_array( 'current-menu-item', $classes) )
    {
        $classes[] = 'active';
    }
    return $classes;
}

add_filter( 'nav_menu_css_class', 'special_nav_class', 10 , 2);

/*
    ----------
    D. E X C E R P T S
    ----------
*/

function moss_excerpt( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'moss_excerpt', 999 );

/*
    ----------
    E. F E A T U R E D  I M A G E  * R E Q U I R E D *
    ----------
*/
add_action( 'save_post', 'moss_check_thumbnail' );
add_action( 'admin_notices', 'moss_thumbnail_error' );

function moss_check_thumbnail($post_id) {

    if( get_post_type($post_id) != 'post' )
    return;

    if ( !has_post_thumbnail( $post_id ) ) {
        set_transient( "has_post_thumbnail", "no" );

        remove_action( 'save_post', 'moss_check_thumbnail' );

        wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );

        add_action( 'save_post', 'moss_check_thumbnail' );
    } else {
        delete_transient( "has_post)thumbnail" );
    }
}

function moss_thumbnail_error() {
    if ( get_transient( "has_post_thumbnail" ) == "no" ) {
        echo "<div id='message' class='error'><strong>You must select a Featured Image, use an image at least 400x400. Your post is saved but it cannot be published.</strong></div>";
        delete_transient( "has_post_thumbnail" );
    }
}