<?php
/**
* @version  1.0
* @package  crysa
* @author   Validtheme<support@crysa.com>
*
* Websites: http://www.validtheme.com
*
*/

/**************
* Creating Service Image Widget
*************/

class crysa_service_brochure_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'crysa_service_brochure_widget',

                // Widget name will appear in UI
                esc_html__( 'Crysa Service Brochure Widget', 'crysa-core' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add service Me Widget', 'crysa' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];

            $title         = apply_filters( 'widget_title_pdf1', $instance['title'] );
            $title_pdf1          = apply_filters( 'widget_title_pdf1', $instance['title_pdf1'] );
            $link_pdf1    = ( !empty( $instance['link_pdf1'] ) ) ? $instance['link_pdf1'] : "";
            $title_pdf2          = apply_filters( 'widget_title_pdf2', $instance['title_pdf2'] );
            $link_pdf2   = ( !empty( $instance['link_pdf2'] ) ) ? $instance['link_pdf2'] : "";
           
            //before and after widget arguments are defined by themes;
            echo '<!-- Single Widget -->';
                echo '<div class="single-widget widget-brochure">';
                    echo '<h4 class="widget-title">'.esc_html( $title ).'</h4>';
                    echo '<ul>';
                        echo '<li><a href="'.esc_url( $link_pdf1 ).'"><i class="fas fa-file-pdf"></i> '.esc_html( $title_pdf1 ).' </a></li>';
                        echo '<li><a href="'.esc_url( $link_pdf2 ).'"><i class="fas fa-file-pdf"></i> '.esc_html( $title_pdf2 ).'</a></li>';
                    echo '</ul>';
                echo '</div>';
            echo '<!-- End Single Widget -->';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {
            //title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            //title_pdf1
            if ( isset( $instance[ 'title_pdf1' ] ) ) {
                $title_pdf1 = $instance[ 'title_pdf1' ];
            }else {
                $title_pdf1 = '';
            }

            // link_pdf1 
            if ( isset( $instance[ 'link_pdf1' ] ) ) {
                $link_pdf1 = $instance[ 'link_pdf1' ];
            }else {
                $link_pdf1 = '';
            }

             //title_pdf1
            if ( isset( $instance[ 'title_pdf2' ] ) ) {
                $title_pdf2 = $instance[ 'title_pdf2' ];
            }else {
                $title_pdf2 = '';
            }

            // link_pdf1 
            if ( isset( $instance[ 'link_pdf2' ] ) ) {
                $link_pdf2 = $instance[ 'link_pdf2' ];
            }else {
                $link_pdf2 = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'title_pdf1' ); ?>"><?php _e( 'PDF One Title:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title_pdf1' ); ?>" name="<?php echo $this->get_field_name( 'title_pdf1' ); ?>" type="text" value="<?php echo esc_attr( $title_pdf1 ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'link_pdf1' ); ?>"><?php _e( 'PDF One Link :' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'link_pdf1' ); ?>" name="<?php echo $this->get_field_name( 'link_pdf1' ); ?>" type="text" value="<?php echo esc_attr( $link_pdf1 ); ?>" />
            </p>

             <p>
                <label for="<?php echo $this->get_field_id( 'title_pdf2' ); ?>"><?php _e( 'PDF Two Title:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title_pdf2' ); ?>" name="<?php echo $this->get_field_name( 'title_pdf2' ); ?>" type="text" value="<?php echo esc_attr( $title_pdf2 ); ?>" />
            </p>

             <p>
                <label for="<?php echo $this->get_field_id( 'link_pdf2' ); ?>"><?php _e( 'PDF Two Link:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'link_pdf2' ); ?>" name="<?php echo $this->get_field_name( 'link_pdf2' ); ?>" type="text" value="<?php echo esc_attr( $link_pdf2 ); ?>" />
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['title_pdf1']          = ( ! empty( $new_instance['title_pdf1'] ) ) ? strip_tags( $new_instance['title_pdf1'] ) : '';
            $instance['link_pdf1']    = ( ! empty( $new_instance['link_pdf1'] ) ) ? strip_tags( $new_instance['link_pdf1'] ) : '';
            $instance['title_pdf2']          = ( ! empty( $new_instance['title_pdf2'] ) ) ? strip_tags( $new_instance['title_pdf2'] ) : '';
            $instance['link_pdf2']          = ( ! empty( $new_instance['link_pdf2'] ) ) ? strip_tags( $new_instance['link_pdf2'] ) : '';
           
            
            return $instance;
        }
    } // Class crysa_service_brochure_widget ends here


    // Register and load the widget
    function crysa_service_pdf_widget() {
        register_widget( 'crysa_service_brochure_widget' );
    }
    add_action( 'widgets_init', 'crysa_service_pdf_widget' );