<?php

function hip_register_proficiencies_sidebar() {
	register_sidebar( array(
		'name'          => esc_html__( 'Proficiencies Sidebar', 'hulsey-ip-theme' ),
		'id'            => 'proficiencies-sidebar',
		'description'   => esc_html__( 'Sidebar for Proficiencies', 'hulsey-ip-theme' ),
	) );
}
add_action( 'widgets_init', 'hip_register_proficiencies_sidebar' );

function hip_replace_proficiencies_sidebar( $sidebar ) {
	
	if ( is_singular( 'proficiencies' ) ) {
		$sidebar = 'proficiencies-sidebar';
	}
	return $sidebar;
}
add_filter( 'theme_mod_sidebar', 'hip_replace_proficiencies_sidebar' );

