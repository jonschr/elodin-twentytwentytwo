<?php

//* Output news before
// add_action( 'before_loop_layout_news', 'elodin_news_before' );
function elodin_news_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each news
add_action( 'add_loop_layout_news', 'elodin_news_each' );
function elodin_news_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = esc_attr( get_the_title() );
	$url = esc_url( get_post_meta( $id, 'url', true ) );
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    
    edit_post_link();
				
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
        
    echo '<div class="content">';
            
        if ( $title )
            printf( '<h3>%s</h3>', $title );
            
        if ( $excerpt )
            printf( '<div class="excerpt">%s</div>', $excerpt );
            
        if ( $url )
            printf( '<a class="btn" target="_blank" href="%s">More information</a>', $url );
        
    echo '</div>';

}