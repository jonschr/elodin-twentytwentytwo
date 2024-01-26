<?php

function projects_func( $atts ) {
	ob_start();
	
	// query for all 'projects' cpt
	$projects = new WP_Query(
		array(
			'post_type' => 'projects',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		)
	);
	
	if ( $projects->have_posts() ) {
		
		echo '<div class="projects-default-grid">';
		
		// * Loop
		while ( $projects->have_posts() ) {
			$projects->the_post();
			
			do_action( 'projects_do_each' );
		}
		
		wp_reset_postdata();
		
		echo '</div>'; // .projects-default-grid
		
	}
	
	return ob_get_clean();
}
add_shortcode( 'projects', 'projects_func' );