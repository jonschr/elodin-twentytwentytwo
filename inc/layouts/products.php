<?php

//* Output product_grid before
// add_action( 'before_loop_layout_product_grid', 'elodin_product_grid_before' );
function elodin_product_grid_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each product_grid
add_action( 'add_loop_layout_product_grid', 'elodin_product_grid_each' );
function elodin_product_grid_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	$first_photo_id = isset($photos[0]) ? $photos[0] : null;
	$first_photo_url = null;
	
	if ($first_photo_id) {
		$first_photo_url = wp_get_attachment_image_src($first_photo_id, 'large')[0];
	}
	
	// $thing = get_post_meta( $id, 'thing', true );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
	
	printf( '<div class="featured-image" style="background-image:url(%s);"></div>', $first_photo_url );
	
	echo '<div class="the-content">';

		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		if ( $excerpt )
			printf( '<div class="excerpt">%s</div>', $excerpt );
	
	echo '</div>';
}