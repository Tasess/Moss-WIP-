<?php
/**
 * Template part for displaying posts
 * 
 * @package Moss
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="moss_box">
        
            <div class="article-block">
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
            </div><!-- .article-block -->
    </div><!-- .moss_box -->
</article>