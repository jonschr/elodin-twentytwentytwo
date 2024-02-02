<?php

add_action( 'manufacturers_do_each', 'manufacturers_each' );
function manufacturers_each() {
		
	// Vars
	$title = get_the_title();
	$terms = get_the_terms( get_the_ID(), 'manufacturerstatus' );
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	$url = get_post_meta( get_the_ID(), 'url', true );	
	$permalink = get_the_permalink();
	
	$first_photo_id = isset($photos[0]) ? $photos[0] : null;
	$first_photo_url = null;
	
	if ($first_photo_id) {
		$first_photo_url = wp_get_attachment_image_src($first_photo_id, 'large')[0];
	}
		
	$post_classes = get_post_class();
	$post_class_string = implode(' ', $post_classes);
	
	// Markup
	printf( '<div class="%s">', $post_class_string );
		
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				printf( '<div class="%s"></div>', $term->slug );
			}
		}
	
		printf( '<div class="featured-image" style="background-image:url(%s);">', $first_photo_url );
		
			echo '<div class="overlay">';
				echo '<div class="overlay-wrap">';
				
				if ( $permalink )
					printf( '<a class="manufacturers-button" href="%s">More information</a>', $permalink );
				
				if ( $url )
					printf( '<a class="manufacturers-button visit-online" target="_blank" href="%s">Visit online</a>', $url );
				
				echo '</div>';		
			echo '</div>';
		
		echo '</div>';
		
		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		edit_post_link( 'Edit manufacturer', '<small>', '</small>' );
	
	echo '</div>'; // post_class
	
	
	
	
}