<?php 

/**
* Hook for Header
*/
add_action( 'crysa_header', 'crysa_header_cb', 10 );

/**
* Hook for footer content
*/
add_action( 'crysa_footer_content', 'crysa_footer_content_cb', 10 );
