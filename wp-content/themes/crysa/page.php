<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Crysa
 */
    
  get_header();
  crysa_breadcumb(); 
?>
    <div class="page-content default-padding">
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