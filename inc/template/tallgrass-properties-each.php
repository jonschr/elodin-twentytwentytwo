<?php

add_action( 'tallgrass_properties_do_each', 'tallgrass_properties_each' );
function tallgrass_properties_each() {
    
    global $post;
    
    $title = get_the_title();
    $permalink = get_the_permalink();
    $property_images = rentfetch_get_property_images();
    $city = get_post_meta( get_the_ID(), 'city', true );
    $state = get_post_meta( get_the_ID(), 'state', true );
    
    $post_classes = implode(' ', get_post_class());
    
    printf( '<div class="%s">', $post_classes );
    
            if ( $permalink )
                printf( '<a class="overlay" href="%s"></a>', $permalink );
                
            printf( '<div class="background-image" style="background-image:url(%s);"></div>', $property_images[0]['url'] );
                            
            echo '<div class="the-content">';
                
                if ( $title )
                    printf( '<h3>%s</h3>', $title );
                    
                edit_post_link();
                    
                printf( '<p class="location">%s, %s</p>', $city, $state );
                                
            echo '</div>';                
    echo '</div>';
    
}