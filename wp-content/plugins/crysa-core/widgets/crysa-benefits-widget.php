<?php
	/**
	* Elementor Benefits Member Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Benefits_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Benefits Member widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_benefits';
	}

	/**
	* Get widget title.
	*
	* Retrieve Benefits Member widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Benefits', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Benefits Member widget icon.
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
	* Retrieve the list of categories the Benefits Member widget belongs to.
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
			'benefits_content',
			[
				'label'		=> esc_html__( 'Set Benefits Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'benefit_title',
			[
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Ttitle Here', 'crysa-core' ),
			]

		);
		$this->add_control(
			'benefit_subtitle',
			[
				'label' 		=> esc_html__( 'Sub-Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'crysa-core' ),
			]

		);
		$this->add_control(
			'benefit_content',
			[
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'crysa-core' ),
			]

		);
		$this->add_control(
			'benefit_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'benefit_button_url',
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
			'benefits_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'benefits_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'benfit_style_option',
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
			]
		);
		$this->add_control(
			'section_title_color',
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
				'name' 			=> 'section_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading',
			]
		);

		
		$this->add_control(
			'section_description_option',
			[
				'label' 		=> esc_html__( ' Description Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'section_description_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mb--5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_description_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .mb--5',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_benefits_output = $this->get_settings_for_display();

	?>
    <!-- Start Benefits 
    ============================================= -->
    <div class="benifits-area bg-cover shadow light default-padding-top" style="background-image: url(<?php echo esc_url($crysa_benefits_output['benefits_shape_one']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="bg-text" style="background-image: url(<?php echo esc_url($crysa_benefits_output['benefits_shape_two']['url']);?>);"><?php echo htmlspecialchars_decode(esc_html($crysa_benefits_output['benefit_title']));?></h4>
                </div>
                <div class="col-lg-7 offset-lg-5 benifits-style-one">
                    <div class="item">
                        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_benefits_output['benefit_subtitle']));?></h2>
                        <p class="mb--5">
                           <?php echo htmlspecialchars_decode(esc_html($crysa_benefits_output['benefit_content']));?>
                        </p>
                        <?php if($crysa_benefits_output['benefit_button_url']['url']):?>
                        	<a class="btn mt-30 btn-md btn-gradient" href="<?php echo esc_url($crysa_benefits_output['benefit_button_url']['url']);?>"><?php echo esc_html($crysa_benefits_output['benefit_button_text']);?></a>
                    	<?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Benefits -->
	<?php 
    }
}
?>