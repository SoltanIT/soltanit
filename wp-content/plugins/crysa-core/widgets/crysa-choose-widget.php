<?php
	/**
	* Elementor Choose Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Choose_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name. 
	*
	* Retrieve Choose widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_choose';
	}

	/**
	* Get widget title.
	*
	* Retrieve Choose widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Choose', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Choose widget icon.
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
	* Retrieve the list of categories the Choose widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'crysa-elements' ];
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
		$this->add_control(
			'section_btn_text',
			[
				'label' 		=> esc_html__( 'Section Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		$this->add_control(
			'section_btn_url',
			[
				'label' 		=> esc_html__( 'Section Button URL', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'crysa-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'choose_content',
			[
				'label'		=> esc_html__( 'Choose Content','crysa-core' ),
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
				],
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
			'choose_image',
			[
				'label'			=> esc_html__( 'Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'choose_url',
			[
				'label' 		=> esc_html__( 'Choose URL', 'crysa-core' ),
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
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2'  	=> esc_html__( 'Custom Icon', 'crysa-core' ),
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
                'default'    => 'flaticon-cloud-server',
                'condition' => [
                    'icon_style' => '1'
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
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image Icon','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$this->add_control(
			'choose_list',
			[
				'label' 	=> esc_html__( 'Choose', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Choose', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
                    'style' => '2'
                ]
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
			'subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'btn_text', [
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'btn_url',
			[
				'label' 		=> esc_html__( 'Button URL', 'crysa-core' ),
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
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'2'  	=> esc_html__( 'Custom Icon', 'crysa-core' ),
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
                'default'    => 'flaticon-cloud-server',
                'condition' => [
                    'icon_style' => '1'
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
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image Icon','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$this->add_control(
			'choose_list_two',
			[
				'label' 	=> esc_html__( 'Choose', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Choose', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' => [
                    'style' => '1'
                ]
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_heading_style_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_option',
			[
				'label' 		=> esc_html__( 'Section Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .heading,{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading,{{WRAPPER}} .site-heading .title',
				'condition' 	=> ['style' => ['1','2']],
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .sub-heading,{{WRAPPER}} .site-heading .sub-title',
				'condition' 	=> ['style' => ['1','2']],
			]
		);

		$this->add_control(
			'section_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'section_description_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-us-area .choose-us-style-one .mb--5' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .choose-us-area .choose-us-style-one .mb--5',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'section_button_option',
			[
				'label' 		=> esc_html__( 'Button Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'section_button_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-us-area .btn.btn-theme' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_button_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .choose-us-area .btn.btn-theme',
				'condition' 	=> ['style' => ['1']],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_choose_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'choose_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'choose_title_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-us-card .item h4,{{WRAPPER}} .choose-us-style-two .thumb .title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'choose_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .choose-us-card .item h4,{{WRAPPER}} .choose-us-style-two .thumb .title a',
			]
		);

		$this->add_control(
			'choose_hover_title_color',
			[
				'label' 		=> esc_html__( 'Title Hover Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-us-style-two .thumb .overlay a' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'choose_title_hover_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .choose-us-style-two .thumb .overlay a',
				'condition' 	=> ['style' => ['2']],
			]
		);
		
		
		$this->add_control(
			'choose_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'choose_subtitle_color',
			[
				'label' 		=> esc_html__( 'Sub Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-us-card .item span,{{WRAPPER}} .choose-us-style-two .thumb .overlay p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'choose_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .choose-us-card .item span,{{WRAPPER}} .choose-us-style-two .thumb .overlay p',
			]
		);
		
		$this->add_control(
			'choose_btn_option',
			[
				'label' 		=> esc_html__( 'Button Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1']],
			]
		);
		$this->add_control(
			'choose_btn_color',
			[
				'label' 		=> esc_html__( 'Button Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-us-card .item a' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'choose_btn_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .choose-us-card .item a',
				'condition' 	=> ['style' => ['1']],
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		
	$crysa_choose_output = $this->get_settings_for_display();
	$choose_list = $crysa_choose_output['choose_list'];
	$choose_list_two = $crysa_choose_output['choose_list_two'];
	if($crysa_choose_output['style'] == '1'):
	?>
	<!-- Start Why Choose Us Style One
    ============================================= -->
    <div class="choose-us-area">
        <div class="container">
            <div class="row">
                <div class="choose-us-style-one col-xl-5 col-lg-5">
                    <h4 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($crysa_choose_output['section_subtitle']));?></h4>
                    <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_choose_output['section_title']));?></h2>
                    <p class="mb--5"><?php echo htmlspecialchars_decode(esc_html($crysa_choose_output['section_content']));?></p>
                    <?php if(!empty($crysa_choose_output['section_btn_text'])):?>
                    <a class="btn mt-30 btn-md btn-theme" href="<?php echo esc_url($crysa_choose_output['section_btn_url']['url']);?>"><?php echo esc_html($crysa_choose_output['section_btn_text']);?></a>
                	<?php endif;?>
                </div>
                <div class="choose-us-style-one text-center col-xl-6 offset-xl-1 col-lg-7">
                    <div class="right-item">
                        <div class="row">
                        	<?php foreach($choose_list_two as $single_choose_two):?>
                            <!-- Signle Item -->
                            <div class="choose-us-card col-md-6">
                                <div class="item">
                                    <?php if(!empty($single_choose_two['flat_icon'])):?>
	                                        <i class="<?php echo esc_attr($single_choose_two['flat_icon']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($single_choose_two['icon_image'])):?>
			                                <img src="<?php echo esc_url($single_choose_two['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
			                            <?php endif;?>
			                            <?php 
		                                if(!empty($single_choose_two['custom_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_choose_two['custom_icon']); ?>"></i>
		                                <?php endif;?>
                                    <span><?php echo esc_html($single_choose_two['subtitle']);?></span>
                                    <h4><?php echo htmlspecialchars_decode( esc_html($single_choose_two['title']));?></h4>
                                    <a href="<?php echo esc_url($single_choose_two['btn_url']['url']);?>"><?php echo esc_html($single_choose_two['btn_text']);?></a>
                                </div>
                            </div>
                            <!-- End Signle Item -->
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us Style One -->
	<?php elseif($crysa_choose_output['style'] == '2'):?>
    <!-- Start Choose Us Style Two
    ============================================= -->
    <div class="choose-us-area">
        <?php if($crysa_choose_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_choose_output['section_subtitle'])):?>
	                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_choose_output['section_subtitle']));?></h4>
	                         <?php endif;?>
	                        <?php if(!empty($crysa_choose_output['section_title'])):?>
	                        <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_choose_output['section_title']));?></h2>
	                         <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="choose-us-style-two-box">
                <div class="row">
                	<?php 
                		foreach ($choose_list as $single_choose):
                	?>
                    <!-- Single Item -->
                    <div class="col-xl-4 col-md-6 choose-us-card-two">
                        <div class="choose-us-style-two">
                            <div class="thumb">
                                <img src="<?php echo esc_url($single_choose['choose_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <div class="title">
                                    <div class="top">
                                        <?php if(!empty($single_choose['flat_icon'])):?>
	                                        <i class="<?php echo esc_attr($single_choose['flat_icon']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($single_choose['icon_image'])):?>
			                                <img src="<?php echo esc_url($single_choose['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
			                            <?php endif;?>
			                            <?php 
		                                if(!empty($single_choose['custom_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_choose['custom_icon']); ?>"></i>
		                                <?php endif;?>
                                        <h4><a href="<?php echo esc_url($single_choose['choose_url']['url']);?>"><?php echo esc_html($single_choose['title']);?></a></h4>
                                    </div>
                                    <a href="<?php echo esc_url($single_choose['choose_url']['url']);?>"><i class="fas fa-arrow-right"></i></a>
                                </div>
                                <div class="overlay text-center">
                                    <div class="content">
                                        <?php if(!empty($single_choose['flat_icon'])):?>
	                                        <i class="<?php echo esc_attr($single_choose['flat_icon']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($single_choose['icon_image'])):?>
			                                <img src="<?php echo esc_url($single_choose['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
			                            <?php endif;?>
			                            <?php 
		                                if(!empty($single_choose['custom_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_choose['custom_icon']); ?>"></i>
		                                <?php endif;?>
                                        <h4><a href="<?php echo esc_url($single_choose['choose_url']['url']);?>"><?php echo esc_html($single_choose['title']);?></a></h4>
                                        <p>
                                            <?php echo esc_html($single_choose['content']);?>
                                        </p>
                                    </div>
                                </div>
                            </div>
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
    <!-- End Choose Us Style Two -->
	<?php endif;
	}
}