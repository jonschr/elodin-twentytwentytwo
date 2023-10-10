<?php

function epa_methods_detailed() {
	$methods = [];
		
	$epa_method = get_post_meta( get_the_ID(), 'epa_method', true );
		
	if ( $epa_method ) {
		
		echo '<p class="terms">';
		
			foreach( $epa_method as $method ) {
				
				$epa = get_the_title( $method );
				$texas = get_post_meta( $method, 'state_of_texas_method_id', true );
				
				if ( $texas ) {
					$methods[] = sprintf( '%s (%s)', $epa, $texas );
				} else {
					$methods[] = $epa;
				}
				
				
			}
			
			echo implode( ', ', $methods );
		
		echo '</p>';
		
	}
}

function epa_methods_simple() {
	$methods = [];
		
	$epa_method = get_post_meta( get_the_ID(), 'epa_method', true );
		
	if ( $epa_method ) {
		
		echo '<p class="terms">';
		
			foreach( $epa_method as $method ) {
				
				$epa = get_the_title( $method );
				
				$methods[] = $epa;
				
				
			}
			
			echo implode( ', ', $methods );
		
		echo '</p>';
		
	}
}