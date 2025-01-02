<?php
	/**
	* Elementor Testimonial Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Testimonial widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'testimonial';
	}

	/**
	* Get widget title.
	*
	* Retrieve Testimonial widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Testimonial', 'crystal-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Testimonial widget icon.
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
		return [ 'crystal-elements' ];
	}

	public function get_script_depends() {
		return [ 'mainjs' ];
	}
	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'testimonial_content',
			[
				'label'		=> esc_html__( 'Testimonial Content','crystal-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Slider Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'crysa-core' ),
					'2' 	=> esc_html__( 'Style Two', 'crysa-core' ),
				],
			]
		);

		$this->add_control(
			'heading', [
				'label' 		=> esc_html__( 'Heading', 'crystal-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '2'],
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'image',
			[
				'label'			=> esc_html__( 'Add Image','crystal-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'name', [
				'label' 		=> esc_html__( 'Name', 'crystal-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> esc_html__( 'Designation', 'crystal-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Set Testimonial Content', 'crystal-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> 10,
			]
		);
		$repeater->add_control(
			'quote_image',
			[
				'label'			=> esc_html__( 'Background Image','crystal-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'testimonial_list',
			[
				'label' 	=> esc_html__( 'Testimonial', 'crystal-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Testimonial', 'crystal-core' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);
		$this->add_control(
			'testimonial_shape',
			[
				'label' 	=> esc_html__( 'Background Shape', 'crystal-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_testimonial_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'testimonail_title_option',
			[
				'label' 		=> esc_html__( 'Testimonial Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
				'condition' 	=> ['style' => ['2']],
			]
		);
		$this->add_control(
			'testimonail_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonail_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading .title',
				'condition' 	=> ['style' => ['2']],
			]
		);


		$this->add_control(
			'testimonail_name_option',
			[
				'label' 		=> esc_html__( 'Testimonial Name Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'testimonail_name_color',
			[
				'label' 		=> esc_html__( 'Name Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-style-one h4,{{WRAPPER}} .testimonial-style-two h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonail_name_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .testimonial-style-one h4,{{WRAPPER}} .testimonial-style-two h4',
			]
		);
			
		$this->add_control(
			'testimonail_description_option',
			[
				'label' 		=> esc_html__( 'Testimonial Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'testimonail_description_color',
			[
				'label' 		=> esc_html__( 'Description Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-style-one p,{{WRAPPER}} .testimonial-style-two p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonail_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .testimonial-style-one p,{{WRAPPER}} .testimonial-style-two p',
			]
		);

		$this->add_control(
			'testimonail_designation_option',
			[
				'label' 		=> esc_html__( 'Testimonial Designation Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'testimonail_designation_color',
			[
				'label' 		=> esc_html__( 'Designation Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-style-one span,{{WRAPPER}} .testimonial-style-two span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonail_designation_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .testimonial-style-one span,{{WRAPPER}} .testimonial-style-two span',
			]
		);
	

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crystal_testimonial_output = $this->get_settings_for_display();
	$testimonial_lists = $crystal_testimonial_output['testimonial_list'];
	if($crystal_testimonial_output['style'] == '1'):
	?>

	<!-- Start Testimonials Style One 
    ============================================= -->
    <div class="testimonial-area bg-fit bg-gray default-padding" style="background-image: url(<?php echo esc_url($crystal_testimonial_output['testimonial_shape']['url']);?>);">
        <div class="container">
            <div class="testimonial-style-one-box text-light">
                <div class="row align-center">

                    <div class="col-lg-12">
                        <div class="testimonial-style-one-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            	<?php
				            		foreach($testimonial_lists as $single_testimonial):
				            	?>
                                <!-- Single item -->
                                <div class="swiper-slide">
                                    <div class="testimonial-style-one">
                                        <div class="quote-icon">
                                            <img src="<?php echo esc_url($single_testimonial['quote_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                        </div>
                                        <div class="item">
                                            <div class="provider">
                                                <div class="thumb">
                                                    <img src="<?php echo esc_url($single_testimonial['image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                                </div>
                                                <div class="info">
                                                    <h4><?php echo esc_html($single_testimonial['name']);?></h4>
                                                    <span><?php echo esc_html($single_testimonial['designation']);?></span>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>
                                                   <?php echo htmlspecialchars_decode(esc_html($single_testimonial['content']));?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <?php 
									endforeach;
								?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Style Two -->
    <?php elseif($crystal_testimonial_output['style'] == '2'):?>
    <!-- Start Testimonials Style One
    ============================================= -->
    <div class="testimonial-area bg-fit bg-gray default-padding" style="background-image: url(<?php echo esc_url($crystal_testimonial_output['testimonial_shape']['url']);?>);">

        <div class="container">
            <div class="testimonial-style-two-box text-light text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="site-heading text-center">
                            <h2 class="title"> <?php echo htmlspecialchars_decode(esc_html($crystal_testimonial_output['heading']));?></h2>
                        </div>
                    </div>
                </div>
                <div class="row align-center">

                    <div class="col-lg-8 offset-lg-2">
                        <div class="testimonial-style-two-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            	<?php
				            		foreach($testimonial_lists as $single_testimonial):
				            	?>
                                <!-- Single item -->
                                <div class="swiper-slide">
                                    <div class="testimonial-style-two">
                                        <div class="item">
                                            <div class="content">
                                                <p>
                                                    <?php echo htmlspecialchars_decode(esc_html($single_testimonial['content']));?>
                                                </p>
                                            </div>
                                            <div class="provider">
                                                <div class="thumb">
                                                    <img src="<?php echo esc_url($single_testimonial['image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                                </div>
                                                <div class="info">
                                                    <h4><?php echo esc_html($single_testimonial['name']);?></h4>
                                                    <span><?php echo esc_html($single_testimonial['designation']);?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <?php 
									endforeach;
								?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonails Style Two -->
	<?php 
	endif;
	}
}
?>