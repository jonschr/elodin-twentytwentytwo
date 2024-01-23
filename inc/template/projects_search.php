<?php


add_action( 'projects_search', 'projects_search_func' );
function projects_search_func() {
	
	if ( have_posts() ) {
		
		while ( have_posts() ) {
			
			the_post(); 
			
			global $post;
			
			do_action( 'projects_do_each' );
			
		} // end while
		
	} else {
		
		echo 'So sorry! Nothing found.';
		
	}
	
}