<?php
	/**
	* Elementor Contact Us Form Form Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Contact_Us_Form_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Contact Us Form Form widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_contact_us_form';
	}

	/**
	* Get widget title.
	*
	* Retrieve Contact Us Form widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Contact Us Form', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Contact Us Form Form widget icon.
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
	* Retrieve the list of categories the Contact Us Form Form widget belongs to.
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
			'crysa_contact_us_form_content',
			[
				'label'		=> esc_html__( 'Set Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'contact_us_form_sc', [
				'label' 		=> esc_html__( 'Contact Form Shortcode', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'contact_us_map', [
				'label' 		=> esc_html__( 'Map Location', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		
		$this->add_control(
			'right_image',
			[
				'label'			=> esc_html__( 'Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_contact_us_form = $this->get_settings_for_display();
	?>

    <!-- Start Contact Form 
    ============================================= -->
    <div id="contact" class="contact-form-area default-padding bg-gray overflow-hidden">
        <!-- Shape -->
        <div class="shape-right-bottom-large" style="background-image: url(<?php echo esc_url($crysa_contact_us_form['right_image']['url']);?>)"></div>
        <!-- Shape -->
        <div class="google-maps">
            <?php echo htmlspecialchars_decode (esc_html($crysa_contact_us_form['contact_us_map']));?>
        </div>
        <div class="container">
            <!-- Contact Form -->
            <div class="row">
                <div class="col-xl-6 offset-xl-6 col-lg-7 offset-lg-5">
                    <div class="form">
                        <h4 class="sub-heading"><?php echo htmlspecialchars_decode (esc_html($crysa_contact_us_form['subtitle']));?></h4>
                        <h2 class="heading"><?php echo htmlspecialchars_decode (esc_html($crysa_contact_us_form['title']));?></h2>
                       <?php echo do_shortcode($crysa_contact_us_form['contact_us_form_sc']);?>
                    </div>
                </div>
            </div>
            <!-- End Contact Form -->
        </div>
    </div>
    <!-- End Contact Form -->
	<?php
	}
}