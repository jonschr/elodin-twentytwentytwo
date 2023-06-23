<?php

//* Output simple before
// add_action( 'before_loop_layout_simple', 'elodin_simple_before' );
function elodin_simple_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each simple
add_action( 'add_loop_layout_simple', 'elodin_simple_each' );
function elodin_simple_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = apply_filters( 'the_content', apply_filters( 'the_content', get_the_content() ) );
    $excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    $date = human_time_diff( get_the_modified_time('U') );
    
    $wordcount = str_word_count( $content );
    // $date = get_the_date();
	
	// $thing = get_post_meta( $id, 'thing', true );
	
	if ( !$content )
		$permalink = null;
        	
	//* Markup
	
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

    echo '<div class="info">';
    
        if ( $title )
            printf( '<h3>%s</h3>', $title );
            
        if ( $date )
            printf( '<p class="date">Updated %s ago</p>', $date );
            
        if ( $excerpt )
            printf( '<div clas="the-content">%s</div>', $excerpt );
            
        if ( $wordcount > 50 )
            printf( '<div class="readmore"><a class="btn" href="%s">Read more</a></div>', $permalink );
            
    echo '</div>';
}