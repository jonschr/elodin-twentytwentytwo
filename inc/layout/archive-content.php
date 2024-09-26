<?php

function chapwood_archive_content() {
	
	$post_classes = get_post_class( 'entry', get_the_ID() );
	
	// turn $post_classes into a string
	$post_classes = implode( ' ', $post_classes );
	
	printf( '<article class="%s">', $post_classes );
				
		//* Global vars
		global $post;
		$id = get_the_ID();

		//* Vars
		$title = get_the_title();
		$permalink = get_the_permalink();
		$video_url = get_post_meta( $id, 'video_url', true );
		$content = get_the_content();

		//* Markup
		if ( $video_url ) {
			echo '<div class="embed-container">';
				the_field( 'video_url' );
			echo '</div>';
		} elseif( !$video_url && has_post_thumbnail() ) {
			printf( '<a href="%s"><div class="featured-image" style="background-image:url( %s )"></div></a>', $permalink, get_the_post_thumbnail_url( get_the_ID(), 'video-ratio' ) );
		} elseif ( !$video_url && !has_post_thumbnail()  ) {
			printf( '<a href="%s"><div class="featured-image" style="background-image:url( %s )"></div></a>', $permalink, wp_get_attachment_url( '73105', 'video-ratio' ) );
		}

		if ( $title && !$content )
			printf( '<h3>%s</h3>', $title );

		if ( $title && $content )
			printf( '<h3><a href="%s">%s</a></h3>', $permalink, $title );

		// echo '<span class="date">';
		//     echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
		// echo '</span>';

		edit_post_link( 'Edit', '<small>', '</small>' );
		
	echo '</article>';
	
	
}
add_action( 'chapwood_do_archive_content', 'chapwood_archive_content' ); 