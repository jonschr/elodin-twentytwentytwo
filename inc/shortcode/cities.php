<?php

function output_cities() {

	ob_start();
	
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
	
	return ob_get_clean();
}
add_shortcode( 'cities', 'output_cities' );