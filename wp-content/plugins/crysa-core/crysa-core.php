<?php
/**
 * Plugin Name: Crysa Core
 * Plugin URI: https://themeforest.net/user/droitthemes/portfolio
 * Description: This plugin adds the core features to the crystal WordPress theme. You must have to install this plugin to get all the features included with the theme.
 * Version: 1.0
 * Author: ValidThemes
 * Author URI: https://themeforest.net/user/droitthemes/portfolio
 * Text domain: crysa-core
 */

if ( !defined('ABSPATH') )
    die('-1');

define( 'CRYSA_CORE_POST_DIR', plugin_dir_path( __FILE__ ) );
define( 'CRYSA_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'crysa_core' ) ) {
	/**
	 * Main crystal Core Class
	 *
	 * The main class that initiates and runs the crystal Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class crysa_core {
		/**
		 * crystal Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `crysa_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var crysa_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return crysa_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'crysa-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'crysa-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the crystal Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'crysa_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
			// Elementor custom field icons
			require_once __DIR__ . '/inc/builder/builder.php';
			require_once __DIR__ . '/inc/crysa-icons.php';
			require_once __DIR__ . '/inc/crysa-recent-post.php';
			require_once __DIR__ . '/inc/crysa-service-image.php';
			require_once __DIR__ . '/inc/crysa-service-brochure.php';
			require_once __DIR__ . '/inc/crysa-plugin-functions.php';

		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'crysa-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}


		/**
		 * Init crystal Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/register', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: crystal Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'crysa-core' ),
				'<strong>' . esc_html__( 'crystal core', 'crysa-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'crysa-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: crystal Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'crysa-core' ),
				'<strong>' . esc_html__( 'crystal Core', 'crysa-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'crysa-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		
		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for crystal Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'crysa-elements', [
				'title' => __( 'Crysa Elements', 'crysa-core' ),
			], 1 );
		}
		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'mainjs', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
		}
		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {
            wp_enqueue_style( 'crysa-flaticons', plugins_url( 'assets/vendors/flaticon/flaticon-set.css', __FILE__ ) );
		}

		/**
		 * Register New Widgets
		 *
		 * Include crystal Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load crystal Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
			require_once( __DIR__ . '/widgets/crysa-slider-widget.php');
			require_once( __DIR__ . '/widgets/crysa-about-image-widget.php');
			require_once( __DIR__ . '/widgets/crysa-about-content-widget.php');
			require_once( __DIR__ . '/widgets/crysa-service-widget.php');
			require_once( __DIR__ . '/widgets/crysa-achivement-widget.php');
			require_once( __DIR__ . '/widgets/crysa-achivement-two-widget.php');
			require_once( __DIR__ . '/widgets/crysa-choose-widget.php');
			require_once( __DIR__ . '/widgets/crysa-brand-widget.php');
			require_once( __DIR__ . '/widgets/crysa-portfolio-widget.php');
			require_once( __DIR__ . '/widgets/crysa-process-image-widget.php');
			require_once( __DIR__ . '/widgets/crysa-process-widget.php');
			require_once( __DIR__ . '/widgets/crysa-team-widget.php');
			require_once( __DIR__ . '/widgets/crysa-quick-contact-form.php');
			require_once( __DIR__ . '/widgets/crysa-quick-contact-content.php');
			require_once( __DIR__ . '/widgets/crysa-blog-widget.php');
			require_once( __DIR__ . '/widgets/crysa-benefits-widget.php');
			require_once( __DIR__ . '/widgets/crysa-pricing-widget.php');
			require_once( __DIR__ . '/widgets/crysa-testimonial-widget.php');
			require_once( __DIR__ . '/widgets/crysa-faq-widget.php');
			require_once( __DIR__ . '/widgets/crysa-meeting-widget.php');
			require_once( __DIR__ . '/widgets/crysa-contact-us-widget.php');
			require_once( __DIR__ . '/widgets/crysa-contact-us-form-widget.php');
			require_once( __DIR__ . '/widgets/crysa-team-single-widget.php');
			require_once( __DIR__ . '/widgets/crysa-project-details-widget.php');
			require_once( __DIR__ . '/widgets/crysa-service-details-feature-widget.php');
			require_once( __DIR__ . '/widgets/crysa-accordian-widget.php');
			require_once( __DIR__ . '/widgets/crysa-featured-widget.php');
			require_once( __DIR__ . '/widgets/crysa-counter-widget.php');
			require_once( __DIR__ . '/widgets/crysa-header-widget.php');
			require_once( __DIR__ . '/widgets/crysa-footer-about.php');
			require_once( __DIR__ . '/widgets/crysa-footer-copyright.php');
        }
			
		/**
		 * Register Widgets
		 *
		 * Register crystal Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Slider_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_About_Image_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_About_Content_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Service_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Achivement_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Achivement_Two_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Choose_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Brand_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Portfolio_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Process_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Process_IMG_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Team_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Quick_Contact_Form_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Quick_Contact_Content_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Blog_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Benefits_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Pricing_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Testimonial_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Faq_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Meeting_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Contact_Us_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Contact_Us_Form_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Team_Single_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Project_Details_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Service_Details_Feature_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Accordian_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Featured_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Counter_Widget() );
		    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Crysa_Header_Widget() );
		    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Fotter_About_Widget() );
		    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor_Fotter_Copyright_Widget() );
		}
	}
} 
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'crysa_core_load' ) ) {
	/**
	 * Load crystal Core
	 *
	 * Main instance of crysa_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function crysa_core_load() {
		return crysa_core::instance();
	}

	// Run crystal Core 
    crysa_core_load();
}

function crysa_mime_types( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['svgz'] = 'image/svgz+xml';
        $mimes['exe'] = 'program/exe';
        $mimes['dwg'] = 'image/vnd.dwg';
        return $mimes;
    }
add_filter('upload_mimes', 'crysa_mime_types');