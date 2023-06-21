<?php

add_shortcode( 'projects', 'projects_func' );
function projects_func( $atts ) {
    
    ob_start();
    
    echo '<div class="projects-wrap">';

        if ( is_singular( 'services' ) ) {
            
            echo '<h4 class="recently-completed">Recently completed projects // <a href="/projects">View all projects</a></h4>';
            
            $projects = MB_Relationships_API::get_connected( [
                'id'   => 'projects_to_services',
                'to' => get_the_ID(),
            ] );
        }
        
        if ( is_singular( 'markets' ) ) {
            
            echo '<h4 class="recently-completed">Recently completed projects // <a href="/projects">View all projects</a></h4>';
            
            $projects = MB_Relationships_API::get_connected( [
                'id'   => 'projects_to_markets',
                'to' => get_the_ID(),
            ] );
            
            // limit to three items in the markets layout
            $projects = array_slice( $projects, 0, 3 );
        }
        
        if ( is_singular( 'page' ) ) {
            
            $args = array( 
                'post_type' => 'projects',
                'posts_per_page' => -1,
            );
            
            $projects = get_posts( $args );
        }
            
        echo '<div class="project-wrap-inner">';
            
            foreach ( $projects as $p ) {
                
                echo '<div class="project">';
                
                    $id = $p->ID;
                    do_action( 'projects_do_each', $id );
                    
                echo '</div>';
                
            }
        
        echo '</div>'; // .project-wrap
    echo '</div>'; // .projects-wrap
    
    return ob_get_clean();
}


add_action( 'projects_do_each', 'projects_each', 10, 1 );
function projects_each( $id ) {
    
    $title = get_the_title( $id );
    $background = get_the_post_thumbnail_url( $id, 'large' );
    $excerpt = get_the_excerpt( $id );
	
    if ( $background ) 
        printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
        
    echo '<div class="content-wrap">';
    
        if ( $title )
            printf( '<h3>%s</h3>', $title );
            
        if ( $excerpt )
            printf( '<div class="excerpt">%s</div>', $excerpt );
            
        edit_post_link( 'Edit this project', '<small>', '</small>', $id );
            
    echo '</div>';
    
}