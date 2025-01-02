<?php
	/**
	* Elementor About Content Tab Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_About_Content_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve About Content widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'about_content';
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
		return esc_html__( 'About Content', 'crysa-core' );
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
			'about_content',
			[
				'label'		=> esc_html__( 'About Content','crysa-core' ),
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
				],
			]
		);

		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Sub-Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','3','4','5']],
			]
		);

		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'about_feature_list_two', [
				'label' 		=> esc_html__( 'Feature List', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['2','3','4','5']],
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

		$this->add_control(
			'about_feature_list',
			[
				'label' 	=> esc_html__( 'Feature', 'crysa-core' ),
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

		$this->add_control(
			'experince_years',
			[
				'label' 		=> esc_html__( 'Experince Years', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		
		$this->add_control(
			'experince_heading',
			[
				'label' 		=> esc_html__( 'Experince Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_control(
			'expertise_image',
			[
				'label'			=> esc_html__( 'Expertise Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => '2'],
			]
		);
		
		$this->add_control(
			'expertise_video_heading',
			[
				'label' 		=> esc_html__( 'Expertise Video Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'expertise_video_url',
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
				'condition' 	=> ['style' => '2'],
			]
		);

		$this->add_control(
			'about_shadow',
			[
				'label' => __( 'Show/Hide Shadow', 'crysa-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'crysa-core' ),
				'label_off' => __( 'Hide', 'crysa-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3','5']],
			]
		);
		$this->add_control(
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
				'condition' 	=> ['style' => ['3','5']],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_heading_style',
			[
				'label'			=> esc_html__( 'Section Heading Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_option',
			[
				'label' 		=> esc_html__( 'Section Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one .heading,{{WRAPPER}} .about-style-two .heading,{{WRAPPER}} .about-style-four .heading,{{WRAPPER}} .about-style-five .heading,{{WRAPPER}} .about-style-seven .heading' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-one .heading,{{WRAPPER}} .about-style-two .heading,{{WRAPPER}} .about-style-four .heading,{{WRAPPER}} .about-style-five .heading,{{WRAPPER}} .about-style-seven .heading',
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','3','4','5']],
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-seven .sub-title' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-one .sub-heading,{{WRAPPER}} .about-style-four .sub-heading,{{WRAPPER}} .about-style-five .sub-heading,{{WRAPPER}} .about-style-seven .sub-title',
				'condition' 	=> ['style' => ['1','3','4','5']],
			]
		);

		$this->add_control(
			'section_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);

		$this->add_control(
			'section_description_color',
			[
				'label' 		=> esc_html__( 'Description Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one .mb-0,{{WRAPPER}} .about-style-two .content p,{{WRAPPER}} .about-style-four .mb-0,{{WRAPPER}} .about-style-five .mb-0,{{WRAPPER}} .about-style-seven .mb-0' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_description_typography',
				'label' 		=> esc_html__( 'Description Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-one .mb-0,{{WRAPPER}} .about-style-two .content p,{{WRAPPER}} .about-style-four .mb-0,{{WRAPPER}} .about-style-five .mb-0,{{WRAPPER}} .about-style-seven .mb-0',
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_content_style',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'about_feature_title_option',
			[
				'label' 		=> esc_html__( 'Feature Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);
		$this->add_control(
			'about_feature_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .short-feature-list li a,{{WRAPPER}} .about-style-two ul li,{{WRAPPER}} .about-style-four ul li,{{WRAPPER}} .about-style-five ul li h5,{{WRAPPER}} .about-style-seven ul li h5' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_feature_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .short-feature-list li a,{{WRAPPER}} .about-style-two ul li,{{WRAPPER}} .about-style-four ul li,{{WRAPPER}} .about-style-five ul li h5,{{WRAPPER}} .about-style-seven ul li h5',
				'condition' 	=> ['style' => ['1','2','3','4','5']],
			]
		);

		$this->add_control(
			'about_feature_subtitle_option',
			[
				'label' 		=> esc_html__( 'Feature Sub Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','4','5']],
			]
		);
		$this->add_control(
			'about_feature_sub_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .short-feature-list li p,{{WRAPPER}} .about-style-five ul li p,{{WRAPPER}} .about-style-seven ul li p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','4','5']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_feature_sub_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .short-feature-list li p,{{WRAPPER}} .about-style-five ul li p,{{WRAPPER}} .about-style-seven ul li p',
				'separator' 	=> 'after',
				'condition' 	=> ['style' => ['1','4','5']],
			]
		);

		$this->add_control(
			'about_ex_year_option',
			[
				'label' 		=> esc_html__( 'Experince Year Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_control(
			'about_ex_year_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .experience h2,{{WRAPPER}} .about-style-two .expertise .left h2 strong' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_ex_year_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .experience h2, ,{{WRAPPER}} .about-style-two .expertise .left h2 strong',
				'separator' 	=> 'after',
				'condition' 	=> ['style' => ['1','2']],
			]
		);

		$this->add_control(
			'about_ex_year_title_option',
			[
				'label' 		=> esc_html__( 'Experince Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_control(
			'about_ex_year_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .experience h4,{{WRAPPER}} .about-style-two .expertise .left h2' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_ex_year_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .experience h4,{{WRAPPER}} .about-style-two .expertise .left h2',
				'separator' 	=> 'after',
				'condition' 	=> ['style' => ['1','2']],
			]
		);

		$this->add_control(
			'about_video_title_option',
			[
				'label' 		=> esc_html__( 'Video Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['2']],
			]
		);
		$this->add_control(
			'about_video_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .video-play-button.with-text span' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_video_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .video-play-button.with-text span',
				'separator' 	=> 'after',
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'about_button_option',
			[
				'label' 		=> esc_html__( 'Button Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['3','5']],
			]
		);
		$this->add_control(
			'about_button_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-four .btn.btn-theme,{{WRAPPER}} .about-style-seven .btn.btn-theme' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['3','5']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_button_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-four .btn.btn-theme,{{WRAPPER}} .about-style-seven .btn.btn-theme',
				'separator' 	=> 'after',
				'condition' 	=> ['style' => ['3','5']],
			]
		);

		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){	
	$crysa_about_content_output = $this->get_settings_for_display();
	$feature_list = $crysa_about_content_output['about_feature_list'];
	if($crysa_about_content_output['style'] == '1'):
	?>
	    <div class="about-style-one">
	        <!-- Shape -->
	        <div class="blur-bg"></div>
	        <!-- End Shape -->
	        <div class="info">
	            <h4 class="sub-heading mb-20"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['subtitle'])); ?></h4>
	            <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['title'])); ?></h2>
	            <p class="mb-0"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['content'])); ?></p>
	            <ul class="short-feature-list">
	            	<?php foreach($feature_list as $single_about_feature):?>
	                <li>
	                    <h4><a href="<?php echo esc_url($single_about_feature['feature_url']['url']);?>"><?php echo esc_html($single_about_feature['title']);?></a></h4>
	                    <p>
	                        <?php echo esc_html($single_about_feature['content']);?>
	                    </p>
	                </li>
	            <?php endforeach;?>
	            </ul>
	        </div>
	        <div class="experience">
	        	<?php if($crysa_about_content_output['about_shadow'] == 'yes'): ?>
	        		<div class="shape-bottom-large"></div>
	        	<?php endif;?>
	            <div class="left">
	                <h2><?php echo esc_html($crysa_about_content_output['experince_years']);?></h2>
	                <h4><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['experince_heading'])); ?></h4>
	            </div>
	        </div>
	    </div>
    <?php elseif($crysa_about_content_output['style'] == '2'): ?>
	    <div class="about-style-two">
	        <div class="content">
	            <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['title'])); ?></h2>
	            <p>
	                <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['content'])); ?>
	            </p>
	            <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['about_feature_list_two'])); ?>
	        </div>
	        <div class="expertise text-light" style="background-image: url(<?php echo esc_url($crysa_about_content_output['expertise_image']['url']);?>);">
	            <div class="left">
	                <h2><strong><?php echo esc_html($crysa_about_content_output['experince_years']);?></strong> <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['experince_heading'])); ?></h2>
	            </div>
	            <?php if(!empty($crysa_about_content_output['expertise_video_url']['url'])):?>
	            <div class="right">
	                <a href="<?php echo esc_url($crysa_about_content_output['expertise_video_url']['url']); ?>" class="popup-youtube video-play-button with-text">
	                    <div class="effect"></div>
	                    <span><i class="fas fa-play"></i> <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['expertise_video_heading'])); ?></span>
	                </a>
	            </div>
	        	<?php endif;?>
	        </div>
	    </div>
    <?php elseif($crysa_about_content_output['style'] == '3'): ?>
    	 <div class="about-style-four">
            <h4 class="sub-heading mb-20"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['subtitle'])); ?></h4>
            <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['title'])); ?></h2>
            <p class="mb-0">
                 <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['content'])); ?>
            </p>
           <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['about_feature_list_two'])); ?>
           <?php if(!empty($crysa_about_content_output['button_text'])):?>
            <a class="btn mt-30 btn-md btn-theme" href="<?php echo esc_url($crysa_about_content_output['button_url']['url']);?>"><?php echo esc_html($crysa_about_content_output['button_text']);?></a>
        	<?php endif;?>
        </div>
    <?php elseif($crysa_about_content_output['style'] == '4'): ?>
	    <div class="about-style-five pl-60 pl-md-15 pl-xs-15">
	        <h4 class="sub-heading mb-20"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['subtitle'])); ?></h4>
	        <h2 class="heading mb-30"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['title'])); ?></h2>
	        <p class="mb-0">
	            <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['content'])); ?>
	        </p>
	       <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['about_feature_list_two'])); ?>
	    </div>
	<?php elseif($crysa_about_content_output['style'] == '5'): ?>
		<div class="about-style-seven">
            <h4 class="sub-title mb-25"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['subtitle'])); ?></h4>
            <h2 class="heading mb-30"><?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['title'])); ?></h2>
            <p class="mb-0">
               <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['content'])); ?>
            </p>
            <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['about_feature_list_two'])); ?>
            <?php if(!empty($crysa_about_content_output['button_text'])):?>
            <a class="btn mt-35 btn-md btn-theme" href="<?php echo esc_url($crysa_about_content_output['button_url']['url']);?>"><?php echo esc_html($crysa_about_content_output['button_text']);?></a>
        	<?php endif;?>
        </div>
    <?php endif;	
    }
}