<?php
	/**
	* Elementor About Content Tab Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Fotter_About_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve About Content widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_footer_about';
	}

	/**
	* Get widget title.
	*
	* Retrieve About Nav Tab widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Footer About', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve About Nav Tab widget icon.
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
	* Retrieve the list of categories the About Nav Tab widget belongs to.
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
			'footer_about_content',
			[
				'label'		=> esc_html__( 'Footer About Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'logo',
			[
				'label'			=> esc_html__( 'Logo','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
	
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater = new \Elementor\Repeater();

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
				'type' 			=> \Elementor\Controls_Manager::TEXT,
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

		$repeater->add_control(
			'url',
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

		$this->add_control(
			'social_list',
			[
				'label' 	=> esc_html__( 'Social List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Social', 'crysa-core' ),
					],
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'about_content_style',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'about_footer_content_option',
			[
				'label' 		=> esc_html__( 'Content Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'about_footer_content_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .f-item.about p' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'about_footer_content_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .f-item.about p',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){	
	$crysa_about_content_output = $this->get_settings_for_display();
	?>
	    <div class="f-item about">
            <img src="<?php echo esc_html($crysa_about_content_output['logo']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
            <p>
               <?php echo htmlspecialchars_decode(esc_html($crysa_about_content_output['content'])); ?>
            </p>
            <ul class="social">
				<?php foreach($crysa_about_content_output['social_list'] as $item):?>
	                <li>
	                    <a href="<?php echo esc_url($item['url']['url']);?>">
	                    	<?php if(!empty($item['flat_icon'])):?>
	                        <i class="<?php echo esc_attr($item['flat_icon']); ?>"></i>
	                        <?php endif;?>
	                        <?php if(!empty($item['icon_image'])):?>
	                            <img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                        <?php endif;?>
	                        <?php 
	                        if(!empty($item['custom_icon'])):?>
	                            <i class="<?php echo esc_attr($item['custom_icon']); ?>"></i>
	                        <?php endif;?>
	                    </a>
	                </li>
                <?php endforeach;?>
            </ul>
        </div>
   
    <?php	
    }
}