<?php

//* Output each awards_grid
add_action( 'add_loop_layout_awards_grid', 'elodin_awards_grid_each' );
function elodin_awards_grid_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	
	// $permalink = get_the_permalink();
	// $content = get_the_content();
	// $excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	
	// output the featured image, as an <img> tag
	// echo '<a href="#">';
		printf( '<div title="%s" class="tooltip featured-image" style="background-image:url( %s )"></div>', $title, $background );
	// echo '</a>';
	
	edit_post_link();
	
	// if ( $title )
	// 	printf( '<h3>%s</h3>', $title );
}