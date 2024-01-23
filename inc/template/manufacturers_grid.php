<?php

// [manufacturers_grid foo="foo-value"]
function manufacturers_grid_func( $atts ) {
    ob_start();
	
	// do a query for all manufacturers
	$args = array(
		'post_type' => 'manufacturers',
		'posts_per_page' => -1,
	);
	
	$manufacturers = new WP_Query($args);
	
	if ($manufacturers->have_posts()) {
		
		echo '<div class="manufacturers-grid">';
		
			while ($manufacturers->have_posts()) {
				
				$manufacturers->the_post();
				do_action( 'manufacturers_do_each' );
				
			}
		
		echo '</div>';
		
		wp_reset_postdata();
		
	}
	
	return ob_get_clean();
}
add_shortcode( 'manufacturers_grid', 'manufacturers_grid_func' );