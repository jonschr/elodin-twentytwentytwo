<?php

get_header();

single_manufacturer_images();
	
single_manufacturer_info();
	
single_manufacturer_details();

echo '<div class="single-manufacturers-section other-properties">';
	echo do_shortcode('[manufacturers_slider]');
echo '</div>';

get_footer(); 



function single_manufacturer_images() {
	
	$photos = get_post_meta( get_the_ID(), 'photos', true );
		
		if (count($photos) === 1) {
			photo_single();
		} elseif (count($photos) > 1) {
			photo_slider();
		} else {
			return;
		}
	

}
function single_manufacturer_info() {
	
	$beds = get_post_meta( get_the_ID(), 'beds', true );
	$baths = get_post_meta( get_the_ID(), 'baths', true );
	$square_footage = get_post_meta( get_the_ID(), 'square_footage', true );
	$address = get_post_meta( get_the_ID(), 'address', true );
	$city = get_post_meta( get_the_ID(), 'city', true );
	$state = get_post_meta( get_the_ID(), 'state', true );
	$zip = get_post_meta( get_the_ID(), 'zip', true );
	$price = get_post_meta( get_the_ID(), 'price', true );
	
	echo '<div class="single-manufacturers-section info">';
		echo '<div class="single-manufacturer-wrap">';
		
			if ( $beds || $baths || $square_footage ) {
				
				echo '<p class="is-style-kicker has-accent-color stats">';
				
					if ( $beds )
						printf( '<span class="beds">%s Beds</span>', $beds );
						
					if ( $baths )
						printf( '<span class="baths">%s Baths</span>', $baths );
						
					if ( $square_footage )
						printf( '<span class="square-footage">%s Square Feet</span>', $square_footage );
						
				echo '</p>';
			}
			
			if ( $address || $city || $state || $zip ) {
				
				echo '<h2 class="address">';
			
					if ( $address )
						printf( '<span class="address">%s</span>', $address );
						
				
					if ( $city || $state || $zip ) {
						echo '<span class="location">';
						
							if ( $city )
								printf( '<span class="city">%s</span>', $city );
								
							if ( $state )
								printf( '<span class="state">%s</span>', $state );
								
							if ( $zip )
								printf( '<span class="zip">%s</span>', $zip );
								
						echo '</span>';
					}
					
				echo '</h2>';
			
			}
			
			if ( $price )
				printf( '<p class="price">%s</p>', $price );
			
		echo '</div>';
	echo '</div>';
}
function single_manufacturer_details() {
	
	
	$interior_notes = get_post_meta( get_the_ID(), 'interior_notes', true );
	$exterior_notes = get_post_meta( get_the_ID(), 'exterior_notes', true );
	
	if ( !$interior_notes && !$exterior_notes )
		return;
		
	echo '<div class="single-manufacturers-section details">';
		echo '<div class="single-manufacturer-wrap">';
		
			echo '<div class="notes">';
	
				if ( $interior_notes )
					printf( '<div class="interior-notes column"><h2>Interior notes</h2>%s</div>', $interior_notes );
					
				if ( $exterior_notes )
					printf( '<div class="exterior-notes column"><h2>Exterior notes</h2>%s</div>', $exterior_notes );
				
			echo '</div>';
		
		echo '</div>';
	echo '</div>';
	
}

function photo_single() {
	
	echo '<div class="single-manufacturers-section images-singular">';
	
	$photos = get_post_meta( get_the_ID(), 'photos', true );
	
	foreach ( $photos as $photo ) {
		
		$url = wp_get_attachment_url( $photo );
		
		printf( '<a class="popup popup-image" href="%s">', $url );
			echo wp_get_attachment_image( $photo, 'full', false, array( 'class' => 'photo-single' ) );
		echo '</a>';
	}
	
	echo '</div>';
}

function photo_slider() {
	
	wp_enqueue_script(
        'slick-main-script'
    );
	
	wp_enqueue_style(
        'slick-main-styles'
    );
		
	wp_enqueue_style(
        'slick-main-theme'
    );
	
	wp_enqueue_script(
        'single-manufacturer-slider-init'
    );
		
	echo '<div class="single-manufacturers-section images-multiple">';
	
		$photos = get_post_meta( get_the_ID(), 'photos', true );
	
		foreach ( $photos as $photo ) {
			
			$url = wp_get_attachment_url( $photo );
			
			printf( '<div class="manufacturer-photo-slide"><a class="popup popup-image" href="%s">', $url );
				echo wp_get_attachment_image( $photo, 'large', false, array( 'class' => 'photo-multiple' ) );
			echo '</a></div>';
		}
	
	echo '</div>';
	
}