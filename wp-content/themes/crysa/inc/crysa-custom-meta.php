<?php

function crysa_page_meta_info(){

    $cmb =new_cmb2_box(array(
     'id'          =>'crysa_page_meta',
     'title'       =>esc_html('crysa Page Meta','crysa'),
     'object_types'=>array('page'),

    ));

    $cmb->add_field(array (
        'name' => esc_html__( 'Header Style', 'crysa' ),
        'id' => 'header_style',
        'type' => 'select',
        'default' => '3',
        'show_option_none' => false,
        'options' => array(
            '1' => esc_html__( 'Style One', 'crysa' ),
            '2' => esc_html__( 'Style Two', 'crysa' ),
            '3' => esc_html__( 'Style Three', 'crysa' ),
            '4' => esc_html__( 'Style Four', 'crysa' ),
            '5' => esc_html__( 'Style Five', 'crysa' ),
            '6' => esc_html__( 'Style Six', 'crysa' ),
            '7' => esc_html__( 'Style Seven', 'crysa' ),
        ),
       )
    );
}
add_action( 'cmb2_admin_init', 'crysa_page_meta_info' );
?>