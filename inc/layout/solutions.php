<?php

add_shortcode( 'solutions', 'solutions_func' );
function solutions_func( $atts ) {
    
    ob_start();
    
    echo '<div class="solutions-wrap">';

        if ( is_singular( 'markets' ) ) {
                        
            $solutions = MB_Relationships_API::get_connected( [
                'id'   => 'services_to_markets',
                'to' => get_the_ID(),
            ] );
            
        }
        
        if ( is_singular( 'page' ) ) {
                        
            $args = array( 
                'post_type' => 'services',
                'posts_per_page' => -1,
            );
            
            $solutions = get_posts( $args );
            
        }
            
        echo '<div class="solution-wrap-inner">';
            
            foreach ( $solutions as $p ) {
                
                echo '<div class="solution">';
                
                    $id = $p->ID;
                    do_action( 'solutions_do_each', $id );
                    
                echo '</div>';
                
            }
        
        echo '</div>'; // .solution-wrap
    echo '</div>'; // .solutions-wrap
    
    return ob_get_clean();
}


add_action( 'solutions_do_each', 'solutions_each', 10, 1 );
function solutions_each( $id ) {
    
    $title = get_the_title( $id );
    $background = get_the_post_thumbnail_url( $id, 'large' );
    $excerpt = get_the_excerpt( $id );
    $permalink = get_the_permalink( $id );
    
    printf( '<a href="%s" class="overlay"></a>', $permalink );
	
    if ( $background ) 
        printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
        
    echo '<div class="content-wrap">';
    
        if ( $title )
            printf( '<h3>%s</h3>', $title );
            
        if ( $excerpt )
            printf( '<div class="excerpt">%s</div>', $excerpt );
            
        edit_post_link( 'Edit this project', '<small>', '</small>', $id );
            
    echo '</div>';
    
}