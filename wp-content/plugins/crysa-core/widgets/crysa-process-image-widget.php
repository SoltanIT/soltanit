<?php
	/**
	* Elementor Process Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Process_IMG_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Process widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_process_img';
	}

	/**
	* Get widget title.
	*
	* Retrieve Process widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Process Image', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Process widget icon.
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
	* Retrieve the list of categories the Process widget belongs to.
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
			'process_img_content',
			[
				'label'		=> esc_html__( 'Set Process Content','crysa-core' ),
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
					'2' 	=> esc_html__( 'Style Two', 'crysa-core' )
				],
			]
		);
		$this->add_control(
			'process_img',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_process_img_output = $this->get_settings_for_display();
	if($crysa_process_img_output['style'] == '1'):
	?>
	<!-- Start Processs Image
    ============================================= -->
    <div class="process-style-one">
        <div class="thumb">
            <img src="<?php echo esc_url($crysa_process_img_output['process_img']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
    </div>
    <!-- End Processs Image -->
    <?php elseif($crysa_process_img_output['style'] == '2'):?>
    <!-- Start Processs Image
    ============================================= -->
    <div class="processs-style-three">
        <div class="thumb">
            <img src="<?php echo esc_url($crysa_process_img_output['process_img']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
    </div>
    <!-- End Processs Image -->
	<?php
	endif;
	}
}