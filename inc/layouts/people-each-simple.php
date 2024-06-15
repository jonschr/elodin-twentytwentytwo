<?php

function people_each_simple() {
	
	echo '<div class="people-inner">';
	
		$title = get_the_title();
		$graduation_year = get_post_meta( get_the_ID(), 'graduation_year', true );
		
		if ( $title ) {
			printf( '<h3>%s</h3>', $title );
		}
		
		if ( $graduation_year ) {
			printf( '<p class="class">Class of %s</p>', $graduation_year );
		}
	
	echo '</div>';
	
}
add_action( 'do_founder_each', 'people_each_simple' );
add_action( 'do_board_each', 'people_each_simple' );
add_action( 'do_lifetimemember_each', 'people_each_simple' );
