<?php
/*
crysa own hook
 */
if(!function_exists('crysa_main_menu')){
    function crysa_main_menu(){
        global $crysa_option; 
        $header_menu=get_post_meta( get_the_id(), 'header_style', true);
        if( class_exists( 'ReduxFramework' )){
            $blog_header_style_one = (get_post_type() === 'post' && $crysa_option['header_style'] == '1');
            $blog_header_style_two = (get_post_type() === 'post' && $crysa_option['header_style'] == '2');
            $blog_header_style_three = (get_post_type() === 'post' && $crysa_option['header_style'] == '3');
            $blog_header_style_four = (get_post_type() === 'post' && $crysa_option['header_style'] == '4');
            $blog_header_style_five = (get_post_type() === 'post' && $crysa_option['header_style'] == '5');
            $blog_header_style_six = (get_post_type() === 'post' && $crysa_option['header_style'] == '6');
            $blog_header_style_seven = (get_post_type() === 'post' && $crysa_option['header_style'] == '7');
        }else{
            $blog_header_style_one = '0';
            $blog_header_style_two = '0';
            $blog_header_style_three = '0';
            $blog_header_style_four = '0';
            $blog_header_style_five = '0';
            $blog_header_style_six = '0';
            $blog_header_style_seven = '0';
        }

    if ($header_menu == '1' || $blog_header_style_one) { ?>
    <!-- Start Header Style One -->
    <div class="top-bar bg-dark text-light top-style-one">
        <div class="container-fill pr">
            <div class="row align-center">
                <div class="col-xl-7 offset-xl-2 col-lg-8 info">
                    <ul>
                        <?php if(!empty($crysa_option['header_info'])):?>
                            <li>
                                <?php echo html_entity_decode(esc_html($crysa_option['header_info'])); ?>
                            </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_option['header_working_hrs'])):?>
                            <li>
                                <i class="fal fa-clock"></i> <span><?php echo html_entity_decode(esc_html($crysa_option['header_working_hrs'])); ?></span>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-4 text-right item-flex">
                    
                    <div class="social">
                        <ul>
                            <?php if(!empty($crysa_option['header_fb_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_fb_url']);?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_twitter_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_twitter_url']);?>">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_linkdin_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_linkdin_url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_pinterest_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_pinterest_url']);?>">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_dribbble_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_dribbble_url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_behance_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_behance_url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_instagram_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_instagram_url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_youtube_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_youtube_url']);?>">
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
    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav small-pad brand-style-bg nav-border attr-border navbar-sticky navbar-default validnavs">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container-xl">
                    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input name="s" type="text" class="form-control"  value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search','crysa'); ?>">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container-fill pr">            
                

                <div class="row align-center">
                    <!-- Start Header Navigation -->
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-1">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                               <?php 
                                    global $crysa_option;
                                    if(!empty($crysa_option['upload_header_logo'])): ?>
                                    <img src="<?php echo esc_url($crysa_option['upload_header_logo']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <?php endif; ?>
                                <?php 
                                    global $crysa_option;
                                    if(!empty($crysa_option['upload_header_logo_light'])): ?>
                                    <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() .'/assets/img/logo-light.svg' ;?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-xl-7 col-lg-6 col-md-4 col-sm-4 col-4">
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <?php 
                                global $crysa_option;
                                if(!empty($crysa_option['upload_header_logo_light'])): ?>
                                <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>"  alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php endif; ?>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-times"></i>
                            </button>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'primary',
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

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-7 col-7">
                        <div class="attr-right d-flex justify-content-between">
                            <!-- Start Atribute Navigation -->
                            <div class="attr-nav">
                                <ul>
                                    <li class="search"><a href="#"><i class="far fa-search"></i></a></li>
                                    <?php if(!empty($crysa_option['header_quote_text'])): ?>
                                    <li class="button">
                                        <a href="<?php echo esc_url($crysa_option['header_quote_url']);?>"><?php global $crysa_option; echo esc_html($crysa_option['header_quote_text']); ?></a>
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
    <!-- End Header Style One -->

    <?php }elseif ( $header_menu == '2' || $blog_header_style_two){?>
    <!-- Start Header Style Two -->    
    <header>
        <!-- Start Navigation -->
        <nav class="navbar  mobile-sidenav nav-border attr-border attr-border-full navbar-sticky navbar-default validnavs navbar-fixed white no-background">

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

            <div class="container-fill d-flex justify-content-between align-items-center">            
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo-light.svg' ;?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php 
                        global $crysa_option;
                        if(!empty($crysa_option['upload_header_logo_light'])): ?>
                        <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>"  alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>
                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="contact">
                                <div class="call">
                                    <?php if(!empty($crysa_option['header_quote_icon'])): ?>
                                        <div class="icon">
                                            <i class="<?php echo esc_attr($crysa_option['header_quote_icon']);?>"></i>
                                        </div>
                                    <?php endif;?>
                                    <div class="info">
                                        <?php if(!empty($crysa_option['header_contact_text'])): ?>
                                        <p><?php global $crysa_option; echo esc_html($crysa_option['header_contact_text']); ?></p>
                                        <?php endif;?>
                                        <?php if(!empty($crysa_option['header_contact_mail'])): ?>
                                        <h5><a href="mailto:<?php echo esc_url($crysa_option['header_contact_mail']); ?>"><?php echo esc_html($crysa_option['header_contact_mail']); ?></a></h5>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->
                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->
            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Two -->
    <?php }elseif ( $header_menu == '3' || $blog_header_style_three){?>
    <!-- Start Header Style Three -->    
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-common navbar-sticky navbar-default validnavs">

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

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>"  alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                        
                        <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'primary',
                                'container'       => 'ul',
                                'menu_class'      => 'nav navbar-nav navbar-right',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                                'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                            ));
                        ?>
                    </div><!-- /.navbar-collapse -->


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
    <?php }elseif ( $header_menu == '4' || $blog_header_style_four){?>
    <!-- Start Header Style Four -->
    <div class="top-bar bg-dark text-light top-style-one">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-8 col-lg-8 info">
                    <ul>
                        <?php if(!empty($crysa_option['header_info'])):?>
                            <li>
                                <?php echo html_entity_decode(esc_html($crysa_option['header_info'])); ?>
                            </li>
                        <?php endif;?>
                        <?php if(!empty($crysa_option['header_working_hrs'])):?>
                            <li>
                                <i class="fal fa-clock"></i> <span><?php echo html_entity_decode(esc_html($crysa_option['header_working_hrs'])); ?></span>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 text-right item-flex">
                    
                    <div class="social">
                        <ul>
                            <?php if(!empty($crysa_option['header_fb_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_fb_url']);?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_twitter_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_twitter_url']);?>">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_linkdin_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_linkdin_url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_pinterest_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_pinterest_url']);?>">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_dribbble_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_dribbble_url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_behance_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_behance_url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_instagram_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_instagram_url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($crysa_option['header_youtube_url'])):?>
                            <li>
                                <a href="<?php echo esc_url($crysa_option['header_youtube_url']);?>">
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
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-common navbar-sticky navbar-default validnavs">

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

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                        
                        <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'primary',
                                'container'       => 'ul',
                                'menu_class'      => 'nav navbar-nav navbar-right',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                                'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                            ));
                        ?>
                    </div><!-- /.navbar-collapse -->

                    <div class="attr-right">
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="contact">
                                    <div class="call">
                                        <?php if(!empty($crysa_option['header_quote_icon'])): ?>
                                        <div class="icon">
                                            <i class="<?php echo esc_attr($crysa_option['header_quote_icon']);?>"></i>
                                        </div>
                                        <?php endif;?>
                                        <div class="info">
                                            <?php if(!empty($crysa_option['header_contact_text'])): ?>
                                            <p><?php global $crysa_option; echo esc_html($crysa_option['header_contact_text']); ?></p>
                                            <?php endif;?>
                                            <?php if(!empty($crysa_option['header_contact_mail'])): ?>
                                            <h5><a href="mailto:<?php echo esc_url($crysa_option['header_contact_mail']); ?>"><?php echo esc_html($crysa_option['header_contact_mail']); ?></a></h5>
                                            <?php endif;?>
                                            </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
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
    <?php }elseif ( $header_menu == '5' || $blog_header_style_five){?>
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed white no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo']['url']); ?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo-light.svg' ;?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <?php 
                        global $crysa_option;
                        if(!empty($crysa_option['upload_header_logo_light'])): ?>
                        <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>"  alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>
                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="button">
                                <a href="<?php echo esc_url($crysa_option['header_quote_url']);?>"><?php global $crysa_option; echo esc_html($crysa_option['header_quote_text']); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <?php }elseif ( $header_menu == '6' || $blog_header_style_six){?>
     <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <?php 
                        global $crysa_option;
                        if(!empty($crysa_option['upload_header_logo_light'])): ?>
                        <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>"  alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>
                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="button">
                                <a href="<?php echo esc_url($crysa_option['header_quote_url']);?>"><?php global $crysa_option; echo esc_html($crysa_option['header_quote_text']); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <?php }elseif ( $header_menu == '7' || $blog_header_style_seven){?>
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-common navbar-sticky navbar-default validnavs navbar-fixed dark no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $crysa_option;
                            if(!empty($crysa_option['upload_header_logo_light'])): ?>
                            <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                     <?php 
                        global $crysa_option;
                        if(!empty($crysa_option['upload_header_logo_light'])): ?>
                        <img src="<?php echo esc_url($crysa_option['upload_header_logo_light']['url']); ?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php endif; ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'primary',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                        ));
                    ?>
                    
                </div><!-- /.navbar-collapse -->

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="contact">
                                <div class="call">
                                    <?php if(!empty($crysa_option['header_quote_icon'])): ?>
                                        <div class="icon">
                                            <i class="<?php echo esc_attr($crysa_option['header_quote_icon']);?>"></i>
                                        </div>
                                    <?php endif;?>
                                    <div class="info">
                                       <?php if(!empty($crysa_option['header_contact_text'])): ?>
                                        <p><?php global $crysa_option; echo esc_html($crysa_option['header_contact_text']); ?></p>
                                        <?php endif;?>
                                        <?php if(!empty($crysa_option['header_contact_mail'])): ?>
                                        <h5><a href="mailto:<?php echo esc_url($crysa_option['header_contact_mail']); ?>"><?php echo esc_html($crysa_option['header_contact_mail']); ?></a></h5>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>

    <?php } else{?>
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-common navbar-sticky navbar-default validnavs">

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

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                        
                        <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'primary',
                                'container'       => 'ul',
                                'menu_class'      => 'nav navbar-nav navbar-right',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                                'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                            ));
                        ?>
                    </div><!-- /.navbar-collapse -->


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
       }
    }
}
add_action( 'crysa_header', 'crysa_main_menu', 21 );
?>