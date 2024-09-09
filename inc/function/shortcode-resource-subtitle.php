<?php

function ers_resource_subtitle( $atts ) {
	ob_start();
	
	$resource_id = ers_get_post_id_from_resourceid();
	
	if ( ! $resource_id ) {
		return 'This is a placeholder for the resource subtitle. The resource ID is not set.';
	}
	
	$subtitle = get_post_meta( $resource_id, 'subtitle', true );

	echo esc_html( $subtitle );
	
	return ob_get_clean();
}
add_shortcode( 'resource_subtitle', 'ers_resource_subtitle' );