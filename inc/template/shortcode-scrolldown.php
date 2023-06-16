<?php

add_shortcode('scrolldown', 'scrolldown_shortcode');
function scrolldown_shortcode() {
    ob_start();
    
    echo '<div class="pulse"></div>';
    echo '<a id="scrolldown" class="scrolldown" href="#scrolldown">';
        echo '<span class="dashicons dashicons-arrow-down-alt"></span>';    
    echo '</a>';
    
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.scrolldown').click(function(event) {
                    event.preventDefault();

                    var target = $(this).attr('href');
                    var headerHeight = $('header').outerHeight(); // Get the height of the header element

                    $('html, body').animate({
                    scrollTop: $(target).offset().top - headerHeight // Subtract header height from the scroll position
                    }, 1000);
                });
            });
        });
    </script>
    <?php
    
    return ob_get_clean();
}

