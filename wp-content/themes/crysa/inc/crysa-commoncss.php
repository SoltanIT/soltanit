<?php
// Block direct access
if (!defined('ABSPATH')) {
  exit();
}
/**
 * @Packge     : crysa
 * @Version    : 1.5
 * @Author     : crysa
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */
global $crysa_option;
// enqueue css
function crysa_common_custom_css()
{
  global $crysa_option;
  $customcss = "";
  wp_enqueue_style('crysa-color-schemes', get_template_directory_uri() . '/assets/css/color.schemes.css');

  // theme color
  if (!empty($crysa_option['crysa_theme_color'])) {
    $crysathemecolor = $crysa_option['crysa_theme_color'];

    list($r, $g, $b) = sscanf($crysathemecolor, "#%02x%02x%02x");

    $crysa_real_color = $r . ',' . $g . ',' . $b;

    $customcss .= ":root {
		  --color-primary: rgb({$crysa_real_color});
		}";
  }

  // theme color secendary
  if (!empty($crysa_option['crysa_theme_color_sec'])) {
    $crysathemecolor_sec = $crysa_option['crysa_theme_color_sec'];

    list($r, $g, $b) = sscanf($crysathemecolor_sec, "#%02x%02x%02x");

    $crysa_real_color_sec = $r . ',' . $g . ',' . $b;

    $customcss .= ":root {
          --dark: rgb({$crysa_real_color_sec});
        }";
  }

  // theme body font
  global $crysa_option;
  if (!empty($crysa_option['crysa_theme_body_typography']['font-family'])) {
    $crysathemebodyfont = $crysa_option['crysa_theme_body_typography']['font-family'];
  }
  if (!empty($crysathemebodyfont)) {
    $customcss .= ":root {
          --font-default: $crysathemebodyfont ;
        }";
  } else {
    $customcss .= ":root {
          --font-default: 'Yantramanav', sans-serif;
        }";
  }

  if (!empty($CustomCssOpt)) {
    $customcss .= $CustomCssOpt;
  }

  wp_add_inline_style('crysa-color-schemes', $customcss);
}
add_action('wp_enqueue_scripts', 'crysa_common_custom_css', 100);
