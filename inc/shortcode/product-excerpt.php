<?php

// [product_excerpt foo="foo-value"]
function product_excerpt_func( $atts ) {
	
	$excerpt = apply_filters( 'the_content', get_the_excerpt() );
	
	return $excerpt;

}
add_shortcode( 'product_excerpt', 'product_excerpt_func' );