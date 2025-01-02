<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "crysa_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Crysa Options', 'crysa' ),
        'page_title'           => __( 'Crysa Options', 'crysa' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'crysa' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'crysa' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'crysa' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'crysa' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'crysa' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'crysa' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'crysa' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'crysa' );
    Redux::set_help_sidebar( $opt_name, $content );

    // -> START Basic Fields
    Redux::setSection($opt_name, array(
        'title'     => __('General Option', 'crysa'),
        'id'        => 'general-options',
        'icon' => 'el-icon-cogs',
        'fields'    => array(
            array(
                'id'       => 'breadcumb_position',
                'type'     => 'switch',
                'title'    => __( 'Breadcumb Hide/Show', 'crysa' ),
                'default'  => 1,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'      => 'breadcumb_bg',
                'title'   => __('Upload Breadcumb Image','crysa'), 
                'type'    => 'media',
                'required' => array( 'breadcumb_position', '=', '1' ),
            ),
            array(
                'id'       => 'crysa_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Primary Color', 'crysa' ),
                'subtitle' => esc_html__( 'Set Primary Theme Color', 'crysa' )
            ),
            array(
                'id'       => 'crysa_theme_color_sec',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Secondary Color', 'crysa' ),
                'subtitle' => esc_html__( 'Set Secondary Theme Color', 'crysa' )
            ),           
            array(
                'id'       => 'crysa_theme_body_typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Typography', 'crysa' ),
                'subtitle' => esc_html__( 'Set Theme body font family', 'crysa'  ),
                 'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
        )
    ));  
     
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'crysa' ),
        'id'               => 'crysa_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'crysa_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'Prebuilt', 'crysa' ),
                    "2"         => esc_html__( 'Header Builder', 'crysa' ),
                ),
                'title'    => esc_html__( 'Header Options', 'crysa' ),
                'subtitle' => esc_html__( 'Select header options.', 'crysa' ),
            ),
            array(
                'id'       => 'crysa_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'crysa_header'
                ),
                'title'    => esc_html__( 'Header', 'crysa' ),
                'subtitle' => esc_html__( 'Select header.', 'crysa' ),
                'required' => array( 'crysa_header_options', 'equals', '2' )
            ),
            array(
                'id'       => 'crysa_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Get Started', 'crysa' ),
                'title'    => esc_html__( 'Button Text', 'crysa' ),
                'subtitle' => esc_html__( 'Set Button Text', 'crysa' ),
            ),
            array(
                'id'       => 'crysa_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'crysa' ),
                'title'    => esc_html__( 'Button URL?', 'crysa' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'crysa' ),
            ),
        ),
    ) );  
     
    Redux::setSection($opt_name, array(
        'title'     => __('Blog', 'crysa'),
        'icon' => 'el-icon-picture',
        'id'        => 'blog-options',
        'fields'    => array(

            array(
                'id'       => 'blog_sidebar',
                'type'     => 'select',
                'title'    => __( 'Select Option', 'crysa' ),
                'subtitle' => __( 'No validation can be done on this field type', 'crysa' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'crysa' ),
            
                'options'  => array(
                    '2' => 'Right Sidebar',
                    '3' => 'No Sidebar',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'content_length',
                'type'     => 'text',
                'title'    => 'Blog Content Length',   
            ),
            array(
                'id'       => 'blog_readmore',
                'type'     => 'text',
                'title'    => 'Blog Read More Text',   
            ),
            array(
                'id'       => 'header_style',
                'type'     => 'select',
                'title'    => __( 'Select Header Style', 'crysa' ),
                'options'  => array(
                    '1' => 'Style One',
                    '2' => 'Style Two',
                    '3' => 'Style Three',
                    '4' => 'Style Four',
                    '5' => 'Style Five',
                    '6' => 'Style Six',
                    '7' => 'Style Seven',
                ),
                'default'  => '3',
            )
        )
    ));
    
     Redux::setSection($opt_name, array(
        'title'     => __('404 Options', 'crysa'),
        'id'        => '404-options',
        'icon'      => 'el-icon-paper-clip',
        'fields'    => array(
            array(
                'id'       => '404_back',
                'type'     => 'text',
                'title'    => 'Background Text',
            ), 
            array(
                'id'       => '404_title',
                'type'     => 'text',
                'title'    => 'Title',   
            ), 
            array(
                'id'       => '404_description',
                'type'     => 'text',
                'title'    => 'Description',
            ), 
        )
    )); 

   Redux::setSection($opt_name, array(
        'title'     => __('Footer Options', 'crysa'),
        'icon'      =>   'el-icon-credit-card',
        'id'        => 'footer-options',
        'fields'     => array(
            array(
               'id'       => 'crysa_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','crysa'),
                   'prebuilt'              => esc_html__('Pre-built Footer','crysa'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'crysa' ),
            ),
            array(
               'id'       => 'crysa_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'crysa_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'crysa_footer'
               ),
               'on'       => esc_html__( 'Enabled', 'crysa' ),
               'off'      => esc_html__( 'Disable', 'crysa' ),
               'title'    => esc_html__( 'Select Footer', 'crysa' ),
               'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'crysa' )
            ),

            array(
               'id'       => 'crysa_copyright_text',
               'type'     => 'text',
               'title'    => esc_html__( 'Copyright Text', 'crysa' ),
               'subtitle' => esc_html__( 'Add Copyright Text', 'crysa' ),
               'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'crysa.','crysa' ),esc_url('#'),__( 'Validthemes', 'crysa' ) ),
               'required' => array( 'crysa_footer_builder_trigger','equals','prebuilt' ),
            ),

       ),
    ));
    
    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'crysa' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'crysa' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'crysa' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    } 
    ?>