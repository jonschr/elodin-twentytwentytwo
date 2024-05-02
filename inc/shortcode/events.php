<?php

// [bartag foo="foo-value"]
function mve_events( $atts ) {
	$a = shortcode_atts( array(
		'posts_per_page' => '-1',
		'columns' => '3',
	), $atts );
	
	ob_start();
	
	// query for events
	$args = array(
		'post_type' => 'events',
		'posts_per_page' => $a['posts_per_page'],
		'order' => 'ASC',
		'orderby' => 'meta_value',
		'meta_key' => 'event_date',
		'meta_type' => 'DATE',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => date('Y-m-d'),
				'compare' => '>=',
				'type' => 'DATE',
			),
		),
	);

	// The Query
	$events_query = new WP_Query( $args );

	// The Loop
	if ( $events_query->have_posts() ) {

		printf( '<div class="events-wrap events-columns-%s">', $a['columns'] );

		while ( $events_query->have_posts() ) {

			$events_query->the_post();

			$title = get_the_title();
			$date = get_post_meta( get_the_ID(), 'event_date', true );
			$date_human = date( 'F j, Y', strtotime( $date ) );
			$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
			$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );	

			printf( '<div class="%s">', implode( ' ', get_post_class() ) );

				echo '<div class="loop-item-inner">';

					printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

					echo '<div class="event-content">';

						printf( '<h3>%s</h3>', $title );
						printf( '<p class="date">%s</p>', $date_human );
						printf( '<div class="excerpt">%s</div>', wp_kses_post( $excerpt ) );

					echo '</div>'; // .content

				echo '</div>'; // .loop-item-inner

			echo '</div>';

		}

		echo '</div>'; // .events-wrap

		// Restore postdata
		wp_reset_postdata();

	}

	return ob_get_clean();
}
add_shortcode( 'events', 'mve_events' );