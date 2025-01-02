<?php
 /**
 * Template Name: OnePage Templates
 *
 * The template file for displaying onepage.
 *
 * @package Crysa
 */
 
get_header('onepage');
?>
<div class="page-content">
    <?php
    if( have_posts() ):
        while(  have_posts() ): the_post();
            get_template_part('template-parts/content','page');
        endwhile;
    endif; 
    ?>
</div>
<?php get_footer(); ?>