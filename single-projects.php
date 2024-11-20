<?php

get_header();

add_action( 'do_single_project', 'soi_single_project_header' );
add_action( 'do_single_project', 'soi_single_project_main_image' );
add_action( 'do_single_project', 'soi_single_project_tags' );
add_action( 'do_single_project', 'soi_single_project_gallery' );
add_action( 'do_single_project', 'soi_single_project_content' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		
		do_action( 'do_single_project' );
	
		//
	} // end while
} // end if

get_footer();

function soi_single_project_header() {
	
	$title = get_the_title();
	
	echo '<div class="project-header section-content">';
		echo '<div class="container">';
			printf( '<p class="is-style-kicker">%s</p>', $title );
			echo '<p class="entry-header">Portfolio</p>';
		echo '</div>';
	echo '</div>';
}

function soi_single_project_main_image() {
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	
	// get the URL for the large image, not the image markup
	$photo_url = wp_get_attachment_image_url( $photos[0], 'full' );
	
	// bail if there's nothing to show
	if ( !$photo_url ) {
		return;
	}
	
	printf( '<div class="hero-image" style="background-image:url( %s );"></div>', $photo_url );
	
}

function soi_single_project_tags() {
	
	$terms = get_post_meta( get_the_ID(), 'featured_terms', true );
		
	if ( !$terms ) {
		return;
	}
	
	$terms = (int) $terms;
	
	echo '<div class="section-content terms">';
		echo '<div class="wrap">';
			echo '<div class="the-terms">';
				for ( $i = 0; $i < $terms; $i++ ) {
					$term_label = get_post_meta( get_the_ID(), 'featured_terms_' . $i . '_term', true );
					printf( '<div class="term">%s</div>', $term_label );
				}	
			echo '</div>';
		echo '</div>';
	echo '</div>';
	
	
}

function soi_single_project_gallery() {
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	
	// drop $photos[0]
	array_shift( $photos );
	
	// bail if there's no gallery
	if ( !$photos || 1 > count( $photos ) ) {
		return;
	}
	
	printf( '<div class="single-project-gallery photos-%s">', count( $photos ) );
		foreach( $photos as $photo ) {
			$photo_url = wp_get_attachment_image_url( $photo, 'large' );
			printf( '<a class="gallery-image popup" href="%s" style="background-image:url( %s );"></a>', $photo_url, $photo_url );
		}
	echo '</div>';
}

function soi_single_project_content() {
	$content = get_the_content();
	
	// bail if there's no content.
	if ( !$content ) {
		return;
	}
	
	echo '<div class="section-content">';
		echo '<div class="wrap">';
			the_content();
		echo '</div>';
	echo '</div>';
}