<?php

add_action( 'projects_do_each', 'projects_each' );
function projects_each() {
		
	$title = get_the_title();
	$terms = get_the_terms( get_the_ID(), 'projectstatus' );
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	$price = get_post_meta( get_the_ID(), 'price', true );
	
	$permalink = get_the_permalink();
	

	$first_photo_id = isset($photos[0]) ? $photos[0] : null;
	$first_photo_url = null;
	
	if ($first_photo_id) {
		$first_photo_url = wp_get_attachment_image_src($first_photo_id, 'large')[0];
	}
	
	// Rest of the code...

	
	
	$post_classes = get_post_class();
	$post_class_string = implode(' ', $post_classes);    
	printf( '<div class="%s">', $post_class_string );
	
		printf( '<a class="overlay" href="%s"></a>', $permalink );
	
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				printf( '<div class="%s"></div>', $term->slug );
			}
		}
	
		printf( '<div class="featured-image" style="background-image:url(%s);"></div>', $first_photo_url );
		
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		if ( $price )
			printf( '<p class="price">%s</p>', $price );
	
	
	
	
	
	echo '</div>'; // post_class
	
	
	
	
}