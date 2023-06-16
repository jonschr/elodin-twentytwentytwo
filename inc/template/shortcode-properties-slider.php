<?php

function tallgrass_properties_slider_shortcode() {
    
    ob_start();
    
    // Args for WP_Query
    $args = array(
        'post_type' => 'properties',
        'posts_per_page' => -1,
    );

    // Query
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        
        wp_enqueue_script( 'swiper-script' );
        wp_enqueue_script( 'swiper-property-slider-init' );
        wp_enqueue_style( 'swiper-style' );
        
        // Output
        echo '<div class="tallgrass-properties-slider">';
        
            echo '<div class="swiper">';
                echo '<div class="swiper-wrapper">';
                       
                    while ($query->have_posts()) {
                        $query->the_post();
                                        
                        echo '<div class="swiper-slide">';
                            do_action( 'tallgrass_properties_do_each' );
                        echo '</div>';
                        
                    }
                    
                echo '</div>';
            echo '</div>';
        
        echo '</div>';
        
    } else {
        echo 'No properties found.';
    }

    // Reset Post Data
    wp_reset_postdata();

    return ob_get_clean();
}

// Add Shortcode
add_shortcode( 'tallgrass_properties_slider', 'tallgrass_properties_slider_shortcode');
