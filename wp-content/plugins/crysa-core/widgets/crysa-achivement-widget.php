<?php
	/**
	* Elementor Achivement Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Achivement_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Achivement widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_achivemnt_one';
	}

	/**
	* Get widget title.
	*
	* Retrieve Achivement widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Achivement Style One', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Achivement widget icon.
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
	* Retrieve the list of categories the Achivement widget belongs to.
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
			'Achivements_content',
			[
				'label'		=> esc_html__( 'Set Achivement Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
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
			'image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'funfactor', [
				'label' 		=> esc_html__( 'Funfactor Number', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		

		$this->end_controls_section();

		$this->start_controls_section(
			'achivement_one_style',
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
					'{{WRAPPER}} .achivement-style-one .item h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .achivement-style-one .item h4',
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

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .achivement-style-one .item p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .achivement-style-one .item p',
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
					'{{WRAPPER}} .achivement-style-one .item .circle strong' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'number_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .achivement-style-one .item .circle strong',
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_achivements_output = $this->get_settings_for_display();

	?>
	<!-- Start Achivements Style One
    ============================================= -->
    <div class="achivement-style-one text-light">
        <div class="item" style="background-image: url(<?php echo esc_url($crysa_achivements_output['image']['url']);?>);">
            <div class="progressbar">
                <div class="circle" data-percent="<?php echo esc_attr($crysa_achivements_output['funfactor']);?>">
                    <strong></strong>
                </div>
            </div>
            <div class="content">
                <h4><?php echo esc_html($crysa_achivements_output['title']);?></h4>
                <p><?php echo esc_html($crysa_achivements_output['content']);?></p>
            </div>
        </div>
    </div>
    <!-- End Achivements Style One -->
	<?php 
	}
}