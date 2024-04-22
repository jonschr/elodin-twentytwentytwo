<?php

//* Output inthenews before
// add_action( 'before_loop_layout_inthenews', 'elodin_inthenews_before' );
function elodin_inthenews_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each inthenews
add_action( 'add_loop_layout_inthenews', 'elodin_inthenews_each' );
function elodin_inthenews_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	$date = get_the_date( 'F j, Y' );
	$url = get_post_meta( $id, 'external_link', true );
	$url_button = ko_get_external_link_button( $url );
	$url_overlay = ko_get_external_link_overlay( $url );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )">%s</div>', $background, $url_overlay );
	
	echo '<div class="content">';
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		if ( $date )
			printf( '<p class="date">%s</p>', $date );
		
		if ( $excerpt )
			echo wp_kses_post( $excerpt );
		
		if ( $url_button )
			echo $url_button;

	echo '</div>';
}

function ko_get_external_link_button( $url ) {
	// if $url is a youtube link, then do one thing. If not, do another thing
	if ( strpos( $url, 'youtube' ) !== false ) {
		$button = sprintf( '<a class="btn popup" href="%s">Watch</a>', $url );
	} else {
		$button = sprintf( '<a class="btn" href="%s" target="_blank">Learn more</a>', $url );
	}
	
	return $button;
}

function ko_get_external_link_overlay( $url ) {
	// if $url is a youtube link, then do one thing. If not, do another thing
	if ( strpos( $url, 'youtube' ) !== false ) {
		$markup = sprintf( '<div class="overlay"><a class="popup" href="%s"></a></div>', $url );
	} else {
		$markup = sprintf( '<div class="overlay"><a class="full" href="%s" target="_blank">Learn more</a></div>', $url );
	}
	
	return $markup;
}