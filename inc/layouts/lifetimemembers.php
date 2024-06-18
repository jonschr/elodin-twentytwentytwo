<?php

// [bartag foo="foo-value"]
function lifetimemembers_func( $atts ) {
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
				'key' => 'lifetime_member',
				'value' => true,
				'compare' => '===',
			),
		),
	);

	// The Query
	$custom_query = new WP_Query( $args );

	// The Loop
	if ( $custom_query->have_posts() ) {
		
		echo '<div class="people-container">';

		while ( $custom_query->have_posts() ) {
			
			$custom_query->the_post();

			printf( '<div class="%s">', implode( ' ', get_post_class() ) );
				do_action( 'do_lifetimemember_each' );

			echo '</div>';

		}
		
		echo '</div>'; // .people-container
		
		// Restore postdata
		wp_reset_postdata();

	}

	return ob_get_clean();
}
add_shortcode( 'lifetimemembers', 'lifetimemembers_func' );