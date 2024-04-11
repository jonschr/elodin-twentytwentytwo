<?php

//* Register the widget areas
register_sidebar( array(
	'name'          => __( 'Prefooter', 'ettt' ),
	'id'            => 'prefooter',
	'description'   => __( 'A prefooter widget area', 'ettt' ),
	'before_widget' => '<div class="prefooter">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) );

//* Display the widget area
function ettt_add_prefooter() {
	
	// Don't display on the contact page
	if ( is_page( 'contact' ) )
		return;
	
	dynamic_sidebar( 'prefooter' );
	
}
add_action( 'generate_footer', 'ettt_add_prefooter', 3 );