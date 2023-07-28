<?php

//* Output the leadership markup for each item
add_action( 'add_loop_layout_bridgestaff', 'bridge_staff_layout' );
function bridge_staff_layout() {
    
    //* Enqueue the fancybox scripts
	wp_enqueue_style( 'elodin-staff-fancybox-theme' );
    wp_enqueue_script( 'elodin-staff-fancybox-main' );

	$jobtitle = esc_html( get_post_meta( get_the_ID(), 'job_title', true ) );
	$content = apply_filters( 'the_content', wp_kses_post( get_the_content() ) ); // note: when we output this, we're applying the filters again. That's intentional because Gutenberg is removing that filter once, and it manifests in breaking the first loop through the_content.
	$title = esc_html( get_the_title() );
	$email = esc_html( get_post_meta( get_the_ID(), 'email_address', true ) );
	$phone = esc_html( get_post_meta( get_the_ID(), 'phone_number', true ) );
	$linkedin = esc_url( get_post_meta( get_the_ID(), 'linkedin', true ) );
	$twitter = esc_url( get_post_meta( get_the_ID(), 'twitter', true ) );
	$facebook = esc_url( get_post_meta( get_the_ID(), 'facebook', true ) );
	$slug = esc_html( get_post_field( 'post_name', get_post() ) );

	$contactlabel = 'Read Bio';
	
	//* If there's a thumbnail...
	if ( has_post_thumbnail() ) {
	    
	    printf( '<div class="featured-image" style="background-image:url( %s )">', get_the_post_thumbnail_url( get_the_ID(), 'large' ) );

            //* No overlay at all if there's no content
            if ( $content ) {

                printf( '<a href="#" data-src="#staff-%s" data-fancybox="%s" class="overlay-link">', get_the_ID(), $slug );

                    printf('<span class="overlay-text">%s</span>', $contactlabel );

                echo '</a>';
            }
        
        echo '</div>';


        echo '<div class="more-link-wrap">';
        
            if ( $title )
                printf( '<h3 class="name">%s</h3>', $title );
            
            if ( $jobtitle )
                printf( '<span class="jobtitle">%s</span>', $jobtitle );
                
            if ( $linkedin )
                printf( '<p class="contact"><a href="%s" target="_blank" class="linkedin"><span class="dashicons dashicons-linkedin"></span></a></p>', $linkedin );
                
            edit_post_link( 'Edit staff member', '<small>', '</small>' );

        echo '</div>'; // .more-link-wrap


	}
    
    
		
	//* Output the content whether there's a thumbnail or no
	if ( $content ) {
		do_action( 'elodin_do_staff_content' );
		
	}
}

