<?php

function clean_wprm_recipe_content() {
    // Log function trigger
    error_log('clean_wprm_recipe_content function triggered.');

    // Define the custom post type
    $post_type = 'wprm_recipe';

    // Query all posts of the custom post type
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => -1, // Get all posts
    );

    $query = new WP_Query($args);

    // Log the number of posts found
    error_log('Number of posts found: ' . $query->found_posts);

    // Loop through each post
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $content = get_the_content();

            // Log original content
            error_log('Original content of post ' . $post_id . ': ' . $content);

            // Define the patterns
            $patterns = [
                '/\[wprm-recipe.*/s',
                '/<!--WPRM.*/s',
                '/<div class="wprm-fallback-recipe".*/s',
                '/<h2 class="wprm.*/s'
            ];

            // Use preg_replace_callback to truncate the content
            foreach ($patterns as $pattern) {
                $content = preg_replace_callback($pattern, function($matches) {
                    // Truncate from the start of the match
                    return '';
                }, $content);
            }

            // Log cleaned content
            error_log('Cleaned content of post ' . $post_id . ': ' . $content);

            // Update the post content if it was changed
            if ($content !== get_the_content()) {
                $update_result = wp_update_post(array(
                    'ID'           => $post_id,
                    'post_content' => $content,
                ));

                // Log the update result
                error_log('Update result for post ' . $post_id . ': ' . $update_result);
            }
        }
    }

    // Restore original Post Data
    wp_reset_postdata();
}

// Hook into the 'init' action to run the function on pageload
// add_action('init', 'clean_wprm_recipe_content');
