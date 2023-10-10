<?php

//* Output staff_biochem before
// add_action( 'before_loop_layout_staff_biochem', 'elodin_staff_biochem_before' );
function elodin_staff_biochem_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each staff_biochem
add_action( 'add_loop_layout_staff_biochem', 'elodin_staff_biochem_each' );
function elodin_staff_biochem_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	
	$email_address = get_post_meta( $id, 'email_address', true );
	$job_title = get_post_meta( $id, 'job_title', true );
    	
	if ( $title )
		printf( '<h3>%s</h3>', $title );
        
    if ( $job_title )
        printf( '<p class="job-title">%s</p>', $job_title );
        
    if ( $email_address )
        printf( '<p class="email_address"><a href="mailto:%s">%s</a></p>', $email_address, $email_address );
    
}