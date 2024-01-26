<?php

function manufacturers_slider_func() {
	
	ob_start();
	
	$args = array(
		'post_type' => 'manufacturers',
		'posts_per_page' => -1,
	);
	
	$manufacturers = new WP_Query($args);
	
	if ($manufacturers->have_posts()) {
		
		wp_enqueue_style( 'slick-main-styles' );
		wp_enqueue_style( 'slick-main-theme' );
		wp_enqueue_script( 'slick-main-script' );
		wp_enqueue_script( 'manufacturers-slider-init' );
		
		echo '<div class="manufacturers-slider">';
		
			while ($manufacturers->have_posts()) {
				
				$manufacturers->the_post();
				do_action( 'manufacturers_do_each' );
				
			}
		
		echo '</div>';
		
		wp_reset_postdata();
		
	}
	
	return ob_get_clean();
	
}
add_shortcode( 'manufacturers_slider', 'manufacturers_slider_func');
