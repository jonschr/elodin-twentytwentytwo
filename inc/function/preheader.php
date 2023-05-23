<?php

//* Register postheader
register_sidebar( array(
	'name'          => __( 'Postheader', 'ettt' ),
	'id'            => 'postheader',
	'description'   => __( 'An area below the header', 'ettt' ),
	'before_widget' => '<div class="postheader">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) );

//* Display postheader
add_action( 'generate_after_header', 'ettt_add_postheader', 3 );
function ettt_add_postheader() {
	dynamic_sidebar( 'prefooter-1' );
}