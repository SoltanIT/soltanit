<?php
	/**
	* Elementor Header Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Crysa_Header_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Header widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_header_widget';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Header', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service widget icon.
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
	* Retrieve the list of categories the Service widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'crysa-elements' ];
	}

	public function get_script_depends() {
        return array('main');
    }

	// Add The Input For User
	protected function register_controls(){
		

		$this->start_controls_section(
			'crysa_header_content',
			[
				'label'		=> esc_html__( 'Set Header Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
            'style',
            [
                'label'     => esc_html__( 'Header Style', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '2',
                'options'   => [
                    '1'     => esc_html__( 'Style One', 'crysa-core' ),
                    '2'     => esc_html__( 'Style Two', 'crysa-core' ),
                    '3'     => esc_html__( 'Style Three', 'crysa-core' ),
                    '4'     => esc_html__( 'Style Four', 'crysa-core' ),
                    '5'     => esc_html__( 'Style Five', 'crysa-core' ),
                    '6'     => esc_html__( 'Style Six', 'crysa-core' ),
                    '7'     => esc_html__( 'Style Seven', 'crysa-core' ),
                ],
            ]
        );

        $this->add_control(
            'header_logo_light',
            [
                'label'         => esc_html__( 'Header Logo Light','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'style' => ['1','2','3','5']
                ],
            ]
        );

        $this->add_control(
            'header_logo_dark',
            [
                'label'         => esc_html__( 'Header Logo Dark','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'style' => ['1','2','4','5','6','7']
                ],
            ]
        );

         $this->add_control(
            'mobile_logo',
            [
                'label'         => esc_html__( 'Mobile Logo','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                   'style' => ['1','2','3','4','5','6','7']
                ],
            ]
        );
        
        $this->add_control(
		    'nav_menu',
		    [
		        'label' => __('Select Nav Menu', 'consua-addon'),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'options' => crysa_get_nav_menu(),
		        'label_block' => true,
		    ]
		);
		
        $this->add_control(
            'topbar_logo_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'content', [
                'label'         => esc_html__( 'Content', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::CODE,
                'label_block'   => true,
                 'default' => wp_kses('Need Help? <a href="tel:+4733378901">Request A Callback</a>', 'crysa_allowed_tags')
            ]
        );
        
        $this->add_control(
            'topbar_info_list',
            [
                'label'     => esc_html__( 'Topabr Info List', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Topabr Info List', 'crysa-core' ),
                    ],
                ],
                'prevent_empty' => false,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );

        $this->add_control(
            'topbar_info_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );

        $this->add_control(
            'topbar_fb_link',
            [
                'label'         => esc_html__( 'Topabr Facebook Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_tw_link',
            [
                'label'         => esc_html__( 'Topabr Twitter Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_le_link',
            [
                'label'         => esc_html__( 'Topabr Linkedin Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                   'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_in_link',
            [
                'label'         => esc_html__( 'Topabr Instagram Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_dr_link',
            [
                'label'         => esc_html__( 'Topabr Dribbble Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_be_link',
            [
                'label'         => esc_html__( 'Topabr Behance Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                   'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_yt_link',
            [
                'label'         => esc_html__( 'Topabr Youtube Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                  'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'topbar_social_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                  'style' => ['1','4']
                ],
            ]
        );
        $this->add_control(
            'search_icon',
            [
                'label' => __( 'Show/Hide Search Button', 'crysa-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'crysa-core' ),
                'label_off' => __( 'Hide', 'crysa-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition'     => [ 'style' => ['1','2','3','4'] ],
            ]
        );

        $this->add_control(
            'header_content', [
                'label'         => esc_html__( 'Header Content', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [ 'style' => ['1','2','3','4','5','6','7'] ],
            ]
        );

        $this->add_control(
            'header_content_url',
            [
                'label'         => esc_html__( 'Header Content Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','4']
                ],
            ]
        );

        $this->add_control(
            'header_2_icon_style',
            [
                'label'     => esc_html__( 'Icon Style', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1'     => esc_html__( 'Flaticon', 'crysa-core' ),
                    '3'     => esc_html__( 'Icon Image', 'crysa-core' ),
                    '4'     => esc_html__( 'Cutom Icon', 'crysa-core' ),
                ],
                'condition' => [
                    'style' => ['3','2','4','7']
                ],
            ]
        );

        $this->add_control(
            'header_2_flat_icon',
            [
                'label'      => esc_html__('Flat Icon', 'crysa-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-location',
                'condition' => [
                    'header_2_icon_style' => '1'
                ]
            ]
        );

        $this->add_control(
            'header_2_icon_image',
            [
                'label'         => esc_html__( 'Add Image Icon','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'header_2_icon_style' => '3'
                ]
            ]
        );

        $this->add_control(
            'header_2_custom_icon',
            [
                'label'         => esc_html__( 'Add Custom Icon','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'header_2_icon_style' => '4'
                ]
            ]
        );    

        
		$this->end_controls_section();


		$this->start_controls_section(
			'design_option',
			[
				'label'			=> esc_html__( 'Design Option','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_header_output = $this->get_settings_for_display();
    $crysa_topbar_info_list = $crysa_header_output['topbar_info_list'];
    if($crysa_header_output['style'] == '1'):
	?>
    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar bg-dark text-light top-style-one">
        <div class="container-fill pr">
            <div class="row align-center">
                <div class="col-xl-7 offset-xl-2 col-lg-8 info">
                    <ul>
                        <?php foreach($crysa_topbar_info_list as $item):?>
                        <li>
                            <?php echo wp_kses_post($item['content'],'crysa_allowed_tags'); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-4 text-right item-flex">
                    
                    <div class="social">
                        <ul>
                             <?php if(!empty($crysa_header_output['topbar_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($crysa_header_output['topbar_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($crysa_header_output['topbar_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_yt_link']['url']);?>">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav small-pad brand-style-bg nav-border attr-border navbar-sticky navbar-default validnavs">

            <?php if($crysa_header_output['search_icon'] == 'yes'):?>
                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container-xl">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->
            <?php endif; ?>

            <div class="container-fill pr">            
                

                <div class="row align-center">
                    <!-- Start Header Navigation -->
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-1">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <?php if(!empty($crysa_header_output['header_logo_light']['url'] || $crysa_header_output['header_logo_dark']['url'] )): ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                                <img src="<?php echo esc_html($crysa_header_output['header_logo_light']['url']);?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <img src="<?php echo esc_html($crysa_header_output['header_logo_dark']['url']);?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-xl-7 col-lg-8 col-md-4 col-sm-4 col-4">
                        <div class="collapse navbar-collapse" id="navbar-menu">

                            <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                                <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php endif;?>

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-times"></i>
                            </button>
                            
                            <?php
                                wp_nav_menu(array(
                                    'menu' => $crysa_header_output['nav_menu'],
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav navbar-right',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                                ));
                            ?>

                        </div>
                    </div>
                    <!-- /.navbar-collapse -->

                    <div class="col-xl-3 col-lg-2 col-md-6 col-sm-7 col-7">
                        <div class="attr-right d-flex justify-content-between">
                            <!-- Start Atribute Navigation -->
                            <div class="attr-nav">
                                <ul>
                                    <?php if($crysa_header_output['search_icon'] == 'yes'):?>
                                        <li class="search"><a href="#"><i class="far fa-search"></i></a></li>
                                    <?php endif;?>

                                    <?php if(!empty($crysa_header_output['header_content'])):?>
                                        <li class="button">
                                            <a href="<?php echo esc_url($crysa_header_output['header_content_url']['url']); ?>"><?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?></a>
                                        </li>
                                    <?php endif;?>

                                </ul>
                            </div>
                            <!-- End Atribute Navigation -->

                        </div>
                        
                    </div>

                </div>
                <!-- Overlay screen for menu -->
                <div class="overlay-screen"></div>
                <!-- End Overlay screen for menu -->

            </div>   
            
        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
	<?php 
    elseif ($crysa_header_output['style'] == '2'):
    ?>

    <!-- Start Header Style Two  -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar  mobile-sidenav nav-border attr-border attr-border-full navbar-sticky navbar-default validnavs navbar-fixed white no-background">

            <?php if($crysa_header_output['search_icon'] == 'yes'):?>
                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container-xl">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->
            <?php endif; ?>

            <div class="container-fill d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if(!empty($crysa_header_output['header_logo_light']['url'] || $crysa_header_output['header_logo_dark']['url'] )): ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                        <img src="<?php echo esc_html($crysa_header_output['header_logo_light']['url']);?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <img src="<?php echo esc_html($crysa_header_output['header_logo_dark']['url']);?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </a>
                    <?php endif;?>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                        <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'menu' => $crysa_header_output['nav_menu'],
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>

                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <?php if(!empty($crysa_header_output['header_content'])):?>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="contact">
                                    <div class="call">
                                        <div class="icon">
                                            <?php 
                                            if(!empty($crysa_header_output['header_2_flat_icon'])):?>
                                                <i class="<?php echo esc_attr($crysa_header_output['header_2_flat_icon']); ?>"></i>
                                            <?php endif;?>
                                            <?php if(!empty($crysa_header_output['header_2_icon_image']['url'])):?>
                                                <img src="<?php echo esc_url($crysa_header_output['header_2_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                            <?php endif;?>
                                            <?php 
                                            if(!empty($crysa_header_output['header_2_custom_icon'])):?>
                                                <i class="<?php echo esc_attr($crysa_header_output['header_2_custom_icon']); ?>"></i>
                                            <?php endif;?>
                                        </div>
                                        <div class="info">
                                            <?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                    <?php endif;?>

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>

    <!-- End Header Style Two  -->

    <?php 
    elseif ($crysa_header_output['style'] == '3'):
    ?>
    <!-- Header Style Three
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar with-bg mobile-sidenav nav-border attr-border attr-border-full navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

            <?php if($crysa_header_output['search_icon'] == 'yes'):?>
                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container-xl">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->
            <?php endif;?>

            <div class="container-fill d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php if(!empty($crysa_header_output['header_logo_light']['url'] )): ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                            <img src="<?php echo esc_html($crysa_header_output['header_logo_light']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </a>
                    <?php endif;?>
                    

                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                        <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'menu' => $crysa_header_output['nav_menu'],
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>


                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <?php if(!empty($crysa_header_output['header_content'])):?>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="contact">
                                    <div class="call">
                                        <div class="icon">
                                            <?php 
                                            if(!empty($crysa_header_output['header_2_flat_icon'])):?>
                                                <i class="<?php echo esc_attr($crysa_header_output['header_2_flat_icon']); ?>"></i>
                                            <?php endif;?>
                                            <?php if(!empty($crysa_header_output['header_2_icon_image']['url'])):?>
                                                <img src="<?php echo esc_url($crysa_header_output['header_2_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                            <?php endif;?>
                                            <?php 
                                            if(!empty($crysa_header_output['header_2_custom_icon'])):?>
                                                <i class="<?php echo esc_attr($crysa_header_output['header_2_custom_icon']); ?>"></i>
                                            <?php endif;?>
                                        </div>
                                        <div class="info">
                                            <?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                    <?php endif;?>
                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>

    <!-- End Header Style Three -->
    <?php 
    elseif ($crysa_header_output['style'] == '4'):
    ?>
    <!-- Start Header Style Four  -->
    <!-- Start Header Top   -->
    <div class="top-bar bg-dark text-light top-style-one">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-8 col-lg-8 info">
                    <ul>
                        <?php foreach($crysa_topbar_info_list as $item):?>
                        <li>
                            <?php echo wp_kses_post($item['content'],'crysa_allowed_tags'); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 text-right item-flex">
                    
                    <div class="social">
                        <ul>
                            <?php if(!empty($crysa_header_output['topbar_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($crysa_header_output['topbar_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($crysa_header_output['topbar_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_header_output['topbar_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_header_output['topbar_yt_link']['url']);?>">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-common navbar-sticky navbar-default validnavs">

            <?php if($crysa_header_output['search_icon'] == 'yes'):?>
                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container-xl">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->
            <?php endif; ?>

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if(!empty($crysa_header_output['header_logo_dark']['url'] )): ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url());?>"><img src="<?php echo esc_html($crysa_header_output['header_logo_dark']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>"></a>
                    <?php endif;?>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                            <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif;?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                        
                        <?php
                            wp_nav_menu(array(
                                'menu' => $crysa_header_output['nav_menu'],
                                'container'       => 'ul',
                                'menu_class'      => 'nav navbar-nav navbar-right',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                                'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                            ));
                        ?>

                    </div><!-- /.navbar-collapse -->

                    <div class="attr-right">
                        <?php if(!empty($crysa_header_output['header_content'])): ?>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="contact">
                                    <div class="call">
                                        <div class="icon">
                                            <?php 
                                            if(!empty($crysa_header_output['header_2_flat_icon'])):?>
                                                <i class="<?php echo esc_attr($crysa_header_output['header_2_flat_icon']); ?>"></i>
                                            <?php endif;?>
                                            <?php if(!empty($crysa_header_output['header_2_icon_image']['url'])):?>
                                                <img src="<?php echo esc_url($crysa_header_output['header_2_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                            <?php endif;?>
                                            <?php 
                                            if(!empty($crysa_header_output['header_2_custom_icon'])):?>
                                                <i class="<?php echo esc_attr($crysa_header_output['header_2_custom_icon']); ?>"></i>
                                            <?php endif;?>
                                        </div>
                                        <div class="info">
                                            <?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                        <?php endif; ?>
                    </div>

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>

    <!-- End Header Style Four -->
    <?php 
    elseif ($crysa_header_output['style'] == '5'):
    ?>
    <!-- Start Header Style Five 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed white no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php if(!empty($crysa_header_output['header_logo_light']['url'] || $crysa_header_output['header_logo_dark']['url'] )): ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                            <img src="<?php echo esc_html($crysa_header_output['header_logo_light']['url']);?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <img src="<?php echo esc_html($crysa_header_output['header_logo_dark']['url']);?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </a>
                    <?php endif;?>

                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                        <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'menu' => $crysa_header_output['nav_menu'],
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>

                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <?php if(!empty($crysa_header_output['header_content'])):?>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="button">
                                    <?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                    <?php endif;?>
                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Five -->

    <?php 
    elseif ($crysa_header_output['style'] == '6'):
    ?>
    <!-- Start Header Style Six
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php if(!empty($crysa_header_output['header_logo_dark']['url'] )): ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                            <img src="<?php echo esc_html($crysa_header_output['header_logo_dark']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </a>
                    <?php endif;?>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                        <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" lt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'menu' => $crysa_header_output['nav_menu'],
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>

                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <?php if(!empty($crysa_header_output['header_content'])):?>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="button">
                                    <?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                    <?php endif;?>
                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Six -->
    <?php 
    elseif ($crysa_header_output['style'] == '7'):
    ?>
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-common navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if(!empty($crysa_header_output['header_logo_dark']['url'] )): ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                            <img src="<?php echo esc_html($crysa_header_output['header_logo_dark']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </a>
                    <?php endif;?>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php if(!empty($crysa_header_output['mobile_logo']['url'])): ?>
                        <img src="<?php echo esc_html($crysa_header_output['mobile_logo']['url']);?>" lt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif;?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'menu' => $crysa_header_output['nav_menu'],
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>
                </div><!-- /.navbar-collapse -->

                <div class="attr-right">

                    <?php if(!empty($crysa_header_output['header_content'])):?>
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="contact">
                                    <div class="call">
                                        <div class="icon">
                                            <i class="fas fa-comments-alt-dollar"></i>
                                        </div>
                                        <div class="info">
                                            <?php echo wp_kses_post($crysa_header_output['header_content'],'crysa_allowed_tags'); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                    <?php endif;?>

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <?php
    endif;
	}
}