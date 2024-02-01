<?php

//* Output each services
add_action( 'add_loop_layout_services_cardinal', 'services_cardinal' );
function services_cardinal() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	
	$photos = get_post_meta( get_the_ID(), 'images', true );	
	$url = esc_url( wp_get_attachment_url( $photos[0], 'preview' ) );
	 
		
	//* Markup
	if ( $content )
		printf( '<a href="%s" class="featured-image" style="background-image:url( %s )"></a>', $permalink, $url );

	if ( !$content )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $url );

	if ( $title ) {
		
		if ( $content )
			printf( '<h3><a href="%s">%s</a></h3>', $permalink, $title );

		if ( !$content )
			printf( '<h3>%s</h3>', $title );

	}

	edit_post_link();
}