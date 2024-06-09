<?php

function output_inductees() {

	if ( have_posts() ) {
		
		echo '<div class="inductees">';
		
		while ( have_posts() ) {
			
			the_post(); 
			
			global $post;
			
			// markup
			$post_class_array = get_post_class( $class = '', get_the_ID() );
			$post_class = implode( ' ', $post_class_array );
			
			printf( '<div class="%s">', $post_class );
			
				do_action( 'do_inductee_each' );
					
			echo '</div>';
			
		} // end while
		
		echo '</div>'; // .inductees
		
	} else {
		echo 'So sorry! Nothing found.';
	}
}
add_action( 'do_output_inductees', 'output_inductees' );


function inductee_each() {
	
	// vars
	$title = get_the_title( get_the_ID() );
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	$induction_year = get_post_meta( get_the_ID(), 'induction_year', true );
	
	// var_dump( $photos );
	
	if ( $photos ) {
		$photo_url = wp_get_attachment_image_url( $photos[0], 'large' );
	}
	
	printf( '<div class="featured-image" style="background-image:url(%s);"></div>', $photo_url );
	
	echo '<div class="the-info">';
		printf( '<h3>%s</h3>', $title );
		
		if ( $induction_year ) {
			printf( '<p class="induction-year">Hall of Fame class of %s</p>', $induction_year );
		}
		
		
	echo '</div>';
	
}
add_action( 'do_inductee_each', 'inductee_each' );