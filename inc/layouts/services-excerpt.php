<?php

//* Output each services
add_action( 'add_loop_layout_services_excerpt_cardinal', 'elodin_services_excerpt_cardinal' );
function elodin_services_excerpt_cardinal() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$content = get_the_content();
	
	$photos = get_post_meta( get_the_ID(), 'images', true );	
	$url = esc_url( wp_get_attachment_url( $photos[0], 'large' ) );
	

	//* Markup
	if ( $content )
		printf( '<a href="%s" class="overlay"></a>', $permalink );
	
	if ( $content )
		printf( '<a href="%s" class="featured-image" style="background-image:url( %s )"></a>', $permalink, $url );

	if ( !$content )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $url );

		
	echo '<div class="services-content-wrap"><div class="services-content">';

		if ( $title ) {
			
			if ( $content )
				printf( '<h3><a href="%s">%s</a></h3>', $permalink, $title );

			if ( !$content )
				printf( '<h3>%s</h3>', $title );

		}

		if ( $excerpt )
			printf( '<div class="excerpt">%s</div>', $excerpt );

		edit_post_link();
	
	echo '</div></div>';
}