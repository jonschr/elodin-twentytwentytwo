<?php

//* Output videos before
// add_action( 'before_loop_layout_videos', 'elodin_videos_before' );
function elodin_videos_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each videos
add_action( 'add_loop_layout_videos', 'elodin_videos_each' );
function elodin_videos_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	
	the_field( 'video_url' );

	if ( $title )
		printf( '<h3>%s</h3>', $title );
}