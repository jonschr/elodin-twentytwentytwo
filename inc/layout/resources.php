<?php

//* Output resources before
// add_action( 'before_loop_layout_resources', 'elodin_resources_before' );
function elodin_resources_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each resources
add_action( 'add_loop_layout_resources', 'elodin_resources_each' );
function elodin_resources_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	$pdf = get_post_meta( get_the_ID(), 'pdf', true );
	
	// get the file url from the media library, where $pdf is the attachment ID
	$pdf = wp_get_attachment_url( $pdf );
	
	echo '<div class="image-wrap">';
	
		if ( $pdf )
		printf( '<div class="overlay"><div class="overlay-inner"><a target="_blank" href="%s" class="button">Download PDF</a></div></div>', $pdf ); 
					
		if ( $background )
			printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
	
	echo '</div>';

	if ( $title )
		printf( '<h3>%s</h3>', $title );
	
	edit_post_link();
}