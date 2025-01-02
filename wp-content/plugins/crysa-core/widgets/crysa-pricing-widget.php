<?php
	/**
	* Elementor Pricing Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Pricing_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Pricing widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_pricing';
	}

	/**
	* Get widget title.
	*
	* Retrieve Pricing widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Pricing', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Pricing widget icon.
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
	* Retrieve the list of categories the Pricing widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'cleanu-elements'];
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
		
		$this->end_controls_section();
		

		$this->start_controls_section(
			'pricing_content',
			[
				'label'		=> esc_html__( 'Set Pricing Content','crysa-core' ),
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

		$this->add_control(
			'monthly_heading', [
				'label' 		=> esc_html__( 'Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'duration', [
				'label' 		=> esc_html__( 'Duration', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'price', [
				'label' 		=> esc_html__( 'Price', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'currency', [
				'label' 		=> esc_html__( 'Currency', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
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
			'offer', [
				'label' 		=> esc_html__( 'Offering', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
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
			'highlight',
			[
				'label' => __( 'Highlight Pricing', 'crysa-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Active', 'crysa-core' ),
				'label_off' => __( 'Deactive', 'crysa-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'monthly_pricing_list',
			[
				'label' 	=> esc_html__( 'Monthly Pricing List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Monthly Pricing List', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->add_control(
			'pricing_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->add_control(
			'yearly_heading', [
				'label' 		=> esc_html__( 'Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'duration', [
				'label' 		=> esc_html__( 'Duration', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'price', [
				'label' 		=> esc_html__( 'Price', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'currency', [
				'label' 		=> esc_html__( 'Currency', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
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
			'offer', [
				'label' 		=> esc_html__( 'Offering', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
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
			'highlight',
			[
				'label' => __( 'Highlight Pricing', 'crysa-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Active', 'crysa-core' ),
				'label_off' => __( 'Deactive', 'crysa-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'yearly_pricing_list',
			[
				'label' 	=> esc_html__( 'Yearly Pricing List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Yearly Pricing List', 'crysa-core' ),
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
		$repeater->add_control(
			'duration', [
				'label' 		=> esc_html__( 'Duration', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'price', [
				'label' 		=> esc_html__( 'Price', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'currency', [
				'label' 		=> esc_html__( 'Currency', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'offer', [
				'label' 		=> esc_html__( 'Offering', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
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

		$this->add_control(
			'pricing_list_style_2',
			[
				'label' 	=> esc_html__( 'Pricing List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Pricing List', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '2'],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_heading_style',
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
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .heading-left .heading,{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading-left .heading,{{WRAPPER}} .heading',
			]
		);

		$this->add_control(
			'heading_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading-left .sub-title,{{WRAPPER}} .site-heading .sub-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_design_option',
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
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pricing-style-one .item .pricing-header h4,{{WRAPPER}} .pricing-style-one .item .pricing-header h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .pricing-style-one .item .pricing-header h4,{{WRAPPER}} .pricing-style-one .item .pricing-header h2',
			]
		);
		
		$this->add_control(
			'subtitle_option',
			[
				'label' 		=> esc_html__( 'Subtitle Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( ' Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pricing-style-one .item .pricing-header h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .pricing-style-one .item .pricing-header h4',
			]
		);

		$this->add_control(
			'description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pricing-style-one .item .pricing-header p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .pricing-style-one .item .pricing-header p',
			]
		);

		$this->add_control(
			'feature_option',
			[
				'label' 		=> esc_html__( 'Feature Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'feature_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .pricing-style-one .item li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'feature_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .pricing-style-one .item li',
			]
		);

		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_pricing_output = $this->get_settings_for_display();
	$monthly_pricing_list = $crysa_pricing_output['monthly_pricing_list'];
	$yearly_pricing_list = $crysa_pricing_output['yearly_pricing_list'];
	$pricing_list_two = $crysa_pricing_output['pricing_list_style_2'];
	if($crysa_pricing_output['style'] == '1'):
	?>

    <!-- Start Pricing Style One
    ============================================= -->
    <div class="pricing-area">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-4">
                    <div class="heading-left">
                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_pricing_output['section_subtitle']));?></h4>
                        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_pricing_output['section_title']));?></h2>
                    </div>
                    <div class="pricing-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="price-montly-tab" data-bs-toggle="tab" data-bs-target="#price-montly" type="button" role="tab" aria-controls="price-montly" aria-selected="true">
                                    <?php echo esc_html($crysa_pricing_output['monthly_heading']);?>
                                </button>
                                <button class="nav-link" id="price-yearly-tab" data-bs-toggle="tab" data-bs-target="#price-yearly" type="button" role="tab" aria-controls="price-yearly" aria-selected="false">
                                    <?php echo esc_html($crysa_pricing_output['yearly_heading']);?>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content" id="nav-tabContent">


                        <div class="tab-pane fade show active" id="price-montly" role="tabpanel" aria-labelledby="price-montly-tab">
                            <div class="row">
                            	<?php
                            	 	$counter = 1;
				            		foreach($monthly_pricing_list as $single_monthly_pricing):
				            	?>
                                <div class="pricing-style-one col-md-6">
                                    <div class="item <?php if($single_monthly_pricing['highlight'] == 'yes'){echo esc_attr("active");}?>">
                                        <div class="pricing-header">
                                            <i class="flaticon-cleaning-6"></i>
                                            <h4><?php echo esc_html($single_monthly_pricing['title']); ?></h4>
                                            <h2><sup><?php echo esc_html($single_monthly_pricing['currency'],'crysa-core'); ?></sup><?php echo esc_html($single_monthly_pricing['price'],'crysa-core'); ?> <sub><?php echo esc_html($single_monthly_pricing['duration'],'crysa-core'); ?></sub></h2>
                                            <p>
                                                <?php echo esc_html($single_monthly_pricing['content'],'crysa-core'); ?>
                                            </p>
                                            <div class="button">
                                                <a class="btn btn-dark effect btn-sm" href="<?php echo esc_url($single_monthly_pricing['button_url']['url']); ?>"><?php echo esc_html($single_monthly_pricing['button_text'],'crysa-core'); ?></a>
                                            </div>
                                        </div>
                                        <div class="pricing-info">
                                            <?php echo htmlspecialchars_decode(esc_html($single_monthly_pricing['offer'],'crysa-core')); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                	$counter++;
									endforeach;
								?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="price-yearly" role="tabpanel" aria-labelledby="price-yearly-tab">
                            <div class="row">
                                <?php
                            	 	$counter = 1;
				            		foreach($yearly_pricing_list as $single_year_pricing):
				            	?>
                                <div class="pricing-style-one col-md-6">
                                    <div class="item <?php if($single_year_pricing['highlight'] == 'yes'){echo esc_attr("active");}?>">
                                        <div class="pricing-header">
                                            <i class="flaticon-cleaning-6"></i>
                                            <h4><?php echo esc_html($single_year_pricing['title']); ?></h4>
                                            <h2><sup><?php echo esc_html($single_year_pricing['currency'],'crysa-core'); ?></sup><?php echo esc_html($single_year_pricing['price'],'crysa-core'); ?> <sub><?php echo esc_html($single_year_pricing['duration'],'crysa-core'); ?></sub></h2>
                                            <p>
                                                <?php echo esc_html($single_year_pricing['content'],'crysa-core'); ?>
                                            </p>
                                            <div class="button">
                                                <a class="btn btn-dark effect btn-sm" href="<?php echo esc_url($single_year_pricing['button_url']['url']); ?>"><?php echo esc_html($single_year_pricing['button_text'],'crysa-core'); ?></a>
                                            </div>
                                        </div>
                                        <div class="pricing-info">
                                            <?php echo htmlspecialchars_decode(esc_html($single_year_pricing['offer'],'crysa-core')); ?>
                                        </div>
                                    </div>
                                </div>
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
    </div>
    <!-- End Pricing Style One -->
    <?php elseif($crysa_pricing_output['style'] == '2'): ?>
    <!-- Start Pricing Style Two
    ============================================= -->
    <div class="pricing-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                       <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_pricing_output['section_subtitle']));?></h4>
                        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_pricing_output['section_title']));?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php
            	 	$counter = 1;
            		foreach($pricing_list_two as $single_pricing_list_two):
            	?>
	                <!-- Single item -->
	                <div class="pricing-style-two col-lg-4 col-md-6">
	                    <div class="pricing-style-one">
	                        <div class="item">
	                            <div class="pricing-header">
	                                <?php if(!empty($single_pricing_list_two['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_pricing_list_two['flat_icon']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_pricing_list_two['icon_image'])):?>
		                                <img src="<?php echo esc_url($single_pricing_list_two['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
		                            <?php endif;?>
		                            <?php 
	                                if(!empty($single_pricing_list_two['custom_icon'])):?>
	                                    <i class="<?php echo esc_attr($single_pricing_list_two['custom_icon']); ?>"></i>
	                                <?php endif;?>
	                                <h4><?php echo esc_html($single_pricing_list_two['title']); ?></h4>
	                                <h2><sup><?php echo esc_html($single_pricing_list_two['currency'],'crysa-core'); ?></sup><?php echo esc_html($single_pricing_list_two['price'],'crysa-core'); ?> <sub><?php echo esc_html($single_pricing_list_two['duration'],'crysa-core'); ?></sub></h2>
	                            </div>
	                            <div class="pricing-info">
	                                <?php echo htmlspecialchars_decode(esc_html($single_pricing_list_two['offer'],'crysa-core')); ?>
	                            </div>
	                            <div class="button">
	                                <a class="btn circle btn-dark effect btn-md" href="<?php echo esc_url($single_pricing_list_two['button_url']['url']); ?>"><?php echo esc_html($single_pricing_list_two['button_text'],'crysa-core'); ?></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Single item -->
                <?php 
                	$counter++;
					endforeach;
				?>
            </div>
        </div>

    </div>
    <!-- End Pricing Style Two -->
	<?php
	endif; 
	}
}