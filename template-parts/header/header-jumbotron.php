<?php
/**
 * Template to display the jumbotron on the main page
 * 
 */
?>

<div class="jumbotron jumbotron-header jumbotron-fluid" style="background-image: url('<?php echo esc_url( get_theme_mod( 'header_image' ) ); ?>'">
    <div>
        <?php 
        
        get_template_part( 'template-parts/header/header-title' ); 
        
        ?>
    </div>  
</div> <!-- jumbotron -->