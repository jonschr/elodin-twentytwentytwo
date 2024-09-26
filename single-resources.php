<?php
/**
 * Single resources template.
 *
 * @package ers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();


echo '<div class="chapwood-single-resources-wrap">';
	
		$title = get_the_title();
		$content = get_the_content();
		$id = get_the_ID();
		$access_link = '';
		
		$excerpt = apply_filters( 'the_content', get_the_excerpt() );
		$toolurl = get_post_meta( get_the_ID(), 'url', true );
		$video = get_post_meta( get_the_ID(), 'videourl', true );
		$explainer_pdf = wp_get_attachment_url( get_post_meta( get_the_ID(), 'explainer_pdf', true ) );
		
		// Get the timestamp for the last modified date
		$last_modified_timestamp = get_the_modified_time('U');

		// Get the current timestamp
		$current_timestamp = current_time('timestamp');

		// Calculate the time difference and format it
		$relative_time = human_time_diff($last_modified_timestamp, $current_timestamp);
		
		echo '<div class="resources-header-wrap">';
		
			echo '<div class="column">';

				the_field( 'videourl' );

			echo '</div>';
			echo '<div class="column">';
				
				if ( $title ) {
					printf( '<h1 class="resource-title">%s</h1>', esc_html( $title ) );
				}
				
				if ( $excerpt ) {
					echo apply_filters( 'the_content', $excerpt );
				}
				
				echo '<div class="buttons">';

					if ( $toolurl ) {
						printf( '<a target="_blank" class="button btn toolurl" href="%s">View the tool</a>', $toolurl );
					}
						
					if ( $explainer_pdf ) {
						printf( '<a class="button btn pdfurl" href="%s" download>Download overview</a>', $explainer_pdf );
					}
				
				echo '</div>'; // .buttons
				
				if ( $id && is_user_logged_in() ) {
					$access_link = sprintf( '· <a class="access-link" href="/access/?resourceid=%s" target="_blank">View access page</a>', esc_html( $id ) );
					
					// Output the relative time using printf
					printf('<p>%s</p>', $access_link );
				}
				
			echo '</div>';
		
		echo '</div>';
		
		
		
		
		if ( $content ) {
			printf( '<div class="resource-content">%s</div>', apply_filters( 'the_content', $content ) );
		}
		
		echo '<h2>View our other tools</h2>';
		
		echo do_shortcode( '[resources columns=3]');
	
echo '</div>';

get_footer();