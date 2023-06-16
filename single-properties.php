<?php

get_header();

function tallgrass_properties_hero() {
    
    $title = get_the_title();
    $property_images = rentfetch_get_property_images( array( 'size' => 'full' ) );
    $directions_link = get_post_meta( get_the_ID(), 'directions_link', true );
    
    echo '<div class="section-hero">';
    
        printf( '<div class="hero-image" style="background-image:url(%s);"></div>', $property_images[0]['url'] );
        
        echo '<div class="wrap">';
            echo '<div class="hero-content">';
            
                if ( $title )
                    printf( '<h1>%s</h1>', $title );
                    
                if ( $directions_link )
                    printf( '<p><a class="directions-link" href="%s" target="_blank">Get Directions <span class="dashicons dashicons-arrow-right-alt"></span></a></p>', $directions_link );                    

            echo '</div>';
        echo '</div>';
    echo '</div>';
    
}

function tallgrass_properties_nav() {
    
    global $post;
    
    echo '<div class="section-nav">';
        echo '<div class="wrap">';
            
            echo '<div class="nav-content">';
            
                $description = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'description', true ) );
                if ( $description ) {
                    echo '<div class="nav-item">';
                        echo '<a href="#overview">Overview</a>';
                    echo '</div>';
                }
                
                $availability_script = get_post_meta( get_the_ID(), 'availability_script', true );
                if ( $availability_script ) {
                    echo '<div class="nav-item">';
                        echo '<a href="#availability">Availability</a>';
                    echo '</div>';
                }
                         
                $video_url = get_post_meta( get_the_ID(), 'video', true );
                if ( $video_url ) {
                    echo '<div class="nav-item">';
                        echo '<a href="#video">Video</a>';
                    echo '</div>';
                }
                
                $terms = get_the_terms( get_the_ID(), 'amenities' );
                if ( $terms ) {
                    echo '<div class="nav-item">';
                        echo '<a href="#amenities">Amenities</a>';
                    echo '</div>';
                }
                
                echo '<div class="nav-item">';
                    echo '<a href="#other">Other Communities</a>';
                echo '</div>';
                
            echo '</div>';
        
        echo '</div>';
    echo '</div>';
}

function tallgrass_properties_description() {
    
    $city = get_post_meta( get_the_ID(), 'city', true );
    $state = get_post_meta( get_the_ID(), 'state', true );
    $description = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'description', true ) );
    
    // Bail if no description
    if ( !$description )
        return;
    
    echo '<div class="section-description" id="overview">';
        echo '<div class="wrap">';
            echo '<div class="description-content">';
            
                printf( '<p class="is-style-kicker">%s, %s</p>', $city, $state );
                printf( '<h2>About %s</h2>', get_the_title() );
                echo $description;
            
                
            echo '</div>';
        echo '</div>';
    echo '</div>';
}

function tallgrass_properties_slider() {
    
    $property_images = rentfetch_get_property_images( array( 'size' => 'large' ) );
    $count = count( $property_images );
    
    // bail if we don't have enough images
    if ( $count < 5 )
        return;
    
    // drop the first image
    array_shift( $property_images );
        
    wp_enqueue_script( 'slick-main-script' );
    wp_enqueue_script( 'slick-single-property-slider-init' );
    wp_enqueue_style( 'slick-main-styles' );
    wp_enqueue_style( 'slick-main-theme');
    
    echo '<div class="section-slider">';
        echo '<div class="single-property-slider">';
            foreach( $property_images as $image ) {
                printf( '<div class="slide"><div class="image" style="background-image:url(%s);"></div></div>', $image['url'] );
            }            
        echo '</div>';
        
        echo '<div class="arrows">';
            echo '<button class="single-property-prev"><span class="dashicons dashicons-arrow-left-alt"></span></button>';
            echo '<button class="single-property-next"><span class="dashicons dashicons-arrow-right-alt"></span></button>';
        echo '</div>';
        
    echo '</div>';
}

function tallgrass_properties_availability() {
    
    $availability_script = get_post_meta( get_the_ID(), 'availability_script', true );
    
    if ( !$availability_script )
        return;
    
    echo '<div class="section-availability" id="availability">';
        echo '<div class="wrap">';
            echo '<h2>Availability</h2>';
            echo $availability_script;
        echo '</div>';
    echo '</div>';
}

function tallgrass_properties_video() {
    
    $video_url = get_post_meta( get_the_ID(), 'video', true );
        
    // Bail if no video URL
    if ( !$video_url )
        return;
        
    echo '<div id="video">';
        
        if (strpos($video_url, 'matterport') !== false) {
        
        echo '<div style="position: relative; width: 100%; max-width: 100%;">';
                echo '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">';
                    printf('<iframe src="%s" width="100%%" height="100%%" frameborder="0" allowfullscreen allow="xr-spatial-tracking" style="position: absolute; top: 0; left: 0; width: 100%%; height: 100%%;"></iframe>', esc_url($video_url));
                echo '</div>';
            echo '</div>';
            
        } else {
            // Get the oEmbed HTML for the video
            $video_html = wp_oembed_get($video_url);

            // Wrap the video HTML in a container with custom CSS
            $video_html = '<div class="full-width-video">' . $video_html . '</div>';

            // Output the modified video HTML
            echo $video_html;
        }
        
    echo '</div>';
    
}

function tallgrass_properties_floorplans() {
    rentfetch_single_property_floorplans();
}

function tallgrass_properties_amenities() {
    
    $terms = get_the_terms( get_the_ID(), 'amenities' );
    
    // Bail if no terms
    if ( !$terms )
        return;
    
     echo '<div class="section-amenities" id="amenities">';
        echo '<div class="wrap">';
            echo '<h2>Amenities</h2>';
            echo '<div class="amenities">';
                foreach( $terms as $term ) {                
                    printf( '<div>%s</div>', esc_attr( $term->name ) );
                }
            echo '</div>';
        echo '</div>';
    echo '</div>';
}

function tallgrass_properties_community_amenities() {
    $community_amenities = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'community_amenities', true ) );
    
    if ( !$community_amenities )
        return;
        
    echo '<div class="section-community-amenities section-checkerboard">';
        echo '<div class="image column">';
            echo '<div class="the-image" style="background-image:url(/wp-content/uploads/2023/06/community-amenities.jpg);"></div>';
        echo '</div>';
        echo '<div class="content column">';
            echo '<div class="content-wrap">';
                echo '<h2>Community Amenities</h2>';
                echo $community_amenities;
            echo '</div>';
        echo '</div>';
    echo '</div>';
    
}

function tallgrass_properties_area_amenities() {
   $area_amenities = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'area_amenities', true ) );
    
    if ( !$area_amenities )
        return;
        
    echo '<div class="section-community-amenities section-checkerboard">';
        echo '<div class="content column">';
            echo '<div class="content-wrap">';
                echo '<h2>Area Amenities</h2>';
                echo $area_amenities;
            echo '</div>';
        echo '</div>';
        echo '<div class="image column">';
            echo '<div class="the-image" style="background-image:url(/wp-content/uploads/2023/06/area-amenities.jpg);"></div>';
        echo '</div>';
    echo '</div>';
    
}

function tallgrass_properties_other_properties() {
    
    echo '<div class="section-other-properties" id="other">';
        echo '<div class="wrap">';
        
            echo '<h2>Other Properties</h2>';
    
            // order rand
            
            
            // Args for WP_Query
            $args = array(
                'post_type' => 'properties',
                'posts_per_page' => 3,
                'not__in' => array( get_the_ID() ),
                'orderby' => 'rand',
            );

            // Query
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                
                // Output
                echo '<div class="tallgrass-properties-grid">';
                
                    while ($query->have_posts()) {
                        $query->the_post();
                                        
                        do_action( 'tallgrass_properties_do_each' );
                        
                    }
                
                echo '</div>';
                
            } else {
                echo 'No properties found.';
            }

            // Reset Post Data
            wp_reset_postdata();
            
        echo '</div>';
    echo '</div>';
    
}

tallgrass_properties_hero();
tallgrass_properties_nav();
tallgrass_properties_description();
tallgrass_properties_slider();
tallgrass_properties_availability();
tallgrass_properties_video();
tallgrass_properties_floorplans();
tallgrass_properties_amenities();
tallgrass_properties_community_amenities();
tallgrass_properties_area_amenities();
tallgrass_properties_other_properties();

get_footer();
