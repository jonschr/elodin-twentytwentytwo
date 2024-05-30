<?php

function edi_search_only_pages($query) {
	if ($query->is_search && !is_admin()) {
		$query->set('post_type', 'page');
	}
	return $query;
}
add_action('pre_get_posts', 'edi_search_only_pages');