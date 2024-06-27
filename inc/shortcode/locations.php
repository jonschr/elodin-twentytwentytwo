<?php

// [locations foo="foo-value"]
function output_locations( $atts ) {
	
	ob_start();
	
	$args = array(
		'post_type' => 'states',
		'posts_per_page' => '-1',
		'orderby' => 'title',
		'order' => 'ASC'
	);

	// The Query
	$custom_query = new WP_Query( $args );

	// The Loop
	if ( $custom_query->have_posts() ) {
		
		echo '<div class="locations-wrap">';

		while ( $custom_query->have_posts() ) {
			
			$custom_query->the_post();

			printf( '<div class="%s">', esc_attr( implode( ' ', get_post_class() ) ) );
						
				do_action( 'bds_do_each_location' );

			echo '</div>';

		}
		
		echo '</div>'; // .locations-wrap
		
		// Restore postdata
		wp_reset_postdata();

	}
	
	return ob_get_clean();
}
add_shortcode( 'locations', 'output_locations' );


function bds_each_location() {
	
	$title = get_the_title();
	$permalink = get_the_permalink();
	
	echo '<div class="location-details">';
	
		printf( '<h2>%s <a class="more-info" href="%s">More information</a></h2>', esc_html( $title ), esc_url( $permalink ) );
		
	echo '</div>'; // .location-details
	
	$related_cities = get_post_meta( get_the_ID(), 'related_cities', true );
	
	if ( $related_cities && is_array( $related_cities ) ) {
		
		$args = array(
			'post_type' => 'cities',
			'posts_per_page' => '-1',
			'post__in' => $related_cities
		);

		// The Query
		$custom_query = new WP_Query( $args );

		// The Loop
		if ( $custom_query->have_posts() ) {
			
			echo '<div class="cities-wrap">';

			while ( $custom_query->have_posts() ) {
				
				$custom_query->the_post();

				printf( '<div class="%s">', esc_attr( implode( ' ', get_post_class() ) ) );
				
					do_action( 'bds_do_each_city' );

				echo '</div>';

			}
			
			echo '</div>'; // .cities-grid
			
			// Restore postdata
			wp_reset_postdata();

		}
		
	}	
}
add_action( 'bds_do_each_location', 'bds_each_location' );

function bds_each_city() {

	$title = get_the_title();
	$permalink = get_the_permalink();
	
	printf( '<a class="overlay" href="%s"></a>', esc_url( $permalink ) );
	
	if ( $title ) {
		printf( '<h3>%s</h3>', esc_html( $title ) );
	}
	
}
add_action( 'bds_do_each_city', 'bds_each_city' );