<?php

//* Output endorsements before
add_action( 'before_loop_layout_endorsements', 'rb_endorsements_before' );
function rb_endorsements_before( $args ) {
    
    //* Do the muuri main script
    wp_enqueue_script( 'muuri-main' );

    $rand = rand( 1, 100000 );

    printf( '<div id="muuri-%s">', $rand ); // use a random number to allow multiple on a page
    
    ?>
    <script>
        jQuery(document).ready(function( $ ) {
	            
            var grid = new Muuri('#muuri-<?php echo $rand; ?> .loop-layout-endorsements', {
                layout: {
                    fillGaps: true,
                }
            });
        });
    </script>
    <?php
}

add_action( 'after_loop_layout_endorsements', 'wm_endorsements_afer' );
function wm_endorsements_afer( $args ) {
    echo '</div>';
}

//* Output each endorsements
add_action( 'add_loop_layout_endorsements', 'rb_endorsements_each' );
function rb_endorsements_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
    $permalink = get_the_permalink();
    $content = get_the_content();
    $reference = get_post_meta( $id, 'reference', true );

    //* Markup
    echo '<div class="content-container">';

        if ( $content )
            printf( '<div class="testimonial-content">%s</div>', $content );
            
        if ( $title )
            printf( '<h3>%s</h3>', $title );

        if ( $reference )
            printf( '<p class="title">%s</p>', $reference );

    echo '</div>';
    
    // printf( '<a class="link-overlay" href="%s"></a>', $permalink );

    // if ( has_post_thumbnail() ) 
    //     printf( '<div class="featured-image" style="background-image:url( %s )"></div>', get_the_post_thumbnail_url( $post_id, 'large' ) );
}