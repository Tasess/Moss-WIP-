<?php
/**
 * 
 * The Header for the theme, this will be visible on all pages
 * 
 * This section will display all that will be in the <head> section and everything up to <div id="content">
 * 
 * @package Moss
 * @since Moss 1.0
 */
?>

<!doctype html>
<html>
    
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="navbar">
    <nav class="navbar navbar-nav navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <div class="moss-logo"><?php if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
        } ?>
        
        <a class="navbar-brand brand-name d-none d-md-block" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php bloginfo( 'name' ) ?> </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                    'container' => false,
                    'items_wrap' => '%3$s'
                ) );
            ?>
            </ul>

        </div>
    </nav>
</div><!-- #navbar -->