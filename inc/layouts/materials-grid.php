<?php

//* Output materials_grid before
// add_action( 'before_loop_layout_materials_grid', 'elodin_materials_grid_before' );
function elodin_materials_grid_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each materials_grid
add_action( 'add_loop_layout_materials_grid', 'elodin_materials_grid_each' );
function elodin_materials_grid_each() {

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
			
	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
	
	if ( $excerpt )
			printf( '<div class="info-wrap"><span class="info"><span class="dashicons dashicons-info"></span></span><div class="excerpt">%s</div></div>', $excerpt );

	echo '<div class="content">';
	
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		edit_post_link( 'Edit', '<small>', '</small>', get_the_ID() );		
	
	echo '</div>';
}