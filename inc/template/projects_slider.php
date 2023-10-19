<?php

function projects_slider_func() {
    
    ob_start();
    
    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => -1,
    );
    
    $projects = new WP_Query($args);
    
    if ($projects->have_posts()) {
        
        wp_enqueue_style( 'slick-main-styles' );
        wp_enqueue_style( 'slick-main-theme' );
        wp_enqueue_script( 'slick-main-script' );
        wp_enqueue_script( 'projects-slider-init' );
        
        echo '<div class="projects-slider">';
        
            while ($projects->have_posts()) {
                
                $projects->the_post();
                do_action( 'projects_do_each' );
                
            }
        
        echo '</div>';
        
        wp_reset_postdata();
        
    }
    
    return ob_get_clean();
    
}
add_shortcode( 'projects_slider', 'projects_slider_func');
