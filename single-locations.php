<?php

function location_hero() {
	
	$title = get_the_title();
	
	if ( !$title )
		return;
	
	echo '<header class="location-hero section">';
		echo '<div class="wrap">';

			if ( $title ) {
				printf( '<h1 class="entry-title">%s</h1>', $title );
			}
		
		echo '</div>'; // end .wrap
	echo '</header>';
}
add_action( 'location_do_single_content', 'location_hero' );

function location_main_content() {
	
	$get_started_summary = get_post_meta( get_the_ID(), 'get_started_summary', true );
	$hours_of_operation = get_post_meta( get_the_ID(), 'hours_of_operation', true );
	$about_this_location = get_post_meta( get_the_ID(), 'about_this_location', true );
	$learning_session_url = get_post_meta( get_the_ID(), 'learning_session_url', true );
	$address = get_post_meta( get_the_ID(), 'address', true );
	$phone = get_post_meta( get_the_ID(), 'phone', true );
	$email = get_post_meta( get_the_ID(), 'email', true );
	$thing = get_post_meta( get_the_ID(), 'thing', true );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	
	echo '<div class="main-content section">';
		echo '<div class="wrap">';
			echo '<div class="columns">';
				echo '<div class="column">';

					if ( $get_started_summary ) {
						echo '<h2>Get Started</h2>';
						echo wpautop( $get_started_summary );
					}
					
					if ( $learning_session_url ) {
						printf( '<a href="%s" class="btn" target="_blank">Join a Learning Session</a>', $learning_session_url );
					}
					
					if ( $hours_of_operation ) {
						echo '<h3>Hours of Operation</h3>';
						echo '<div class="hours">';
							echo wpautop( $hours_of_operation );
						echo '</div>';
					}
				
				echo '</div>'; // end .column
				echo '<div class="column">';
				
					if ( $background ) {
						printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
					}
					
					if ( $address || $phone || $email ) {
						echo '<div class="basic-info">';
					
						if ( $address ) {
								printf( '<p class="address">%s</p>', $address );
							}
							
							if ( $phone ) {
								printf( '<p class="phone">%s</p>', $phone );
							}
							
							if ( $email ) {
								printf( '<p class="email">%s</p>', $email );
							}
						
						
						echo '</div>';
					}
					
					if ( $about_this_location ) {

						echo '<div class="about-location">';

							echo '<h3>About This Location</h3>';
						
							echo wpautop( $about_this_location );
						
						echo '</div>';
					}
					
				echo '</div>'; // end .column
			echo '</div>'; // end .columns
		
		echo '</div>'; // end .wrap
	echo '</div>'; // end .main-content
}
add_action( 'location_do_single_content', 'location_main_content' );

function location_promos() {
	
	$english_pdf_id      = get_post_meta( get_the_ID(), 'current_promotion_english', true );
	$english_pdf_url     = wp_get_attachment_url( $english_pdf_id );
	$english_pdf_preview = wp_get_attachment_image_url( $english_pdf_id, 'large' );
	
	$spanish_pdf_id      = get_post_meta( get_the_ID(), 'current_promotion_spanish', true );
	$spanish_pdf_url     = wp_get_attachment_url( $spanish_pdf_id );
	$spanish_pdf_preview = wp_get_attachment_image_url( $spanish_pdf_id, 'large' );
	
	// If we don't have either PDF, we don't need to show this section.
	if ( !$english_pdf_id && !$spanish_pdf_id )
		return;
	
	echo '<div class="promos section">';
		echo '<div class="wrap">';
		
			echo '<h2>Current Promotions</h2>';
			
			echo '<div class="columns">';

				if ( $english_pdf_id ) {
					echo '<div class="column">';
						echo '<h3>English flier</h3>';
				
						printf(
							'<a class="featured-thumb" href="%s" target="_blank" style="background-image:url(%s);"></a>
								<a class="pdf-link" target="_blank" href="%s">%s</a>',
							$english_pdf_url,
							$english_pdf_preview,
							$english_pdf_url,
							'Download this flier',
						);
					echo '</div>';
				}
				
				
				if ( $spanish_pdf_id ) {
					echo '<div class="column">';
						echo '<h3>Spanish flier</h3>';
					
						printf(
							'<a class="featured-thumb" href="%s" target="_blank" style="background-image:url(%s);"></a>
								<a class="pdf-link" target="_blank" href="%s">%s</a>',
							$spanish_pdf_url,
							$spanish_pdf_preview,
							$spanish_pdf_url,
							'Download this flier',
						);
					echo '</div>'; // end .column
				}
				
			
			echo '</div>';
		
		echo '</div>'; // end .wrap
	echo '</div>'; // end .promos

}
add_action( 'location_do_single_content', 'location_promos' );

get_header();

if ( have_posts() ) {

	while ( have_posts() ) {

		the_post(); 

		do_action( 'location_do_single_content' );

	} // end while
} else {
	echo 'So sorry! Nothing found.';
}



get_footer();