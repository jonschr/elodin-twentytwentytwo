<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.16' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );


/**
 * If a cookie isn't set, tnen on the home page, redirect to /splash and set the cookie
 *
 */
function handle_splashviewed_cookie() {
	
	// bail if we're not on the home page
	if ( !is_page( 11 ))
		return;
	
	if (!isset($_GET['splash'])) {
		// redirect to /splash
		wp_redirect( '/splash' );
	}
}
add_action( 'template_redirect', 'handle_splashviewed_cookie' );

/**
 * On the splash page, redirect to home after 12 seconds
 *
 */
function redirect_from_splash_to_home_after_delay() {
			
	// bail if we're not on the splash page
	if ( !is_page( 'splash' ) )
		return;		
	
	echo '<meta http-equiv="refresh" content="12.5;url=/?splash=viewed">'; // Replace with your target URL
	
}
add_action( 'wp_head', 'redirect_from_splash_to_home_after_delay');

add_filter( 'generate_logo_href', function() {
    return "/?splash=viewed";
} );