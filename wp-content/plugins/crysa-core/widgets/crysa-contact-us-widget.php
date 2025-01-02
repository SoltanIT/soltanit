<?php
	/**
	* Elementor Contact Us Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Contact_Us_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Contact Us widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_contact';
	}

	/**
	* Get widget title.
	*
	* Retrieve Contact Us widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Contact Us', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Contact Us widget icon.
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
	* Retrieve the list of categories the Contact Us Form widget belongs to.
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
			'crysa_contact_content',
			[
				'label'		=> esc_html__( 'Set Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'crysa-core' ),
					'2' 	=> esc_html__( 'Style Two', 'crysa-core' ),
				],
			]
		);

		$this->add_control(
			'contact_us_heading', [
				'label' 		=> esc_html__( 'Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'info', [
				'label' 		=> esc_html__( 'Contact Info', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'contact_us_url',
			[
				'label' 		=> esc_html__( 'URL', 'crysa-core' ),
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
			'contact_us_list',
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
				'condition' 	=> ['style' => ['1']],
			]
		);
		$this->add_control(
			'contact_form_sc_v2', [
				'label' 		=> esc_html__( 'Contact Form Shortcode', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['2']],
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'info', [
				'label' 		=> esc_html__( 'Contact Info', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
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
			'contact_us_list_v2',
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
				'condition' 	=> ['style' => ['2']],
			]
		);
		$this->add_control(
			'bac_image',
			[
				'label'			=> esc_html__( 'Background Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'contact_us_style_option',
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
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-style-two-area .contact-info .item h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-style-two-area .contact-info .item h5',
			]
		);

		$this->add_control(
			'contact_info_option',
			[
				'label' 		=> esc_html__( 'Contact Info Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'contact_info_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-style-two-area .contact-info .item p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_info_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .contact-style-two-area .contact-info .item p',
			]
		);

	
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_contact_us = $this->get_settings_for_display();
	$contact_us_list = $crysa_contact_us['contact_us_list'];
	$contact_us_list_v2 = $crysa_contact_us['contact_us_list_v2'];
	if($crysa_contact_us['style'] == '1'):
	?>
    <!-- Start Contact Us 
    ============================================= -->
    <div class="contact-area">
        <div class="container">
            <div class="contact-style-two-items text-center bg-gradient text-light">
            	<?php if(!empty($crysa_contact_us['bac_image']['url'])):?>
                <!-- Shape -->
                <div class="shape-left-top" style="background-image: url(<?php echo esc_url($crysa_contact_us['bac_image']['url'])?>);"></div>
                <!-- Shape -->
            	<?php endif;?>
                <div class="row">
                	<?php foreach($contact_us_list as $single_contact):?>
	                    <!-- Single Item -->
	                    <div class="col-lg-4 contact-style-two">
	                        <div class="item">
	                            <?php if(!empty($single_contact['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_contact['flat_icon']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_contact['icon_image'])):?>
	                                <img src="<?php echo esc_url($single_contact['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                            <?php endif;?>
	                            <?php 
                                if(!empty($single_contact['custom_icon'])):?>
                                    <i class="<?php echo esc_attr($single_contact['custom_icon']); ?>"></i>
                                <?php endif;?>
	                            <h4 class="title"><?php echo esc_html($single_contact['title']);?></h4>
	                            <p>
	                                <?php echo htmlspecialchars_decode(esc_html($single_contact['content']));?>
	                            </p>
	                            <a href="<?php echo esc_url($single_contact['contact_us_url']['url']);?>"><?php echo esc_html($single_contact['info']);?></a>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
                	<?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
    <?php elseif($crysa_contact_us['style'] == '2'): ?>
    <!-- Start Contact Form 
    ============================================= -->
    <div id="contact" class="contact-form-area contact-style-two-area overflow-hidden default-padding" style="background-image: url(<?php echo esc_url($crysa_contact_us['bac_image']['url']); ?>);">
        <div class="container">
            <!-- Contact Form -->
            <div class="row">
                
                <div class="col-lg-7">
                    <div class="form">
                        <?php echo do_shortcode($crysa_contact_us['contact_form_sc_v2']);?>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="thumb">
                        <div class="contact-info">
                            <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($crysa_contact_us['contact_us_heading']));?></h2>
                            <?php foreach($contact_us_list_v2 as $single_contact_v2):?>
	                            <!-- Single Item -->
	                            <div class="item">
	                                <div class="icon">
	                                    <?php if(!empty($single_contact_v2['flat_icon'])):?>
	                                    <i class="<?php echo esc_attr($single_contact_v2['flat_icon']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($single_contact_v2['icon_image'])):?>
			                                <img src="<?php echo esc_url($single_contact_v2['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
			                            <?php endif;?>
			                            <?php 
		                                if(!empty($single_contact_v2['custom_icon'])):?>
		                                    <i class="<?php echo esc_attr($single_contact_v2['custom_icon']); ?>"></i>
		                                <?php endif;?>
	                                </div>
	                                <div class="info">
	                                    <h5><?php echo esc_html($single_contact_v2['title']);?></h5>
	                                    <p>
	                                        <?php echo htmlspecialchars_decode(esc_html($single_contact_v2['info']));?>
	                                    </p>
	                                </div>
	                            </div>
	                            <!-- End Single Item -->
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- End Contact Form -->
        </div>
    </div>
    <!-- End Contact Form -->
	<?php
	endif;
	}
}