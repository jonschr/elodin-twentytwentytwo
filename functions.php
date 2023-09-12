<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '1.5' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
    require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );


// Remove the promotions buttons from the right rail on a few pages
add_action( 'wp', 'remove_rf_promotions_conditionally' );
function remove_rf_promotions_conditionally() {
    
    // Check if on availability page or the enclave at parker page
    if ( is_page( '198' ) || ( is_single() && get_the_ID() == 415 ) ) {
        remove_action( 'wp_footer', 'rfp_query_buttons' );
    }
}

add_action( 'rentfetch_do_floorplan_each_button', 'tallgrass_add_availability_button', 10 );
function tallgrass_add_availability_button() {
    
    $inquire_url = esc_url( get_post_meta( get_the_ID(), 'availability_url', true ) );
    
    if ( $inquire_url )
        printf( '<a href="%s" target="_blank" class="button">Inquire</a>', $inquire_url );
}

add_action( 'rentfetch_do_floorplan_each_button', 'tallgrass_add_brochure_button', 10 );
function tallgrass_add_brochure_button() {
    
    $brochure_id = get_post_meta( get_the_ID(), 'brochure', true );
    $brochure_url = wp_get_attachment_url( $brochure_id );
    
    // var_dump( $brochure );
    
    if ( $brochure_id )
        printf( '<a target="_blank" href="%s" class="button">Brochure</a>', $brochure_id );
}