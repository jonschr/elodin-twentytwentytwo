<?php

add_shortcode( 'markets', 'markets_func' );
function markets_func( $atts ) {
    
    ob_start();
    
    echo '<div class="markets-wrap">';
        
        if ( is_singular( 'page' ) ) {
            
            $args = array( 
                'post_type' => 'markets',
                'posts_per_page' => -1,
            );
            
            $markets = get_posts( $args );
        }
            
        echo '<div class="market-wrap-inner">';
            
            foreach ( $markets as $p ) {
                
                echo '<div class="market">';
                
                    $id = $p->ID;
                    do_action( 'markets_do_each', $id );
                    
                echo '</div>';
                
            }
        
        echo '</div>'; // .market-wrap
    echo '</div>'; // .markets-wrap
    
    return ob_get_clean();
}


add_action( 'markets_do_each', 'markets_each', 10, 1 );
function markets_each( $id ) {
    
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
            
        edit_post_link( 'Edit this market', '<small>', '</small>', $id );
            
    echo '</div>';
    
}