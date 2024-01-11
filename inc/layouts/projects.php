<?php

//* Output each projects
add_action( 'add_loop_layout_projects', 'elodin_projects_each' );
function elodin_projects_each() {
	
	
	wp_enqueue_script('slick-main-script');
	wp_enqueue_style('slick-main-styles');
	wp_enqueue_style('slick-main-theme');
	wp_enqueue_script( 'projects-sliders' );

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	
	$images = get_post_meta( $id, 'images', true );
	
	if ( $images ) {
		echo '<div class="projects-slider">';
		
			foreach( $images as $image ) {
				$background = wp_get_attachment_image_url( $image, 'large' );
				printf( '<div class="the-image-slide"><div class="featured-image" style="background-image:url( %s )"></div></div>', $background );
			}
		
		echo '</div>'; 
	}
	
	if ( $title )
		printf( '<h3>%s</h3>', $title );
}