<?php

//* Output services_home_loit before
// add_action( 'before_loop_layout_services_home_loit', 'elodin_services_home_loit_before' );
function elodin_services_home_loit_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each services_home_loit
add_action( 'add_loop_layout_services_home_loit', 'elodin_services_home_loit_each' );
function elodin_services_home_loit_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	// $thing = get_post_meta( $id, 'thing', true );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $background ) {
        echo '<div class="featured-image-container">';
            printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
            echo '<div class="featured-bkg"></div>';
        echo '</div>';
    }

	if ( $title )
		printf( '<h3>%s</h3>', $title );
        
    if ( $excerpt )
        printf( '<div class="excerpt">%s</div>', $excerpt );
}