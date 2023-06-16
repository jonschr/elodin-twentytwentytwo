<?php

function tallgrass_properties_grid_shortcode() {
    
    ob_start();
    
    // Args for WP_Query
    $args = array(
        'post_type' => 'properties',
        'posts_per_page' => -1,
    );

    // Query
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        
        // Output
        echo '<div class="tallgrass-properties-grid">';
        
            while ($query->have_posts()) {
                $query->the_post();
                                
                do_action( 'tallgrass_properties_do_each' );
                
            }
        
        echo '</div>';
        
    } else {
        echo 'No properties found.';
    }

    // Reset Post Data
    wp_reset_postdata();

    return ob_get_clean();
}

// Add Shortcode
add_shortcode( 'tallgrass_properties_grid', 'tallgrass_properties_grid_shortcode');
