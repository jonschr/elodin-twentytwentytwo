<?php

function ers_resource_content_after() {
	$subtitle = get_post_meta( get_the_ID(), 'subtitle', true );
	
	if ( $subtitle ) {
		printf( '<p class="resource-subtitle">%s</p>', esc_html( $subtitle ) );
	}
}
add_action( 'ers_do_resource_content_after', 'ers_resource_content_after' );