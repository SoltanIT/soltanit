<?php
	/**
	* Elementor Quick Contact Content Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Quick_Contact_Content_Widget extends \Elementor\Widget_Base {

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
		return 'quick_contact_content';
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
		return esc_html__( 'Quick Contact Content', 'crysa-core' );
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
			'quick_contact_form_content',
			[
				'label'		=> esc_html__( 'Set Quick Contact Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			]

		);

		$this->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
			]

		);
		$this->add_control(
			'content',
			[
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
			]

		);
		
		$this->end_controls_section();
				$this->start_controls_section(
			'quick_contact_design_option',
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
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading',
			]
		);

		$this->add_control(
			'subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .sub-heading.light',
			]
		);

		$this->add_control(
			'check_list_option',
			[
				'label' 		=> esc_html__( 'Check List Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'check_list_color',
			[
				'label' 		=> esc_html__( 'Check List Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quick-contact-style-one li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'check_list_typography',
				'label' 		=> esc_html__( 'Check List Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .quick-contact-style-one li',
			]
		);

		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_quick_contact_content = $this->get_settings_for_display();
	?>

    <!-- Start Quick Contact Content Area 
    ============================================= -->
    <div class="quick-contact-style-one">
        <h4 class="sub-heading light"><?php echo htmlspecialchars_decode(esc_html($crysa_quick_contact_content['subtitle']));?></h4>
        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_quick_contact_content['title']));?></h2>
        <?php echo htmlspecialchars_decode(esc_html($crysa_quick_contact_content['content']));?>
    </div>
    <!-- End Quick Contact Content  Area -->
	<?php
	}
}