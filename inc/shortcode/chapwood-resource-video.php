<?php

function chapwood_resource_video_func( $atts ) {
	
	ob_start();
	
	$resource_id = ers_get_post_id_from_resourceid();
	
	the_field( 'videourl', $resource_id );
	
	return ob_get_clean();
}
add_shortcode( 'chapwood_resource_video', 'chapwood_resource_video_func' );