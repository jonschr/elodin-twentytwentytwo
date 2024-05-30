<?php

/**
 * Add excerpt support to pages
 *
 * @return void.
 */
function edi_enable_excerpts_for_page_cpt() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'edi_enable_excerpts_for_page_cpt' );