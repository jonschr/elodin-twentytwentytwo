<?php

//* Output services_fullwidth before
// add_action( 'before_loop_layout_services_fullwidth', 'elodin_services_fullwidth_before' );
function elodin_services_fullwidth_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each services_fullwidth
add_action( 'add_loop_layout_services_fullwidth', 'elodin_services_fullwidth_each' );
function elodin_services_fullwidth_each() {

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
		printf( '<div class="content"><h3>%s</h3></div>', $title );
}