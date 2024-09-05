<?php

// [bartag foo="foo-value"]
function carousel_func( $atts ) {
    $a = shortcode_atts( array(
        'items' => 'sample,sample 2,sample 3',
    ), $atts );
	
	// Slick
	wp_enqueue_script(
		'slick-main-script',
	);
	
	wp_enqueue_script(
		'carousel-meadohawk',
	);

	wp_enqueue_style(
		'slick-main-styles',
	);

	wp_enqueue_style(
		'slick-main-theme',
	);

    ob_start();
	
	$items = explode(',', $a['items']);
	
	// remove leading and trailing whitespace
	$items = array_map('trim', $items);

	echo '<div class="carousel-meadowhawk">';
	foreach( $items as $item ) {
		echo '<div class="item">' . $item . '</div>';
	}
	echo '</div>';
	
	return ob_get_clean();
}
add_shortcode( 'carousel', 'carousel_func' );