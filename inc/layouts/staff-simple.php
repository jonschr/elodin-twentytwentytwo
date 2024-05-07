<?php

//* Output the scripts for the leadership section
remove_action( 'before_loop_layout_staff_simple', 'elodin_staff_simple_layout_scripts' );
add_action( 'before_loop_layout_staff_simple', 'mtnview_staff_simple_before' );
function mtnview_staff_simple_before( $args ) {
		
	//* Add the main styles
	wp_enqueue_style( 'es-staff-style' );

}

//* Output the leadership markup for each item
remove_action( 'add_loop_layout_staff_simple', 'elodin_staff_simple_layout' );
add_action( 'add_loop_layout_staff_simple', 'mtnview_staff_simple_each' );
function mtnview_staff_simple_each() {

	$jobtitle = esc_html( get_post_meta( get_the_ID(), 'job_title', true ) );
	$content = apply_filters( 'the_content', wp_kses_post( get_the_content() ) ); // note: when we output this, we're applying the filters again. That's intentional because Gutenberg is removing that filter once, and it manifests in breaking the first loop through the_content.
	$title = esc_html( get_the_title() );
	$email = esc_html( get_post_meta( get_the_ID(), 'email_address', true ) );
	$phone = esc_html( get_post_meta( get_the_ID(), 'phone_number', true ) );
	$linkedin = esc_url( get_post_meta( get_the_ID(), 'linkedin', true ) );
	$twitter = esc_url( get_post_meta( get_the_ID(), 'twitter', true ) );
	$facebook = esc_url( get_post_meta( get_the_ID(), 'facebook', true ) );
	$slug = esc_html( get_post_field( 'post_name', get_post() ) );

	//* Main content
	if ( $title )
		printf( '<h3>%s</h3>', $title );

	if ( $jobtitle )
		printf( '<p class="jobtitle">%s</p>', $jobtitle );
	
	if ( $email ) 
		printf( '<p class="email"><a href="mailto:%s">%s</a></p>', $email, $email );
	
	if ( $phone )
		printf( '<p class="phone">%s</p>', $phone );

	//* Lightbox trigger
	if ( $content )
		printf( '<a href="#staff-%s" class="overlay-link staff-lightbox" data-gallery="%s"><span class="">View Bio</span></a>', get_the_ID(), get_the_ID() );
		// printf( '<a href="#" data-src="#staff-%s" data-fancybox="%s" class="overlay-link"><span class="">View Bio</span></a>', get_the_ID(), $slug );
		// printf( '<a href="#staff-%s" class="overlay-link" data-lity><span class="">View Bio</span></a>', get_the_ID(), get_the_ID() );
		
	//* Lightbox
	if ( $content )
		do_action( 'elodin_do_staff_content' );
		
}