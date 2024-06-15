<?php

function people_each() {
	
	global $post;
	
	// vars
	$title = get_the_title( get_the_ID() );
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	$induction_year = get_post_meta( get_the_ID(), 'induction_year', true );
	$content = apply_filters( 'the_content', get_the_content() );
	
	// var_dump( $photos );
	
	if ( $photos ) {
		$photo_url = esc_url( wp_get_attachment_image_url( $photos[0], 'large' ) );
	} else {
		$photo_url = null;
	}
	
	printf( '<div class="featured-image" style="background-image:url(%s);">', $photo_url );
	
		if ( $content ) {
			printf( '<a href="#inductee-%s" class="overlay-link inductee-lightbox-link" data-gallery="overlay-link-%s"><span class="more-info">More information</span></a>', $post->post_name, (int) get_the_ID() );
		}
	
	echo '</div>'; // .featured-image
	
	echo '<div class="the-info">';
		printf( '<h3>%s</h3>', $title );
		
		if ( $induction_year ) {
			printf( '<p class="induction-year">Hall of Fame class of %s</p>', (int) $induction_year );
		}
		
	echo '</div>';
	
	printf( '<div style="display: none;" id="inductee-%s" class="inductee-lightbox">', $post->post_name );
	
		$title = get_the_title();
		$induction_year = get_post_meta( get_the_ID(), 'induction_year', true );
		$graduation_year = get_post_meta( get_the_ID(), 'graduation_year', true );
		$photos = get_post_meta( get_the_ID(), 'photos', true );
		
		$info_string = null;
		
		if ( $induction_year && $graduation_year ) {
			$info_string = sprintf( 'Class of %s, inducted in %s into the Hall of Fame', $graduation_year, $induction_year );
		} elseif ( $induction_year && ! $graduation_year ) {
			$info_string = sprintf( 'Inducted in %s into the Hall of Fame', $induction_year );
		} elseif ( ! $induction_year && $graduation_year ) {
			$info_string = sprintf( 'Class of %s', $graduation_year );
			
		}
		
		$content = apply_filters( 'the_content', get_the_content() );
		
		// get the terms from the 'sport' taxonomy for this post
		$terms = get_the_terms( get_the_ID(), 'sport' );
		
		// output the names of the terms, like "Soccer · Baseball · Football"
		$term_names = null;
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$term_names[] = $term->name;
			}
			$term_names = implode( ' · ', $term_names );
		}
		
		
		
		//! Markup
		
		if ( $title ) {
			printf( '<h2>%s</h2>', $title );
		}
		
		if ( $terms ) {
			printf( '<p class="sport">%s</p>', $term_names );
		}
		
		if ( $info_string ) {
			printf( '<p class="info">%s</p>', $info_string );
		}
		
		if ( $photos ) {
			echo '<div class="gallery">';
			
			foreach( $photos as $photo ) {
				$photo_url = esc_url( wp_get_attachment_image_url( $photo, 'large' ) );
				printf( '<div class="gallery-item"><img src="%s" .></div>', $photo_url );
			}
			
			echo '</div>';
		}
		
		if ( $content ) {
			echo '<div class="lightbox-content">';
				echo wp_kses_post( $content );
			echo '</div>';
		}
	
		//! Output the permalink
				
		// if ( is_page( 'inductees' ) ) {
			
			// get the current URL.
			$url = home_url( add_query_arg( null, null ) );
			
			// remove all query parameters and store them in a variable.
			$url = strtok( $url, '?' );
	
			// append the staff member's ID, like #staff-%s.
			$url .= '#inductee-' . $post->post_name;
	
			printf( '<p class="inductee-permalink"><a target="_blank" href="%s">Permalink</a></p>', esc_url( $url ) );
			
		// }

	echo '</div>';
	
	
	
}
add_action( 'do_inductee_each', 'people_each' );