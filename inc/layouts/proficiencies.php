<?php

//* Output proficiencies before
// add_action( 'before_loop_layout_proficiencies', 'elodin_proficiencies_before' );
function elodin_proficiencies_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each proficiencies
add_action( 'add_loop_layout_proficiencies', 'elodin_proficiencies_each' );
function elodin_proficiencies_each() {

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
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

	echo '<div class="content">';
	
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		edit_post_link();
	
	echo '</div>';	
	
}