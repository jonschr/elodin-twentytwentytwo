<?php

// [bartag foo="foo-value"]
function donors_func( $atts ) {
	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );
	
	ob_start();
	
	$args = array(
		'post_type' => 'people',
		'posts_per_page' => '-1',
		'meta_query' => array(
			array(
				'key' => 'donation_amount',
				'value' => 0,
				'compare' => '>',
				'type' => 'NUMERIC',
			),
		),
		'meta_key' => 'donation_amount',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
	);

	// The Query
	$custom_query = new WP_Query( $args );

	// The Loop
	if ( $custom_query->have_posts() ) {
		
		echo '<div class="people-container">';

		while ( $custom_query->have_posts() ) {
			
			$custom_query->the_post();

			printf( '<div class="%s">', implode( ' ', get_post_class() ) );
				do_action( 'do_donor_each' );

			echo '</div>';

		}
		
		echo '</div>'; // .people-container
		
		// Restore postdata
		wp_reset_postdata();

	}

	return ob_get_clean();
}
add_shortcode( 'donors', 'donors_func' );

function output_donor() {
	$donation_amount = get_post_meta( get_the_ID(), 'donation_amount', true );
	$title = get_the_title();
	
	echo '<div class="people-inner">';
	
		if ( $title ) {
			printf( '<h3>%s</h3>', $title );
		}
		
		if ( $donation_amount ) {
			printf( '<p class="donation-amount">$%s</p>', $donation_amount );
		}
		
	echo '</div>';
}
add_action( 'do_donor_each', 'output_donor' );