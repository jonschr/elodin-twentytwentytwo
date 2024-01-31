<?php

get_header();

photo_slider();

single_service_info();

single_manufacturer_more();

get_footer();

function single_service_info() {
	
	$title = get_the_title();
	$content = apply_filters( 'the_content', get_the_content() );
	
	echo '<div class="single-services-section info">';
		echo '<div class="single-services-wrap">';
		
			if ( $title )
				printf( '<h1>%s</h1>', $title );
							
			if ( $content )
				printf( '<div class="the-content">%s</div>', $content );		
			
		echo '</div>';
	echo '</div>';
}

function single_manufacturer_more() {
	
	$projects = get_post_meta( get_the_ID(), 'project', true );
	
	if ( !$projects )
		return;
	
	$args = array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'post__in' => $projects,
		'orderby' => 'post__in',
	);
	
	$projects = new WP_Query($args);
	
	if ($projects->have_posts()) {
		
		echo '<div class="single-services-section more">';
			echo '<div class="single-services-wrap">';
			
				printf( '<h2>Related Portfolio Items</h2>', get_the_title() );
				
				echo '<div class="projects-default-grid">';
				
					while ($projects->have_posts()) {
						
						$projects->the_post();
						do_action( 'projects_do_each' );
												
					}
				
				echo '</div>';
				
			echo '</div>';
		echo '</div>';
		
		wp_reset_postdata();
		
	}
	
	
}

function photo_slider() {
	
	wp_enqueue_script(
		'slick-main-script'
	);
	
	wp_enqueue_style(
		'slick-main-styles'
	);
		
	wp_enqueue_style(
		'slick-main-theme'
	);
	
	wp_enqueue_script(
		'single-services-slider-init'
	);
		
	echo '<div class="single-services-section images-multiple">';
	
		$photos = get_post_meta( get_the_ID(), 'images', true );
	
		foreach ( $photos as $photo ) {
			
			$url = wp_get_attachment_url( $photo );
			
			echo '<div class="manufacturer-photo-slide">';
				echo wp_get_attachment_image( $photo, 'large', false, array( 'class' => 'photo-multiple' ) );
			echo '</div>';
		}
	
	echo '</div>';
	
}