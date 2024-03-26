<?php

//* Output ljb_staff before
// add_action( 'before_loop_layout_ljb_staff', 'elodin_ljb_staff_before' );
function elodin_ljb_staff_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each ljb_staff
add_action( 'add_loop_layout_ljb_staff', 'elodin_ljb_staff_each' );
function elodin_ljb_staff_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = apply_filters( 'the_content', get_the_content() );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	$job_title = get_post_meta( get_the_ID(), 'job_title', true );
	
	if ( !$content )
		$permalink = null;
        
    echo '<details>';
    
        echo '<summary>';
        
            if ( $title )
                printf( '<h2 class="is-style-purple-line">%s</h2>', $title );
                
            if ( $job_title )
                printf( '<p class="job-title">%s</p>', $job_title );
                
            echo '<div class="marker"><span class="dashicons dashicons-arrow-right"></span></div>';
                
        echo '</summary>';
        
        echo '<div class="staff-details">'; 
    
            if ( $content )
                echo $content;
        
        echo '</div>';
    echo '</details>';
				
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

	
}