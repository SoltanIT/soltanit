<?php
	/**
	* Elementor Social Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Social_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Social widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_social';
	}

	/**
	* Get widget title.
	*
	* Retrieve Social widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Social', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Faq widget icon.
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
	* Retrieve the list of categories the Faq widget belongs to.
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
			'socail_content',
			[
				'label'		=> esc_html__( 'Set Social Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
            'social_fb_link',
            [
                'label'         => esc_html__( 'Facebook Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'social_tw_link',
            [
                'label'         => esc_html__( 'Twitter Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'social_le_link',
            [
                'label'         => esc_html__( 'Linkedin Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                
            ]
        );
        $this->add_control(
            'social_in_link',
            [
                'label'         => esc_html__( 'Instagram Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'social_dr_link',
            [
                'label'         => esc_html__( 'Dribbble Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'social_yt_link',
            [
                'label'         => esc_html__( 'Youtube Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_social_output = $this->get_settings_for_display();

	?>

    <!-- Start Social
    ============================================= -->
    <ul class="social">
    	<?php if(!empty($crysa_social_output['social_fb_link']['url'])):?>
        <li>
            <a href="<?php echo esc_url($crysa_social_output['social_fb_link']['url']);?>"><i class="fab fa-facebook-f"></i></a>
        </li>
    	<?php endif;?>
    	<?php if(!empty($crysa_social_output['social_tw_link']['url'])):?>
        <li>
            <a href="<?php echo esc_url($crysa_social_output['social_tw_link']['url']);?>"><i class="fab fa-twitter"></i></a>
        </li>
        <?php endif;?>
        <?php if(!empty($crysa_social_output['social_le_link']['url'])):?>
        <li>
            <a href="<?php echo esc_url($crysa_social_output['social_le_link']['url']);?>"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <?php endif;?>
        <?php if(!empty($crysa_social_output['social_yt_link']['url'])):?>
        <li>
            <a href="<?php echo esc_url($crysa_social_output['social_yt_link']['url']);?>"><i class="fab fa-youtube"></i></a>
        </li>
        <?php endif;?>
        <?php if(!empty($crysa_social_output['social_in_link']['url'])):?>
        <li>
            <a href="<?php echo esc_url($crysa_social_output['social_in_link']['url']);?>"><i class="fab fa-instagram"></i></a>
        </li>
        <?php endif;?>
        <?php if(!empty($crysa_social_output['social_dr_link']['url'])):?>
        <li>
            <a href="<?php echo esc_url($crysa_social_output['social_dr_link']['url']);?>"><i class="fab fa-dribbble"></i></a>
        </li>
        <?php endif;?>
    </ul>
    <!-- End Social Area -->
	<?php 
	}
}