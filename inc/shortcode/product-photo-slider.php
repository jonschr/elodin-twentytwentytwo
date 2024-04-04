<?php

function product_photo_slider_func() {
	
	ob_start();
	
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	
	// bail if we don't have photos
	if ( !is_array( $photos ) )
		return;
	
		if (count($photos) === 1) {
			photo_single();
		} elseif (count($photos) > 1) {
			photo_slider();
		} else {
			return;
		}
	
	return ob_get_clean();
	
}
add_shortcode( 'products_slider', 'products_slider_func');


function photo_single() {
	
	echo '<div class="single-products-section images-singular">';
	
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	
	foreach ( $photos as $photo ) {
		
		$url = wp_get_attachment_url( $photo );
		
		printf( '<a class="popup popup-image" href="%s">', $url );
			echo wp_get_attachment_image( $photo, 'full', false, array( 'class' => 'photo-single' ) );
		echo '</a>';
	}
	
	echo '</div>';
}

function photo_slider() {
	
	wp_enqueue_script(
		'slick-main-script'
	);
	
	wp_enqueue_style(
		'slick-main-styles'
	);
		
	wp_enqueue_style(
		'slick-main-theme'
	);
	
	wp_enqueue_script(
		'single-product-slider-init'
	);
		
	echo '<div class="single-products-section images-multiple">';
	
		$photos = get_post_meta( get_the_ID(), 'photos', true );
	
		foreach ( $photos as $photo ) {
			
			$url = wp_get_attachment_url( $photo );
			
			printf( '<div class="product-photo-slide"><a class="popup popup-image" href="%s">', $url );
				echo wp_get_attachment_image( $photo, 'large', false, array( 'class' => 'photo-multiple' ) );
			echo '</a></div>';
		}
	
	echo '</div>';
	
}
add_shortcode( 'product_photo_slider', 'product_photo_slider_func' );