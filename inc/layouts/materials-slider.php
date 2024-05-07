<?php

//* Output each materials_slider
add_action( 'add_loop_layout_materials_slider', 'elodin_materials_slider_each' );
function elodin_materials_slider_each() {
	
	// Slick
	wp_enqueue_script('slick-main-script');
	wp_enqueue_script('materials-slider-init');
	wp_enqueue_style('slick-main-styles');
	wp_enqueue_style('slick-main-theme');

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
	
	// if ( $excerpt )
	// 		printf( '<div class="info-wrap"><span class="info"><span class="dashicons dashicons-info"></span></span><div class="excerpt">%s</div></div>', $excerpt );

	echo '<div class="content">';
	
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		edit_post_link( 'Edit', '<small>', '</small>', get_the_ID() );		
	
	echo '</div>';
}