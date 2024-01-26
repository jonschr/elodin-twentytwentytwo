<?php

get_header();

single_manufacturer_info();

single_manufacturer_images();

single_manufacturer_more();
	

	
// single_manufacturer_details();

get_footer(); 


function single_manufacturer_images() {
	
	$photos = get_post_meta( get_the_ID(), 'photos', true );
		
		if (count($photos) === 1) {
			photo_single();
		} elseif (count($photos) > 1) {
			photo_slider();
		} else {
			return;
		}
	

}

function single_manufacturer_info() {
	
	$title = get_the_title();
	$url = get_post_meta( get_the_ID(), 'url', true );
	$excerpt = apply_filters( 'the_content', get_the_excerpt() );
	
	echo '<div class="single-manufacturers-section info">';
		echo '<div class="single-manufacturer-wrap">';
		
			if ( $title )
				printf( '<h1>%s</h1>', $title );
				
			if ( $url )
				printf( '<a class="external-manufacturer-url" target="_blank" href="%s">Visit online</a>', $url );
			
			if ( $excerpt )
				printf( '<div class="excerpt">%s</div>', $excerpt );
		
			
		echo '</div>';
	echo '</div>';
}

function single_manufacturer_details() {
	
	
	$interior_notes = get_post_meta( get_the_ID(), 'interior_notes', true );
	$exterior_notes = get_post_meta( get_the_ID(), 'exterior_notes', true );
	
	if ( !$interior_notes && !$exterior_notes )
		return;
		
	echo '<div class="single-manufacturers-section details">';
		echo '<div class="single-manufacturer-wrap">';
		
			echo '<div class="notes">';
	
				if ( $interior_notes )
					printf( '<div class="interior-notes column"><h2>Interior notes</h2>%s</div>', $interior_notes );
					
				if ( $exterior_notes )
					printf( '<div class="exterior-notes column"><h2>Exterior notes</h2>%s</div>', $exterior_notes );
				
			echo '</div>';
		
		echo '</div>';
	echo '</div>';
	
}

function photo_single() {
	
	echo '<div class="single-manufacturers-section images-singular">';
	
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	
	foreach ( $photos as $photo ) {
		
		$url = wp_get_attachment_url( $photo );
		
		printf( '<a class="popup popup-image" href="%s">', $url );
			echo wp_get_attachment_image( $photo, 'full', false, array( 'class' => 'photo-single' ) );
		echo '</a>';
	}
	
	echo '</div>';
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
        'single-manufacturer-slider-init'
    );
		
	echo '<div class="single-manufacturers-section images-multiple">';
	
		$photos = get_post_meta( get_the_ID(), 'photos', true );
	
		foreach ( $photos as $photo ) {
			
			$url = wp_get_attachment_url( $photo );
			
			printf( '<div class="manufacturer-photo-slide"><a class="popup popup-image" href="%s">', $url );
				echo wp_get_attachment_image( $photo, 'large', false, array( 'class' => 'photo-multiple' ) );
			echo '</a></div>';
		}
	
	echo '</div>';
	
}

function single_manufacturer_more() {
	
	$projects = get_post_meta( get_the_ID(), 'projects', true );
	
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
		
		echo '<div class="single-manufacturers-section more">';
			echo '<div class="single-manufacturer-wrap">';
			
				printf( '<h2>%s Projects</h2>', get_the_title() );
				
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