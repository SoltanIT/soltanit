<?php
	/**
	* Elementor About Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_About_Image_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve About widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'about_image';
	}

	/**
	* Get widget title.
	*
	* Retrieve About Nav Tab widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'About Image', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve About Nav Tab widget icon.
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
	* Retrieve the list of categories the About Nav Tab widget belongs to.
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
			'about_image_style',
			[
				'label'		=> esc_html__( 'About Image Style','crysa-core' ),
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
					'5' 	=> esc_html__( 'Style Five', 'crysa-core' ),
					'6' 	=> esc_html__( 'Style Six', 'crysa-core' ),
				],
			]
		);

		$this->add_control(
			'funfactor_title', [
				'label' 		=> esc_html__( 'Funfactor Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'funfactor_number', [
				'label' 		=> esc_html__( 'Funfactor Number', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'funfactor_operator', [
				'label' 		=> esc_html__( 'Funfactor Operator', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '2'],
			]
		);

		$this->add_control(
			'thumb_image',
			[
				'label' 	=> esc_html__( 'Add Image', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => ['1','2','4','5']],
			]
		);
		$this->add_control(
			'shape_one',
			[
				'label' 	=> esc_html__( 'Add Background Shape', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'about_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);
		$this->add_control(
			'about_subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
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
			'about_icon_list',
			[
				'label' 	=> esc_html__( 'Icon', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Icon', 'crysa-core' ),
					],
				],
				'title_field' => esc_html__( 'Add Icon', 'crysa-core' ),
				'condition' 	=> ['style' => '1'],
			]
		);
		
		$this->add_control(
			'about_st_img_one',
			[
				'label' 	=> esc_html__( 'Add Image One', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => ['3','6']],
			]
		);
		
		$this->add_control(
			'about_st_img_two',
			[
				'label' 	=> esc_html__( 'Add Image Two', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => ['3','6']],
			]
		);
		
		$this->add_control(
			'about_st_img_three',
			[
				'label' 	=> esc_html__( 'Add Image Three', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => ['3','6']],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'about_image_style_option',
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
				'condition' 	=> ['style' => ['1']],
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one .award h4' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-one .award h4',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one .award p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-one .award p',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'counter_number_option',
			[
				'label' 		=> esc_html__( 'Counter Number Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'counter_number_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-two .thumb .fun-fact .counter' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counter_number_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-two .thumb .fun-fact .counter',
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'counter_title_option',
			[
				'label' 		=> esc_html__( 'Counter Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'counter_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-two .thumb .fun-fact .medium' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counter_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-two .thumb .fun-fact .medium',
				'condition' 	=> ['style' => ['2']],
			]
		);


		$this->end_controls_section();
	}

	// Output For User
	protected function render(){	
	$crysa_about_image_output = $this->get_settings_for_display();
	$about_icon_list = $crysa_about_image_output['about_icon_list'];
	if($crysa_about_image_output['style'] == '1'):
	?>
	    <div class="about-style-one">
            <div class="thumb">
                <img src="<?php echo esc_url($crysa_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php if(!empty($crysa_about_image_output['about_title'] || $crysa_about_image_output['about_subtitle'])):?>
                <div class="award">
                    <div class="icon">
                    	<?php 
	                		foreach ($about_icon_list as $single_about_icon):
	                	?>
                        	 <?php if(!empty($single_about_icon['flat_icon'])):?>
                                <i class="<?php echo esc_attr($single_about_icon['flat_icon']); ?>"></i>
                            <?php endif;?>
                            <?php if(!empty($single_about_icon['icon_image'])):?>
                                <img src="<?php echo esc_url($single_about_icon['icon_image']['url']); ?>">
                            <?php endif;?>
                            <?php 
                            if(!empty($single_about_icon['custom_icon'])):?>
                                <i class="<?php echo esc_attr($single_about_icon['custom_icon']); ?>"></i>
                            <?php endif;?>
                        <?php
		                	endforeach;
		                ?>
                    </div>
                    <div class="info">
                        <h4><?php echo esc_html($crysa_about_image_output['about_title']);?></h4>
                        <p>
                           <?php echo esc_html($crysa_about_image_output['about_subtitle']);?>
                        </p>
                    </div>
                </div>
            	<?php endif;?>
                <div class="thumb-shape">
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                    <div class="shape"></div>
                </div>
            </div>
        </div>
    <?php elseif($crysa_about_image_output['style'] == '2'): ?>
    	<!-- Start About Image Style Two -->
    	<div class="about-style-two">
            <div class="thumb">
                <img src="<?php echo esc_url($crysa_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php if($crysa_about_image_output['shape_one']['url']): ?>
                <div class="shape">
                    <img src="<?php echo esc_url($crysa_about_image_output['shape_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                </div>
            	<?php endif;?>
            	<?php if(!empty($crysa_about_image_output['funfactor_operator'] || $crysa_about_image_output['funfactor_number'] || $crysa_about_image_output['funfactor_title'])):?>
                <div class="fun-fact">
                    <div class="counter">
                        <div class="timer" data-to="<?php echo esc_attr($crysa_about_image_output['funfactor_number']);?>" data-speed="5000"><?php echo esc_html($crysa_about_image_output['funfactor_number']);?></div>
                        <div class="operator"><?php echo esc_html($crysa_about_image_output['funfactor_operator']);?></div>
                    </div>
                    <span class="medium"><?php echo esc_html($crysa_about_image_output['funfactor_title']);?></span>
                </div>
                <?php endif;?>
            </div>
        </div>
        <!-- End About Image Style Two -->
    <?php elseif($crysa_about_image_output['style'] == '3'): ?>
        <div class="thumb-style-three">
            <img src="<?php echo esc_url($crysa_about_image_output['about_st_img_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            <img src="<?php echo esc_url($crysa_about_image_output['about_st_img_two']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            <div class="experience">
                <img src="<?php echo esc_url($crysa_about_image_output['about_st_img_three']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            </div>
        </div>
    <?php elseif($crysa_about_image_output['style'] == '4'): ?>    
        <div class="about-style-four">
            <div class="thumb">
                <img src="<?php echo esc_url($crysa_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <div class="shape-move"></div>
                <div class="shape-move"></div>
            </div>
        </div>
    <?php elseif($crysa_about_image_output['style'] == '5'): ?>
    <div class="about-style-five mb-md-50 mb-xs-50">
        <div class="thumb">
            <img src="<?php echo esc_url($crysa_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
    </div>
    <?php elseif($crysa_about_image_output['style'] == '6'): ?>
    <div class="about-style-seven">
        <div class="thumb">
            <img src="<?php echo esc_url($crysa_about_image_output['about_st_img_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            <img src="<?php echo esc_url($crysa_about_image_output['about_st_img_two']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            <div class="shape-fixed">
                <img src="<?php echo esc_url($crysa_about_image_output['about_st_img_three']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            </div>
        </div>
    </div>  
    <?php
    endif; 	
    }
}