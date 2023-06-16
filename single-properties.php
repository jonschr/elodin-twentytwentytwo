<?php

get_header();

function tallgrass_properties_hero() {
    
    $title = get_the_title();
    $property_images = rentfetch_get_property_images();
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
    
}

function tallgrass_properties_description() {
    
    $city = get_post_meta( get_the_ID(), 'city', true );
    $state = get_post_meta( get_the_ID(), 'state', true );
    $description = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'description', true ) );
    
    echo '<div class="section-description">';
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
    echo '<div class="section-slider">';
        echo '<h2>Slider goes here</h2>';
    echo '</div>';
}

function tallgrass_properties_availability() {
    
    $availability_script = get_post_meta( get_the_ID(), 'availability_script', true );
    
    if ( !$availability_script )
        return;
    
    echo '<div class="section-availability">';
        echo '<div class="wrap">';
            echo '<h2>Availability</h2>';
            echo $availability_script;
        echo '</div>';
    echo '</div>';
}

function tallgrass_properties_video() {
    
}

function tallgrass_properties_floorplans() {
    
}

function tallgrass_properties_amenities() {
    
}

function tallgrass_properties_community_amenities() {
    
}

function tallgrass_properties_area_amenities() {
    
}

function tallgrass_properties_other_properties() {
    
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
