<?php

remove_action( 'rentfetch_do_single_properties', 'rentfetch_single_property_title', 10 );
add_action( 'rentfetch_do_single_properties', 'cityline_single_property_title', 10 );
function cityline_single_property_title() {
    
    global $post;
    
    $id = get_the_ID();
    $title = get_the_title();
    $logo_white = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'logo_white', true ) );
    $color = get_post_meta( get_the_ID(), 'color', true );
            
    printf( '<div class="wrap-single-properties-entry-header" style="background-color:%s;"><div class="single-properties-entry-header">', $color );
        
        if ( $title )
            printf( '<div class="title-wrap"><h1>%s</h1></div>', $title );
            
        if ( $logo_white )
            printf( '<div class="logo-wrap"><div class="logo" style="background-image:url(%s);"></div></div>', $logo_white[0] );
            
    echo '</div></div>';
}

remove_action( 'rentfetch_do_single_properties', 'rentfetch_single_property_floorplans', 50 );
add_action( 'rentfetch_do_single_properties', 'cityline_single_property_floorplans', 50 );
function cityline_single_property_floorplans() {
    
    global $post;
    $id = get_the_ID();
    $property_id = get_post_meta( $id, 'property_id', true );
    
    // grab the gravity forms lightbox, if enabled on this page
    do_action( 'rentfetch_do_gform_lightbox' );
    
    // get the possible values for the beds
    $beds = rentfetch_get_meta_values( 'beds', 'floorplans' );
    $beds = array_unique( $beds );
    asort( $beds );
    
    echo '<div class="wrap-floorplans"><div class="floorplans-wrap" id="floorplans">';
    
    echo '<h2>Floorplans</h2>';
    
    // loop through each of the possible values, so that we can do markup around that
    foreach( $beds as $bed ) {
        
        $args = array(
            'post_type' => 'floorplans',
            'posts_per_page' => -1,
            'orderby' => 'meta_value_num',
            'meta_key' => 'beds',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key'   => 'property_id',
                    'value' => $property_id,
                ),
                array(
                    'key' => 'beds',
                    'value' => $bed,
                ),
            ),
        );
        
        $floorplans_query = new WP_Query( $args );
            
        if ( $floorplans_query->have_posts() ) {
            echo '<details open>';
                echo '<summary><h3>';                    
                    echo apply_filters( 'rentfetch_get_bedroom_number_label', $label = null, $bed );
                echo '</h3></summary>';
                echo '<div class="floorplan-in-archive">';
                    while ( $floorplans_query->have_posts() ) : $floorplans_query->the_post(); 
                        do_action( 'rentfetch_do_floorplan_in_archive', $post->ID );                    
                    endwhile;
                echo '</div>'; // .floorplans
            echo '</details>';
            
        }
        
        wp_reset_postdata();
    }
    
    echo '</div></div>';
    
}

remove_action( 'rentfetch_do_single_properties', 'rentfetch_single_property_basic_info', 30 );


remove_action( 'rentfetch_do_single_properties', 'rentfetch_single_property_map', 80 );