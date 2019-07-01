<?php
/**
 * 
 * Template for displaying posts
 * 
 * @package Moss
 * @since 1.0
 * 
 */
get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php

    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content/content', 'single' );

    endwhile;
    ?>
    </main>
</section>

<?php get_footer(); ?>