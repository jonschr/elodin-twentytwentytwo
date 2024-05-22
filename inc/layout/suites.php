<?php

//* Output each suite
add_action( 'add_loop_layout_suites', 'elodin_suites_each' );
add_action( 'suites_do_each', 'elodin_suites_each' );
function elodin_suites_each() {
	
	wp_enqueue_script('slick-main-script');
	wp_enqueue_style('slick-main-styles');
	wp_enqueue_style('slick-main-theme');
	wp_enqueue_script( 'suites-sliders' );
	
	//* GLIGHTBOX
	wp_enqueue_script( 'glightbox-script' );
	wp_enqueue_script( 'glightbox-init' );
	wp_enqueue_style( 'glightbox-style' );

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$excerpt = get_the_excerpt();
	$images = get_post_meta( $id, 'images', true );
	
	echo '<div class="inner">';
	
		if ( $images ) {
			echo '<div class="suites-slider">';
			
				foreach( $images as $image ) {
					$background = wp_get_attachment_image_url( $image, 'preview' );
					$link = wp_get_attachment_image_url( $image, 'large' );
					printf( '<div class="the-image-slide"><a class="glightbox" href="%s" data-gallery="gallery-%s"><div class="featured-image" style="background-image:url( %s )"></div></a></div>', $link, $id, $background );
				}
			
			echo '</div>'; 
		}
		
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		if ( $excerpt ) {
			echo '<div class="excerpt">';
				echo apply_filters( 'the_content', apply_filters( 'the_content', $excerpt ) );
			echo '</div>';
		}
	
	echo '</div>'; // .inner
}
