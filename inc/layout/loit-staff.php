<?php

//* Output loit_staff before
// add_action( 'before_loop_layout_loit_staff', 'elodin_loit_staff_before' );
function elodin_loit_staff_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each loit_staff
add_action( 'add_loop_layout_loit_staff', 'elodin_loit_staff_each' );
function elodin_loit_staff_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	$job_title = get_post_meta( $id, 'job_title', true );
	$years_in_tech = get_post_meta( $id, 'years_in_tech', true );
	$year_started_in_tech = get_post_meta( $id, 'year_started_in_tech', true );
	$favorite_restaurant = get_post_meta( $id, 'favorite_restaurant', true );
	$favorite_tv_show = get_post_meta( $id, 'favorite_tv_show', true );
	$best_concert_attended = get_post_meta( $id, 'best_concert_attended', true );
	$linkedin_link = get_post_meta( $id, 'linkedin_link', true );
				
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

	if ( $title )
		printf( '<h3>%s</h3>', $title );
        
    if ( $job_title )
        printf( '<p class="job-title">%s</p>', $job_title );
        
    if ( $year_started_in_tech ) {
        $current_year = date('Y');
        $years_in_tech = $current_year - $year_started_in_tech;
        
        if ( $years_in_tech > 1 ) {
            printf( '<p class="years">%s years in tech</p>', $years_in_tech );
        } else {
            printf( '<p class="years">%s year in tech</p>', $years_in_tech );
        }
    }
    
    if ( $favorite_restaurant )
        printf( '<p class="fav favorite-restaurant"><span class="label">Fav restaurant</span><span class="item">%s</span></p>', $favorite_restaurant );
        
    if ( $favorite_tv_show )
        printf( '<p class="fav favorite-tv"><span class="label">Fav TV show</span><span class="item">%s</span></p>', $favorite_tv_show );
    
    if ( $best_concert_attended )
        printf( '<p class="fav best-concert"><span class="label">Best concert attended</span><span class="item">%s</span></p>', $best_concert_attended );
        
    if ( $linkedin_link )
        printf( '<p><a href="%s" target="_blank">LinkedIn</a></p>', $linkedin_link );
}