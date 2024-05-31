<?php

function bean_recipes() {
	
	if ( have_posts() ) {
		
		echo '<div class="container">';
		
		while ( have_posts() ) {
			
			the_post(); 
			
			global $post;
			// markup
			$post_class_array = get_post_class( $class = '', get_the_ID() );
			$post_class = implode( ' ', $post_class_array );
			
			printf( '<article class="%s">', $post_class );
			
				do_action( 'bean_do_recipes_each' );
					
			echo '</article>';
			
		} // end while
		
		echo '</div>'; // .container
		
	} else {
		echo 'So sorry! Nothing found.';
	}
}
add_action( 'bean_do_recipes', 'bean_recipes' );

function bean_recipes_each() {
	
	$title = get_the_title();
	
	// markup
	$post_class_array = get_post_class( $class = '', get_the_ID() );
	$post_class = implode( ' ', $post_class_array );
	
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	printf( '<a class="overlay" href="%s"></a>', esc_url( get_the_permalink() ) );
	
	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', esc_url( $background ) );

	echo '<div class="the-content">';
		printf( '<h3>%s</h3>', esc_html( $title ) );
	echo '</div>';
}
add_action( 'bean_do_recipes_each', 'bean_recipes_each' );