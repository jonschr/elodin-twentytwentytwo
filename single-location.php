<?php

get_header();

global $post;

//* Vars
$title = get_the_title();
$permalink = get_the_permalink();
$content = get_the_content();
$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );

$address = get_post_meta( get_the_ID(), 'address', true );
$phone = get_post_meta( get_the_ID(), 'phone', true );
$fax = get_post_meta( get_the_ID(), 'fax', true );
$url = get_post_meta( get_the_ID(), 'url', true );
$google_maps_embed = get_post_meta( get_the_ID(), 'google_maps_embed', true );
$business_hours = get_post_meta( get_the_ID(), 'business_hours', true );
$location_specialties = get_post_meta( get_the_ID(), 'location_specialties', true );

//* Markup
echo '<div class="single-info">';
	echo '<div class="info">';
		echo '<header class="entry-header">';

			if ( $title ) {
				printf( '<h1 class="entry-title">%s</h1>', esc_html( $title ) );
			}

			if ( $address ) {
				printf( '<p class="address">%s</p>', esc_html( $address ) );
			}
			
		echo '</header>';
		
		if ( $phone ) {
			printf( '<p class="phone"><strong>Phone:</strong> %s</p>', esc_html( $phone ) );
		}
			
		if ( $fax ) {
			printf( '<p class="fax"><strong>Fax:</strong> %s</p>', esc_html( $fax ) );
		}
		
		if ( $business_hours ) {
			printf( '<p class="business-hours"><strong>Business Hours:</strong> %s</p>', esc_html( $business_hours ) );
		} 
		
		if ( $location_specialties ) {
			printf( '<p class="location-specialties"><strong>Specialties:</strong> %s</p>', esc_html( $location_specialties ) );
		}
		
		if ( $url ) {
			printf( '<p class="url"><a class="btn btn-orange" target="_blank" href="%s">Visit online</a></p>', esc_url( $url ) );
		}
			
	echo '</div>';

	echo '<div class="map">';
		printf( '<p>%s</p>', $google_maps_embed );
	echo '</div>';
echo '</div>';

echo '<div class="multiple-info">';
	echo '<h2>Our other locations</h2>';
	echo do_shortcode( '[loop post_type=location columns=3]' );
echo '</div>';

get_footer();