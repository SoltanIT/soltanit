<?php
	/**
	* Elementor Quick Contact Form Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Quick_Contact_Form_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Quick Contact Form widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'quick_contact_form';
	}

	/**
	* Get widget title.
	*
	* Retrieve Quick Contact Form widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Quick Contact Form', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Quick Contact Form widget icon.
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
	* Retrieve the list of categories the Quick Contact Form widget belongs to.
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
				'label'		=> esc_html__( 'Set quick Contact Form Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'contact_shortcode',
			[
				'label' 		=> esc_html__( 'Contact Form Shortcode', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'placeholder' 	=> esc_html__( 'Put your shortcode Here', 'crysa-core' ),
			]

		);

		$this->add_control(
			'quick_contact_form_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'quick_contact_title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'rows' 			=> 3,
			]
		);

		$this->add_control(
			'quick_contact_phone', [
				'label' 		=> esc_html__( 'Phone', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'rows' 			=> 3,
			]
		);

		$this->add_control(
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

		$this->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);

		$this->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);


		$this->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image Icon','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'quick_contact_form_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_option',
			[
				'label' 		=> esc_html__( 'Label Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'label_color',
			[
				'label' 		=> esc_html__( 'Label Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consultation-form label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'label_typography',
				'label' 		=> esc_html__( 'Label Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .consultation-form label',
			]
		);

		$this->add_control(
			'contact_title_option',
			[
				'label' 		=> esc_html__( 'Contact Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'contact_title_color',
			[
				'label' 		=> esc_html__( 'Contact Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-list h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_title_typography',
				'label' 		=> esc_html__( 'Contact Number Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-list h5',
			]
		);

		$this->add_control(
			'contact_number_option',
			[
				'label' 		=> esc_html__( 'Contact Number Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'contact_number_color',
			[
				'label' 		=> esc_html__( 'Contact Number Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-list a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_number_typography',
				'label' 		=> esc_html__( 'Contact Number Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-list a',
			]
		);
		$this->add_control(
			'contact_button_option',
			[
				'label' 		=> esc_html__( 'Contact Button Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'contact_button_color',
			[
				'label' 		=> esc_html__( 'Contact Button Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .consultation-form.theme button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_button_typography',
				'label' 		=> esc_html__( 'Contact Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .consultation-form.theme button',
			]
		);

		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_quick_contact_form = $this->get_settings_for_display();
	?>

    <!-- Start Quick Contact Form Area 
    ============================================= -->
    <?php echo do_shortcode($crysa_quick_contact_form['contact_shortcode']);?>
    <ul class="contact-list">
        <li>
            <div class="icon">
                <?php if(!empty($crysa_quick_contact_form['flat_icon'])):?>
                    <i class="<?php echo esc_attr($crysa_quick_contact_form['flat_icon']); ?>"></i>
                <?php endif;?>
                <?php if(!empty($crysa_quick_contact_form['icon_image'])):?>
                    <img src="<?php echo esc_url($crysa_quick_contact_form['icon_image']['url']); ?>">
                <?php endif;?>
                <?php 
                if(!empty($crysa_quick_contact_form['custom_icon'])):?>
                    <i class="<?php echo esc_attr($crysa_quick_contact_form['custom_icon']); ?>"></i>
                <?php endif;?>
            </div>
            <div class="info">
                <h5><?php echo esc_html($crysa_quick_contact_form['quick_contact_title']);?></h5>
                <a href="tel:<?php echo esc_attr($crysa_quick_contact_form['quick_contact_phone']);?>"><?php echo htmlspecialchars_decode(esc_html($crysa_quick_contact_form['quick_contact_phone']));?></a>
            </div>
        </li>
    </ul>
    <!-- End Quick Contact Form  Area -->
	<?php
	}
}