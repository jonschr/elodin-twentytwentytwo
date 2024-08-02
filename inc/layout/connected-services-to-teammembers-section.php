<?php

function connected_teammembers() {
	global $post;
	
	$connected = get_post_meta( get_the_ID(), 'services_to_teammembers', true );
			
	if ( !$connected )
		return;
		
	echo '<div class="connected-teammembers">';
		
		echo '<div class="wrap">';
		
			printf( '<h2>Meet our %s service providers</h2>', get_the_title() );
		
			echo '<div class="teammembers-loop">';
	
				foreach( $connected as $teammember ) {
					
					team_member_each( $teammember );
					
				}
				
			echo '</div>';
		
		echo '</div>';
		
	echo '</div>';
	
}
