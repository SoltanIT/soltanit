<?php
// Header Hook function
if (!function_exists('crysa_header_cb')) {
    function crysa_header_cb()
    {
        global $crysa_option;
        if (class_exists('ReduxFramework') && defined('ELEMENTOR_VERSION')) {
            if (is_page() || is_page_template('template-builder.php')) {
                $crysa_post_id = get_the_ID();

                // Get the page settings manager
                $crysa_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers('page');

                // Get the settings model for current post
                $crysa_page_settings_model = $crysa_page_settings_manager->get_model($crysa_post_id);

                // Retrieve the color we added before
                $crysa_header_style = $crysa_page_settings_model->get_settings('crysa_header_style');
                $crysa_header_builder_option = $crysa_page_settings_model->get_settings('crysa_header_builder_option');

                if ($crysa_header_style == 'header_builder') {

                    if (!empty($crysa_header_builder_option)) {
                        $crysaheader = get_post($crysa_header_builder_option);
                        echo '<header>';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($crysaheader->ID);
                        echo '</header>';
                    }
                } else {
                    // global options
                    $crysa_header_builder_trigger = $crysa_option['crysa_header_options'];
                    if ($crysa_header_builder_trigger == '2') {
                        echo '<header>';
                        $crysa_global_header_select = get_post($crysa_option['crysa_header_select_options']);
                        $header_post = get_post($crysa_global_header_select);
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($header_post->ID);
                        echo '</header>';
                    } else {
                        // wordpress Header
                        crysa_global_header_option();
                    }
                }
            } else {
                $crysa_header_options = $crysa_option['crysa_header_options'];
                if ($crysa_header_options == '1') {
                    crysa_global_header_option();
                } else {
                    $crysa_header_select_options = $crysa_option['crysa_header_select_options'];
                    $crysaheader = get_post($crysa_header_select_options);
                    echo '<header>';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($crysaheader->ID);
                    echo '</header>';
                }
            }
        } else {
            crysa_global_header_option();
        }
    }
}


// global header
function crysa_global_header_option()
{
?>
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
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/logo.svg'; ?>" class="logo logo-display" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <img src="<?php echo get_template_directory_uri() . '/assets/img/logo.svg'; ?>" alt="<?php echo get_bloginfo('name'); ?>">
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
<?php }



// footer content Function
if (!function_exists('crysa_footer_content_cb')) {
    function crysa_footer_content_cb()
    {
        global $crysa_option;
        if (class_exists('ReduxFramework') && did_action('elementor/loaded')) {
            if (is_page() || is_page_template('template-builder.php')) {
                $post_id = get_the_ID();

                // Get the page settings manager
                $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers('page');

                // Get the settings model for current post
                $page_settings_model = $page_settings_manager->get_model($post_id);

                // Retrieve the Footer Style
                $footer_settings = $page_settings_model->get_settings('crysa_footer_style');

                // Footer Local
                $footer_local = $page_settings_model->get_settings('crysa_footer_builder_option');

                // Footer Enable Disable
                $footer_enable_disable = $page_settings_model->get_settings('crysa_footer_choice');

                if ($footer_enable_disable == 'yes') {
                    if ($footer_settings == 'footer_builder') {
                        // local options
                        $crysa_local_footer = get_post($footer_local);
                        echo '<footer>';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($crysa_local_footer->ID);
                        echo '</footer>';
                    } else {
                        // global options
                        $crysa_footer_builder_trigger = $crysa_option['crysa_footer_builder_trigger'];
                        if ($crysa_footer_builder_trigger == 'footer_builder') {
                            echo '<footer>';
                            $crysa_global_footer_select = get_post($crysa_option['crysa_footer_builder_select']);
                            $footer_post = get_post($crysa_global_footer_select);
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($footer_post->ID);
                            echo '</footer>';
                        } else {
                            // wordpress widgets
                            crysa_footer_global_option();
                        }
                    }
                }
            } else {
                // global options
                $crysa_footer_builder_trigger = $crysa_option['crysa_footer_builder_trigger'];
                if ($crysa_footer_builder_trigger == 'footer_builder') {
                    echo '<footer>';
                    $crysa_global_footer_select = get_post($crysa_option['crysa_footer_builder_select']);
                    $footer_post = get_post($crysa_global_footer_select);
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($footer_post->ID);
                    echo '</footer>';
                } else {
                    // wordpress widgets
                    crysa_footer_global_option();
                }
            }
        } else {
            echo '<footer>';
            echo '<div class="footer-bottom bg-dark">';
            echo '<div class="container">';
            echo '<p class="text-center text-white">' . esc_html__('Copyright', 'crysa') . ' <i class="fal fa-copyright"></i> ' . esc_html(date('Y')) . ' <a href="' . esc_url('#') . '">' . esc_html('crysa', 'crysa') . '</a>' . esc_html__(' All Rights Reserved by', 'crysa') . ' <a href="' . esc_url('#') . '">' . esc_html__('Validthemes', 'crysa') . '</a></p>';
            echo '</div>';
            echo '</div>';
            echo '</footer>';
        }
    }
}

function crysa_footer_global_option()
{
    global $crysa_option;
    // crysa Footer Bottom Enable Disable
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );
    echo '<footer class="bg-dark text-light">';
    if ((is_active_sidebar('footer-sidebar1') || is_active_sidebar('footer-sidebar2') || is_active_sidebar('footer-sidebar3') || is_active_sidebar('footer-sidebar4'))) {
        echo '<div class="container">';
        echo '<div class="f-items default-padding">';
        echo '<div class="row">';
        if (is_active_sidebar('footer-sidebar1')) :
            echo '<div class="col-lg-4 col-md-6 item">';
            dynamic_sidebar('footer-sidebar1');
            echo '</div>';
        endif;
        if (is_active_sidebar('footer-sidebar2')) :
            echo '<div class="col-lg-2 col-md-6 item">';
            dynamic_sidebar('footer-sidebar2');
            echo '</div>';
        endif;
        if (is_active_sidebar('footer-sidebar3')) :
            echo '<div class="col-lg-3 col-md-6 item">';
            dynamic_sidebar('footer-sidebar3');
            echo '</div>';
        endif;
        if (is_active_sidebar('footer-sidebar4')) :
            echo '<div class="col-lg-3 col-md-6 item">';
            dynamic_sidebar('footer-sidebar4');
            echo '</div>';
        endif;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    if (!empty($crysa_option['crysa_copyright_text'])) {
        echo '<!-- Start Footer Bottom -->';
        echo '<div class="footer-bottom">';
        echo '<div class="container">';
        echo '<div class="footer-bottom-box">';
        echo '<div class="row">';
        echo '<div class="col-lg-6">';
        echo '<p class="text-start">' . wp_kses($crysa_option['crysa_copyright_text'], $allowhtml) . '</p>';
        echo '</div>';
        if (has_nav_menu('footer-menu')) {

            echo '<div class="col-lg-6 text-right link>';
            wp_nav_menu(array(
                'theme_location'  => 'footer-menu',
            ));

            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<!-- End Footer Bottom -->';
    }
    echo '</footer>';
}
