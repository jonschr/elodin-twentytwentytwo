<?php

function testslider_func( $atts ) {
    $a = shortcode_atts( array(
        'terms' => null,
    ), $atts );
	
	ob_start();
    
    wp_enqueue_script( 'slick-main-script' );
    wp_enqueue_script( 'slick-testslider-init' );
    wp_enqueue_style( 'slick-main-styles' );
    wp_enqueue_style( 'slick-main-theme' );
    
    echo '<div class="testslider-arrow-wrap">';
        echo '<div class="prev"><span class="dashicons dashicons-arrow-left-alt"></span></div>';
        echo '<div class="next"><span class="dashicons dashicons-arrow-right-alt"></span></div>';
    echo '</div>';
	
	echo '<div class="testslider">';
    
		$args = array(
			'post_type'      => 'tests',
			'posts_per_page' => -1,
		);

		if ( $a['terms'] ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'testcategories',
					'field'    => 'slug',
					'terms'    => $a['terms'],
				),
			);
		}

		// The Query
		$custom_query = new WP_Query( $args );

		// The Loop
		if ( $custom_query->have_posts() ) {

			while ( $custom_query->have_posts() ) {
				
				$custom_query->the_post();

				printf( '<div class="%s">', implode( ' ', get_post_class() ) );
				
                    echo '<div class="inner">';
                        do_action( 'add_loop_layout_testslider' );
                    echo '</div>';

				echo '</div>';

			}
			
			// Restore postdata
			wp_reset_postdata();

		}
		
	echo '</div>'; // .testsdetailed
	
	return ob_get_clean();
    
}
add_shortcode( 'testslider', 'testslider_func' );


//* Output each testdetailed
add_action( 'add_loop_layout_testslider', 'elodin_testslider_each' );
function elodin_testslider_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	// $content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	$description = get_post_meta( $id, 'description', true );
	$hold_time = get_post_meta( $id, 'hold_time', true );
	
	// get the terms of the post in the xxx taxonomy
	$terms = get_the_terms( $post->ID , 'analyte' );
	
	// convert terms to a string separated by a comma
	$terms_string = join(', ', wp_list_pluck($terms, 'name'));
	
	// if ( !$content )
	// 	$permalink = null;
	
	//* Markup
	// if ( $permalink )
	// 	printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
		
	echo '<div class="title-terms">';

		if ( $title )
			printf( '<h3>%s</h3>', $title );
			
		epa_methods_simple();
		
		edit_post_link();
			
	// 	if ( $terms )
	// 		printf( '<p class="terms">%s</p>', $terms_string );
				
	echo '</div>';
        
    // echo '<div class="description-wrap">';
    //     printf( '<p class="description">%s</p>', $description );
        
    // echo '</div>';
	
	// printf( '<div class="hold-time-wrap"><p class="hold-time">%s</p></div>', $hold_time );
		
}