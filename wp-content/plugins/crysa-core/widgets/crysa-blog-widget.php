<?php
	/**
	* Elementor Blog Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Blog_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Blog widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'crysa_blog';
	}

	/**
	* Get widget title.
	*
	* Retrieve Blog widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Blog', 'crysa-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Blog widget icon.
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
	* Retrieve the list of categories the Blog widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'crysa-elements' ];
	}

	
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
		$this->add_control(
			'section_description',
			[
				'label' 		=> esc_html__( 'Section Description', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'crysa-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'blog_section_content',
			[
				'label'		=> esc_html__( 'Set Content','crysa-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_from',
			[
				'label' 		=> esc_html__( 'Post From', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'all',
				'options' 		=> [
					'all'  			=> esc_html__( 'All', 'crysa-core' ),
					'categories' 	=> esc_html__( 'Categories', 'crysa-core' ),
				],
			]
		);
		$this->add_control(
			'post_limit',
			[
				'label' 		=> esc_html__( 'Post Limit', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__( 'Only Number Work. Like 4 or 6', 'crysa-core' ),
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> esc_html__( 'Order', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'ASC'  			=> esc_html__( 'Ascending', 'crysa-core' ),
					'DESC' 			=> esc_html__( 'Descending', 'crysa-core' ),
				],
			]
		);
		$this->add_control(
			'order_by',
			[
				'label' 		=> esc_html__( 'Order By', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'date',
				'options' 		=> [
					'none'  		=> esc_html__( 'None', 'crysa-core' ),
					'type' 			=> esc_html__( 'Type', 'crysa-core' ),
					'title' 		=> esc_html__( 'Title', 'crysa-core' ),
					'name' 			=> esc_html__( 'Name', 'crysa-core' ),
					'date' 			=> esc_html__( 'Date', 'crysa-core' ),
				],
			]
		);
		$this->add_control(
			'content_length',
			[
				'label' 		=> esc_html__( 'Content Length', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '16',
				'placeholder' 	=> esc_html__( 'Type Content Length', 'crysa-core' ),
			]
		);

		$this->add_control(
			'read_more_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> 'Read More',
				'placeholder' 	=> esc_html__( 'Type Button Text', 'crysa-core' ),
			]
		);

		$this->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'crysa-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'crysa-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'crysa-core' ),
					'4' 	=> esc_html__( 'Custom Icon', 'crysa-core' ),
				],
			]
		);
		$this->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'crysa-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => crysa_flaticons(),
                'include'    => crysa_include_flaticons(),
                'default'    => 'flaticon-location',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);
		$this->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$this->add_control(
			'custom_icon',
			[
				'label'			=> esc_html__( 'Custom Icon','crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'condition' => [
                    'icon_style' => '4'
                ]
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'blog_section_heading_style',
			[
				'label'			=> esc_html__( 'Section Heading Style','crysa-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_option',
			[
				'label' 		=> esc_html__( 'Section Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'crysa-core' ),
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
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading .title',
			]
		);

		$this->add_control(
			'section_subtitle_option',
			[
				'label' 		=> esc_html__( 'Sub-Title Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_subtitle_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .site-heading .sub-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'blog_design_option',
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
					'{{WRAPPER}} .blog-area.grid-style .info h4 a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> esc_html__( 'Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .blog-area.grid-style .info h4 a',
			]
		);

		$this->add_control(
			'content_option',
			[
				'label' 		=> esc_html__( 'Content Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' 		=> esc_html__( 'Content Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-area.grid-style .info p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .blog-area.grid-style .info p',
			]
		);

		$this->add_control(
			'date_option',
			[
				'label' 		=> esc_html__( 'Date Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-area .item .info .meta ul li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'date_typography',
				'label' 		=> esc_html__( 'Check List Title Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .blog-area .item .info .meta ul li',
			]
		);

		$this->add_control(
			'author_name_option',
			[
				'label' 		=> esc_html__( 'Author Name Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'author_name_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-area .item .info .meta ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'author_name_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .blog-area .item .info .meta ul li a',
			]
		);

		$this->add_control(
			'read_more_option',
			[
				'label' 		=> esc_html__( 'Read More Options', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::HEADING,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'read_more_color',
			[
				'label' 		=> esc_html__( 'Color', 'crysa-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-simple' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 			=> 'read_more_typography',
				'label' 		=> esc_html__( 'Typography', 'crysa-core' ),
				'selector' 		=> '{{WRAPPER}} .btn-simple',
			]
		);

		
		$this->end_controls_section();
		
	}


	protected function render(){
		
		$crysa_blog_output = $this->get_settings_for_display();

		global $post;
		$con_length = $crysa_blog_output['content_length'];


		$blog = array(
		   'post_type'         => 'post',
		   'posts_per_page'    => esc_attr( $crysa_blog_output['post_limit'] ),
		   'order'             => esc_attr( $crysa_blog_output['order'] ),
		   'orderby'           => esc_attr( $crysa_blog_output['order_by'] ),
	   );
	    $crysa_blog = new WP_Query( $blog );
	?>
    <!-- Start Blog -->
    <div class="blog-area grid-style">
    	<?php if($crysa_blog_output['section_show'] == 'yes'): ?>
        <div class="container">
	        <div class="container-full">
	            <div class="row">
	                <div class="col-lg-8 offset-lg-2">
	                    <div class="site-heading text-center">
	                    	<?php if(!empty($crysa_blog_output['section_subtitle'])):?>
	                        	<h4 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($crysa_blog_output['section_subtitle']));?></h4>
	                        <?php endif;?>
	                        <?php if(!empty($crysa_blog_output['section_title'])):?>
	                        	<h2 class="title"><?php echo htmlspecialchars_decode(esc_html($crysa_blog_output['section_title']));?></h2>
	                        <?php endif;?>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <?php 
	            		while ( $crysa_blog->have_posts()) :
	       				$crysa_blog->the_post();
	       				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'crysa_800x600'); 
	       				
	       			?>
                    <!-- Single Itme -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                        	<?php if(!empty($full_image_url[0])):?>
	                            <div class="thumb">
	                                <img src="<?php echo esc_url($full_image_url[0]);?>" alt="Thumb">
	                            </div>
                            <?php endif;?>
                            <div class="info">
                                <div class="meta">
                                   <ul>
									    <li>
									        <i class="fas fa-calendar-alt"></i><?php the_time('F j, Y');?>
									    </li>
									    <li>
									        <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>">
									            <i class="fas fa-user-circle"></i>
									            <span><?php echo esc_html(get_the_author());?></span>
									        </a>
									    </li>
									</ul>
                                </div>
                                <h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></h4>
                                <p>
                                    <?php echo esc_html(wp_trim_words(get_the_content(),$crysa_blog_output['content_length'],'')); ?>
                                </p>
                                <a href="<?php echo esc_url(get_the_permalink());?>" class="btn-simple"><?php echo esc_html($crysa_blog_output['read_more_button_text']); ?> <?php if(!empty($crysa_blog_output['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($crysa_blog_output['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($crysa_blog_output['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($crysa_blog_output['icon_image_one']['url']); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($crysa_blog_output['custom_icon'])):?>
                                        <i class="<?php echo esc_attr($crysa_blog_output['custom_icon']); ?>"></i>
		                            <?php endif;?> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->
  	
    <?php 
	}
}
