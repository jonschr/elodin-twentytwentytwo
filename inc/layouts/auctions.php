<?php

// [auctions foo="foo-value"]
function auctions_func( $atts ) {
	
	$a = shortcode_atts( array(
		'posts_per_page' => '-1',
	), $atts );

	ob_start();
	
	$today = date('Y-m-d');
	$two_days_ago = date('Y-m-d', strtotime('-2 days'));

	$args = array(
	'post_type' => 'auctions',
	'posts_per_page' => $a['posts_per_page'],
	'meta_key' => 'auction_date',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'auction_date',
			'value' => $two_days_ago,
			'compare' => '>=',
			'type' => 'DATE',
		),
	),
);

	$query = new WP_Query($args);

	if ($query->have_posts()) {

		echo '<div class="auctions-container">';

		while ($query->have_posts()) {
			$query->the_post();

			// output a div with the post_class
			printf( '<div class="%s">', esc_attr( implode( ' ', get_post_class() ) ) );

				$title = get_the_title();
				$auction_date = get_post_meta( get_the_ID(), 'auction_date', true );

				// convert the date to be like "October 1"
				$auction_date = date('F j', strtotime($auction_date));

				$excerpt = get_the_excerpt();
				$hibid_link = get_post_meta( get_the_ID(), 'hibid_link', true );
				$proxibid_link = get_post_meta( get_the_ID(), 'proxibid_link', true );
				
				echo '<div class="auction-info">';
				
					if ( $title ) {
						printf( '<p class="title">%s</p>', esc_html( $title ) );
					}

					if ( $auction_date ) {
						printf( '<h3>%s</h3>', esc_html( $auction_date ) );
					}
					
					edit_post_link( 'Edit auction', '<small>', '</small>' );

					if ( $excerpt ) {
						printf( '<div class="the-excerpt">%s</div>', apply_filters( 'the_content', apply_filters( 'the_content',  $excerpt ) ) );
					}
					
				echo '</div>';
				
				echo '<div class="auction-buttons">';

					if ( $hibid_link ) {
						printf( '<a class="auction-button" href="%s" target="_blank">HiBid</a>', esc_url( $hibid_link ) );
					}

					if ( $proxibid_link ) {
						printf( '<a class="auction-button" href="%s" target="_blank">Proxibid</a>', esc_url( $proxibid_link ) );
					}

				echo '</div>';
			echo '</div>';
		}

		echo '</div>';

		wp_reset_postdata();
	}

	return ob_get_clean();
}
add_shortcode( 'auctions', 'auctions_func' );