<?php
/**
 * Template for static page
 * 
 * @package Moss
 * @since 1.0
 */
get_template_part( 'template-parts/header/header-jumbotron' );
get_header();

?>
<!-- Displays the jumbotron -->
<?php get_template_part( 'template-parts/preload/preload-screen' ); ?> 

<section id="content" class="content-area parallax">
    <section id="about" class="about-section">
        <div>
            <?php dynamic_sidebar( 'about' ); ?>
        </div>
    </section>
<!-- POST LOOP START HERE -->

    <?php get_template_part( 'template-parts/content' ); ?>

<!-- POST LOOP END HERE -->
</section>
<?php get_template_part( 'template-parts/display/display-portrait' ); ?>
    <section id="service">
        <div class="service">
            <?php dynamic_sidebar( 'service' ); ?>
        </div>
    </section>


<?php get_template_part( 'template-parts/display/display-craft' ); ?>



<?php
get_footer(); ?>