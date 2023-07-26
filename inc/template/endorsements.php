<?php

add_shortcode( 'endorsements', 'endorsements_loop_shortcode' );
function endorsements_loop_shortcode() {
    
    wp_enqueue_script( 'muuri-main' );
    
    $args = array(
        'post_type' => 'endorsements',
        'posts_per_page' => -1, // Display all posts
    );
    
    ob_start();
    
    $endorsements_query = new WP_Query($args);
    
    if ($endorsements_query->have_posts()) {
        
        echo '<div class="grid">';
        
            while ($endorsements_query->have_posts()) {
                
                $endorsements_query->the_post();
                
                echo '<div class="item">';
                    echo '<figure class="item-content">';
                
                        //* Global vars
                        global $post;
                        $id = get_the_ID();

                        //* Vars
                        $title = get_the_title();
                        $permalink = get_the_permalink();
                        $content = apply_filters( 'the_content', apply_filters( 'the_content', get_the_content() ) );
                        $reference = get_post_meta( $id, 'reference', true );

                        //* Markup
                        echo '<blockquote class="endorsement">';
                        
                            if ( $content ) {
                                echo '<div class="endorsement-content">';
                                    echo $content;
                                    edit_post_link( 'Edit endorsement', '<small>', '</small>' );
                                echo '</div>';
                                
                            }
                                                            
                            if ( $title ) {
                                echo '<figcaption>';
                                    
                                    printf( '<h3>%s</h3>', $title );
                                    
                                    if ( $reference )
                                        printf( '<p class="title">%s</p>', $reference );
                                
                                echo '</figcaption>';
                            }
                               
                        echo '</blockquote>';

                    echo '</figure>';
                echo '</div>';
                
            }
        
        echo '</div>';
        
        wp_reset_postdata();
        
    }
    
    ?>
    <script type="text/javascript">
        jQuery(window).on('load', function( $ ) {
        // Muuri initialization code here
            var grid = new Muuri('.grid');
        });
    </script>
    <?php
    
    return ob_get_clean();
}
