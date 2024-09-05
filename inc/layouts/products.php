<?php

//* Output products before
// add_action( 'before_loop_layout_products', 'elodin_products_before' );
function elodin_products_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each products
add_action( 'add_loop_layout_products', 'elodin_products_each' );
function elodin_products_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_post_meta( get_the_ID(), 'external_link', true );
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	//* Markup
	if ( $permalink )
		printf( '<a target="_blank" class="overlay" href="%s"></a>', $permalink );
			
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

	if ( $title )
		printf( '<h3>%s</h3>', $title );
}