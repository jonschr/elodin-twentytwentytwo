<?php

function markets_intro() {
    
    $excerpt = get_the_excerpt();
    $title = get_the_title();
    $pdf = get_post_meta( get_the_ID(), 'brochure', true );
    $background = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    
    echo '<div class="alignfull markets-intro-wrap">';
    
        if ( $background ) 
            printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
    
        echo '<div class="wrap">';
        
            echo '<p class="is-style-kicker has-accent-color has-text-color">Markets we serve</p>';
        
            if ( $title )
                printf( '<h1>%s</h1>', $title );
                
            if ( $excerpt )
                printf( '<div class="excerpt">%s</div>', $excerpt );
                            
            if ( $pdf )
                printf( '<a href="%s" download class="button">Download brochure</a>', wp_get_attachment_url( $pdf ) );
        
        echo '</div>';
    echo '</div>';
}

function markets_projects() {
    echo '<div class="alignfull markets-projects-wrap">';
        echo '<div class="wrap">';
            echo do_shortcode( '[projects]' );
        echo '</div>';
    echo '</div>';
}

function markets_solutions() {
    echo '<div class="alignfull markets-solutions-wrap">';
        echo '<div class="wrap">';
            printf( '<h2>Our %s Solutions</h2>', get_the_title() );
            echo do_shortcode( '[solutions]' );
        echo '</div>';
    echo '</div>';
}

get_header();

markets_intro();
markets_projects();
markets_solutions();

echo '<div class="entry-content">';
    the_content();
echo '</div>';

get_footer();

