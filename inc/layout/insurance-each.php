<?php

function insurance_each( $id ) {
    
    echo '<div class="insurance">';
    
        //* Global vars
        global $post;

        //* Vars
        $title = get_the_title( $id );
        $background = get_the_post_thumbnail_url( $id, 'large' );
                
        if ( $background )
            printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
            
        echo '<div class="content">';

            if ( $title )
                printf( '<h3>%s</h3>', $title );
                
        echo '</div>';
    
    echo '</div>';
    
}