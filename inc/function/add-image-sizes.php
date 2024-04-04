<?php

// add an image size
add_image_size( 'square', 500, 500, true );
add_image_size( 'blog', 820, 300, true );

// add the image size to galleries
function ettt_add_gallery_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'square' => __( 'Square' ),
	) );
}
add_filter( 'image_size_names_choose', 'ettt_add_gallery_sizes' );