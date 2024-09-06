<?php

add_filter( 'gform_pre_render_3', 'elodin_populate_classes' );
function elodin_populate_classes( $form ) {
	  
  // Get the current page's slug
  global $post;
  $current_slug = $post->post_name;
  
  foreach( $form['fields'] as &$field ) {
	
		// Field ID number where you want to populate choices
		if( 5 === $field->id ) {
			
			$args = array(
				'post_type' => 'classes',
				'posts_per_page' => '-1',
			);

			// The Query
			$custom_query = new WP_Query( $args );

			// The Loop
			if ( $custom_query->have_posts() ) {

				$choices = array(); // Ensure choices is defined

				while ( $custom_query->have_posts() ) {
					
					$custom_query->the_post();

					$title = get_the_title();
					$slug = get_post_field( 'post_name', get_post() );

					$choice = array(
						'text' => $title,
						'value' => $slug
					);

					// Check if this choice matches the current page slug
					if ( $slug === $current_slug ) {
						$choice['isSelected'] = true;
					}

					$choices[] = $choice;
				}
				
				// Restore postdata
				wp_reset_postdata();
			}

			// Assign the choices to the field
			$field['choices'] = $choices;
		} 
	} 
	
	return $form;
}
