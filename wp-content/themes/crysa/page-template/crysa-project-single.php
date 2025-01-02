<?php
 /**
 * Template Name: Crysa Project Single
 *
 * The template file for displaying breadcumb with service single page.
 *
 * @package Crysa
 */
 
  get_header();
  crysa_breadcumb(); 
?>
    <!-- Star Project Details Area
    ============================================= -->
    <div class="project-details-area default-padding">
            <div class="project-details-items">
                <?php 
                    the_content(); 
                    $defaults = array(
                        'before'           => '<nav class="page-links">',
                        'after'            => '</nav>',
                        'link_before'      => '',
                        'link_after'       => '',
                        'separator'        => ' ',
                        'pagelink'         => '%',
                        'echo'             => 1
                    );
                    wp_link_pages($defaults);
                ?>
            </div>
    </div>
    <!-- End Project Details Area -->
    
<?php get_footer(); ?>