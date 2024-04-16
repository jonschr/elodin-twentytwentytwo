<?php

// [blog foo="foo-value"]
function blog_func( $atts ) {
	ob_start();
	
	echo '<div class="blog-container">';
	
		echo '<div class="blog-left">';
	
			// do a loop for the most recent blog entry
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 1,
				'orderby' => 'date',
				'order' => 'DESC',
			);
			
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					
					$title = get_the_title();
					$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					$author = get_the_author();
					$excerpt = get_the_excerpt();
					$permalink = get_the_permalink();
					
					printf( '<a class="featured-image" style="background-image:url( %s )" href="%s"></a>', esc_url( $background ), esc_url( $permalink ) );
					
					echo '<div class="content-left">';
	
						if ( $author ) {
							printf( '<div class="author">%s</div>', esc_html( $author ) );
						}
						
						if ( $title ) {
							printf( '<h3 class="entry-title"><a href="%s">%s</a></h3>', esc_url( get_the_permalink() ), esc_html( $title ) );
						}
						
						if ( $excerpt ) {
							printf( '<div class="excerpt">%s</div>', apply_filters( 'the_content', $excerpt ) );
						}
					
					echo '</div>';

				}
			}
			
		echo '</div>';
		
		echo '<div class="blog-right">';
	
			// do a loop for the most recent blog entry
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
				'offset' => 1,
			);
			
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					
					echo '<div class="post">';
					
						$title = get_the_title();
						$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
						$author = get_the_author();
						$permalink = get_the_permalink();
						
						printf( '<a class="featured-image" style="background-image:url( %s )" href="%s"></a>', esc_url( $background ), esc_url( $permalink ) );
						
						echo '<div class="content-right">';

							if ( $title ) {
								printf( '<h3 class="entry-title"><a href="%s">%s</a></h3>', esc_url( get_the_permalink() ), esc_html( $title ) );
							}
							
							if ( $author ) {
								printf( '<div class="author">%s</div>', esc_html( $author ) );
							}
												
						echo '</div>'; // .content-right
					
					echo '</div>'; // .post
					
				}
			}
			
		echo '</div>';
	
	echo '</div>';

	return ob_get_clean();
}
add_shortcode( 'blog', 'blog_func' );