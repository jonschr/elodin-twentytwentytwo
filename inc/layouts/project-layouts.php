<?php

/**
 * [projects_slider description]
 *
 * @param   [type]  $atts  [$atts description]
 *
 * @return  [type]         [return description]
 */
function projects_slider( $atts ) {
	
	// Enqueue Slick scripts and styles
	wp_enqueue_script('slick-main-script');
	wp_enqueue_style('slick-main-styles');
	wp_enqueue_style('slick-main-theme');
	wp_enqueue_script('projects-slider');
	
	ob_start();
		
	$a = shortcode_atts( array(
		'projectservices' => null,
		'projectcategories' => null,
	), $atts );
	
	// if there are values for either the projectservices or projectcategories, we'll only get projects that match either of those values (OR query). If no values are found, get ALL projects
	$tax_query = array();
	
	if( $a['projectservices'] ) {
		$tax_query[] = array(
			'taxonomy' => 'projectservices',
			'field' => 'slug',
			'terms' => $a['projectservices'],
		);
	}
	
	if( $a['projectcategories'] ) {
		$tax_query[] = array(
			'taxonomy' => 'projectcategories',
			'field' => 'slug',
			'terms' => $a['projectcategories'],
		);
	}
	
	// get the projects
	$projects = new WP_Query( array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'tax_query' => $tax_query,
	) );
	
	// for each project, let's output the project name
	if ( $projects->have_posts() ) {
		
		echo '<div class="projects-slider">';
		
			while( $projects->have_posts() ) {
				$projects->the_post();
				
				echo '<div class="project">';
							
					$title = get_the_title();
					$permalink = get_the_permalink();
				
					$photos = get_post_meta( get_the_ID(), 'photos', true );
					$photo = wp_get_attachment_image( $photos[0], 'square' );
					
					if ( !$photo ) {
						continue;
					}
					
					printf( '<a class="overlay" href="%s"></a>', $permalink );
					
					echo $photo;
					
					printf( '<div class="content"><h4>%s</h4></div>', $title );
				
				echo '</div>';
			}
			
		echo '</div>';
		
	}

	return ob_get_clean();
}
add_shortcode( 'projects', 'projects_slider' );

/**
 * The full layout for all of the projects 
 *
 * @param   array  $atts  [$atts description]
 *
 * @return  string the markup for the projects layout
 */
function projects_category_layout( $atts ) {
	
	// Enqueue Slick scripts and styles
	wp_enqueue_script('slick-main-script');
	wp_enqueue_style('slick-main-styles');
	wp_enqueue_style('slick-main-theme');
	wp_enqueue_script('projects-slider');
	
	ob_start();
	
	// get the projectcategories in use for the projects post_type 
	$projectcategories = get_terms( array(
		'taxonomy' => 'projectcategories',
		'hide_empty' => true,
	) );
	
	foreach( $projectcategories as $cat ) {
		
		// get the cat slug
		$cat_slug = $cat->slug;
		
		// build the tax query using the projectcategories taxonomy and the $cat->slug
		$tax_query = array(
			array(
				'taxonomy' => 'projectcategories',
				'field' => 'slug',
				'terms' => $cat_slug,
			),
		);
	
		echo '<div class="project-section">';
			echo '<div class="wrap">';
			
				printf( '<h3 class="category-name">%s</h3>', $cat->name );
				
				// get the projects
				$projects = new WP_Query( array(
					'post_type' => 'projects',
					'posts_per_page' => -1,
					'tax_query' => $tax_query,
				) );
				
				// for each project, let's output the project name
				if ( $projects->have_posts() ) {
					
					echo '<div class="projects-slider">';
					
					while( $projects->have_posts() ) {
						$projects->the_post();
						
						echo '<div class="project">';
						
							$title = get_the_title();
							$permalink = get_the_permalink();
						
							$photos = get_post_meta( get_the_ID(), 'photos', true );
							$photo = wp_get_attachment_image( $photos[0], 'square' );
							
							if ( !$photo ) {
								continue;
							}
							
							printf( '<a class="overlay" href="%s"></a>', $permalink );
							
							echo $photo;
							
							printf( '<div class="content"><h4>%s</h4></div>', $title );
						
						echo '</div>';
					}
					
					echo '</div>';
					
				}

			echo '</div>';
		echo '</div>';
		
	}
	
	return ob_get_clean();
}
add_shortcode( 'projectscategorylayout', 'projects_category_layout' );