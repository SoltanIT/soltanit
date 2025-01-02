<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'crysa_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function crysa_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
            'name'                  => esc_html__( 'Crysa Core', 'crysa' ), // The plugin name
            'slug'                  => 'crysa-core', // The plugin slug (typically the folder name)
            'version'               => '',
            'source'                => get_template_directory_uri(). '/plugin/crysa-core.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__( 'Woocommerce Wishlist', 'rakar' ),
            'slug'                  => 'ti-woocommerce-wishlist',
            'version'               => '1.0',
            'source'                => 'https://validthemes.net/themeforest/wp/crysa/demo/ti-woocommerce-wishlist.zip',
            'required'              => true,
        ),
		array(
            'name'                  => esc_html__( 'Elementor Page Builder', 'crysa' ), // The plugin name
            'slug'                  => 'elementor', // The plugin slug (typically the folder name)
            'version'               => '',
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                  => esc_html__( 'Contact Form 7', 'crysa' ), // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'version'               => '',
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
			'name'               	=> esc_html__('Redux Framework', 'crysa'),  // The plugin name.
			'slug'               	=> 'redux-framework', // The plugin slug (typically the folder name).
			'required'           	=> true, // If false, the plugin is only 'recommended' instead of required.
			'version'            	=> '',
		),
		array(
			'name'           		=> esc_html__('CMB2', 'crysa'),  // The plugin name.
			'slug'           		=> 'cmb2', // The plugin slug (typically the folder name).
			'version'   	 		=> '',
			'required'       		=> true,
			'source'                => 'https://github.com/CMB2/CMB2/archive/develop.zip',
		),
		array(
			'name'      => 'Mailchimp',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
        array(
            'name'      			=> esc_html__( 'One Click Demo Import', 'crysa'),
            'slug'      			=> 'one-click-demo-import',
            'version'   			=> '',
            'required'  			=> false
        ),
        array(
            'name'      => esc_html__('Woocommerce', 'agrul'),
            'slug'      => 'woocommerce',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('Woo Smart Quick View', 'agrul'),
            'slug'      => 'woo-smart-quick-view',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('TI Wishlist', 'agrul'),
            'slug'      => 'ti-woocommerce-wishlist',
            'version'   => '',
            'required'  => true,
        )
        
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
		$config = array(
		'id'           => 'crysa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'crysa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}