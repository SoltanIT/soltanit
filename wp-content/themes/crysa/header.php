<?php

/**
 * The template for displaying the header
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crysa
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- ========== Meta Tags ========== -->
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ========== Favicon Icon ========== -->
  <?php
  if (!(function_exists('has_site_icon') && has_site_icon())) : ?>
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.png'); ?>">
  <?php endif;
  ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php
  do_action('crysa_header');
  if (class_exists('woocommerce')) {
    if (is_shop() || (is_single()  && get_post_type() == 'product')) {
      crysa_breadcumb();
    }
  }
  ?>