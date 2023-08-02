<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.6' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
    require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );


add_action( 'generate_inside_navigation', 'mm_add_navigation_before_header', 9999 );
function mm_add_navigation_before_header() {
    // output the names of all widget areas
    $widget_areas = wp_get_sidebars_widgets();
    
    // output the header widget area if active 
    if ( is_active_sidebar( 'header' ) ) {
        echo '<div class="header-widget-area">';
            dynamic_sidebar( 'header' );
        echo '</div>';
    }
    
}