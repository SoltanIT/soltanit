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

class crysa_service_img_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'crysa_service_img_widget',

                // Widget name will appear in UI
                esc_html__( 'Crysa Service Image', 'crysa-core' ),

                // Widget description
                array(
                    'classname'                     => 'single-widget quick-contact text-light',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add service Me Widget', 'crysa' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $mail          = apply_filters( 'widget_mail', $instance['mail'] );
            $image_url      = ( !empty( $instance['image_url'] ) ) ? $instance['image_url'] : "";
            $button_text    = ( !empty( $instance['button_text'] ) ) ? $instance['button_text'] : "";
            $content_number   = ( !empty( $instance['content_number'] ) ) ? $instance['content_number'] : "";
            $button_url   = ( !empty( $instance['button_url'] ) ) ? $instance['button_url'] : "";
           
            //before and after widget arguments are defined by themes
            echo '<div class="single-widget quick-contact-widget text-light" style="background-image: url('.esc_url( $image_url ).');">';
                echo '<div class="content">';
                    echo '<i class="fas fa-phone-alt"></i>';
                    echo '<h2>'.esc_html( $content_number ).'</h2>';
                    echo '<h4><a href="mailto:'.esc_url( $mail ).'">'.esc_html( $mail ).'</a></h4>';
                    echo '<a class="btn mt-30 btn-sm btn-theme" href="'.esc_url( $button_url ).'">'.esc_html( $button_text ).'</a>';
                echo '</div>';
            echo '</div>';
        }

        // Widget Backend
        public function form( $instance ) {

            //mail
            if ( isset( $instance[ 'mail' ] ) ) {
                $mail = $instance[ 'mail' ];
            }else {
                $mail = '';
            }

            // Content 
            if ( isset( $instance[ 'button_text' ] ) ) {
                $button_text = $instance[ 'button_text' ];
            }else {
                $button_text = '';
            }

            // Number 
            if ( isset( $instance[ 'content_number' ] ) ) {
                $content_number = $instance[ 'content_number' ];
            }else {
                $content_number = '';
            }
            if ( isset( $instance[ 'button_url' ] ) ) {
                $button_url = $instance[ 'button_url' ];
            }else {
                $button_url = '';
            }

            // Image Url 
            if ( isset( $instance[ 'image_url' ] ) ) {
                $image_url = $instance[ 'image_url' ];
            }else {
                $image_url = '';
            }

            

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_number' ); ?>"><?php _e( 'Contact Number:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content_number' ); ?>" name="<?php echo $this->get_field_name( 'content_number' ); ?>" type="text" value="<?php echo esc_attr( $content_number ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'mail' ); ?>"><?php _e( 'Mail:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" type="text" value="<?php echo esc_attr( $mail ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text :' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image Url:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e( 'Button Url:' ,'crysa'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>" />
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['mail']          = ( ! empty( $new_instance['mail'] ) ) ? strip_tags( $new_instance['mail'] ) : '';
            $instance['button_text']    = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
            $instance['content_number']   = ( ! empty( $new_instance['content_number'] ) ) ? strip_tags( $new_instance['content_number'] ) : '';
            $instance['image_url']    = ( ! empty( $new_instance['image_url'] ) ) ? strip_tags( $new_instance['image_url'] ) : '';
            $instance['button_url']    = ( ! empty( $new_instance['button_url'] ) ) ? strip_tags( $new_instance['button_url'] ) : '';
            
            return $instance;
        }
    } // Class crysa_service_img_widget ends here


    // Register and load the widget
    function crysa_service_me_load_widget() {
        register_widget( 'crysa_service_img_widget' );
    }
    add_action( 'widgets_init', 'crysa_service_me_load_widget' );