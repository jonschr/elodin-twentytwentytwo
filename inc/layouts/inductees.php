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

