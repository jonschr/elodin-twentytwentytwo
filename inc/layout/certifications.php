<?php

add_action( 'certifications_do_listing', 'certifications_listing' );
function certifications_listing() {
    
    if ( have_posts() ) {
        
        echo '<div class="container">';
        
        while ( have_posts() ) {
            
            the_post(); 
            
            global $post;
                        
            // markup
            $post_class_array = get_post_class( $class = '', get_the_ID() );
            $post_class = implode( ' ', $post_class_array );
            
            printf( '<div class="%s">', $post_class );
            
                do_action( 'certifications_do_listing_item' );
                                
            echo '</div>';
            
        } // end while
        
        echo '</div>'; // .container
        
    } else {
        echo 'So sorry! Nothing found.';
    }
    
}


add_action( 'certifications_do_listing_item', 'certification_listing_item' );
function certification_listing_item() {
    
    // vars
    $title = get_the_title( get_the_ID() );
    $title = apply_filters( 'certification_title', $title );
    
    $state_of_texas_method_id = get_post_meta( get_the_ID(), 'state_of_texas_method_id', true );
    $state_of_texas_method = apply_filters( 'certification_state_of_texas_method_id', $state_of_texas_method_id );
    
    // get the terms of the post in the xxx taxonomy
	$terms = get_the_terms( get_the_ID() , 'analyte' );
	
	// convert terms to a string separated by a comma
	$terms_string = join(', ', wp_list_pluck($terms, 'name'));
            
    if ( $title )
        printf( '<h3>%s</h3>', $title );
            
    if ( $state_of_texas_method_id )
        printf( '<p class="state-of-texas-method-id">%s</p>', $state_of_texas_method );
        
    if ( $terms )
        printf( '<p class="terms">%s</p>', $terms_string );
        
}