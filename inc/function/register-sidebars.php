<?php

function hip_register_sidebars() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Proficiencies Sidebar', 'hulsey-ip-theme' ),
		'id'            => 'proficiencies-sidebar',
		'description'   => esc_html__( 'Sidebar for Proficiencies', 'hulsey-ip-theme' ),
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Practices Sidebar', 'hulsey-ip-theme' ),
		'id'            => 'practices-sidebar',
		'description'   => esc_html__( 'Sidebar for Practices', 'hulsey-ip-theme' ),
	) );
	
}
add_action( 'widgets_init', 'hip_register_sidebars' );


function hip_select_sidebars() {
	
	global $post;
	
	if ( is_singular( 'proficiencies' ) ) {
		dynamic_sidebar( 'proficiencies-sidebar' );
	} 
	
	elseif ( is_singular( 'practices' )) {
		dynamic_sidebar( 'practices-sidebar' );
	}
	
	else {
		dynamic_sidebar( 'right-sidebar' );
	}
}
add_action( 'ed_sidebar_selection', 'hip_select_sidebars' );