<?php

function services_section() {
    echo '<div class="services-section">';
        echo '<div class="wrap">';
            echo '<h2>Our Services</h2>';
            echo do_shortcode( '[loop post_type="services" layout="services_photo" columns="3"]' );
        echo '</div>';
    echo '</div>';
}