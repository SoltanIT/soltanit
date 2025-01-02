<?php
	/**
	* Elementor Meeting Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Meeting_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Meeting widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_meeting';
	}

	/**
	* Get widget title.
	*
	* Retrieve Meetingwidget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Meeting', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Meeting widget icon.
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
	* Retrieve the list of categories the Meetingwidget belongs to.
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
			'meeting_left_content',
			[
				'label'		=> esc_html__( 'Set Meeting Left Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'crysa-core' ),
			]

		);

		$this->add_control(
			'subtitle',
			[
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'crysa-core' ),
			]

		);

		$this->add_control(
			'bac_image',
			[
				'label'			=> esc_html__( 'Background Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'features',
			[
				'label' 		=> esc_html__( 'Features', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
			]

		);

		$this->add_control(
			'shape_two',
			[
				'label'			=> esc_html__( 'Background Shape','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'meeting_content',
			[
				'label'		=> esc_html__( 'Set Meeting Right Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> 3,
			]
		);

		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> 3,
			]
		);

		$repeater->add_control(
			'contact_url',
			[
				'label' 		=> esc_html__( 'Contact URL', 'crysa-core' ),
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

		$repeater->add_control(
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

		$repeater->add_control(
			'flat_icon',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-cloud-server',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);

		$repeater->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);


		$repeater->add_control(
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Image Icon','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$this->add_control(
			'meeting_list',
			[
				'label' 	=> esc_html__( 'Contact', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Contact', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'meeting_heading_style',
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
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .heading',
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
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .sub-title',
			]
		);

		$this->add_control(
			'heading_check_list_option',
			[
				'label' 		=> esc_html__( 'Check List Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'check_list_color',
			[
				'label' 		=> esc_html__( 'Sub-Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .meeting-style-one ul.list li' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'check_list_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .meeting-style-one ul.list li',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'meeting_design_option',
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
				'label' 		=> esc_html__( 'Title Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .meeting-style-one ul li h5' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .meeting-style-one ul li h5',
			]
		);
		
		$this->add_control(
			'accordian_description_option',
			[
				'label' 		=> esc_html__( 'Subtitle Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( 'Subtitle Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .meeting-style-one ul li p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .meeting-style-one ul li p',
			]
		);

		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_meeting_output = $this->get_settings_for_display();
	$meeting_contact_lists = $crysa_meeting_output['meeting_list'];
	?>

    <!-- Start Meeting 
    ============================================= -->
    <div class="meeting-style-one-area bg-cover default-padding text-light" style="background-image: url(<?php echo esc_url($crysa_meeting_output['bac_image']['url']);?>);">
        <!-- Shape -->
        <?php if(!empty($crysa_meeting_output['shape_two']['url'])):?>
        	<div class="shape-left-top" style="background-image: url(<?php echo esc_url($crysa_meeting_output['shape_two']['url']);?>);"></div>
        <!-- End Shape -->
        <?php endif;?>
        <!-- End Shape -->
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-6 col-lg-5 meeting-style-one">
                    <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_meeting_output['subtitle']));?></h4>
                    <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_meeting_output['title']));?></h2>
                    <?php echo htmlspecialchars_decode(esc_html($crysa_meeting_output['features']));?>
                </div>
                <div class="col-xl-6 col-lg-7 meeting-style-one">
                    <ul class="text-end">
                    	<?php
		            		foreach($meeting_contact_lists as $single_meeting_contact):
		            	?>
                        <li>
                            <a href="<?php echo esc_url($single_meeting_contact['contact_url']['url']);?>">
                                <?php if(!empty($single_meeting_contact['flat_icon'])):?>
	                                <i class="<?php echo esc_attr($single_meeting_contact['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_meeting_contact['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_meeting_contact['icon_image']['url']); ?>">
	                            <?php endif;?>
	                            <?php 
	                            if(!empty($single_meeting_contact['custom_icon'])):?>
	                                <i class="<?php echo esc_attr($single_meeting_contact['custom_icon']); ?>"></i>
	                            <?php endif;?>
                                <h5><?php echo htmlspecialchars_decode(esc_html($single_meeting_contact['title']));?></h5>
                                <p>
                                    <?php echo htmlspecialchars_decode(esc_html($single_meeting_contact['content']));?>
                                </p>
                            </a>
                        </li>
                        <?php 
							endforeach;
						?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Meeting -->
	<?php 
	}
}