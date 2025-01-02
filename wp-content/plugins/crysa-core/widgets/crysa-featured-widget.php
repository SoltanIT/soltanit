<?php
	/**
	* Elementor Quick Contact Content Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Featured_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Quick Contact Content widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_featured';
	}

	/**
	* Get widget title.
	*
	* Retrieve Quick Contact Content widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Featured', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Quick Contact Content widget icon.
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
	* Retrieve the list of categories the Quick Contact Content widget belongs to.
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
			'crysa_featured_content',
			[
				'label'		=> esc_html__( 'Set Featured Content','crysa-core' ),
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
			'section_title',
			[
				'label' 		=> esc_html__( 'Section Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'crysa-core' ),
				'condition' 	=> ['style' => '1'],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'crysa-core' ),
				'condition' 	=> ['style' => '1'],
			]

		);
		$this->add_control(
			'section_content',
			[
				'label' 		=> esc_html__( 'Section Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'crysa-core' ),
				'condition' 	=> ['style' => '1'],
			]

		);
		$this->add_control(
			'section_btn_text',
			[
				'label' 		=> esc_html__( 'Section Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'condition' 	=> ['style' => '1'],
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
			'crysa_featured_list',
			[
				'label' 	=> esc_html__( 'Feature List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Feature', 'crysa-core' ),
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
			'subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feature_url',
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
			'btn_url_icon', [
				'label' 		=> esc_html__( 'Button Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'    => 'fas fa-arrow-right',

			]
		);

		$this->add_control(
			'crysa_featured_list_two',
			[
				'label' 	=> esc_html__( 'Feature List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Feature', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '2'],
			]
		);

		$this->add_control(
			'feature_shape_one',
			[
				'label'			=> esc_html__( 'Background Shape One','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'feature_shape_two',
			[
				'label'			=> esc_html__( 'Background Shape One','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '1'],
			]
		);
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_section_title_style',
			[
				'label'			=> esc_html__( 'Heading Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading',
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->add_control(
			'heading_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => '1'],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .sub-heading',
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->add_control(
			'description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' 		=> esc_html__( 'Description Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-style-five p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'description_typography',
				'label' 		=> esc_html__( 'Description Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .feature-style-five p',
				'condition' 	=> ['style' => '1'],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_featured_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'featured_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'featured_title_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-style-four .item h4 a,{{WRAPPER}} .feature-style-five-item h4,{{WRAPPER}} .feature-style-four .item h4 a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'featured_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .feature-style-four .item h4 a,{{WRAPPER}} .feature-style-five-item h4,{{WRAPPER}} .feature-style-four .item h4 a',
			]
		);
		

		$this->add_control(
			'featured_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'featured_subtitle_color',
			[
				'label' 		=> esc_html__( 'Sub Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-style-four .item span,{{WRAPPER}} .feature-style-five-item p,{{WRAPPER}} .feature-style-four .item span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'featured_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .feature-style-four .item span,{{WRAPPER}} .feature-style-five-item p,{{WRAPPER}} .feature-style-four .item span',
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_featured_content = $this->get_settings_for_display();
	$crysa_featured_list = $crysa_featured_content['crysa_featured_list'];
	$crysa_featured_list_two = $crysa_featured_content['crysa_featured_list_two'];
	if($crysa_featured_content['style'] == '1'):
	?>

	<!-- Start Features 
    ============================================= -->
    <div class="featuresa-area default-padding">
    	<?php if(!empty($crysa_featured_content['feature_shape_one']['url'])):?>
        <!-- Shape -->
        <div class="shape-right-center" style="background-image: url(<?php echo esc_url($crysa_featured_content['feature_shape_one']['url']); ?>);">
        </div>
        <!-- End Shape -->
    	<?php endif;?>
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-7 pr-60 pr-md-15 pr-xs-15 feature-style-five">
                	<?php if(!empty($crysa_featured_content['feature_shape_two']['url'])):?>
                    <div class="shape-left-bottom-animated">
                        <img src="<?php echo esc_url($crysa_featured_content['feature_shape_two']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </div>
                    <?php endif;?>
                    <div class="row">
                    	<?php foreach($crysa_featured_list as $single_feature):?>
                        <!-- Single Item -->
                        <div class="col-lg-6 col-md-6 wow fadeInUp">
                            <div class="feature-style-five-item">
                                <?php if(!empty($single_feature['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_feature['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_feature['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_feature['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                            <?php endif;?>
	                            <?php 
                                if(!empty($single_feature['custom_icon'])):?>
                                    <i class="<?php echo esc_attr($single_feature['custom_icon']); ?>"></i>
                                <?php endif;?>
                                <h4><?php echo esc_html($single_feature['title']);?></h4>
                                <p>
                                    <?php echo esc_html($single_feature['content']);?>
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-lg-5 feature-style-five mt-xs-50 mt-md-50">
                    <h4 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($crysa_featured_content['section_subtitle']));?></h4>
                    <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_featured_content['section_title']));?></h2>
                    <p><?php echo htmlspecialchars_decode(esc_html($crysa_featured_content['section_content']));?>
                    </p>
                    <?php if(!empty($crysa_featured_content['section_btn_text'])):?>
                    <a class="btn mt-15 btn-md btn-gradient circle" href="<?php echo esc_url($crysa_choose_output['section_btn_url']['url']);?>"><?php echo esc_html($crysa_featured_content['section_btn_text']);?></a>
                	<?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->
    <?php elseif($crysa_featured_content['style'] == '2'): ?>
    <!-- Start Feature 
    ============================================= -->
    <div class="feature-style-four-area">
        <div class="container">
            <div class="feature-style-four-box">
                <div class="row">
                	<?php foreach($crysa_featured_list_two as $single_feature_two):?>
	                    <!-- Single Item -->
	                    <div class="feature-style-four col-xl-4 col-md-6">
	                        <div class="item">
	                            <div class="content">
	                                <div class="icon">
	                                    <?php if(!empty($single_feature_two['flat_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_feature_two['flat_icon']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($single_feature_two['icon_image'])):?>
			                                <img src="<?php echo esc_url($single_feature_two['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
			                            <?php endif;?>
			                            <?php 
		                                if(!empty($single_feature_two['custom_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_feature_two['custom_icon']); ?>"></i>
		                                <?php endif;?>
	                                </div>
	                                <div class="info">
	                                    <span><?php echo esc_html($single_feature_two['subtitle']);?></span>
	                                    <h4><a href="<?php echo esc_html($single_feature_two['feature_url']['url']);?>"><?php echo esc_html($single_feature_two['title']);?></a></h4>
	                                    <div class="bottom">
	                                        <a href="<?php echo esc_html($single_feature_two['feature_url']['url']);?>"><?php 
		                                if(!empty($single_feature_two['btn_url_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_feature_two['btn_url_icon']); ?>"></i>
		                                <?php endif;?></a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature -->
	<?php
	endif;
	}
}