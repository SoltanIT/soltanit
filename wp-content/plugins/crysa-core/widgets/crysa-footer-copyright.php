<?php
	/**
	* Elementor Footer CopyrightTab Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Fotter_Copyright_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Footer Copyrightwidget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_footer_copyright';
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
		return esc_html__( 'Footer Copyright', 'crysa-core' );
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
			'footer_copyright_content',
			[
				'label'		=> esc_html__( 'Footer Copyright Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
	
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$nav_menus = new \Elementor\Repeater();

		$nav_menus->add_control(
		    'nav_menu',
		    [
		        'label' => __('Select Nav Menu', 'crysa-core'),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'options' => crysa_get_nav_menu(),
		        'label_block' => true,
		    ]
		);

		$this->add_control(
		    'nav_menus',
		    [
		        'label' => __('Nav Menus', 'crysa-core'),
		        'type' => \Elementor\Controls_Manager::REPEATER,
		        'fields' => $nav_menus->get_controls(),
		        'prevent_empty' => false,
		    ]
		);	

		
		$this->end_controls_section();

		$this->start_controls_section(
			'fotter_copyright_content_style',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'fotter_copyright_content_option',
			[
				'label' 		=> esc_html__( 'Content Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'fotter_copyright_content_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .footer-bottom p' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'fotter_copyright_content_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .footer-bottom p',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){	
	$crysa_footer_copyright = $this->get_settings_for_display();
	?>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <p> <?php echo htmlspecialchars_decode(esc_html($crysa_footer_copyright['content'])); ?></p>
                        </div>
                        <div class="col-lg-6 text-right">
                            <?php
						    	foreach ($crysa_footer_copyright['nav_menus'] as $footer_nav_menu) : ?>
						            <?php wp_nav_menu(array(
						                'menu' => $footer_nav_menu['nav_menu'],
						            ));
						            ?>
						        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
   
    <?php	
    }
}