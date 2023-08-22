<?php

//* Output insurance before
// add_action( 'before_loop_layout_insurance', 'elodin_insurance_before' );
function elodin_insurance_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each insurance
add_action( 'add_loop_layout_insurance', 'elodin_insurance_each' );
function elodin_insurance_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
			
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
		
	echo '<div class="content">';

		if ( $title )
			printf( '<h3>%s</h3>', $title );
			
	echo '</div>';
}