<?php
/**
 * Template part for displaying posts
 * 
 * @package Moss
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>

<div class="row"> <!-- MAIN ROW START***** -->
    <div class="col-md-12"> <!-- article columns -->
        <div class="row container-fluid" style="margin-bottom: 30px;">

            <?php if (have_posts()) : while (have_posts()) : the_post();?>

            
                    <div class='<?php echo 'col-md-12 col-lg-5 moss_article'; ?>'>
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="entry-meta">
                                <span class="posted-on"><a href="<?php the_permalink(); ?>"><time><?php echo esc_html( get_the_date() ); ?></time></a></span>
                            </div>
                        </header>
                        <figure class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'moss-article' );
                                }else{ ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/library/images/green.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" />
                                <?php }?>
                            </a>
                        </figure>
                    </div>
            <?php endwhile; endif; ?>
        </div>
    </div> <!-- article columns end -->
<div> <!-- MAIN ROW END -->


</article>
