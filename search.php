<?php

get_header();

echo '<div class="search-form-custom">';
	echo '<div class="wrap">';
		echo get_search_form();
	echo '</div>'; // .wrap
echo '</div>'; // .search-form-custom

echo '<div class="search-results">';
	echo '<div class="wrap">';

		if ( have_posts() ) : while ( have_posts() ) : the_post();

				$title = get_the_title();
				$permalink = get_the_permalink();
				$prettylink = preg_replace( "#^[^:/.]*[:/]+#i", "", preg_replace( "{/$}", "", urldecode( $permalink ) ) ); 

				// markup
				$post_class_array = get_post_class( $class = '', get_the_ID() );
				$post_class       = implode( ' ', $post_class_array );

				printf( '<article class="%s">', $post_class );

				printf( '<a class="google-style-link" href="%s">%s</a>', $permalink, $prettylink );
					printf( '<h2 class="search-heading"><a href="%s">%s</a></h2>', $permalink, $title );
					the_excerpt();

				echo '</article>';

			endwhile; //* end of one post

		else : //* if no posts exist
			printf( '<p>No items found.</p>' );
		endif; //* end loop
	echo '</div>'; // .wrap
echo '</div>'; // .search-results

get_footer();
