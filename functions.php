<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.1.2' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
    require_once $filename;
}

// add an image size
add_image_size( 'square', 500, 500, true );

// add the image size to galleries
add_filter( 'image_size_names_choose', 'ettt_add_gallery_sizes' );
function ettt_add_gallery_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'square' => __( 'Square' ),
    ) );
}