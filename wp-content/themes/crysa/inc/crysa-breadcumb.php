<?php
function crysa_breadcumb()
{

    global $crysa_option;;
    if (!isset($crysa_option['breadcumb_position']) || $crysa_option['breadcumb_position'] == 1) :
?>
        <!-- Start Breadcrumb
        ============================================= -->
        <div class="breadcrumb-area gradient-bg bg-cover shadow dark text-light text-center <?php if (empty($crysa_option['breadcumb_bg']['url'])) {
                                                                                                echo esc_attr("thumb-less");
                                                                                            } ?>" style="background-image: url(<?php if (isset($crysa_option['breadcumb_bg']['url'])) {
                                                                                                                                    echo esc_url($crysa_option['breadcumb_bg']['url']);
                                                                                                                                } ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h1>
                            <?php
                            if (is_front_page()) {
                                echo esc_html__("Blog", 'crysa');
                            } else {
                                echo wp_title("");
                            }
                            ?>
                        </h1>
                        <ul class="breadcrumb">
                            <?php
                            echo crysa_breadcrumbs();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

<?php endif;
}

if (!function_exists('crysa_breadcrumbs')) :
    function crysa_breadcrumbs()
    {
        global $post;
        $showCurrent = 1;
        $homeLink = esc_url(home_url('/'));
        if (is_front_page()) {
            return;
        }  // don't display breadcrumbs on the homepage (yet)
        if (class_exists('woocommerce')) {
            woocommerce_breadcrumb();
        } else {

            // echo wp_specialchars_decode( $home);

            if (is_category()) {
                // category section
                $thisCat = get_category(get_query_var('cat'), false);
                if (!empty($thisCat->parent)) echo get_category_parents($thisCat->parent, TRUE, ' ' . '/' . ' ');
                echo '<li class="active">' .  esc_html__('Archive for category', 'crysa') . ' "' . single_cat_title('', false) . '"' . '</li>';
            } elseif (is_search()) {
                // search section
                echo '<li class="active">' .  esc_html__('Search results for :', 'crysa') . ' "' . get_search_query() . '"' . '</li>';
            } elseif (is_day()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
                echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
                echo '<li>' . get_the_time('d') . '</li>';
            } elseif (is_month()) {
                // monthly archive
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
                echo '<li class="active">' . get_the_time('F') . '</li>';
            } elseif (is_year()) {
                // yearly archive
                echo '<li class="active">' . get_the_time('Y') . '</li>';
            } elseif (is_single() && !is_attachment()) {
                // single post or page
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<li><a href="' . $homeLink . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
                    if ($showCurrent) echo '<li class="active">' . get_the_title() . '</li>';
                } else {
                    $cat = get_the_category();
                    if (isset($cat[0])) {
                        $cat = $cat[0];
                    } else {
                        $cat = false;
                    }
                    if ($cat) {
                        $cats = get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
                    } else {
                        $cats = false;
                    }
                    if (!$showCurrent && $cats) $cats = preg_replace("#^(.+)\s\s$#", "$1", $cats);
                    echo '<li>' . $cats . '</li>';
                    if ($showCurrent) echo '<li class="active">' . get_the_title() . '</li>';
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                // some other single item
                $post_type = get_post_type_object(get_post_type());
                echo '<li>' . $post_type->labels->singular_name . '<li>';
            } elseif (is_attachment()) {
                // attachment section
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                if (isset($cat[0])) {
                    $cat = $cat[0];
                } else {
                    $cat = false;
                }
                if ($cat) echo get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
                echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
                if ($showCurrent) echo  '<li class="active">' . get_the_title() . '</li>';
            } elseif (is_page() && !$post->post_parent) {

                // parent page
                if ($showCurrent)
                    echo '<li class="active">' . get_the_title() . '</a></li>';
            } elseif (is_page() && $post->post_parent) {
                // child page
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();

                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {

                    echo wp_specialchars_decode($breadcrumbs[$i]);
                    if ($i != count($breadcrumbs) - 1);
                }
                if ($showCurrent) echo '<li class="active">' . get_the_title() . '</li>';
            } elseif (is_tag()) {
                // tags archive
                echo '<li>' .  esc_html__('Posts tagged', 'crysa') . ' "' . single_tag_title('', false) . '"' . '</li>';
            } elseif (is_author()) {
                // author archive
                global $author;
                $userdata = get_userdata($author);
                echo '<li class="active">' .  esc_html__('Articles posted by', 'crysa') . ' ' . $userdata->display_name . '</li>';
            } elseif (is_404()) {
                // 404
                echo '<li class="active">' .  esc_html__('Not Found', 'crysa') . '</li>';
            }

            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author());
                echo  '<li class="active">' . esc_html__('Page', 'crysa') . ' ' . get_query_var('paged') . '</li>';
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author());
            }
        }
    }
endif;
?>