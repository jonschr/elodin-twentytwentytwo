<?php

//* Output ljb_services before
// add_action( 'before_loop_layout_ljb_services', 'elodin_ljb_services_before' );
function elodin_ljb_services_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each ljb_services
add_action( 'add_loop_layout_ljb_services', 'elodin_ljb_services_each' );
function elodin_ljb_services_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		
	$icon = get_post_meta( $id, 'icon', true );
   	$icon_url = wp_get_attachment_url( $icon );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $background )
		printf( '<div class="image-wrap"><div class="gradient"></div><div class="featured-image" style="background-image:url( %s )"></div></div>', $background );

		
	echo '<div class="service-content">';
		if ( $icon )
			printf( '<div class="icon" style="background-image:url( %s );"></div>', $icon_url );
			
		if ( $title )
			printf( '<h3>%s</h3>', $title );
			
	echo '</div>';
}