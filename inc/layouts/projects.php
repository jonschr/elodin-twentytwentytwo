<?php

//* Output each projects
add_action( 'add_loop_layout_projects', 'elodin_projects_each' );
add_action( 'projects_do_each', 'elodin_projects_each' );
function elodin_projects_each() {
	
	wp_enqueue_script('slick-main-script');
	wp_enqueue_style('slick-main-styles');
	wp_enqueue_style('slick-main-theme');
	wp_enqueue_script( 'projects-sliders' );
	
	//* GLIGHTBOX
	wp_enqueue_script( 'glightbox-script' );
	wp_enqueue_script( 'glightbox-init' );
	wp_enqueue_style( 'glightbox-style' );

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	
	$images = get_post_meta( $id, 'images', true );
	
	echo '<div class="inner">';
	
		if ( $images ) {
			echo '<div class="projects-slider">';
			
				foreach( $images as $image ) {
					$background = wp_get_attachment_image_url( $image, 'preview' );
					$link = wp_get_attachment_image_url( $image, 'large' );
					printf( '<div class="the-image-slide"><a class="glightbox" href="%s" data-gallery="gallery-%s"><div class="featured-image" style="background-image:url( %s )"></div></a></div>', $link, $id, $background );
				}
			
			echo '</div>'; 
		}
		
		if ( $title )
			printf( '<h3>%s</h3>', $title );
	
	echo '</div>'; // .inner
}

