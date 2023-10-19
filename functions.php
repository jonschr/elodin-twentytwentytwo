<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.7' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
    require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );

// add_action( 'wp_footer', 'output_block_names' );
function output_block_names() {
    $blocks = parse_blocks( get_post()->post_content );
    $block_names = array_map( function( $block ) {
        return $block['blockName'];
    }, $blocks );
    echo '<script>';
    echo 'console.log(' . json_encode( $block_names ) . ');';
    echo '</script>';
}

add_action('after_setup_theme', 'disable_custom_colors');
function disable_custom_colors() {
    add_theme_support('disable-custom-colors');
}
    