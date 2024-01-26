<?php

function projects_each() {

	wp_enqueue_script( 'slick-main-script' );
	wp_enqueue_style( 'slick-main-styles' );
	wp_enqueue_style( 'slick-main-theme' );
	wp_enqueue_script( 'projects-sliders' );

	// * GLIGHTBOX
	wp_enqueue_script( 'glightbox-script' );
	wp_enqueue_script( 'glightbox-init' );
	wp_enqueue_style( 'glightbox-style' );

	// * Global vars
	global $post;
	$id = get_the_ID();

	// * Vars
	$title = get_the_title();
	$images = get_post_meta( $id, 'images', true );
	
	$post_classes = get_post_class();
	$post_class_string = implode(' ', $post_classes);
	
	// Markup
	printf( '<div class="%s">', $post_class_string );
		echo '<div class="loop-inner">';

			if ( $images ) {
				echo '<div class="projects-slider">';

				foreach ( $images as $image ) {
					$background = wp_get_attachment_image_url( $image, 'large' );
					printf( 
						'<div class="the-image-slide">
							<div class="featured-image-wrap">
								<a class="glightbox" href="%s" data-gallery="gallery-%s">
									<div class="featured-image" style="background-image:url( %s )"></div>
								</a>
							</div>
						</div>', 
						$background, 
						$id, 
						$background
					);
				}

				echo '</div>'; // .projects-slider
			}

			if ( $title ) {
				printf( '<h3>%s</h3>', $title );
			}
			
		echo '</div>'; // .loop-inner
	echo '</div>'; // post_class
}
add_action( 'projects_do_each', 'projects_each' );
