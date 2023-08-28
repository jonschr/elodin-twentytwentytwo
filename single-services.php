<?php

get_header();

if ( have_posts() ) {
            
    while ( have_posts() ) {
        
        the_post(); 
        
        global $post;
        
        // vars
        $title = get_the_title( get_the_ID() );
        $thing = get_post_meta( get_the_ID(), 'thing', true );
        $excerpt = apply_filters( 'the_content', get_the_excerpt( get_the_ID() ) );
        $content = apply_filters( 'the_content', get_the_content() );
        
        $background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                
        echo '<div class="service-header">';
        
            echo '<div class="wrap">';
        
                echo '<div class="service-header-info">';
                
                    echo '<p class="is-style-kicker has-accent-color has-text-color">Our services</p>';
            
                    if ( $title )
                        printf( '<h1>%s</h1>', $title );
                        
                    if ( $excerpt )
                        printf( '<div class="excerpt">%s</div>', $excerpt );
                
                echo '</div>';
            
                if ( $background ) 
                    printf( '<div class="featured-image-wrap"><div class="featured-image" style="background-image:url( %s )"></div></div>', $background );
                
            echo '</div>';
                
        echo '</div>';
        
        echo '<div class="content">';
        
            echo $content;
        
        echo '</div>';
        
    } // end while
        
} else {
    echo 'So sorry! Nothing found.';
}

get_footer();