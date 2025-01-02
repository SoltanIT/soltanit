<?php
	/**
	* Elementor Faq Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Accordian_Widget extends \Elementor\Widget_Base {

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
		return 'crysa_accordian_widget';
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
		return esc_html__( 'Accordian', 'crysa-core' );
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
			'accordian_content',
			[
				'label'		=> esc_html__( 'Set Accordian Content','crysa-core' ),
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
			'accordian_list',
			[
				'label' 	=> esc_html__( 'Accordian', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Accordian', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ heading }}}',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_acordian_title_style',
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
					'{{WRAPPER}} .about-style-three h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-three h2',
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

		$this->add_control(
			'heading_subtitle_color',
			[
				'label' 		=> esc_html__( 'Sub-Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-three p' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-three p',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'crysa_accordian_design_option',
			[
				'label'			=> esc_html__( 'Accordian Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'accordian_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'accordian_title_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-three button.accordion-button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'accordian_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-three button.accordion-button',
			]
		);
		
		$this->add_control(
			'accordian_description_option',
			[
				'label' 		=> esc_html__( 'Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'accordian_description_color',
			[
				'label' 		=> esc_html__( 'Description Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-three .accordion-body p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'accordian_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .about-style-three .accordion-body p',
			]
		);
	

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_accordian_output = $this->get_settings_for_display();
	$accordian_lists = $crysa_accordian_output['accordian_list'];
	?>
    <!-- Start Accordian 
    ============================================= -->
    <div class="about-style-three text-light">
        <h2><?php echo htmlspecialchars_decode(esc_html($crysa_accordian_output['title'],'crysa-core')); ?></h2>
        <p>
            <?php echo htmlspecialchars_decode(esc_html($crysa_accordian_output['subtitle'],'crysa-core')); ?>
        </p>
        <div class="accordion" id="faqAccordion">
            <?php
        		$counter=1;
        		foreach($accordian_lists as $single_accordian):
        	?>
	            <div class="accordion-item">
	               <h2 class="accordion-header" id="heading<?php echo esc_attr($counter);?>">
	                  <button class="accordion-button <?php if($counter == '1'){echo esc_attr__("");}else{echo esc_attr__("collapsed",'crysa-core');}?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($counter);?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($counter);?>">
	                    <?php echo htmlspecialchars_decode(esc_html($single_accordian['heading'],'crysa-core')); ?>
	                  </button>
	               </h2>
	               <div id="collapse<?php echo esc_attr($counter);?>" class="accordion-collapse collapse<?php if($counter == '1'){echo esc_attr__(" show",'crysa-core');}?>" aria-labelledby="heading<?php echo esc_attr($counter);?>" data-bs-parent="#faqAccordion">
	                  <div class="accordion-body">
	                        <p>
	                            <?php echo htmlspecialchars_decode(esc_html($single_accordian['content'],'crysa-core')); ?>
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
    <!-- End Accordian -->
	<?php 
	}
}