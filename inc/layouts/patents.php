<?php

//* Output patents before
// add_action( 'before_loop_layout_patents', 'elodin_patents_before' );
function elodin_patents_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each patents
add_action( 'add_loop_layout_patents', 'elodin_patents_each' );
function elodin_patents_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	
	$patent_url = esc_url( get_post_meta( $id, 'patent_url', true ) );
	$patent_pdf_id = get_post_meta( $id, 'patent_pdf', true );
	$patent_pdf_url = wp_get_attachment_url( $patent_pdf_id );
    $patent_pdf_image_url = wp_get_attachment_image_url( $patent_pdf_id, 'large' );
				
	// if there's a background image, put that into the $image var. Otherwise, use the PDF image
	if ( $background ) {
		$image = $background;
	} else {
		
		if ( $patent_pdf_id ) {
			$image = $patent_pdf_image_url;
		} else {
			$image = null;
		}
	}
						
	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $image );
	
	if ( $background || $patent_url || $patent_pdf_id ) {
		echo '<div class="buttons-wrap-outer">';
			echo '<div class="buttons-wrap-inner">';
		
				if ( $image && !$patent_pdf_url )
					printf( '<a href="%s" class="patent-button" target="_blank">View Image</a>', $image );
				
				if ( $patent_url )
					printf( '<a href="%s" class="patent-button" target="_blank">View Online</a>', $patent_url );
				
				if ( $patent_pdf_url )
					printf( '<a href="%s" class="patent-button" target="_blank">View PDF</a>', $patent_pdf_url );
				
				edit_post_link();
			
			echo '</div>';
		echo '</div>';
	}
	
	echo '<div class="content">';
	
		if ( $title )
			printf( '<h3>%s</h3>', $title );
	
	echo '</div>';
}