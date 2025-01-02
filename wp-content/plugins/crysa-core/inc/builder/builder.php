<?php
    /**
     * Class For Builder
     */
    class CrysaBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'crysa_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'crysa-core',CRYSA_PLUGDIRURI.'assets/js/crysa-core.js',array( 'jquery' ),'1.0',true );
		}


        public function crysa_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'crysa_header_option',
                [
                    'label'     => __( 'Header Option', 'crysa' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'crysa_header_style',
                [
                    'label'     => __( 'Header Option', 'crysa' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'crysa' ),
    					'header_builder'       => __( 'Header Builder', 'crysa' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'crysa_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'crysa' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->crysa_header_choose_option(),
                    'condition' => [ 'crysa_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'crysa_footer_option',
                [
                    'label'     => __( 'Footer Option', 'crysa' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'crysa_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'crysa' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'crysa' ),
    				'label_off'     => __( 'No', 'crysa' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'crysa_footer_style',
                [
                    'label'     => __( 'Footer Style', 'crysa' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'crysa' ),
    					'footer_builder'       => __( 'Footer Builder', 'crysa' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'crysa_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'crysa_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'crysa' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->crysa_footer_choose_option(),
                    'condition' => [ 'crysa_footer_style' => 'footer_builder','crysa_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Crysa Builder', 'crysa' ),
            	esc_html__( 'Crysa Builder', 'crysa' ),
				'manage_options',
				'crysa',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('crysa', esc_html__('Footer Builder', 'crysa'), esc_html__('Footer Builder', 'crysa'), 'manage_options', 'edit.php?post_type=crysa_footer');
			add_submenu_page('crysa', esc_html__('Header Builder', 'crysa'), esc_html__('Header Builder', 'crysa'), 'manage_options', 'edit.php?post_type=crysa_header');
            add_submenu_page('crysa', esc_html__('Tab Builder', 'crysa'), esc_html__('Tab Builder', 'crysa'), 'manage_options', 'edit.php?post_type=crysa_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','crysa' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'crysa' ),
				'singular_name'      => __( 'Footer', 'crysa' ),
				'menu_name'          => __( 'crysa Footer Builder', 'crysa' ),
				'name_admin_bar'     => __( 'Footer', 'crysa' ),
				'add_new'            => __( 'Add New', 'crysa' ),
				'add_new_item'       => __( 'Add New Footer', 'crysa' ),
				'new_item'           => __( 'New Footer', 'crysa' ),
				'edit_item'          => __( 'Edit Footer', 'crysa' ),
				'view_item'          => __( 'View Footer', 'crysa' ),
				'all_items'          => __( 'All Footer', 'crysa' ),
				'search_items'       => __( 'Search Footer', 'crysa' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'crysa' ),
				'not_found'          => __( 'No Footer found.', 'crysa' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'crysa' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'crysa_footer', $args );

			$labels = array(
				'name'               => __( 'Header', 'crysa' ),
				'singular_name'      => __( 'Header', 'crysa' ),
				'menu_name'          => __( 'crysa Header Builder', 'crysa' ),
				'name_admin_bar'     => __( 'Header', 'crysa' ),
				'add_new'            => __( 'Add New', 'crysa' ),
				'add_new_item'       => __( 'Add New Header', 'crysa' ),
				'new_item'           => __( 'New Header', 'crysa' ),
				'edit_item'          => __( 'Edit Header', 'crysa' ),
				'view_item'          => __( 'View Header', 'crysa' ),
				'all_items'          => __( 'All Header', 'crysa' ),
				'search_items'       => __( 'Search Header', 'crysa' ),
				'parent_item_colon'  => __( 'Parent Header:', 'crysa' ),
				'not_found'          => __( 'No Header found.', 'crysa' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'crysa' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'crysa_header', $args );

            $labels = array(
				'name'               => __( 'Tab Builder', 'crysa' ),
				'singular_name'      => __( 'Tab Builder', 'crysa' ),
				'menu_name'          => __( 'crysa Tab Builder', 'crysa' ),
				'name_admin_bar'     => __( 'Tab Builder', 'crysa' ),
				'add_new'            => __( 'Add New', 'crysa' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'crysa' ),
				'new_item'           => __( 'New Tab Builder', 'crysa' ),
				'edit_item'          => __( 'Edit Tab Builder', 'crysa' ),
				'view_item'          => __( 'View Tab Builder', 'crysa' ),
				'all_items'          => __( 'All Tab Builder', 'crysa' ),
				'search_items'       => __( 'Search Tab Builder', 'crysa' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'crysa' ),
				'not_found'          => __( 'No Tab Builder found.', 'crysa' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'crysa' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'crysa_tab_builder', $args );

		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'crysa_footer' == $post->post_type || 'crysa_header' == $post->post_type || 'crysa_tab_builder' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function crysa_footer_choose_option(){

			$crysa_post_query = new WP_Query( array(
				'post_type'			=> 'crysa_footer',
				'posts_per_page'	    => -1,
			) );

			$crysa_builder_post_title = array();
			$crysa_builder_post_title[''] = __('Select a Footer','crysa');

			while( $crysa_post_query->have_posts() ) {
				$crysa_post_query->the_post();
				$crysa_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $crysa_builder_post_title;

		}

		public function crysa_header_choose_option(){

			$crysa_post_query = new WP_Query( array(
				'post_type'			=> 'crysa_header',
				'posts_per_page'	    => -1,
			) );

			$crysa_builder_post_title = array();
			$crysa_builder_post_title[''] = __('Select a Header','crysa');

			while( $crysa_post_query->have_posts() ) {
				$crysa_post_query->the_post();
				$crysa_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $crysa_builder_post_title;

        }

    }

    $builder_execute = new CrysaBuilder();