<?php

//* Output markets_slider before
add_action( 'before_loop_layout_markets_slider', 'elodin_markets_slider_before' );
function elodin_markets_slider_before( $args ) {
    wp_enqueue_script( 'slick-main-script' );
    wp_enqueue_style( 'slick-main-styles' );
    wp_enqueue_style( 'slick-main-theme' );
    
    ?>
    <script>
        jQuery(document).ready(function( $ ) {
	
            $('.loop-layout-markets_slider').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
                });
            
        });
    </script>
    <?php
}

//* Output each markets_slider
add_action( 'add_loop_layout_markets_slider', 'elodin_markets_slider_each' );
function elodin_markets_slider_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	// $thing = get_post_meta( $id, 'thing', true );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

    echo '<div class="content-container">';
    
        if ( $title )
            printf( '<h3>%s</h3>', $title );
            
    echo '</div>';
}