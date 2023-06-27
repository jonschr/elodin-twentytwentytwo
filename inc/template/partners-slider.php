<?php

function partners_footer() {
                
    $args = array(
        'post_type' => 'partners',
        'posts_per_page' => -1, // Display all posts
    );
    
    $partners_query = new WP_Query($args);
    
    if ($partners_query->have_posts()) {
        
        echo '<div class="partners-footer">';
            echo '<div class="partners-wrap">';
                echo '<div class="partners-slider">';
        
                    while ($partners_query->have_posts()) {
                        
                        $partners_query->the_post();
                        
                        echo '<div class="partner-item">';
                            echo '<div class="partner-item-inner">';
                        
                                //* Global vars
                                global $post;
                                $id = get_the_ID();

                                //* Vars
                                $title = get_the_title();
                                $permalink = get_the_permalink();
                                $content = apply_filters( 'the_content', apply_filters( 'the_content', get_the_content() ) );
                                $background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            
                                if ( $background ) 
                                    printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
                            
                            echo '</div>';
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
            // silence            
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'partners_footer' );
