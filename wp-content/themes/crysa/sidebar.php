 <?php 
 /**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crysa
 */
global $crysa_option;
if ( isset( $crysa_option['blog_sidebar'] ) && $crysa_option['blog_sidebar'] == '3'  ) {
    return;
}
$sidebar = 'blog-sidebar';

if ( ! is_active_sidebar( $sidebar ) ) {
    return;
}
?>

<!-- Start Sidebar -->
<?php if(is_active_sidebar('blog-sidebar')):?>
    <div class="sidebar col-lg-4 col-md-12">
    	<aside>
           <?php dynamic_sidebar('blog-sidebar')?>
        </aside>
    </div>
<?php endif;?>
<!-- End Start Sidebar -->