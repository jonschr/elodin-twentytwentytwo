<?php

add_action( 'locations', 'md_locations_loop' );
function md_locations_loop() {
    
    if (have_posts()) {
        
        
        while( have_posts() ) {
            
            the_post();

            $post_classes = get_post_class();
            $post_class_string = implode(' ', $post_classes);

            printf('<div class="%s">', $post_class_string);
                
            do_action( 'locations_do_each' );
            
            echo '</div>';
            
        } // Moved closing brace for the while loop here
        
    } else {
        
        // ... silence is golden
        
    }
    
    echo '</div>';
}


add_action( 'locations_do_each', 'md_output_locations_each' );
function md_output_locations_each() {
    
    //* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	
	$address = get_post_meta( $id, 'address', true );
    $url = get_post_meta( $id, 'url', true );
    $phone = get_post_meta( $id, 'phone', true );
    $fax = get_post_meta( $id, 'fax', true );
    $store_manager = get_post_meta( $id, 'store_manager', true );
	
	//* Markup
	
    printf( '<a class="overlay" target="_blank" href="https://maps.google.com/?q=Murphy\'s Deli %s %s"></a>', $title, $address );
    
    echo '<div class="info">';
    
        if ( $title )
            printf( '<h3>%s</h3>', $title );
        
        if ( $address )
            printf( '<p class="address">%s</p>', $address );
            
    echo '</div>';
        
    if ( $phone )
        printf( '<p class="phone"><strong>Phone:</strong> %s</p>', $phone );
        
    if ( $fax )
        printf( '<p class="fax"><strong>Fax:</strong> %s</p>', $fax );
        
    if ( $store_manager )
        printf( '<p class="store_manager">Managed by %s</p>', $store_manager );
        
    if ( $url ) {
        echo '<div class="buttons">';            
            printf( '<p><a class="locations-button" href="%s" target="_blank">Order online</a></p>', $url );
        echo '</div>';
    }
}