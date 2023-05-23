<?php

//* Register prefooter 1
register_sidebar( array(
	'name'          => __( 'Endorsements prefooter', 'ettt' ),
	'id'            => 'prefooter-1',
	'description'   => __( 'Prefooter Area 1', 'ettt' ),
	'before_widget' => '<div class="prefooter">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) );

//* Display prefooter 1
add_action( 'generate_footer', 'ettt_add_prefooter_1', 3 );
function ettt_add_prefooter_1() {
	
	// bail if this is the endorsements page
	if ( is_page(201) ) 
		return; 
		
	dynamic_sidebar( 'prefooter-1' );
}

//* Register prefooter 2
register_sidebar( array(
	'name'          => __( 'CTA prefooter', 'ettt' ),
	'id'            => 'prefooter-2',
	'description'   => __( 'Prefooter Area 2', 'ettt' ),
	'before_widget' => '<div class="prefooter">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
) );


//* Display prefooter 2
add_action( 'generate_footer', 'ettt_add_prefooter_2', 4 );
function ettt_add_prefooter_2() {
	
	// bail if this is the donations page
	if ( is_page(196) ) 
		return; 
	
	dynamic_sidebar( 'prefooter-2' );
}
