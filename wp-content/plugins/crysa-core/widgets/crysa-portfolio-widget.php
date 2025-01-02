<?php
	/**
	* Elementor Portfolio Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Portfolio_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name. 
	*
	* Retrieve Portfolio widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_portfolio';
	}

	/**
	* Get widget title.
	*
	* Retrieve Portfolio widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Portfolio', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Portfolio widget icon.
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
	* Retrieve the list of categories the Portfolio widget belongs to.
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
			'section_heading',
			[
				'label'		=> esc_html__( 'Section Heading','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_show',
			[
				'label' => __( 'Show/Hide Section Heading', 'crysa-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'crysa-core' ),
				'label_off' => __( 'Hide', 'crysa-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__( 'Section Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'crysa-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'crysa-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		
		$this->end_controls_section();

		$this->start_controls_section(
			'portfolio_content',
			[
				'label'		=> esc_html__( 'Portfolio Content','crysa-core' ),
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
					'3' 	=> esc_html__( 'Style Three', 'crysa-core' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'category', [
				'label' 		=> esc_html__( 'Category', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'portfolio_image',
			[
				'label'			=> esc_html__( 'Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'portfolio_single_url',
			[
				'label' 		=> esc_html__( 'Portfolio Single URL', 'crysa-core' ),
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
			'portfolio_list',
			[
				'label' 	=> esc_html__( 'Portfolio', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Portfolio', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_heading_style',
			[
				'label'			=> esc_html__( 'Section Heading Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_option',
			[
				'label' 		=> esc_html__( 'Section Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading .title',
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading .sub-title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'portfolio_content_style',
			[
				'label'			=> esc_html__( 'Style','crysa-core' ),
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
					'{{WRAPPER}} .gallery-style-one .item .content a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .gallery-style-one .item .content a',
			]
		);
		
		$this->add_control(
			'subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( 'Sub Title Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-style-one .item .content span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'sub_title_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .gallery-style-one .item .content span',
			]
		);

       	$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		
	$crysa_portfolio_output = $this->get_settings_for_display();
	$portfolio_list = $crysa_portfolio_output['portfolio_list'];
	?>
	<?php if($crysa_portfolio_output['style'] == '1'): ?>
  	<!-- Start Portfolio Area
    ============================================= -->
    <div class="projects-area default-padding">
        <?php if($crysa_portfolio_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_portfolio_output['section_subtitle'])):?>
	                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_portfolio_output['section_subtitle']));?></h4>
	                         <?php endif;?>
	                        <?php if(!empty($crysa_portfolio_output['section_title'])):?>
	                        <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_portfolio_output['section_title']));?></h2>
	                         <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="masonary">
                        <div class="gallery-items text-center colums-3 mixed">
                        	<?php foreach ($portfolio_list as $single_portfolio_value): ?>
                            <!-- Single Item -->
                            <div class="gallery-item gallery-style-one">
                                <div class="item gallery-mixed-item">
                                    <div class="thumb">
                                        <img src="<?php echo esc_url($single_portfolio_value['portfolio_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4><a href="<?php echo esc_url($single_portfolio_value['portfolio_single_url']['url']);?>"><?php echo esc_html($single_portfolio_value['title']);?></a></h4>
                                            <span><?php echo esc_html($single_portfolio_value['category']);?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
    						<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- End Portfolios Area -->
    <?php elseif($crysa_portfolio_output['style'] == '2'): ?>
    <!-- Start Portfolio Area
    ============================================= -->
    <div class="projects-area default-padding">
        <?php if($crysa_portfolio_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_portfolio_output['section_subtitle'])):?>
	                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_portfolio_output['section_subtitle']));?></h4>
	                         <?php endif;?>
	                        <?php if(!empty($crysa_portfolio_output['section_title'])):?>
	                        <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_portfolio_output['section_title']));?></h2>
	                         <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="masonary">
                        <div id="gallery-masonary" class="gallery-items text-center colums-3">
                        	<?php foreach ($portfolio_list as $single_portfolio_value): ?>
                            <!-- Single Item -->
                            <div class="gallery-item gallery-style-one">
                                <div class="item gallery-mixed-item">
                                    <div class="thumb">
                                        <img src="<?php echo esc_url($single_portfolio_value['portfolio_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4><a href="<?php echo esc_url($single_portfolio_value['portfolio_single_url']['url']);?>"><?php echo esc_html($single_portfolio_value['title']);?></a></h4>
                                            <span><?php echo esc_html($single_portfolio_value['category']);?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
    						<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- End Portfolios Area -->
    <?php elseif($crysa_portfolio_output['style'] == '3'): ?>
    <!-- Start Projects 
    ============================================= -->
    <div class="projects-area bg-gray default-padding">
    	<?php if($crysa_portfolio_output['section_show'] == 'yes'): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                       <?php if(!empty($crysa_portfolio_output['section_subtitle'])):?>
	                        <h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_portfolio_output['section_subtitle']));?></h4>
                        <?php endif;?>
                        <?php if(!empty($crysa_portfolio_output['section_title'])):?>
                        <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_portfolio_output['section_title']));?></h2>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="masonary">
                        <div id="gallery-masonary" class="gallery-items text-center colums-3">
                        	<?php foreach ($portfolio_list as $single_portfolio_value): ?>
                            <!-- Single Item -->
                            <div class="gallery-item gallery-style-one">
                                <div class="item gallery-mixed-item">
                                    <div class="thumb">
                                        <img src="<?php echo esc_url($single_portfolio_value['portfolio_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <h4><a href="<?php echo esc_url($single_portfolio_value['portfolio_single_url']['url']);?>"><?php echo esc_html($single_portfolio_value['title']);?></a></h4>
                                            <span><?php echo esc_html($single_portfolio_value['category']);?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
  							<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- End Projects -->	
	<?php endif;
	}
}