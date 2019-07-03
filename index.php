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
<!-- <?php get_template_part( 'template-parts/preload/preload-screen' ); ?>  -->

<section id="primary" class="content-area parallax">
    <div class="container">
        <div class="section-home">

                    <section id="about" class="about-section">
                        <div>
                            <?php dynamic_sidebar( 'about' ); ?>
                        </div>
                    </section>
                    

            <?php /* Displays the text on the page */
                if ( have_posts() ) :

                    while( have_posts() ) : the_post(); 

                    the_excerpt(); 

                    endwhile;
                endif;
            ?>
        </div> <!-- .col-8 -->
    </div> <!-- .container -->
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