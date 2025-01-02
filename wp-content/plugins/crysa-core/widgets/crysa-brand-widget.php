<?php
	/**
	* Elementor Quick Contact Content Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Brand_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Quick Contact Content widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_brand';
	}

	/**
	* Get widget title.
	*
	* Retrieve Quick Contact Content widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Brand', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Quick Contact Content widget icon.
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
	* Retrieve the list of categories the Quick Contact Content widget belongs to.
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
			'crysa_brand_content',
			[
				'label'		=> esc_html__( 'Set Brand Content','crysa-core' ),
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
		$this->add_control(
			'brand_heading',
			[
				'label' 		=> esc_html__( 'Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'brand_image',
			[
				'label'			=> esc_html__( 'Add Image Icon','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'brand_image_list',
			[
				'label' 	=> esc_html__( 'Brand', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Brand Image', 'crysa-core' ),
					],
				],
			]
		);
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'brand_style_option',
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
					'{{WRAPPER}} .brand-style-five h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .brand-style-five h3',
			]
		);

		$this->add_control(
			'highligted_title_option',
			[
				'label' 		=> esc_html__( 'Highligted Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'highligted_title_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .brand-style-five h3 strong' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'highligted_title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .brand-style-five h3 strong',
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_brand_content = $this->get_settings_for_display();
	$brand_list = $crysa_brand_content['brand_image_list'];
	?>

	<?php if($crysa_brand_content['style'] == '1'):?>
	    <!-- Start Brand 
	    ============================================= -->
	    <div class="brand-area">
	        <div class="container">
	            <div class="brand-items pt-80 pb-80">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="brand-carousel swiper">
	                            <!-- Additional required wrapper -->
	                            <div class="swiper-wrapper">
	                            	<?php foreach($brand_list as $single_brand):?>
	                                <!-- Single Item -->
	                                <div class="swiper-slide">
	                                    <img src="<?php echo esc_url($single_brand['brand_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                                </div>
	                                <!-- End Single Item -->
	                                <?php endforeach;?>
	                            </div>
	    
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End Brand -->
	<?php elseif($crysa_brand_content['style'] == '2'):?>
	<!-- Start Brand 
    ============================================= -->
    <div class="brand-area">
        <div class="container">
            <div class="brand-items pb-120">
                <div class="row">
                    <div class="col-lg-8 offset-lg-4">
                        <div class="brand3col swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php foreach($brand_list as $single_brand):?>
                                <!-- Single Item -->
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($single_brand['brand_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                </div>
                                <!-- End Single Item -->
                                <?php endforeach;?>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand -->
    <?php elseif($crysa_brand_content['style'] == '3'):?>
    <!-- Start Brand style three
    ============================================= -->
    <div class="brand-style-five-area default-padding-top">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-4 brand-style-five">
                    <h3><?php echo htmlspecialchars_decode(esc_html($crysa_brand_content['brand_heading']));?></h3>
                </div>
                <div class="col-lg-8 brand-style-five">
                    <div class="brand4col swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        	<?php foreach($brand_list as $single_brand):?>
	                            <!-- Single Item -->
	                            <div class="swiper-slide">
	                                <img src="<?php echo esc_url($single_brand['brand_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                            </div>
	                            <!-- End Single Item -->
                             <?php endforeach;?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand style three -->
	<?php endif;?>
	<?php
	}
}