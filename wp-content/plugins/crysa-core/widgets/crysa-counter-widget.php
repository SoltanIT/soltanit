<?php
	/**
	* Elementor Quick Contact Content Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Counter_Widget extends \Elementor\Widget_Base {

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
		return 'crysa_counter';
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
		return esc_html__( 'Counter', 'crysa-core' );
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
			'crysa_counter_content',
			[
				'label'		=> esc_html__( 'Set counter Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'number', [
				'label' 		=> esc_html__( 'Number', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'operator', [
				'label' 		=> esc_html__( 'Operator', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'crysa_counter_list',
			[
				'label' 	=> esc_html__( 'Counter', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add counter', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'counter_shape_one',
			[
				'label'			=> esc_html__( 'Background Shape','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'crysa_counter_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'counter_title_option',
			[
				'label' 		=> esc_html__( 'Testimonial Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'testimonail_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .text-light .fun-fact .medium' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonail_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .text-light .fun-fact .medium',
			]
		);


		$this->add_control(
			'number_option',
			[
				'label' 		=> esc_html__( 'Number Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .text-light .fun-fact .counter' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'number_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .text-light .fun-fact .counter',
			]
		);
					
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_counter_content = $this->get_settings_for_display();
	$counter_list = $crysa_counter_content['crysa_counter_list'];
	?>
	<!-- Start Fun factor area
    ============================================= -->
    <div class="fun-factor-area overflow-hidden default-padding bg-fixed shadow dark-small text-light" style="background-image: url(<?php echo esc_url($crysa_counter_content['counter_shape_one']['url']); ?>);">
        <div class="container">
            <div class="fun-fact-style-one-box">
                <div class="row">
                	<?php foreach($counter_list as $single_counter):?>
	                    <div class="col-lg-4 fun-fact-style-one">
	                        <div class="fun-fact">
	                            <div class="counter">
	                                <div class="timer" data-to="<?php echo esc_attr($single_counter['number']);?>" data-speed="2000"><?php echo esc_html($single_counter['number']);?></div>
	                                <div class="operator"><?php echo esc_html($single_counter['operator']);?></div>
	                            </div>
	                            <span class="medium"><?php echo esc_html($single_counter['title']);?></span>
	                        </div>
	                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End fun factor area -->
	<?php
	}
}