<?php

add_filter( 'gform_pre_render_3', 'elodin_populate_classes' );
function elodin_populate_classes( $form ) {
	  
  foreach( $form['fields'] as &$field ) {
	
		// field ID number
		if( 5 === $field->id ) {
			
			$args = array(
				'post_type' => 'classes',
				'posts_per_page' => '-1',
			);

			// The Query
			$custom_query = new WP_Query( $args );

			// The Loop
			if ( $custom_query->have_posts() ) {

				while ( $custom_query->have_posts() ) {
					
					$custom_query->the_post();

					$title = get_the_title();
					$slug = get_post_field( 'post_name', get_post() );

					$choices[] = array(
						'text' => $title,
						'value' => $slug
					);

				}
				
				// Restore postdata
				wp_reset_postdata();

			}
		
			$field['choices'] = $choices;
			
		} 
	} 
	
	return $form;
}