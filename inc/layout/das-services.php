<?php

//* Output das_services before
// add_action( 'before_loop_layout_das_services', 'elodin_das_services_before' );
function elodin_das_services_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each das_services
add_action( 'add_loop_layout_das_services', 'elodin_das_services_each' );
function elodin_das_services_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	// $thing = get_post_meta( $id, 'thing', true );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

	if ( $title )
		printf( '<h3>%s</h3>', $title );
}