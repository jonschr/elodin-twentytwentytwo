<?php

function partners_footer() {
    
    // bail if this is the front page
    if ( is_front_page() )
        return;
                
    $args = array(
        'post_type' => 'partners',
        'posts_per_page' => -1, // Display all posts
    );
    
    $partners_query = new WP_Query($args);
    
    if ($partners_query->have_posts()) {
        
        ?>
        <style>
            body {
                padding-bottom: 55px;
            }
        </style>
        <?php
        
        // Slick
        wp_enqueue_script( 'slick-main-script' );
        wp_enqueue_script( 'slick-partners-slider-init' );
        wp_enqueue_style( 'slick-main-styles' );
        wp_enqueue_style( 'slick-main-theme' );
        
        echo '<div class="partners-footer">';
            echo '<div class="partners-wrap">';
                echo '<div class="partners-slider">';
        
                    while ($partners_query->have_posts()) {
                        
                        $partners_query->the_post();
                        
                        //* Global vars
                        global $post;
                        $id = get_the_ID();

                        //* Vars
                        $title = get_the_title();
                        $permalink = get_the_permalink();
                        $content = apply_filters( 'the_content', apply_filters( 'the_content', get_the_content() ) );
                        $background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        
                        // Get the featured image ID
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );

                        // Get the 'medium' size image URL
                        $image_url = wp_get_attachment_image_src($thumbnail_id, 'medium');
                        
                        if ( !$background )
                            continue;
                                                    
                        echo '<div class="partner-item">';
                                // Output the image HTML
                                echo '<img class="partner-image" src="' . $image_url[0] . '" alt="Featured Image">';
            
                                // if ( $background ) 
                                //     printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
                            
                        echo '</div>';
                        
                    }
                    
                echo '</div>';
            echo '</div>';
        echo '</div>';
        
        wp_reset_postdata();
        
    }
    
    ?>
    <script type="text/javascript">
        jQuery(window).on('load', function( $ ) {
            
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'partners_footer' );
