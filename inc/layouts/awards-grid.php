<?php

//* Output awards_grid before
add_action( 'before_loop_layout_awards_grid', 'elodin_awards_grid_before' );
function elodin_awards_grid_before( $args ) {
	wp_enqueue_script( 'slick-main-script' );
	wp_enqueue_script( 'slick-awards-init' );
	wp_enqueue_style( 'slick-main-styles' );
	wp_enqueue_style( 'slick-main-theme' );
}

//* Output each awards_grid
add_action( 'add_loop_layout_awards_grid', 'elodin_awards_grid_each' );
function elodin_awards_grid_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	// $permalink = get_the_permalink();
	// $content = get_the_content();
	// $excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	
	// output the featured image, as an <img> tag
	printf( '<a href="#" class="tooltip" title="%s">', $title );
		the_post_thumbnail( get_the_ID(), 'medium' );
	echo '</a>';
	
	edit_post_link( 'Edit Award', '<small>', '</small>' );
	
	// if ( $title )
	// 	printf( '<h3>%s</h3>', $title );
}