<?php
    /**
    * Elementor Team Single Widget.
    *
    * Elementor widget that inserts an embbedable content into the page, from any given URL.
    *
    * @since 1.0.0
    */
class Elementor_Team_Single_Widget extends \Elementor\Widget_Base {

    /**
    * Get widget name.
    *
    * Retrieve Service widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'crysa_team_single';
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
        return esc_html__( 'Team Single', 'crysa-core' );
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
        return [ 'crysa-elements'];
    }


    // Add The Input For User
    protected function register_controls(){
        

        $this->start_controls_section(
            'team_single_member_content',
            [
                'label'     => esc_html__( 'Set Member Content','crysa-core' ),
                'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'member_img',
            [
                'label'     => esc_html__( 'Image', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'member_name', [
                'label'         => esc_html__( 'Name', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'member_designation', [
                'label'         => esc_html__( 'Designation', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'member_content', [
                'label'         => esc_html__( 'Content', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_title', [
                'label'         => esc_html__( 'Title', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'contact_info', [
                'label'         => esc_html__( 'Information', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_info_link',
            [
                'label'         => esc_html__( 'Contact URL', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'crysa-core' ),
                'show_external' => true,
            ]
        );
        $repeater->add_control(
            'icon_style',
            [
                'label'     => esc_html__( 'Icon Style', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1'     => esc_html__( 'Flaticon', 'crysa-core' ),
                    '3'     => esc_html__( 'Icon Image', 'crysa-core' ),
                    '2'     => esc_html__( 'Custom Icon', 'crysa-core' ),
                ],
            ]
        );

        $repeater->add_control(
            'flat_icon',
            [
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
        );

        $repeater->add_control(
            'custom_icon', [
                'label'         => esc_html__( 'Custom Icon', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition' => [
                    'icon_style' => '2'
                ]
            ]
        );


        $repeater->add_control(
            'icon_image',
            [
                'label'         => esc_html__( 'Add Image Icon','crysa-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'icon_style' => '3'
                ]
            ]
        );
        
        $this->add_control(
            'team_single_contacts',
            [
                'label'     => esc_html__( 'Contact Information', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Contact Information', 'crysa-core' ),
                    ],
                ],
                'title_field' => '{{{ contact_title }}}',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'         => esc_html__( 'Button Text', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'crysa-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );
        $this->add_control(
            'team_single_sc_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
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
        $this->start_controls_section(
            'team_single_experience_content',
            [
                'label'     => esc_html__( 'Set Member Experience Content','crysa-core' ),
                'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'member_experience_content', [
                'label'         => esc_html__( 'Experience Content', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'expertise_title', [
                'label'         => esc_html__( 'Title', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'expertise_number', [
                'label'         => esc_html__( 'Number', 'crysa-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        
        $this->add_control(
            'expertise_list',
            [
                'label'     => esc_html__( 'Experience', 'crysa-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Experience', 'crysa-core' ),
                    ],
                ],
                'title_field' => '{{{ expertise_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'teamsingle_style',
            [
                'label'         => esc_html__( 'Heading Style','crysa-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        $this->end_controls_section();

    }

    // Output For User
    protected function render(){
    $crysa_team_single_output = $this->get_settings_for_display();
    $crysa_experices_list = $crysa_team_single_output['expertise_list'];
    $team_single_contacts = $crysa_team_single_output['team_single_contacts'];
    ?>
  
    <!-- Start Team Single Area
    ============================================= -->
    <div class="team-single-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 pr-35 pr-md-15 pr-xs-15 team-single-info">
                    <div class="thumb">
                         <img src="<?php echo esc_url($crysa_team_single_output['member_img']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </div>
                </div>
                <div class="col-lg-7 team-single-info">
                    <h2><?php echo esc_html($crysa_team_single_output['member_name']);?></h2>
                    <span><?php echo esc_html($crysa_team_single_output['member_designation']);?></span>
                    <p><?php echo esc_html($crysa_team_single_output['member_content']);?></p>
                    <div class="list">
                        <ul>
                            <?php foreach($team_single_contacts as $team_single_contact): ?>
                                <li>
                                    <strong> <?php if(!empty($team_single_contact['flat_icon'])):?>
                                        <i class="<?php echo esc_attr($team_single_contact['flat_icon']); ?>"></i>
                                    <?php endif;?>
                                    <?php if(!empty($team_single_contact['icon_image'])):?>
                                        <img src="<?php echo esc_url($team_single_contact['icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php endif;?>
                                    <?php 
                                    if(!empty($team_single_contact['custom_icon'])):?>
                                        <i class="<?php echo esc_attr($team_single_contact['custom_icon']); ?>"></i>
                                    <?php endif;?><?php echo esc_html($team_single_contact['contact_title']); ?></strong>
                                    <a href="<?php echo esc_url($team_single_contact['contact_info_link']['url']); ?>"><?php echo esc_html($team_single_contact['contact_info']); ?></a>
                                </li>
                            <?php endforeach;?>
                            
                        </ul>
                    </div>
                    <div class="social">
                        <a class="btn btn-theme secondary effect btn-sm" href="<?php echo esc_url($crysa_team_single_output['button_url']['url']);?>"><?php echo esc_html($crysa_team_single_output['button_text']);?></a>
                        <?php if(!empty($crysa_team_single_output['fb_link']['url'] || $crysa_team_single_output['tw_link']['url'] || $crysa_team_single_output['yt_link']['url'] || $crysa_team_single_output['le_link']['url'] || $crysa_team_single_output['dr_link']['url'] || $crysa_team_single_output['in_link']['url'] || $crysa_team_single_output['be_link']['url'])):?>
                        <div class="share-link">
                            <i class="fas fa-share-alt"></i>
                            <ul>
                                    <?php if(!empty($crysa_team_single_output['fb_link']['url'])):?>
                                    <li class="facebook">
                                        <a href="<?php echo esc_url($crysa_team_single_output['fb_link']['url']);?>">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($crysa_team_single_output['tw_link']['url'])):?>
                                    <li class="twitter">
                                        <a href="<?php echo esc_url($crysa_team_single_output['tw_link']['url']);?>">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($crysa_team_single_output['yt_link']['url'])):?>
                                    <li class="youtube">
                                        <a href="<?php echo esc_url($crysa_team_single_output['yt_link']['url']);?>">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($crysa_team_single_output['le_link']['url'])):?>
                                     <li class="linkedin">
                                        <a href="<?php echo esc_url($crysa_team_single_output['le_link']['url']);?>">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($crysa_team_single_output['dr_link']['url'])):?>
                                     <li class="dribbble">
                                        <a href="<?php echo esc_url($crysa_team_single_output['dr_link']['url']);?>">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($crysa_team_single_output['in_link']['url'])):?>
                                     <li class="instagram">
                                        <a href="<?php echo esc_url($crysa_team_single_output['in_link']['url']);?>">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($crysa_team_single_output['be_link']['url'])):?>
                                     <li class="behance">
                                        <a href="<?php echo esc_url($crysa_team_single_output['be_link']['url']);?>">
                                            <i class="fab fa-behance"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Single Area -->
    <!-- End Team Single Bottom Info -->
    <div class="team-single-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="team-single-bottom-info col-lg-6 pr-35 pr-md-15 pr-xs-15">
                    <?php echo htmlspecialchars_decode(esc_html($crysa_team_single_output['member_experience_content'])); ?>
                </div>
                <div class="team-single-bottom-info col-lg-6 mt-md-50 mt-xs-40">
                    <div class="skill-items">
                        <!-- Progress Bar Start -->
                        <?php foreach($crysa_experices_list as $crysa_experice): ?>
                        <div class="progress-box">
                            <h5><?php echo esc_html($crysa_experice['expertise_title']); ?></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo esc_attr__($crysa_experice['expertise_number']); ?>">
                                     <span><?php echo esc_html($crysa_experice['expertise_number']); ?><?php echo esc_html__("%",'crysa')?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- End Progressbar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Single Bottom Info -->
    <?php 
    }
}