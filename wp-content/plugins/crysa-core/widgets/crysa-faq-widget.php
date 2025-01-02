<?php
	/**
	* Elementor Faq Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Faq_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Faq widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_accordian';
	}

	/**
	* Get widget title.
	*
	* Retrieve Faq widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'FAQ', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Faq widget icon.
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
	* Retrieve the list of categories the Faq widget belongs to.
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
			'faq_content',
			[
				'label'		=> esc_html__( 'Set Faq Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> esc_html__( 'Section Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'crysa-core' ),
			]

		);

		$this->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'crysa-core' ),
			]

		);

		$this->add_control(
			'faq_image',
			[
				'label'			=> esc_html__( 'Left Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
				'rows' 			=> 10,
			]
		);

		$this->add_control(
			'faq_list',
			[
				'label' 	=> esc_html__( 'Faq', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Faq', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ heading }}}',
			]
		);
		$this->add_control(
			'shadow_active',
			[
				'label' => __( 'Shadow', 'crysa-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Active', 'crysa-core' ),
				'label_off' => __( 'Deactive', 'crysa-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .heading-left .heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading-left .heading',
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
				'selector' 		=> '{{WRAPPER}} .heading-left .sub-title',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'crysa_faq_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'faq_title_option',
			[
				'label' 		=> esc_html__( 'Faq Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'faq_title_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .faq-style-one button.accordion-button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .faq-style-one button.accordion-button',
			]
		);
		
		$this->add_control(
			'faq_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'faq_description_color',
			[
				'label' 		=> esc_html__( 'Description Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .faq-style-one .accordion-item .accordion-body p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'faq_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .faq-style-one .accordion-item .accordion-body p,{{WRAPPER}} .services-style-seven p',
			]
		);
	

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_faqs_output = $this->get_settings_for_display();
	$faq_lists = $crysa_faqs_output['faq_list'];
	?>

    <!-- Start Faq 
    ============================================= -->
    <div class="faq-area <?php if($crysa_faqs_output['shadow_active'] == 'yes'){echo esc_attr("bg-gray");}else{echo "shape-less overflow-hidden";}?>">
        <!-- Start Shape -->
        <div class="shape">
            <div class="circle-shape"></div>
            <div class="circle-shape"></div>
        </div>
        <!-- End  Shape -->
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 faq-style-one">
                    <div class="thumb">
                        <img src="<?php echo esc_url($crysa_faqs_output['faq_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </div>
                </div>
                <div class="col-lg-6 faq-style-one">
                    <div class="heading-left">
                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_faqs_output['subtitle'],'crysa-core')); ?></h4>
            			<h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_faqs_output['title'],'crysa-core')); ?></h2>
                    </div>
                    <div class="accordion" id="faqAccordion">
                        <?php
			        		$counter=1;
			        		foreach($faq_lists as $single_faq):
			        	?>
				            <div class="accordion-item">
				               <h2 class="accordion-header" id="heading<?php echo esc_attr($counter);?>">
				                  <button class="accordion-button <?php if($counter == '1'){echo esc_attr__("");}else{echo esc_attr__("collapsed",'crysa-core');}?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($counter);?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($counter);?>">
				                    <?php echo htmlspecialchars_decode(esc_html($single_faq['heading'],'crysa-core')); ?>
				                  </button>
				               </h2>
				               <div id="collapse<?php echo esc_attr($counter);?>" class="accordion-collapse collapse<?php if($counter == '1'){echo esc_attr__(" show",'crysa-core');}?>" aria-labelledby="heading<?php echo esc_attr($counter);?>" data-bs-parent="#faqAccordion">
				                  <div class="accordion-body">
				                        <p>
				                            <?php echo htmlspecialchars_decode(esc_html($single_faq['content'],'crysa-core')); ?>
				                        </p>
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
    <!-- End Faq Area -->
	<?php 
	}
}