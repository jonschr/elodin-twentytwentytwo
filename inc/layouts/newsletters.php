<?php

function bean_newsletters() {
	if ( have_posts() ) {
		echo '<div class="container">';

		while ( have_posts() ) {

			the_post();

			global $post;

			// markup
			$post_class_array = get_post_class( $class = '', get_the_ID() );
			$post_class       = implode( ' ', $post_class_array );

			printf( '<div class="%s">', $post_class );

				do_action( 'bean_do_newsletter_each' );

			echo '</div>';

		} // end while

		echo '</div>'; // .container

	} else {
		echo 'So sorry! Nothing found.';
	}
}
add_action( 'bean_do_newsletters', 'bean_newsletters' );

function bean_newsletter_each() {
	$title       = get_the_title();
	$pdf_id      = get_post_meta( get_the_ID(), 'newsletter_pdf', true );
	$pdf_url     = wp_get_attachment_url( $pdf_id );
	$pdf_preview = wp_get_attachment_image_url( $pdf_id, 'large' );

	printf(
		'<a class="featured-thumb" href="%s" target="_blank" style="background-image:url(%s);"></a>
			<a class="newsletter-link" target="_blank" href="%s">%s</a>',
		$pdf_url,
		$pdf_preview,
		$pdf_url,
		'Read more',
	);
}
add_action( 'bean_do_newsletter_each', 'bean_newsletter_each' );
