<?php

add_action( 'wp_enqueue_scripts', 'ettt_enqueue' );
function ettt_enqueue() {

	// Theme styles
	wp_enqueue_style( 'theme-styles', get_bloginfo( 'stylesheet_directory') . '/assets/dist/theme-style.css', array(), CHILD_THEME_VERSION );
	
	// // Google fonts
	// wp_enqueue_style( 'elodin-fonts', '//fonts.googleapis.com/css?family=Arimo:400,400i,700,700i', array(), CHILD_THEME_VERSION );
	
	// // Plugin styles
    // wp_enqueue_style( 'redblue-section-style', plugin_dir_url( __FILE__ ) . 'css/redblue-section-styles.css', array(), REDBLUE_SECTIONS_VERSION, 'screen' );
    
    // Script
    wp_register_script( 'theme-scripts', plugin_dir_url( __FILE__ ) . 'js/slick-init.js', array( 'slick-main' ), CHILD_THEME_VERSION, true );
	
	
}



/**
 * Enable editor styles
 */
add_action('after_setup_theme', 'ettt_gutenberg_editor_style_setup');
function ettt_gutenberg_editor_style_setup() {

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles
    add_editor_style( "/assets/dist/gutenberg-style.css" );

}

/**
 * Add editor-level assets
 */
add_action('enqueue_block_editor_assets', 'ettt_gutenberg_assets');
function ettt_gutenberg_assets() {

    wp_enqueue_script(
        'ettt-editor',
        get_stylesheet_directory_uri() . '/editor.js',
        array( 'wp-blocks', 'wp-dom' ),
        filemtime( get_stylesheet_directory() . '/editor.js' ),
        true
    );
    
    wp_enqueue_style( 'editor-style', get_bloginfo( 'stylesheet_directory') . '/assets/dist/editor-style.css', array(), CHILD_THEME_VERSION );

    // Source Sans font    
    // add_editor_style( array( 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900' ) );
}

add_action( 'wp_enqueue_scripts', 'ettt_enqueue_everything' );
function ettt_enqueue_everything() {
    
    // AOS
    wp_enqueue_script(
        'aos-script',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );
    
    wp_enqueue_style(
        'aos-style',
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
        array(),
        CHILD_THEME_VERSION
    );

    // Slick
    wp_register_script(
        'slick-main-script',
        get_stylesheet_directory_uri() . '/vendor/slick/slick.min.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );

    wp_register_style(
        'slick-main-styles',
        get_stylesheet_directory_uri() . '/vendor/slick/slick.css',
        array(),
        CHILD_THEME_VERSION
    );
   

    wp_register_style(
        'slick-main-theme',
        get_stylesheet_directory_uri() . '/vendor/slick/slick-theme.css',
        array(),
        CHILD_THEME_VERSION
    );
    
    wp_enqueue_script(
        'all-scripts',
        get_stylesheet_directory_uri() . '/assets/dist/scripts.min.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );
	
}