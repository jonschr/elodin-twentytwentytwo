<?php

// [bartag foo="foo-value"]
function output_locations_shortcode( $atts ) {
	
	ob_start();

	$a = shortcode_atts( array(
		'posts_per_page' => '-1',
	), $atts );
	
	$args = array(
		'post_type' => 'locations',
		'posts_per_page' => $a['posts_per_page'],
	);

	// The Query
	$custom_query = new WP_Query( $args );

	// The Loop
	if ( $custom_query->have_posts() ) {
		
		echo '<div class="locations-container">';

		while ( $custom_query->have_posts() ) {
			
			$custom_query->the_post();

			printf( '<div class="%s">', implode( ' ', get_post_class() ) );
			
				do_action( 'do_output_location_each' );

			echo '</div>';

		}
		
		echo '</div>';
		
		// Restore postdata
		wp_reset_postdata();

	}
	
	return ob_get_clean();

	
}
add_shortcode( 'locations', 'output_locations_shortcode' );

function output_locations() {
	
	
}

function output_location_each() {
	
	$title = get_the_title();
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	$learning_session_url = get_post_meta( get_the_ID(), 'learning_session_url', true );
	$permalink = get_the_permalink();
	
	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', esc_url( $background ) );

	echo '<div class="the-content">';
	
		if ( $title ) {
			printf( '<h3>%s</h3>', esc_html( $title ) );
		}
		
		if ( $learning_session_url ) {
			printf( '<a class="btn" target="_blank" href="%s">Schedule a Learning Session</a>', esc_url( $learning_session_url ) );
		}
		
		if ( $permalink ) {
			printf( '<p class="location-link"><a href="%s">View Location</a></p>', esc_url( $permalink ) );
		}
	
	echo '</div>';
	
}
add_action( 'do_output_location_each', 'output_location_each' );