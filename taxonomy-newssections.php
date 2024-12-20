<?php

get_header();

do_action( 'associatednews_do_archive_hero' );

echo '<div class="news-archive-container">';
	echo '<div class="wrap">';

	do_action( 'associatednews_do_archive' );
	
	echo '</div>';
echo '</div>'; // .news-archive-container

get_footer();