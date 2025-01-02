<?php
	/**
	* Elementor Process Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Process_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Process widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_process';
	}

	/**
	* Get widget title.
	*
	* Retrieve Process widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Process', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Process widget icon.
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
	* Retrieve the list of categories the Process widget belongs to.
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
			'process_content',
			[
				'label'		=> esc_html__( 'Set Process Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'crysa-core' ),
					'2' 	=> esc_html__( 'Style Two', 'crysa-core' ),
					'3' 	=> esc_html__( 'Style Three', 'crysa-core' ),
					'4' 	=> esc_html__( 'Style Four', 'crysa-core' ),
				],
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','2','3']],
			]
		);
		
		$this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','2','3']],
			]
		);
		$this->add_control(
			'process_heading_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' 	=> ['style' => ['1','2']],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
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


		$this->add_control(
			'process_list',
			[
				'label' 	=> esc_html__( 'Process List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Process', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
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
			'process_url',
			[
				'label' 		=> esc_html__( 'URL', 'crysa-core' ),
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
			'process_list_two',
			[
				'label' 	=> esc_html__( 'Process List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Process', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'process_list_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' 	=> ['style' => ['1']],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'pc_info', [
				'label' 		=> esc_html__( 'Information', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'pc_icon_style',
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
			'pc_flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'pc_icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'pc_icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'pc_icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'pc_custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'pc_icon_style' => '2'
                ]
			]
		);


		$this->add_control(
			'process_info_list',
			[
				'label' 	=> esc_html__( 'Information', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Information', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ pc_info }}}',
				'condition' 	=> ['style' => '1'],
			]
		);

		
		$this->add_control(
			'process_contact_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_control(
			'pc_video_text', [
				'label' 		=> esc_html__( 'Video Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'pc_video_url',
			[
				'label' 		=> esc_html__( 'Video URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		

		$this->add_control(
			'process_list_three',
			[
				'label' 	=> esc_html__( 'Process List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Process', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '3'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'heading', [
				'label' 		=> esc_html__( 'Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'process_v4_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'process_v4_image_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$repeater->add_control(
			'feature_one_title', [
				'label' 		=> esc_html__( 'Feature One Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feature_one_subtitle', [
				'label' 		=> esc_html__( 'Feature One Sub-Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feature_one_icon_style',
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
			'feature_one_flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'feature_one_icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'feature_one_icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'feature_one_icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'feature_one_custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'feature_one_icon_style' => '2'
                ]
			]
		);
		$repeater->add_control(
			'process_feature_one_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater->add_control(
			'feature_two_title', [
				'label' 		=> esc_html__( 'Feature Two Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feature_two_subtitle', [
				'label' 		=> esc_html__( 'Feature Two Sub-Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feature_two_icon_style',
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
			'feature_two_flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-data-processing',
                'condition' => [
                    'feature_two_icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'feature_two_icon_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'feature_two_icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'feature_two_custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'feature_two_icon_style' => '2'
                ]
			]
		);
		

		$this->add_control(
			'process_list_four',
			[
				'label' 	=> esc_html__( 'Process List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Process', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ heading }}}',
				'condition' 	=> ['style' => '4'],
			]
		);
		$this->add_control(
			'process_v4_bac_shape',
			[
				'label'			=> esc_html__( 'Backgound Shape','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '4'],
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'process_heading_style_option',
			[
				'label'			=> esc_html__( 'Section Heading Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .heading,{{WRAPPER}} .site-heading .title,{{WRAPPER}} .process-style-three h2' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading,{{WRAPPER}} .site-heading .title,{{WRAPPER}} .process-style-three h2',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);
		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-style-three .item p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['4']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .sub-heading,{{WRAPPER}} .site-heading .sub-title,{{WRAPPER}} .process-style-three .item p',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'process_style_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-list h4,{{WRAPPER}} .process-style-two h4,{{WRAPPER}} .process-style-three ul li h4' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .process-list h4,{{WRAPPER}} .process-style-two h4,{{WRAPPER}} .process-style-three ul li h4',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		
		$this->add_control(
			'subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-list p,{{WRAPPER}} .process-style-two p,{{WRAPPER}} .process-style-three ul li p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .process-list p,{{WRAPPER}} .process-style-two p,{{WRAPPER}} .process-style-three ul li p',
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		$this->add_control(
			'call_option',
			[
				'label' 		=> esc_html__( 'Call Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'call_color',
			[
				'label' 		=> esc_html__( 'Call Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .call p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'call_typography',
				'label' 		=> esc_html__( 'Call Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .call p',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'mail_option',
			[
				'label' 		=> esc_html__( 'Mail Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'mail_color',
			[
				'label' 		=> esc_html__( 'Mail Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .call .info a' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'mail_typography',
				'label' 		=> esc_html__( 'Mail Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .call .info a',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->end_controls_section();

		
	}

	// Output For User
	protected function render(){
	$crysa_process_output = $this->get_settings_for_display();
	$process_lists = $crysa_process_output['process_list'];
	$process_list_two = $crysa_process_output['process_list_two'];
	$process_list_three = $crysa_process_output['process_list_three'];
	$process_list_four = $crysa_process_output['process_list_four'];
	$process_info_list = $crysa_process_output['process_info_list'];
	if($crysa_process_output['style'] == '1'):
	?>
	<!-- Start Processs Style 
    ============================================= -->
    <div class="processs-style-one">
        <h4 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($crysa_process_output['title']));?></h4>
        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_process_output['subtitle']));?></h2>
        <ul class="process-list">
        	<?php foreach($process_lists as $single_process):?>
                <li>
                    <?php if(!empty($single_process['flat_icon'])):?>
                        <i class="<?php echo esc_attr($single_process['flat_icon']); ?>"></i>
                    <?php endif;?>
                    <?php if(!empty($single_process['icon_image'])):?>
                        <img src="<?php echo esc_url($single_process['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <?php 
                    if(!empty($single_process['custom_icon'])):?>
                        <i class="<?php echo esc_attr($single_process['custom_icon']); ?>"></i>
                    <?php endif;?>
                    <h4><?php echo esc_html($single_process['title']);?></h4>
                    <p>
                        <?php echo htmlspecialchars_decode(esc_html($single_process['content']));?>
                    </p>
                </li>
           	<?php endforeach;?>
        </ul>
        <div class="single-kit mt-30">
        	<?php foreach($process_info_list as $single_process_info):?>
            <div class="call">
                <div class="icon">
                    <?php if(!empty($single_process_info['pc_flat_icon'])):?>
                        <i class="<?php echo esc_attr($single_process_info['pc_flat_icon']); ?>"></i>
                    <?php endif;?>
                    <?php if(!empty($single_process_info['pc_icon_image'])):?>
                        <img src="<?php echo esc_url($single_process_info['pc_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <?php 
                    if(!empty($single_process_info['pc_custom_icon'])):?>
                        <i class="<?php echo esc_attr($single_process_info['pc_custom_icon']); ?>"></i>
                    <?php endif;?>
                </div>
                <div class="info">
                    <?php echo htmlspecialchars_decode(esc_html($single_process_info['pc_info']));?>
                </div>
            </div>
            <?php endforeach;?>
            <?php if(!empty($crysa_process_output['pc_video_url']['url'])):?>
	            <a href="<?php echo esc_url($crysa_process_output['pc_video_url']['url']);?>" class="popup-youtube video-play-button with-text">
	                <div class="effect"></div>
	                <span><i class="fas fa-play"></i> <?php echo esc_html($crysa_process_output['pc_video_text']);?></span>
	            </a>
        	<?php endif;?>
        </div>
    </div>
    <!-- End Processs Style -->
    <?php elseif($crysa_process_output['style'] == '2'): ?>
    <div class="process-area text-center text-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_process_output['subtitle']));?></h4>
                        <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_process_output['title']));?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach($process_list_two as $single_process_two):?>
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 process-style-two">
                    <div class="item">
                         <?php if(!empty($single_process_two['flat_icon'])):?>
                        <i class="<?php echo esc_attr($single_process_two['flat_icon']); ?>"></i>
	                    <?php endif;?>
	                    <?php if(!empty($single_process_two['icon_image'])):?>
	                        <img src="<?php echo esc_url($single_process_two['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                    <?php endif;?>
	                    <?php 
	                    if(!empty($single_process_two['custom_icon'])):?>
	                        <i class="<?php echo esc_attr($single_process_two['custom_icon']); ?>"></i>
	                    <?php endif;?>
                        <h4><?php echo esc_html($single_process_two['title']);?></h4>
                        <p>
                          <?php echo htmlspecialchars_decode(esc_html($single_process_two['content']));?>
                        </p>
                        <a href="<?php echo esc_url($single_process_two['process_url']['url']);?>"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>               
                <!-- Single Item --> 
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php elseif($crysa_process_output['style'] == '3'): ?>
    <div class="processs-style-three">
        <h4 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($crysa_process_output['subtitle']));?></h4>
        <h2 class="heading mb-50"><?php echo htmlspecialchars_decode(esc_html($crysa_process_output['title']));?></h2>
        <ul class="process-list">
        	<?php
        		$counter = 1;
        		foreach($process_list_three as $single_process_three):?>
        		<!-- Single Item --> 
	            <li>
	                <div class="number">
	                    <span><?php echo esc_html__("0",'crysa');?><?php echo esc_html($counter);?></span>
	                </div>
	                <div class="content">
	                    <h4><?php echo esc_html($single_process_three['title']);?></h4>
	                    <p>
	                        <?php echo htmlspecialchars_decode(esc_html($single_process_three['content']));?>
	                    </p>
	                </div>
	            </li>
	            <!-- Single Item --> 
            <?php $counter++; endforeach;?>
        </ul>
    </div>
    <?php elseif($crysa_process_output['style'] == '4'): ?>
    <!-- Start Process
    ============================================= -->
    <div class="process-style-three-area bg-cover default-padding" style="background-image: url(<?php echo esc_url($crysa_process_output['process_v4_bac_shape']['url']); ?>);">
        <div class="container">
        	<?php
        		$counter = 1;
        		foreach($process_list_four as $single_process_four):
        	?>
            <!-- Process Item -->
            <div class="process-style-three">
                <div class="row align-center">
                    <div class="col-lg-6 item <?php if($counter == '1'){echo esc_attr__("order-lg-last pl-60 pl-md-15 pl-xs-15");}else{echo "pr-60 pr-md-15 pr-xs-15";}?> mb-xs-50 mb-md-50">
                        <img src="<?php echo esc_url($single_process_four['process_v4_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </div>
                    <div class="col-lg-6 item">
                        <h2><?php echo htmlspecialchars_decode(esc_html($single_process_four['heading']));?></h2>
                        <p>
                           <?php echo htmlspecialchars_decode(esc_html($single_process_four['content']));?>
                        </p>
                        <ul>
                            <li>
                                <div class="icon">
                                    <?php if(!empty($single_process_four['feature_one_flat_icon'])):?>
				                        <i class="<?php echo esc_attr($single_process_four['feature_one_flat_icon']); ?>"></i>
				                    <?php endif;?>
				                    <?php if(!empty($single_process_four['feature_one_icon_image'])):?>
				                        <img src="<?php echo esc_url($single_process_four['feature_one_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
				                    <?php endif;?>
				                    <?php 
				                    if(!empty($single_process_four['feature_one_custom_icon'])):?>
				                        <i class="<?php echo esc_attr($single_process_four['feature_one_custom_icon']); ?>"></i>
				                    <?php endif;?>
                                </div>
                                <div class="info">
                                    <h4><?php echo htmlspecialchars_decode(esc_html($single_process_four['feature_one_title']));?></h4>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($single_process_four['feature_one_subtitle']));?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <?php if(!empty($single_process_four['feature_two_flat_icon'])):?>
				                        <i class="<?php echo esc_attr($single_process_four['feature_two_flat_icon']); ?>"></i>
				                    <?php endif;?>
				                    <?php if(!empty($single_process_four['feature_two_icon_image'])):?>
				                        <img src="<?php echo esc_url($single_process_four['feature_two_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
				                    <?php endif;?>
				                    <?php 
				                    if(!empty($single_process_four['feature_two_custom_icon'])):?>
				                        <i class="<?php echo esc_attr($single_process_four['feature_two_custom_icon']); ?>"></i>
				                    <?php endif;?>
                                </div>
                                <div class="info">
                                    <h4><?php echo htmlspecialchars_decode(esc_html($single_process_four['feature_two_title']));?></h4>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($single_process_four['feature_two_subtitle']));?>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Process Item -->
            <?php $counter++; endforeach;?>
        </div>
    </div>
    <!-- End Process -->
    
	<?php 
	endif;
	}
}