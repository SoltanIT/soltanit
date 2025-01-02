<?php
	/**
	* Elementor Service Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Service_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Service widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_service';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Services', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service widget icon.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	* Get widget categories.
	*
	* Retrieve the list of categories the Service widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'crysa-elements'];
	}

	public function get_script_depends() {
        return array('main');
    }

	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'section_heading',
			[
				'label'		=> esc_html__( 'Section Heading','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_show',
			[
				'label' => __( 'Show/Hide Section Heading', 'crysa-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'crysa-core' ),
				'label_off' => __( 'Hide', 'crysa-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__( 'Section Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'crysa-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'crysa-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_content',
			[
				'label' 		=> esc_html__( 'Section Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'crysa-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->end_controls_section();
		

		$this->start_controls_section(
			'services_content',
			[
				'label'		=> esc_html__( 'Set Service Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Service Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'crysa-core' ),
					'2' 	=> esc_html__( 'Style Two', 'crysa-core' ),
					'3' 	=> esc_html__( 'Style Three', 'crysa-core' ),
					'4' 	=> esc_html__( 'Style Four', 'crysa-core' ),
					'5' 	=> esc_html__( 'Style Five', 'crysa-core' ),
					'6' 	=> esc_html__( 'Style Six', 'crysa-core' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2' 	=> esc_html__( 'Custom Icon', 'crysa-core' ),
				],
			]
		);

		$repeater->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);


		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list',
			[
				'label' 	=> esc_html__( 'Service', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'crysa-core' ),
					],
				],
				'condition' 	=> ['style' => ['1','3']],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2' 	=> esc_html__( 'Custom Icon', 'crysa-core' ),
				],
			]
		);

		$repeater->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_two',
			[
				'label' 	=> esc_html__( 'Service', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'crysa-core' ),
					],
				],
				'condition' 	=> ['style' => '2'],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'service_image_v4',
			[
				'label' 	=> esc_html__( 'Image', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2' 	=> esc_html__( 'Custom Icon', 'crysa-core' ),
				],
			]
		);

		$repeater->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);


		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_four',
			[
				'label' 	=> esc_html__( 'Service', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'crysa-core' ),
					],
				],
				'condition' 	=> ['style' => ['4']],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2' 	=> esc_html__( 'Custom Icon', 'crysa-core' ),
				],
			]
		);

		$repeater->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);


		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);
		$repeater->add_control(
			'service_buttom', [
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_five',
			[
				'label' 	=> esc_html__( 'Service', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'crysa-core' ),
					],
				],
				'condition' 	=> ['style' => ['5']],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2' 	=> esc_html__( 'Custom Icon', 'crysa-core' ),
				],
			]
		);

		$repeater->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);


		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_six',
			[
				'label' 	=> esc_html__( 'Service', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'crysa-core' ),
					],
				],
				'condition' 	=> ['style' => ['6']],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$this->add_control(
			'service_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['1','5']],
			]
		);
		$this->add_control(
			'service_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'service_shape_three',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['1','5']],
			]
		);
		$this->add_control(
			'service_shape_four',
			[
				'label' 	=> esc_html__( 'Background Shape', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '4'],
			]
		);
		$this->add_control(
			'appoinment_title', [
				'label' 		=> esc_html__( 'Appoinment Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'appoinment_subtitle', [
				'label' 		=> esc_html__( 'Appoinment Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'appoinment_form', [
				'label' 		=> esc_html__( 'Appoinment Shortcode', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'crysa_section_title_style',
			[
				'label'			=> esc_html__( 'Heading Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','6','4','5']],
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h2,{{WRAPPER}} .heading-left .heading,{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','6','4','5']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h2,{{WRAPPER}} .heading-left .heading,{{WRAPPER}} .site-heading .title',
				'condition' 	=> ['style' => ['1','2','6','4','5']],
			]
		);

		$this->add_control(
			'heading_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','6','4','5']],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h4,{{WRAPPER}} .sub-heading.light,{{WRAPPER}} .site-heading .sub-title',
				'condition' 	=> ['style' => ['1','2','6','4','5']],
			]
		);

		$this->add_control(
			'heading_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'heading_description_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .heading-left p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading-left p',
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'appoinment_heading_option',
			[
				'label' 		=> esc_html__( 'Appointment Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'appoinment_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appoinment-style-two h4' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['3']],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'appoinment_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .appoinment-style-two h4',
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'appoinment_subtitle_option',
			[
				'label' 		=> esc_html__( 'Appointment Sub Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'appoinment_subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appoinment-style-two p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['3']],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'appoinment_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .appoinment-style-two p',
				'condition' 	=> ['style' => ['3']],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_service_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'service_title_option',
			[
				'label' 		=> esc_html__( 'Service Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','6']],
			]
		);
		$this->add_control(
			'service_title_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .services-style-one .item .bottom h4 a, {{WRAPPER}} .services-style-seven h4 a,{{WRAPPER}} .services-style-two h5,{{WRAPPER}} .services-style-three .item h4 a,{{WRAPPER}}  .services-style-four .item a,{{WRAPPER}} .services-style-five-item h4 a' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','6','3','4','5']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .services-style-seven h4 a,{{WRAPPER}} .services-style-two h5,{{WRAPPER}} .services-style-three .item h4 a,{{WRAPPER}}  .services-style-four .item a,{{WRAPPER}} .services-style-five-item h4 a',
				'condition' 	=> ['style' => ['1','2','6','3','4','5']],
			]
		);
		
		$this->add_control(
			'service_description_option',
			[
				'label' 		=> esc_html__( 'Service Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','6','3','4','5']],
			]
		);
		$this->add_control(
			'service_description_color',
			[
				'label' 		=> esc_html__( 'Description Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .services-style-one p,{{WRAPPER}} .services-style-seven p,{{WRAPPER}} .services-style-three p,{{WRAPPER}} .services-style-four .item p,{{WRAPPER}} .services-style-five-item p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','6','3','4','5']],	
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'service_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .services-style-one p,{{WRAPPER}} .services-style-seven p,{{WRAPPER}} .services-style-three p,,{{WRAPPER}} .services-style-four .item p,{{WRAPPER}} .services-style-five-item p',
				'condition' 	=> ['style' => ['1','6','3','4','5']],			]
		);
		
		$this->add_control(
			'service_icon_color',
			[
				'label' 		=> esc_html__( 'Service Icon Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .services-style-one .item > i,{{WRAPPER}} .services-style-three .item > i,{{WRAPPER}} .services-style-four .item > i' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','3','4']],
			]
		);


		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_services_output = $this->get_settings_for_display();
	$services_one = $crysa_services_output['service_list'];
	$services_two = $crysa_services_output['service_list_two'];
	$services_four = $crysa_services_output['service_list_four'];
	$services_five = $crysa_services_output['service_list_five'];
	$services_six = $crysa_services_output['service_list_six'];

	if($crysa_services_output['style'] == '1'):
	?>
	<!-- Start Services Style One
    ============================================= -->
    <div class="services-area">
    	<?php if($crysa_services_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_services_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_subtitle']));?></h4>
	                        <?php endif;?>
	                        <?php if(!empty($crysa_services_output['section_title'])):?>
	                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_title']));?></h2>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="services-style-one-box">
                <div class="row">
                	<?php
                		$counter = 1;
	            		foreach($services_one as $single_service_one):
	            	?>
	                    <!-- Single Item -->
	                    <div class="services-style-one col-xl-3 col-md-6">
	                        <div class="item style-one-item <?php if($counter == 2){ echo "active";}?>">
	                            <?php if(!empty($single_service_one['flat_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_one['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_service_one['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_service_one['icon_image']['url']); ?>">
	                            <?php endif;?>
	                            <?php 
	                            if(!empty($single_service_one['custom_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_one['custom_icon']); ?>"></i>
	                            <?php endif;?>
	                            <p><?php echo htmlspecialchars_decode(esc_html($single_service_one['service_content'],'crysa-core')); ?></p>
	                            <div class="bottom">
	                                <h4><a href="<?php echo esc_url( $single_service_one['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_one['service_title'],'crysa-core')); ?></a></h4>
	                                <a href="<?php echo esc_url( $single_service_one['service_url']['url']);?>"><i class="fas fa-arrow-right"></i></a>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
                    <?php 
                    	$counter++;
						endforeach;
					?>
                </div>
            </div>
        </div>
        <?php if(!empty($crysa_services_output['service_shape_one']['url'])):?>
        <!-- Shape -->
        <div class="shape" style="background-image: url(<?php echo esc_url($crysa_services_output['service_shape_one']['url']);?>);"></div>
        <!-- End Shape -->
    	<?php endif;?>
    </div>
    <!-- End Services Style One-->

    <?php elseif($crysa_services_output['style'] == '2'):?>

    <!-- Start Services Style Two
    ============================================= -->
   	<div class="services-style-two-area text-light">
   		<?php if(!empty($crysa_services_output['service_shape_two']['url'])):?>
	        <!-- Shape -->
	        <div class="shape" style="background-image: url(<?php echo esc_url($crysa_services_output['service_shape_two']['url']);?>);"></div>
	        <!-- End Shape -->
        <?php endif;?>
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                    	<?php if(!empty($crysa_services_output['section_subtitle'])):?>
                        <h5 class="sub-heading light"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_subtitle']));?></h5>
                        <?php endif;?>
                        <?php if(!empty($crysa_services_output['section_title'])):?>
                        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_title']));?></h2>
                        <?php endif;?>
                    </div>
                    <?php if(!empty($crysa_services_output['section_content'])):?>
                    <div class="col-lg-6 offset-lg-1">
                        <p>
                            <?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_content']));?>
                        </p>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="services-carousel text-center swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        	<?php
			            		foreach($services_two as $single_service_two):
			            	?>
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="services-style-two">
                                    <a href="<?php echo esc_url( $single_service_two['service_url']['url']);?>">
                                        <?php if(!empty($single_service_two['flat_icon'])):?>
			                                <i class="<?php echo esc_attr($single_service_two['flat_icon']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($single_service_two['icon_image'])):?>
			                                <img src="<?php echo esc_url($single_service_two['icon_image']['url']); ?>">
			                            <?php endif;?>
			                            <?php 
			                            if(!empty($single_service_two['custom_icon'])):?>
			                                <i class="<?php echo esc_attr($single_service_two['custom_icon']); ?>"></i>
			                            <?php endif;?>
                                        <h5><?php echo htmlspecialchars_decode(esc_html($single_service_two['service_title'],'crysa-core')); ?></h5>
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php 
								endforeach;
							?>
                    	</div>
                	</div>
            	</div>
        	</div>
        </div>
        <?php if(!empty($crysa_services_output['service_shape_three']['url'])):?>
	        <!-- Shape -->
	        <div class="shape-right-bottom" style="background-image: url(<?php echo esc_url($crysa_services_output['service_shape_three']['url']);?>);"></div>
	        <!-- End Shape -->
        <?php endif;?>
    </div>
    <!-- End Services Area Style Two -->
    <?php elseif($crysa_services_output['style'] == '3'):?>
    <!-- Start Services Area Style Three  -->
    <div class="services-area">
        <div class="container">
            <div class="services-style-three-box">
                <div class="row">
                    <div class="col-lg-4">
                    	<?php if(!empty($crysa_services_output['appoinment_form'])):?>
                        <div class="appoinment-style-two text-light text-center">
                            <div class="heading">
                                <h4><?php echo esc_html($crysa_services_output['appoinment_title']);?></h4>
                                <p><?php echo esc_html($crysa_services_output['appoinment_subtitle']);?></p>
                            </div>
                            <?php echo do_shortcode($crysa_services_output['appoinment_form']);?>
                        </div>
                    	<?php endif;?>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                        	<?php
			            		foreach($services_one as $single_service_one):
			            	?>
                            <!-- Sngle Item -->
                            <div class="services-style-three col-xl-4 col-md-6">
                                <div class="item">
                                <?php if(!empty($single_service_one['flat_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_one['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_service_one['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_service_one['icon_image']['url']); ?>">
	                            <?php endif;?>
	                            <?php 
	                            if(!empty($single_service_one['custom_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_one['custom_icon']); ?>"></i>
	                            <?php endif;?>
                                    <h4><a href="<?php echo esc_url( $single_service_one['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_one['service_title'],'crysa-core')); ?></a></h4>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($single_service_one['service_content'],'crysa-core')); ?>
                                    </p>
                                    <a href="<?php echo esc_url( $single_service_one['service_url']['url']);?>"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- End Sngle Item -->
                          	<?php 
								endforeach;
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Area Style Three -->
    <?php elseif($crysa_services_output['style'] == '4'):?>
    <!-- Start Services Four
    ============================================= -->
    <div class="services-area">
        <?php if($crysa_services_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_services_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_subtitle']));?></h4>
	                        <?php endif;?>
	                        <?php if(!empty($crysa_services_output['section_title'])):?>
	                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_title']));?></h2>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="services-style-one-box">
                <div class="row">
                	<?php
                		$counter = 1;
	            		foreach($services_four as $single_service_four):
	            	?>
	                    <!-- Single Item -->
	                    <div class="services-style-four col-xl-3 col-md-6">
	                        <div class="item style-four-item">
	                            <div class="bg-shape" style="background-image: url(<?php echo esc_url( $crysa_services_output['service_shape_four']['url']);?>);"></div>
	                            <div class="thumb" style="background-image: url(<?php echo esc_url($single_service_four['service_image_v4']['url']);?>);"></div>
	                            <?php if(!empty($single_service_four['flat_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_four['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_service_four['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_service_four['icon_image']['url']); ?>">
	                            <?php endif;?>
	                            <?php 
	                            if(!empty($single_service_four['custom_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_four['custom_icon']); ?>"></i>
	                            <?php endif;?>
	                            <h4><a href="<?php echo esc_url( $single_service_four['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_four['service_title'],'crysa-core')); ?></a></h4>
	                            <p>
	                                <?php echo htmlspecialchars_decode(esc_html($single_service_four['service_content'],'crysa-core')); ?>
	                            </p>
	                            <div class="bottom">
	                                <span><?php echo esc_html("0"); ?><?php echo esc_html($counter); ?></span>
	                                <a href="<?php echo esc_url( $single_service_four['service_url']['url']);?>"><i class="fas fa-arrow-right"></i></a>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
                   	<?php 
                    	$counter++;
						endforeach;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Four -->
    <?php elseif($crysa_services_output['style'] == '5'):?>
    <!-- Start Services 
    ============================================= -->
    <div class="services-area services-style-five-area" style="background-image: url(<?php echo esc_url( $crysa_services_output['service_shape_one']['url']);?>);">
    	<?php if($crysa_services_output['section_show'] == 'yes'): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                       <?php if(!empty($crysa_services_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_subtitle']));?></h4>
                        <?php endif;?>
                        <?php if(!empty($crysa_services_output['section_title'])):?>
                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_title']));?></h2>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="services-style-five-box">
                <div class="row">
                	<?php
                		$counter = 0;
	            		foreach($services_five as $single_service_five):
	            	?>
                    <!-- Single Item -->
                    <div class="services-style-five col-xl-3 col-md-6">
                        <div class="services-style-five-item <?php if($counter == '1'){echo esc_attr("active");}?>">
                            <div class="shape">
                                <img src="<?php echo esc_url( $crysa_services_output['service_shape_three']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </div>
                            <div class="icon">
                                <?php if(!empty($single_service_five['flat_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_five['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_service_five['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_service_five['icon_image']['url']); ?>">
	                            <?php endif;?>
	                            <?php 
	                            if(!empty($single_service_five['custom_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_five['custom_icon']); ?>"></i>
	                            <?php endif;?>
                                <div class="circle-border"></div>
                            </div>
                            <h4><a href="<?php echo esc_url( $single_service_five['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_five['service_title'],'crysa-core')); ?></a></h4>
                            <p>
                               <?php echo htmlspecialchars_decode(esc_html($single_service_five['service_content'],'crysa-core')); ?>
                            </p>
                            <div class="bottom mt-25">
                                <a class="btn-border-secondary" href="<?php echo esc_url( $single_service_five['service_url']['url']);?>"><i class="fas fa-arrow-right"></i> <?php echo esc_html($single_service_five['service_buttom'],'crysa-core'); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <?php 
                    	$counter++;
						endforeach;

					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->

	<?php elseif($crysa_services_output['style'] == '6'):?>
    <!-- Start Services Six
    ============================================= -->
    <div class="services-style-seven-area bg-fixed">
        <?php if($crysa_services_output['section_show'] == 'yes'): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-light text-center">
                       <?php if(!empty($crysa_services_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_subtitle']));?></h4>
                        <?php endif;?>
                        <?php if(!empty($crysa_services_output['section_title'])):?>
                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_services_output['section_title']));?></h2>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="services-style-seven-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        	<?php
		                		$counter = 0;
			            		foreach($services_six as $single_service_six):
			            	?>
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="services-style-seven">
                                    <?php if(!empty($single_service_six['flat_icon'])):?>
	                                <i class="<?php echo esc_attr($single_service_six['flat_icon']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_service_six['icon_image'])):?>
		                                <img src="<?php echo esc_url($single_service_six['icon_image']['url']); ?>">
		                            <?php endif;?>
		                            <?php 
		                            if(!empty($single_service_six['custom_icon'])):?>
		                                <i class="<?php echo esc_attr($single_service_six['custom_icon']); ?>"></i>
		                            <?php endif;?>
                                    <h4><a href="<?php echo esc_url( $single_service_six['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_six['service_title'],'crysa-core')); ?></a></h4>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($single_service_six['service_content'],'crysa-core')); ?>
                                    </p> 
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php 
		                    	$counter++;
								endforeach;
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Six -->
	<?php 
	endif;
	}
}