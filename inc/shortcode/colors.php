<?php

// [colors foo="foo-value"]
function colors_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
    ), $atts );
	
	ob_start();
	
	// get the current post ID
	$post_id = get_the_ID();
	
	// get the colors for this post
	$colors = get_post_meta( $post_id, 'connected_colors', true );
		
	// set an impossible post ID to make sure colors are not empty
	if ( empty( $colors ) ) {
		$colors = [1];
	}
	
	// query for the colortype taxonomy terms that are not empty
	$terms = get_terms( array(
		'taxonomy' => 'colortype',
		'hide_empty' => true,
	) );
	
	// for each tax term, display the colors that are also in the $color array
	foreach ( $terms as $term ) {
		
		echo '<div class="color-term-wrapper">';
		
		$args = array(
			'post_type' => 'colors',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'post__in' => $colors,
			'tax_query' => array(
				array(
					'taxonomy' => 'colortype',
					'field' => 'slug',
					'terms' => $term->slug,
				),
			),
		);
		
		$color_query = new WP_Query( $args );
		
		if ( $color_query->have_posts() ) {
			
			echo '<div class="color-type">';
				printf( '<h3>%s</h3>', $term->name );
				
				echo '<ul class="colors">';
				
				while ( $color_query->have_posts() ) {

					$color_query->the_post();
					
					
					$color = get_the_title();
					$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					$color_hex = get_post_meta( get_the_ID(), 'color', true );
																				
					echo '<li>';
							printf( '<div class="the-color" style="background-color:%s; background-image:url(%s);"></div>', $color_hex, $background );
							printf( '<div class="content-wrap">%s</div>', $color );
					echo '</li>';
				}
				
				echo '</ul>';
			echo '</div>';
			
		}
		
		echo '</div>'; // .color-term-wrapper
	}
	
	
	return ob_get_clean();
}
add_shortcode( 'colors', 'colors_func' );


$args = array(
	'post_type' => 'testimonials',
	'posts_per_page' => '1'
);

// The Query
$custom_query = new WP_Query( $args );

// The Loop
if ( $custom_query->have_posts() ) {

	while ( $custom_query->have_posts() ) {
		
		$custom_query->the_post();

		printf( '<div class="%s">', implode( get_post_class(), ' ' ) );
		
			get_template_part( 'partials/testimonials', 'footer' );

		echo '</div>';

	}
	
	// Restore postdata
	wp_reset_postdata();

}