<?php

// [product_title foo="foo-value"]
function product_title_func( $atts ) {
	
	$title = get_the_title();
	
	return $title;

}
add_shortcode( 'product_title', 'product_title_func' );