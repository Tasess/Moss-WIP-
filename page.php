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
<!-- <?php get_template_part( 'template-parts/preload/preload-screen' ); ?> -->

<section id="primary" class="content-area parallax">
    <div class="container">
        <div class="col-10 text-justify section-home">
            
            <?php /* Displays the text on the page */
                if ( have_posts() ) :

                    while( have_posts() ) : the_post(); 

                    the_content(); 

                    endwhile;
                endif;
            ?>
        </div> <!-- .col-8 -->
    </div> <!-- .container -->
</section>
<?php get_template_part( 'template-parts/display/display-portrait' ); ?>

    <div class="short-bio">
        <h1>Short Bio here!</h1>
    </div>

<?php get_template_part( 'template-parts/display/display-craft' ); ?>


    <div class="container">
        <?php 
            echo do_shortcode('[gallery order ="DESC" orderby="post_date"]');
        ?>
    </div>

<?php
get_footer(); ?>