<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.1.7' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
    require_once $filename;
}
