<?php
	/**
	* Elementor Team Member Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Team_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Team Member widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_team';
	}

	/**
	* Get widget title.
	*
	* Retrieve Team Member widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Team Member', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Team Member widget icon.
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
	* Retrieve the list of categories the Team Member widget belongs to.
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
			'team_content',
			[
				'label'		=> esc_html__( 'Set Team Content','crysa-core' ),
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
			'team_column',
			[
				'label' 	=> esc_html__( 'Column Type', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '3',
				'options' 	=> [
					'6' 	=> esc_html__( 'Two Column', 'crysa-core' ),
					'3' 	=> esc_html__( 'Four Column', 'crysa-core' ),
					'4'  	=> esc_html__( 'Three Column', 'crysa-core' ),
					
				],
			]
		);

		$this->add_control(
			'team_content_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> esc_html__( 'Name', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'crysa-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> esc_html__( 'Designation', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'crysa-core' ),
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'team_image',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'team_single',
			[
				'label' 		=> esc_html__( 'Team Single URL', 'crysa-core' ),
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
			'facebook_url',
			[
				'label' 		=> esc_html__( 'Facebook URL', 'crysa-core' ),
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
			'twitter_url',
			[
				'label' 		=> esc_html__( 'Twitter URL', 'crysa-core' ),
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
			'linedin_url',
			[
				'label' 		=> esc_html__( 'Linkedin URL', 'crysa-core' ),
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
			'dribbble_url',
			[
				'label' 		=> esc_html__( 'Dribbble URL', 'crysa-core' ),
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
			'instagram_url',
			[
				'label' 		=> esc_html__( 'Instagram URL', 'crysa-core' ),
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
			'youtube_url',
			[
				'label' 		=> esc_html__( 'Youtube URL', 'crysa-core' ),
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
			'pinterest_url',
			[
				'label' 		=> esc_html__( 'Pinterest URL', 'crysa-core' ),
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
			'team_list',
			[
				'label' 	=> esc_html__( 'Team Member', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Team Member', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);
		$this->add_control(
			'team_list_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'team_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'team_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'crysa_section_title_style',
			[
				'label'			=> esc_html__( 'Heading Style','dustra-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title_option',
			[
				'label' 		=> esc_html__( 'Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'heading_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h2',
			]
		);

		$this->add_control(
			'heading_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'heading_subtitle_typography',
				'label' 		=> esc_html__( 'Subtitle Typography', 'dustra-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading h4',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'crysa_team_design_option',
			[
				'label'			=> esc_html__( 'Content Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'team_option',
			[
				'label' 		=> esc_html__( 'Member Name Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' 		=> esc_html__( 'Team Member Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-style-one .info .title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'name_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .team-style-one .info .title a',
			]
		);
		
		$this->add_control(
			'name_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'name_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-items .info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'designation_option',
			[
				'label' 		=> esc_html__( 'Designation Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'designation_color',
			[
				'label' 		=> esc_html__( 'Designation Text Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-style-one .info span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'designation_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .team-style-one .info span',
			]
		);
		$this->add_control(
			'designation_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-style-one .info span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'designation_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-style-one .info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_team_output = $this->get_settings_for_display();
	$team_list= $crysa_team_output['team_list'];

	if($crysa_team_output['style'] == '1'):
	?>
    <!-- Start Team Style One
    ============================================= -->
    <div class="team-area text-center overflow-hidden">
    	<?php if($crysa_team_output['section_show'] == 'yes'): ?>
	        <div class="container-full">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_team_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_team_output['section_subtitle']));?></h4>
	                        <?php endif;?>
	                        <?php if(!empty($crysa_team_output['section_title'])):?>
	                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_team_output['section_title']));?></h2>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container-full">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        <?php
	                        foreach($team_list as $single_team):
	                    ?>	
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="team-style-one">
                                    <div class="thumb">
                                        <img src="<?php echo esc_url($single_team['team_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                        <div class="angle-shape" style="background-image: url( <?php echo esc_url($crysa_team_output['team_shape_one']['url']);?>);"></div>
                                    </div>
                                    <div class="info">
                                        <div class="content">
                                            <h4 class="title"><a href="<?php echo esc_url($single_team['team_single']['url']); ?>"><?php echo esc_html($single_team['name']); ?></a></h4>
                                            <span><?php echo esc_html($single_team['designation']); ?></span>
                                        </div>
                                        <ul class="social">
                                        	<?php if(!empty($single_team['facebook_url']['url'])):?>
	                                            <li>
	                                                <a class="facebook" href="<?php echo esc_url($single_team['facebook_url']['url']);?>">
	                                                    <i class="fab fa-facebook-f"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($single_team['twitter_url']['url'])):?>
	                                            <li>
	                                                <a class="twitter" href="<?php echo esc_url($single_team['twitter_url']['url']);?>">
	                                                    <i class="fab fa-twitter"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($single_team['instagram_url']['url'])):?>
	                                            <li>
	                                                <a class="instagram" href="<?php echo esc_url($single_team['instagram_url']['url']);?>">
	                                                    <i class="fab fa-instagram"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($single_team['linedin_url']['url'])):?>
	                                            <li>
	                                                <a class="linkedin" href="<?php echo esc_url($single_team['linedin_url']['url']);?>">
	                                                    <i class="fab fa-linkedin"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($single_team['dribbble_url']['url'])):?>
	                                            <li>
	                                                <a class="dribbble" href="<?php echo esc_url($single_team['dribbble_url']['url']);?>">
	                                                    <i class="fab fa-dribbble"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($single_team['youtube_url']['url'])):?>
	                                            <li>
	                                                <a class="youtube" href="<?php echo esc_url($single_team['youtube_url']['url']);?>">
	                                                    <i class="fab fa-youtube"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($single_team['pinterest_url']['url'])):?>
	                                            <li>
	                                                <a class="pinterest" href="<?php echo esc_url($single_team['pinterest_url']['url']);?>">
	                                                    <i class="fab fa-pinterest"></i>
	                                                </a>
	                                            </li>
                                            <?php endif;?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        <?php  endforeach;?>    

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Style One-->
    <?php elseif($crysa_team_output['style'] == '2'): ?>
    <!-- Start Team Style Two
    ============================================= -->
    <div class="team-area team-grid-style text-center overflow-hidden">
        <!-- Shape -->
        <div class="center-shape" style="background-image: url(<?php echo esc_url($crysa_team_output['team_shape_two']['url']);?>);"></div>
        <!-- End Shape -->
        <?php if($crysa_team_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_team_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_team_output['section_subtitle']));?></h4>
	                        <?php endif;?>
	                        <?php if(!empty($crysa_team_output['section_title'])):?>
	                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_team_output['section_title']));?></h2>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
            	<?php
                    foreach($team_list as $single_team):
                ?>
                <!-- Single Item -->
                <div class="col-lg-<?php echo esc_attr($crysa_team_output['team_column']);?> col-md-6">
                    <div class="team-style-one">
                        <div class="thumb">
                            <img src="<?php echo esc_url($single_team['team_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <div class="angle-shape" style="background-image: url( <?php echo esc_url($crysa_team_output['team_shape_one']['url']);?>);"></div>
                        </div>
                        <div class="info">
                            <div class="content">
                                <h4 class="title"><a href="<?php echo esc_url($single_team['team_single']['url']); ?>"><?php echo esc_html($single_team['name']); ?></a></h4>
                                <span><?php echo esc_html($single_team['designation']); ?></span>
                            </div>
                            <ul class="social">
                            	<?php if(!empty($single_team['facebook_url']['url'])):?>
                                    <li>
                                        <a class="facebook" href="<?php echo esc_url($single_team['facebook_url']['url']);?>">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                                <?php if(!empty($single_team['twitter_url']['url'])):?>
                                    <li>
                                        <a class="twitter" href="<?php echo esc_url($single_team['twitter_url']['url']);?>">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                                <?php if(!empty($single_team['instagram_url']['url'])):?>
                                    <li>
                                        <a class="instagram" href="<?php echo esc_url($single_team['instagram_url']['url']);?>">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                                <?php if(!empty($single_team['linedin_url']['url'])):?>
                                    <li>
                                        <a class="linkedin" href="<?php echo esc_url($single_team['linedin_url']['url']);?>">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                                <?php if(!empty($single_team['dribbble_url']['url'])):?>
                                    <li>
                                        <a class="dribbble" href="<?php echo esc_url($single_team['dribbble_url']['url']);?>">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                                <?php if(!empty($single_team['youtube_url']['url'])):?>
                                    <li>
                                        <a class="youtube" href="<?php echo esc_url($single_team['youtube_url']['url']);?>">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                                <?php if(!empty($single_team['pinterest_url']['url'])):?>
                                    <li>
                                        <a class="pinterest" href="<?php echo esc_url($single_team['pinterest_url']['url']);?>">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php  endforeach;?>   
            </div>                
        </div>
    </div>
    <!-- End Team Style Two -->
	<?php 
		endif;
    }
}
?>