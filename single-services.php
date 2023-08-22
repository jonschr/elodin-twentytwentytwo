<?php

// wordpress standard header
get_header();

if ( have_posts() ) {
            
    while ( have_posts() ) {
        
        the_post(); 
        
        global $post;
        
        // vars
        $title = get_the_title( get_the_ID() );
        $background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        $content = apply_filters( 'the_content', apply_filters( 'the_content', get_the_content() ) );
        
        // markup
        $post_class_array = get_post_class( $class = '', get_the_ID() );
        $post_class = implode( ' ', $post_class_array );
        
        printf( '<div class="%s">', $post_class );
        
            echo '<div class="service-header">';
            
                if ( $background ) 
                    printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
                    
                echo '<div class="header-content">';
                    
                    echo '<p class="is-style-kicker">Our Services</p>';
            
                    if ( $title )
                        printf( '<h1>%s</h1>', $title );
                    
                echo '</div>';
        
            echo '</div>';
	
            echo '<div class="entry-content">';
                echo $content;
            echo '</div>';
                
        echo '</div>';
        
    } // end while
    
    
} else {
    echo 'So sorry! Nothing found.';
}

// wordpress standard footer 
get_footer();
