<?php 

function tallgrass_testimonials_slider_shortcode() {
    
    ob_start();
    
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => -1, // Retrieve all posts
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        
        wp_enqueue_script( 'slick-main-script' );
        wp_enqueue_script( 'slick-testimonials-slider-init' );
        wp_enqueue_style( 'slick-main-styles' );
        wp_enqueue_style( 'slick-main-theme');
        
        echo '<div class="testimonials-slider">';

        while ($query->have_posts()) {
            $query->the_post();
            
            $title = get_the_title();
            $content = apply_filters( 'the_content', get_the_content() );
            
            $post_classes = implode(' ', get_post_class());
    
            printf( '<div class="%s">', $post_classes );
            
                if ( $content )
                    printf( '<div class="the-content">%s</div>', $content );
                    
                if ( $title )
                    printf( '<p class="the-title">- %s</p>', $title );
            
            echo '</div>';

        }

        echo '</div>';
    } else {
        echo 'No testimonials found.';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('tallgrass_testimonials_slider', 'tallgrass_testimonials_slider_shortcode');
