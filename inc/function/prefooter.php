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
add_action( 'generate_footer', 'ettt_add_prefooter', 3 );
function ettt_add_prefooter() {
	
	// contact page
	if ( is_page( 13 ) )
		return;
	
	dynamic_sidebar( 'prefooter' );
	
}

//* Register the widget areas
register_sidebar( array(
	'name'          => __( 'Prefooter 2', 'ettt' ),
	'id'            => 'prefooter-2',
	'description'   => __( 'A prefooter widget area', 'ettt' ),
	'before_widget' => '<div class="prefooter">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) );

//* Display the widget area
add_action( 'generate_footer', 'ettt_add_prefooter_2', 3 );
function ettt_add_prefooter_2() {
	
	dynamic_sidebar( 'prefooter-2' );
	
}