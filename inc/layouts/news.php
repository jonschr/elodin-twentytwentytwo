<?php 

// [news foo="foo-value"]
function news_func( $atts ) {
    ob_start();
	
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => '-1',
	);

	// The Query
	$custom_query = new WP_Query( $args );

	// The Loop
	if ( $custom_query->have_posts() ) {
		
		echo '<div class="news-container">';

		while ( $custom_query->have_posts() ) {
			
			$custom_query->the_post();

			printf( '<div class="%s">', esc_attr( implode( ' ', get_post_class() ) ) );
			
				do_action( 'daughtering_do_each_news' );

			echo '</div>';

		}
		
		echo '</div>';
		
		// Restore postdata
		wp_reset_postdata();

	}
	
	return ob_get_clean();
}
add_shortcode( 'news', 'news_func' );

function daughtering_each_news() {
	
	$title = get_the_title();
	$external_url = get_post_meta( get_the_ID(), 'external_link', true );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	$year = get_the_date( 'Y' ); // Get the publish year
	
	printf( '<a href="%s" target="_blank" class="featured-image" style="background-image:url( %s )"></a>', esc_url( $external_url ), esc_url( $background ) );
	
	if ( $title ) {
		printf( '<h3>%s (%s)</h3>', esc_html( $title ), esc_html( $year ) );
	}
}
add_action( 'daughtering_do_each_news', 'daughtering_each_news' );