<?php
function crysa_import_files()
{
    return array(
        array(
            'import_file_name'             => esc_html__('Main Demo (with inner pages)', 'crysa'),
            'import_file_url'              => 'https://validthemes.net/themeforest/wp/crysa/demo/crysa_v2.xml',
            'import_widget_file_url'       => 'https://validthemes.net/themeforest/wp/crysa/demo/crysa_widget.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit(get_template_directory()) . '/inc/demos/redux_options_demo.json',
                    'option_name' => 'crysa_option',
                ),
            ),
            'import_notice'                => esc_html__('Install and activate all required plugins before you click on the "Import" button.', 'crysa'),
        ),
    );
}
add_filter('pt-ocdi/import_files', 'crysa_import_files');

function crysa_after_import_setup($selected_import)
{

    // Assign menus to their locations.
    $main_menu      = get_term_by('name', 'Primary Menu', 'nav_menu');
    $footer_menu    = get_term_by('name', 'Footer Copyright Menu', 'nav_menu');

    set_theme_mod(
        'nav_menu_locations',
        array(
            'primary'   => $main_menu->term_id,
            'footer-menu'    => $footer_menu->term_id,
        )
    );


    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home One');
    $blog_page_id  = get_page_by_title('Blog');

    // Set the home page and blog page
    update_option('show_on_front', 'page');
    update_option('page_on_front',  $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}
add_action('pt-ocdi/after_import', 'crysa_after_import_setup');
