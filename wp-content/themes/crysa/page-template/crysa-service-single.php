<?php
 /**
 * Template Name: Crysa Service Single
 *
 * The template file for displaying breadcumb with service single page.
 *
 * @package Crysa
 */
 
  get_header();
  crysa_breadcumb(); 
?>
<div class="services-details-area default-padding">
    <div class="container">
        <div class="services-details-items">
            <div class="row">   
                <div class="col-xl-8 col-lg-7 pr-45 pr-md-15 pr-xs-15 services-single-content">
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
                <div class="col-xl-4 col-lg-5 mt-md-50 mt-xs-50 services-sidebar">
                    <!-- Single Widget -->
                    <?php dynamic_sidebar('service-sidebar')?>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>