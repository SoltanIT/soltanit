<?php
/**
 * crysa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crysa
 */


if ( ! function_exists( 'crysa_basic_function' ) ) :

    require_once( get_theme_file_path( "/lib/class-tgm-plugin-activation.php" ) );
    require_once get_template_directory() . '/inc/crysa-navwalker.php';

    if(class_exists('CMB2_Bootstrap_260')){
        require_once(dirname(__FILE__) . '/inc/init.php');
    }

    if(file_exists(dirname(__FILE__) . '/simple/crysa-config.php')){
        require_once(dirname(__FILE__) . '/simple/crysa-config.php');
    }

    function crysa_basic_function() {
        load_theme_textdomain( 'crysa', get_template_directory() . '/languages');
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'editor-style' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
         add_theme_support( 'woocommerce' );

         // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'assets/css/style-editor.css' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'crysa' ),
        ) );
        
        if( class_exists( 'ReduxFramework' ) ){
            register_nav_menus( array(
                'footer-menu' => esc_html__( 'Footer Copyright Menu', 'crysa' ),
            ) );

            register_nav_menus( array(
                'onepage' => esc_html__( 'One Page Menu', 'dustra' ),
            ) );

        }
        add_image_size('crysa_850x450', 850,450,true);
        add_image_size('crysa_900x500', 900,500,true);
        add_image_size('crysa_800x600', 800,600,true);

        add_theme_support( 'post-formats', array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'video',
            'audio',
        ) );

        /**
         * Set the content width in pixels, based on the theme's design and stylesheet.
         *
         * Priority 0 to make it available to lower priority callbacks.
         *
         * @global int $content_width
         */
        function crysa_content_width() {
            // This variable is intended to be overruled from themes.
            // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
            // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
            $GLOBALS['content_width'] = apply_filters( 'crysa_content_width', 640 );
        }
        add_action( 'after_setup_theme', 'crysa_content_width', 0 );
    }
	
    add_action( 'after_setup_theme', 'crysa_basic_function' );
	add_filter('wpcf7_autop_or_not', '__return_false');
    endif;

    function crysa_google_fonts() {
        $font_url = '';

        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'crysa' ) ) {
            $font_url =  'https://fonts.googleapis.com/css2?family=Yantramanav:wght@100;300;400;500;700;900&display=swap';
        }
        return $font_url;
    }

    function crysa_add_script() {

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), "1.0" );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), "1.0" );
        wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), "1.0" );
        wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/assets/css/elegant-icons.css', array(), "1.0" );
        wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon-set.css', array(), "1.0" );
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), "1.0" );
        wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css' );
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), "1.0" );
        wp_enqueue_style( 'shop', get_template_directory_uri() . '/assets/css/shop.css', array(), "1.0" );
        wp_enqueue_style( 'validnavs', get_template_directory_uri() . '/assets/css/validnavs.css', array(), "1.0" );
        wp_enqueue_style( 'helper', get_template_directory_uri() . '/assets/css/helper.css', array(), "1.0" );
        wp_enqueue_style( 'crysa-core', get_template_directory_uri() . '/assets/css/style.css', array(), "1.0" );
        wp_enqueue_style( 'crysa-unit', get_template_directory_uri() . '/assets/css/crysa-unit.css', array(), "1.0" );
        wp_enqueue_style( 'crysa-fonts', crysa_google_fonts() );
        wp_enqueue_style( 'crysa-style', get_stylesheet_uri() );
        
        // Js File

        wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'progress-bar', get_template_directory_uri() . '/assets/js/progress-bar.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'circle', get_template_directory_uri() . '/assets/js/circle-progress.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'imagesloaded' );
        wp_enqueue_script( 'count-to', get_template_directory_uri() . '/assets/js/count-to.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'scrolla', get_template_directory_uri() . '/assets/js/jquery.scrolla.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'YTPlayer', get_template_directory_uri() . '/assets/js/YTPlayer.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'TweenMax', get_template_directory_uri() . '/assets/js/TweenMax.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'validnavs', get_template_directory_uri() . '/assets/js/validnavs.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'crysa-main-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), false, true );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
          }
        }

    add_action('wp_enqueue_scripts', 'crysa_add_script', 88 );


    require_once get_template_directory() . '/inc/crysa-helper.php';
    require_once get_template_directory() . '/inc/crysa-plugin-activation.php';
    require_once get_template_directory() . '/inc/crysa-breadcumb.php';
    require_once get_template_directory() . '/inc/crysa-demo-config.php';
    require_once get_template_directory() . '/inc/crysa-navwalker.php';
    require_once get_template_directory() . '/inc/crysa-commoncss.php';
    require_once get_template_directory() . '/inc/hooks.php';
    require_once get_template_directory() . '/inc/hooks-functions.php';
    require_once get_template_directory() . '/inc/woocommerce-hooks/woocommerce-hooks.php';
    require_once get_template_directory() . '/inc/woocommerce-hooks/woocommerce-hooks-functions.php';
    