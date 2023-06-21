<?php

//* Output das_blog_home before
// add_action( 'before_loop_layout_das_blog_home', 'elodin_das_blog_home_before' );
function elodin_das_blog_home_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each das_blog_home
add_action( 'add_loop_layout_das_blog_home', 'elodin_das_blog_home_each' );
function elodin_das_blog_home_each() {

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
		
	if ( $background )
		printf( '<a class="featured-image" href="%s" style="background-image:url( %s )"></a>', $permalink, $background );
	
	echo '<div class="content-area">';
	
		blf_category_header( $id );

		if ( $title )
			printf( '<h2>%s</h2>', $title );
			
		if ( $excerpt )
			printf( '<div class="excerpt">%s</div>', $excerpt );
		
		if ( $permalink )
			printf( '<a class="btn" href="%s">Read more</a>', $permalink );
			
		// printf( '<p><a class="bloglink" href="%s">View the blog</a></p>', get_blog_url() );
					
	echo '</div>';
}

function blf_category_header( $id ) {
        
    $cats = get_the_category( $id );
    
    if ( $cats ) {
        
        echo '<p class="is-style-kicker">';
        
            foreach ( $cats as $cat ) {
                
                $link = get_category_link( $cat );
                $name = $cat->name;
                                
                printf( '<span class="categories-list"><a href="%s">%s</a></span>', $link, $name );
                
            }
        
        echo '</p>';
    }
}