<?php
	/**
	* Elementor Service Details Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Service_Details_Feature_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Service Details widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_service_details';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service Details widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Service Details Feature', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service Details widget icon.
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
		return [ 'crysa-elements'];
	}

	public function get_script_depends() {
        return array('main');
    }

	// Add The Input For User
	protected function register_controls(){

		$this->start_controls_section(
			'services_details_content',
			[
				'label'		=> esc_html__( 'Set Service Details Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading', [
				'label' 		=> esc_html__( 'Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
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
			'content', [
				'label' 		=> esc_html__( 'Content', 'crysa-core' ),
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
				],
			]
		);
		$repeater->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'crysa-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-laptop',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);

		$repeater->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'crysa-core' ),
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
			'service_details_list',
			[
				'label' 	=> esc_html__( 'Service Details', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service Details', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$crysa_service_details_output = $this->get_settings_for_display();
	$service_details = $crysa_service_details_output['service_details_list'];

	?>

    <div class="services-more">
	    <h2><?php echo esc_html($crysa_service_details_output['heading']);?></h2>
	    <div class="row">
	    	<?php
        		foreach($service_details as $service_detail):
        	?>
	        <div class="col-lg-6 col-md-6">
	            <div class="item">
	                <?php if(!empty($service_detail['flat_icon_one'])):?>
                        <i class="<?php echo esc_attr($service_detail['flat_icon_one']); ?>"></i>
                    <?php endif;?>
                    <?php if(!empty($service_detail['icon_image_one'])):?>
                        <img src="<?php echo esc_url($service_detail['icon_image_one']['url']); ?>">
                    <?php endif;?>
	                <h4><a href="<?php echo esc_url($service_detail['service_url']['url']);?>"><?php echo esc_html($service_detail['title']);?></a></h4>
	                <p>
	                   <?php echo esc_html($service_detail['content']);?>
	                </p>
	            </div>
	        </div>
	        <?php 
				endforeach;
			?>
	    </div>
	</div>

	<?php 
	}
}