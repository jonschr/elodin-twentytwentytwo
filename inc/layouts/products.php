<?php

// [biolime_products foo="foo-value"]
function biolime_products_func( $atts ) {
	
	wp_enqueue_script( 'wc-add-to-cart' );
	
    $a = shortcode_atts( array(
        'related' => false,
		'posts_per_page' => '-1',
		'columns' => '3',
    ), $atts );
	
	ob_start();
	
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $a['posts_per_page'],
		// 'post__in' => $related_cities
	);
	
	$products = get_post_meta( get_the_ID(), 'products', true );
	
	if ( $a['related'] ) {
		$args['post__in'] = $products;
	}

	// The Query
	$custom_query = new WP_Query( $args );

	// The Loop
	if ( $custom_query->have_posts() ) {
		
		printf( '<div class="biolime-products columns-%s">', $a['columns'] );

		while ( $custom_query->have_posts() ) {
			
			$custom_query->the_post();
			
			global $product;

			printf( '<div class="%s">', esc_attr( implode( ' ', get_post_class() ) ) );
			
				$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				$title = get_the_title();
				$permalink = get_the_permalink();
	
				printf( '<a class="featured-image" href="%s" style="background-image:url( %s )"></a>', esc_url( $permalink ), esc_url( $background ) );
				
				echo '<div class="wc-content">';
			
					if ( $title ) {
						printf( '<h3>%s</h3>', esc_html( $title ) );
					}
					
					// Get the product price
					echo '<p class="price">' . $product->get_price_html() . '</p>';
					
					// Display the "Add to Cart" button
					// woocommerce_template_loop_add_to_cart();
					
					// Display the Add to Cart button with AJAX
					echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WC core function for generating the button
						sprintf(
							'<a href="%s" data-quantity="1" class="%s" data-product_id="%s" data-product_sku="%s" aria-label="%s" rel="nofollow">%s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $args['class'] ) ? $args['class'] : 'button btn ajax_add_to_cart add_to_cart_button' ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							esc_attr( $product->add_to_cart_description() ),
							esc_html( $product->add_to_cart_text() )
						),
						$product, $args
					);
				
				echo '</div>';
    
				

			echo '</div>';

		}
		
		echo '</div>'; // .biolime-products
		
		// Restore postdata
		wp_reset_postdata();

	}

    return ob_get_clean();
}
add_shortcode( 'biolime_products', 'biolime_products_func' );