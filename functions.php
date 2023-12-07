<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.8' );
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
	
	// bail if we're not on the splash page
	if ( !is_page( 11 ))
		return;
	
	// Check if the 'splashviewed' cookie is set
	if (!isset($_COOKIE['splashviewed'])) {
		
		// Redirect to /splash
		wp_redirect('/splash');
		
		// Set the 'splashviewed' cookie for 3 hours
		setcookie('splashviewed', true, time() + 3 * 3600, COOKIEPATH, COOKIE_DOMAIN);
		
	}
}
add_action('template_redirect', 'handle_splashviewed_cookie');

/**
 * On the splash page, redirect to home after 12 seconds
 *
 */
function redirect_from_splash_to_home_after_delay() {
	
	// bail if we're not on the splash page
	if ( !is_page( 1752 ) )
		return;
	
	// Set the 'splashviewed' cookie for 3 hours
	setcookie('splashviewed', true, time() + 3 * 3600, COOKIEPATH, COOKIE_DOMAIN);
	
    echo '<meta http-equiv="refresh" content="14;url=/">';
}
add_action('wp_head', 'redirect_from_splash_to_home_after_delay');