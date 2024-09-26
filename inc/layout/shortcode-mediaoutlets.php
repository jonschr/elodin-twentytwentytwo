<?php

// [mediaoutlets foo="foo-value"]
function mediaoutlets_func( $atts ) {
	
	$taxonomy = 'outlets';
	$terms = get_terms( $taxonomy, array(
		'hide_empty' => true,
		'orderby'    => 'count',
		'order' => 'DESC',
	) );

	ob_start();

	// echo '<pre style="text-align: left;">';
	//     var_dump( $terms );
	// echo '</pre>';

	echo '<div class="outlets">';
	
		$termnumber = 0;

		foreach( $terms as $term ) {

			$termnumber++;

			$imageclass = 'no-post-thumbnail';

			$id = $term->term_id;
			$slug = $term->slug;

			$image = get_field( 'outletlogo', $term );
			if ( $image && is_array( $image ) ) {
				$image = $image['id'];
				$image = wp_get_attachment_image_src( $image, 'medium' );
			} else {
				$image = false;
			}
			
			if ( $image )
				$imageclass = 'has-post-thumbnail';

			$name = $term->name;
			$link = get_term_link( $id, $taxonomy );
			$count = $term->count;

			if ( $termnumber > 12 )
				continue;

			printf( '<div class="outlet %s"><div class="inner">', $imageclass );

				if ( $image )
					printf( '<div class="featured-image" style="background-image:url(%s)"></div>', $image[0] );

				echo '<div class="content-container">';

					if ( $name )
						printf( '<h3>%s</h3>', $name );

					if ( $link )
						printf( '<a href="%s">View more</a>', $link );



				echo '</div></div>'; // .content-container, .inner

			echo '</div>';

		} 

	echo '</div>'; // .outlets

	return ob_get_clean();
}
add_shortcode( 'mediaoutlets', 'mediaoutlets_func' );