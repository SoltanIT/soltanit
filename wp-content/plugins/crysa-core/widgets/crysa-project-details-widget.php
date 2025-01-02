<?php
	/**
	* Elementor Crysa Project Details Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Project_Details_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Crysa Project Details widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_project_details';
	}

	/**
	* Get widget title.
	*
	* Retrieve Crysa Project Details widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Project Details', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Crysa Project Details widget icon.
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
	* Retrieve the list of categories the Crysa Project Details widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'crysa-elements'];
	}


	// Add The Input For User
	protected function register_controls(){
		

		$this->start_controls_section(
			'project_info_content',
			[
				'label'		=> esc_html__( 'Set Project Info Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'left_content', [
				'label' 		=> esc_html__( 'Left Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_title', [
				'label' 		=> esc_html__( 'Right Title', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'			=>'2'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'info_heading', [
				'label' 		=> esc_html__( 'Info Heading', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'			=>'2'
			]
		);
		$repeater->add_control(
			'info_content', [
				'label' 		=> esc_html__( 'Info Content', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'			=>'3'
			]
		);
		
		$this->add_control(
			'info_list',
			[
				'label' 	=> esc_html__( 'Info List', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Info List', 'crysa-core' ),
					],
				],
				'title_field' => '{{{ info_heading }}}',
			]
		);
		$this->add_control(
            'fb_link',
            [
                'label'         => esc_html__( 'Facebook Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'tw_link',
            [
                'label'         => esc_html__( 'Twitter Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'le_link',
            [
                'label'         => esc_html__( 'Linkedin Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'in_link',
            [
                'label'         => esc_html__( 'Instagram Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'dr_link',
            [
                'label'         => esc_html__( 'Dribbble Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'be_link',
            [
                'label'         => esc_html__( 'Behance Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'yt_link',
            [
                'label'         => esc_html__( 'Youtube Url','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$crysa_project_info_output = $this->get_settings_for_display();
	$crysa_info_list = $crysa_project_info_output['info_list'];
	?>
	<div class="top-info">
        <div class="row">
            <div class="col-xl-8 col-lg-7 pr-35 pr-md-15 pr-xs-15 left-info">
                <?php echo htmlspecialchars_decode(esc_html($crysa_project_info_output['left_content'],'crysa-core')); ?>
            </div>
            <div class="col-xl-4 col-lg-5 right-info">
                <div class="project-info mt-md-50 mt-xs-40">
                    <h3><?php echo esc_html($crysa_project_info_output['right_title']);?></h3>
                    <ul>
                    	<?php foreach ($crysa_info_list as $single_info):?>
	                        <li>
	                           <?php echo esc_html($single_info['info_heading']);?><span><?php echo esc_html($single_info['info_content']);?></span>
	                        </li>
                    	<?php endforeach;?>
                    </ul>

                    <ul class="social">
                        <?php if(!empty($crysa_project_info_output['fb_link']['url'])):?>
                        <li class="facebook">
                            <a href="<?php echo esc_url($crysa_project_info_output['fb_link']['url']);?>">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_project_info_output['tw_link']['url'])):?>
                        <li class="twitter">
                            <a href="<?php echo esc_url($crysa_project_info_output['tw_link']['url']);?>">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_project_info_output['yt_link']['url'])):?>
                        <li class="youtube">
                            <a href="<?php echo esc_url($crysa_project_info_output['yt_link']['url']);?>">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_project_info_output['le_link']['url'])):?>
                         <li class="linkedin">
                            <a href="<?php echo esc_url($crysa_project_info_output['le_link']['url']);?>">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_project_info_output['dr_link']['url'])):?>
                         <li class="dribbble">
                            <a href="<?php echo esc_url($crysa_project_info_output['dr_link']['url']);?>">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_project_info_output['in_link']['url'])):?>
                         <li class="instagram">
                            <a href="<?php echo esc_url($crysa_project_info_output['in_link']['url']);?>">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_project_info_output['be_link']['url'])):?>
                         <li class="behance">
                            <a href="<?php echo esc_url($crysa_project_info_output['be_link']['url']);?>">
                                <i class="fab fa-behance"></i>
                            </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	<?php 
	}
}