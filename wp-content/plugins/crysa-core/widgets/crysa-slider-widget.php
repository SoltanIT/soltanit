<?php
	/**
	* Elementor Slider Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Slider widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_slider';
	}

	/**
	* Get widget title.
	*
	* Retrieve Slider widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Slider', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Slider widget icon.
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
	* Retrieve the list of categories the Slider widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'crysa-elements' ];
	}

	public function get_script_depends() {
		return [ 'mainjs' ];
	}
	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'slider_content',
			[
				'label'		=> esc_html__( 'Slider Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Slider Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '2',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'crysa-core' ),
					'2' 	=> esc_html__( 'Style Two', 'crysa-core' ),
					'3' 	=> esc_html__( 'Style Three', 'crysa-core' ),
					'4' 	=> esc_html__( 'Style Four', 'crysa-core' ),
					'5' 	=> esc_html__( 'Style Five', 'crysa-core' ),
					'6' 	=> esc_html__( 'Style Six', 'crysa-core' ),
					'7' 	=> esc_html__( 'Style Seven', 'crysa-core' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Slider Sub-Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			'slider_one',
			[
				'label' 	=> esc_html__( 'Slider', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_content', [
				'label' 		=> esc_html__( 'Slider Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			'slider_two',
			[
				'label' 	=> esc_html__( 'Slider', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
				'condition' 	=> ['style' => ['2']],
			]
		);


		$this->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3','4','5','6','7']],
			]
		);
		$this->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3','4','6','7']],
			]
		);
		$this->add_control(
			'slider_content_v4', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['4','5','6','7']],
			]
		);
		$this->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['3','4','6','7']],
			]
		);
		
		$this->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3','4','6','7']],
			]
		);
		$this->add_control(
			'slider_button_url',
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
				'condition' 	=> ['style' => ['3','4','6','7']],
			]
		);
		$this->add_control(
			'slider_video_url',
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
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->add_control(
			'slider_video_text',
			[
				'label' 		=> esc_html__( 'Video Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->add_control(
			'bac_shape',
			[
				'label'			=> esc_html__( 'Background Shape','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['3','4','5','6','7']],
			]
		);
		$this->add_control(
			'bac_shape_two',
			[
				'label'			=> esc_html__( 'Background Shape Two','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['7']],
			]
		);
		$this->add_control(
			'bac_shape_bottom',
			[
				'label'			=> esc_html__( 'Background Shape Bottom','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['5','6']],
			]
		);
		$this->add_control(
			'bac_shape_middle',
			[
				'label'			=> esc_html__( 'Background Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['5','6']],
			]
		);
		$this->add_control(
			'btn_url_icon', [
				'label' 		=> esc_html__( 'Button Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['7']],
				'default'    => 'fas fa-plus',

			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'slider_style_option',
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
				'condition' 	=> ['style' => ['1','2','3','4','5','6','7']],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner-area h2,{{WRAPPER}} .banner-area.banner-style-two .content h2,{{WRAPPER}}  .banner-style-three .info h2,{{WRAPPER}} .banner-style-four-area .title,{{WRAPPER}} .banner-style-five h2, {{WRAPPER}} .banner-style-six h2,{{WRAPPER}} .banner-style-seven h2' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4','5','6','7']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .banner-area h2,{{WRAPPER}} .banner-area.banner-style-two .content h2,{{WRAPPER}}  .banner-style-three .info h2,{{WRAPPER}} .banner-style-four-area .title,{{WRAPPER}} .banner-style-five h2,{{WRAPPER}} .banner-style-six h2,{{WRAPPER}} .banner-style-seven h2',
				'condition' 	=> ['style' => ['1','2','3','4','5','6','7']],
			]
		);

		$this->add_control(
			'highligted_title_option',
			[
				'label' 		=> esc_html__( 'Highligted Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','4','6']],
			]
		);
		$this->add_control(
			'highligted_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner-area h2 strong,{{WRAPPER}} .banner-area.banner-style-two .content h2 strong,{{WRAPPER}} .banner-style-four-area .title strong,{{WRAPPER}} .banner-style-six h2 strong' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','4','6']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'highligted_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .banner-area h2 strong,{{WRAPPER}} .banner-area.banner-style-two .content h2 strong,{{WRAPPER}} .banner-style-four-area .title strong,{{WRAPPER}} .banner-style-six h2',
				'condition' 	=> ['style' => ['1','2','4','6']],
			]
		);

		$this->add_control(
			'subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['1','2','3','4','6']],
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner-area h4,{{WRAPPER}} .banner-area .banner-slide p,{{WRAPPER}} .banner-style-three .info h4,{{WRAPPER}} .sub-title,{{WRAPPER}} .banner-style-seven h4' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['1','2','3','4']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .banner-area h4,{{WRAPPER}} .banner-area .banner-slide p,{{WRAPPER}} .banner-style-three .info h4,{{WRAPPER}} .sub-title,{{WRAPPER}} .banner-style-six h4, {{WRAPPER}} .banner-style-seven h4',
				'condition' 	=> ['style' => ['1','2','3','4','6','7']],
			]
		);

		$this->add_control(
			'description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['4','6','5','6','7']],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner-style-four-area p,{{WRAPPER}} .banner-style-five p,{{WRAPPER}} .banner-style-six p,{{WRAPPER}} .banner-style-seven p' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['4','6','5','6','7']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .banner-style-four-area p,{{WRAPPER}}  .banner-style-five p,{{WRAPPER}} .banner-style-six p,{{WRAPPER}} .banner-style-seven p',
				'condition' 	=> ['style' => ['4','6','5','6','7']],
			]
		);

		$this->add_control(
			'video_title_option',
			[
				'label' 		=> esc_html__( 'Video Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->add_control(
			'video_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .video-play-button.with-text span' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'video_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .video-play-button.with-text span',
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_slider_output = $this->get_settings_for_display();
	$sliders_one = $crysa_slider_output['slider_one'];
	$sliders_two = $crysa_slider_output['slider_two'];

	if($crysa_slider_output['style'] == 1){
	?>
	<!-- Start Banner Style One 
    ============================================= -->    
    <div class="banner-area banner-style-one content-right navigation-custom-large zoom-effect overflow-hidden text-light">
        <!-- Slider main container -->
        <div class="banner-fade">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
            	<?php
            		foreach($sliders_one as $slider_one):
            	?>
                <!-- Single Item -->
                <div class="swiper-slide banner-style-one">
                    <div class="banner-thumb bg-cover shadow dark" style="background: url(<?php echo esc_url($slider_one['image_slider']['url']); ?>);"></div>
                    <div class="container">
                        <div class="row align-center">
                            <div class="col-xl-7 offset-xl-5">
                                <div class="content">
                                    <h4><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_subtitle'],'crysa-core')); ?></h4>
                                    <h2><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_title'],'crysa-core')); ?></h2>
                                    <?php if(!empty($slider_one['slider_button_text'])):?>
	                                    <div class="button">
	                                        <a class="btn btn-gradient btn-md radius animation" href="<?php echo esc_url($slider_one['slider_button_url']['url']); ?>"><?php echo esc_html($slider_one['slider_button_text'],'crysa-core'); ?></a>
	                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shape -->
                    <div class="banner-angle-shape">
                        <div class="shape-item"></div>
                        <div class="shape-item"></div>
                        <div class="shape-item"></div>
                    </div>
                    <!-- End Shape -->
                </div>
                <!-- End Single Item -->
                <?php 
					endforeach;
				?> 
            </div>

            <!-- Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>        
    </div>
    <!-- End Banner Style One  -->
    <?php
	}elseif($crysa_slider_output['style'] == 2){
	?>
    <!-- Start Banner Style Two
    ============================================= -->
    <div class="banner-area banner-style-two navigation-icon-solid navigation-between-bottom navigation-custom overflow-hidden top-pad-150 text-light">
        <!-- Slider main container -->
        <div class="banner-slide">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
            	<?php
            		foreach($sliders_two as $slider_two):
            	?>
                <!-- Single Item -->
                <div class="swiper-slide bg-cover shadow dark" style="background: url(<?php echo esc_url($slider_two['image_slider']['url']); ?>);">
                    <div class="container">
                        <div class="row align-center">
                            <div class="col-xl-8 offset-xl-1">
                                <div class="content">
                                    <h2><?php echo htmlspecialchars_decode(esc_html($slider_two['slider_title'],'crysa-core')); ?></h2>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($slider_two['slider_content'],'crysa-core')); ?>
                                    </p>
                                    <?php if(!empty($slider_two['slider_button_text'])):?>
	                                    <div class="button">
	                                        <a class="btn btn-gradient btn-md radius animation" href="<?php echo esc_url($slider_two['slider_button_url']['url']); ?>"><?php echo esc_html($slider_two['slider_button_text'],'crysa-core'); ?></a>
	                                    </div>
	                                <?php endif;?>    
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

            <!-- Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>        
    </div>
    <!-- End Main -->
    <!-- End Banner Banner Style Two -->
    <?php
	}elseif($crysa_slider_output['style'] == 3){
	?>
    <!-- Start Banner Style Three
    ============================================= -->
    <div class="banner-style-three-area bg-cover text-light" style="background-image: url(<?php echo esc_url($crysa_slider_output['image_slider']['url']); ?>);">
        <div class="container">
            <div class="banner-items">
                <div class="row align-center">
                    <div class="col-lg-6 banner-style-three">
                        <div class="info">
                            <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_title'],'crysa-core')); ?></h4>
                            <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_subtitle'],'crysa-core')); ?></h2>
                            <a class="btn btn-md animated-arrow" href="<?php echo esc_url($crysa_slider_output['slider_button_url']['url']); ?>">
                                <span class="circle">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text"><?php echo esc_html($crysa_slider_output['slider_button_text'],'crysa-core'); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 banner-style-three">
                        <img src="<?php echo esc_url($crysa_slider_output['bac_shape']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Style Three -->
    <?php
	}elseif($crysa_slider_output['style'] == 4){
	?>
    <!-- Start Banner Style Four  -->
    <div class="banner-style-four-area bg-cover text-light" style="background-image: url(<?php echo esc_url($crysa_slider_output['bac_shape']['url']); ?>);">
        <div class="container">
            <div class="banner-items">
                <div class="row align-center">
                    <div class="col-lg-6 banner-style-four">
                        <div class="info">
                            <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_subtitle'],'crysa-core')); ?></h4>
                            <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_title'],'crysa-core')); ?></h2>
                            <p>
                               <?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_content_v4'],'crysa-core')); ?>
                            </p>
                            <div class="button">
                                <a class="btn btn-gradient btn-md radius animation" href="<?php echo esc_url($crysa_slider_output['slider_button_url']['url']); ?>"><?php echo esc_html($crysa_slider_output['slider_button_text'],'crysa-core'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 banner-style-four">
                        <div class="thumb">
                            <img src="<?php echo esc_url($crysa_slider_output['image_slider']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Style Four -->
    <?php
	}elseif($crysa_slider_output['style'] == 5){
	?>
	<!-- Start Banner Style Five
    ============================================= -->
    <div class="banner-style-five-area bg-cover text-center text-light" style="background-image: url(<?php echo esc_url($crysa_slider_output['bac_shape']['url']); ?>);">
        <div class="banner-shape-bottom" style="background-image: url(<?php echo esc_url($crysa_slider_output['bac_shape_middle']['url']); ?>);"></div>
        <div class="container">
            <div class="banner-items">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 banner-style-five">
                        <div class="info">
                            <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_title'],'crysa-core')); ?></h2>
                            <p>
                                <?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_content_v4'],'crysa-core')); ?>
                            </p>
                            <div class="button">
                                <a href="<?php echo esc_url($crysa_slider_output['slider_video_url']['url']); ?>" class="popup-youtube video-play-button light with-text">
                                    <div class="effect"></div>
                                    <span><i class="fas fa-play"></i><?php echo esc_html($crysa_slider_output['slider_video_text']); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="thumb">
                            <img class="wow fadeInDown" src="<?php echo esc_url($crysa_slider_output['bac_shape_bottom']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner  Style Five -->
    <?php
	}elseif($crysa_slider_output['style'] == 6){
	?>
	<!-- Start Banner Area Six
    ============================================= -->
    <div class="banner-style-six-area" style="background-image: url(<?php echo esc_url($crysa_slider_output['bac_shape_middle']['url']); ?>);">
        <div class="animate-shape">
            <img src="<?php echo esc_url($crysa_slider_output['bac_shape']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
        <div class="container">
            <div class="banner-items">
                <div class="row align-center">
                    <div class="col-lg-6 banner-style-six">
                        <div class="info">
                            <h4><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_subtitle'],'crysa-core')); ?></h4>
                            <h2><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_title'],'crysa-core')); ?></h2>
                            <p>
                                <?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_content_v4'],'crysa-core')); ?>
                            </p>
                            <?php if(!empty($crysa_slider_output['slider_button_text'])):?>
                            <div class="button">
                                <a class="btn mt-20 circle btn-gradient btn-md radius animation" href="<?php echo esc_url($crysa_slider_output['slider_button_url']['url']); ?>"><?php echo esc_html($crysa_slider_output['slider_button_text'],'crysa-core'); ?></a>
                            </div>
                        	<?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6 banner-style-six">
                        <div class="thumb">
                            <img src="<?php echo esc_url($crysa_slider_output['image_slider']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <img src="<?php echo esc_url($crysa_slider_output['bac_shape_bottom']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Six -->
    <?php
	}elseif($crysa_slider_output['style'] == 7){
	?>
	 <!-- Start Banner Area Seven
    ============================================= -->
    <div class="banner-style-seven-area bg-cover pt-160 pb-120" style="background-image: url(<?php echo esc_url($crysa_slider_output['bac_shape']['url']); ?>);">
    	<?php if(!empty($crysa_slider_output['bac_shape_two']['url'])): ?>
        <div class="mini-shape">
            <img src="<?php echo esc_url($crysa_slider_output['bac_shape_two']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
        <?php endif;?>
        <div class="container">
            <div class="banner-items">
                <div class="row align-center">
                    <div class="col-lg-6 banner-style-seven">
                        <div class="info">
                            <h4><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_subtitle'],'crysa-core')); ?></h4>
                            <h2><?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_title'],'crysa-core')); ?></h2>
                            <p>
                               <?php echo htmlspecialchars_decode(esc_html($crysa_slider_output['slider_content_v4'],'crysa-core')); ?>
                            </p>
                            <?php if(!empty($crysa_slider_output['slider_button_text'])):?>
                            <div class="button mt-40">
                                <a class="btn btn-gradient btn-md radius animation" href="<?php echo esc_url($crysa_slider_output['slider_button_url']['url']); ?>"><?php echo esc_html($crysa_slider_output['slider_button_text'],'crysa-core'); ?> <?php if(!empty($crysa_slider_output['btn_url_icon'])): ?><i class="<?php echo esc_attr($crysa_slider_output['btn_url_icon'],'crysa-core'); ?>"></i><?php endif;?> </a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 banner-style-seven">
                        <div class="thumb">
                        	<?php if(!empty($crysa_slider_output['image_slider']['url'])): ?>
	                            <div class="thumb-inner">
	                                <img src="<?php echo esc_url($crysa_slider_output['image_slider']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                            </div>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Seven -->
	<?php	
	}
}
}