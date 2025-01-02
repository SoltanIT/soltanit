<?php
 /**
 * Template Name: Crysa Templates
 *
 * The template file for displaying breadcumb with page.
 *
 * @package Crysa
 */
 
  get_header();
  crysa_breadcumb(); 
?>
<div class="page-content">
    <div class="container">
            <?php
            if( have_posts() ):
                while(  have_posts() ): the_post();
                    get_template_part('template-parts/content','page');
                endwhile;
                if( comments_open() || get_comments_number() ):
                    comments_template();
                endif;
                else:
                get_template_part('template-parts/content', 'none');
            endif; 
            ?>
    </div>
</div>
<?php get_footer(); ?>