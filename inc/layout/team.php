<?php

add_shortcode('team', 'team_shortcode');
function team_shortcode() {
	
	ob_start();
	
		// do a query for team members, cpt is 'teammembers'
		$args = array(
			'post_type' => 'teammembers',
			'posts_per_page' => -1,
		);
		$team_members = get_posts( $args );
		
		echo '<div class="teammembers-loop">';
			
			foreach ( $team_members as $team_member ) {
				
				$id = $team_member->ID;
				
				team_member_each( $id );    
			
			}
		
		echo '</div>';
	
	return ob_get_clean();

}


function team_member_each( $id ) {
	
	wp_enqueue_style( 'fancybox-main-theme' );
	wp_enqueue_script( 'fancybox-main-script' );
	wp_enqueue_script( 'fancybox-team-init' );
	
	if ( get_post_status( $id ) !== 'publish' )
		return;
		
	$title = get_the_title( $id );
	$credentials = get_post_meta( $id, 'credentials', true );
	$background = get_the_post_thumbnail_url( $id, 'large' );
	$booking_link = get_post_meta( $id, 'booking_link', true );
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt( $id ) ) );
	$insurances = get_post_meta( $id, 'teammembers_to_insurance', true );	
	
	// get the content from a post of id $id
	$content_post = get_post( $id );
	$content = $content_post->post_content;
	
	$permalink = get_the_permalink( $id );	
	
	echo '<div class="team-member">';
		echo '<div class="overlay">';
			echo '<div class="buttons">';
		
				if ( $content )
					printf( '<a class="btn" data-fancybox="#%s" data-src="#%s" href="javascript;;">Read more</a>', $id, $id );
					
				if ( $booking_link )
					printf( '<a class="btn" target="_blank" href="%s">Book now</a>', $booking_link );
				
			echo '</div>';
		echo '</div>';
	
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
			
		echo '<div class="content">';
	
			if ( $title )
				printf( '<h3>%s</h3>', $title );
								
			if ( $credentials )
				printf( '<p class="credentials"><em>%s</em></p>', $credentials );
				
			edit_post_link( 'Edit team member', '', '', $id );
							
		echo '</div>';
		
	echo '</div>';
	
	//* Fancybox lightbox content
	if ( $content ) {
		printf( '<div id="%s" class="team-fancybox-content" style="display: none;">', $id );
		
			echo '<p class="is-style-kicker">Our team</p>';
		
			if ( $title )
				printf( '<h2>%s</h2>', $title );
						
			echo $content;
						
			echo '<h2>Services</h2>';
			$services = get_post_meta( $id, 'teammembers_to_services', true );
			if ( $services ) {
				echo '<div class="loop-columns-3 loop-container loop-container-align-left loop-layout-services_photo">';
					foreach( $services as $service ) {
						
						wp_enqueue_style( 'gsq-styles' );
						
						$args = array(
							'post_type' => 'services',
							'p' => $service,
						);
						
						// The Query
						$custom_query = new WP_Query( $args );
						
						// The Loop
						if ( $custom_query->have_posts() ) {

							while ( $custom_query->have_posts() ) {
								
								$custom_query->the_post();

								printf( '<div class="%s">', implode( ' ', get_post_class() ) );
									echo '<div class="loop-item-inner">';
										do_action( 'add_loop_layout_services_photo' );
									echo '</div>';
								echo '</div>';

							}
							
							// Restore postdata
							wp_reset_postdata();

						}
					}
				echo '</div>';
			} else {
				printf( '<p><em>%s does not take insurance.</em></p>', $title );
			}
			
			echo '<h2>Insurance taken</h2>';
			
			if ( $insurances ) {
				
				echo '<div class="insurances-loop">';
				
					foreach ( $insurances as $insurance ) {
						
						insurance_each( $insurance );
						
					}
				
				echo '</div>';
				
			} else {
				printf( '<p><em>%s does not take insurance.</em></p>', $title );
			}
				
					
		echo '</div>'; // #trainings-content-%s
	}
	
}