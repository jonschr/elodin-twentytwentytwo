<?php

//* Output ljb_testimonials before
// add_action( 'before_loop_layout_ljb_testimonials', 'elodin_ljb_testimonials_before' );
function elodin_ljb_testimonials_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each ljb_testimonials
add_action( 'add_loop_layout_ljb_testimonials', 'elodin_ljb_testimonials_each' );
function elodin_ljb_testimonials_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = apply_filters( 'the_content', get_the_content() );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	// $thing = get_post_meta( $id, 'thing', true );
    
    if ( $content )
        printf( '<div class="testimonial-content">%s</div>', $content );

	if ( $title )
		printf( '<h3>%s</h3>', $title );
}