<?php

/**
 * Enable editor styles
 */
add_action( 'after_setup_theme', 'ettt_gutenberg_editor_style_setup' );
function ettt_gutenberg_editor_style_setup() {

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles
    add_editor_style( "/assets/dist/gutenberg-style.css" );

}

/**
 * Add editor-level assets
 */
add_action( 'enqueue_block_editor_assets', 'ettt_gutenberg_assets');
function ettt_gutenberg_assets() {

    wp_enqueue_script(
        'ettt-editor',
        get_stylesheet_directory_uri() . '/editor.js',
        array( 'wp-blocks', 'wp-dom' ),
        filemtime( get_stylesheet_directory() . '/editor.js' ),
        true
    );
    
    wp_enqueue_style( 'editor-style', get_bloginfo( 'stylesheet_directory') . '/assets/dist/editor-style.css', array(), CHILD_THEME_VERSION );

}

/**
 * Enqueue everything
 */
add_action( 'wp_enqueue_scripts', 'ettt_enqueue_everything' );
function ettt_enqueue_everything() {
    
    // Theme styles
	wp_enqueue_style( 'theme-styles', get_bloginfo( 'stylesheet_directory') . '/assets/dist/theme-style.css', array(), CHILD_THEME_VERSION );
	    
    // Script
    wp_register_script( 'theme-scripts', plugin_dir_url( __FILE__ ) . 'js/slick-init.js', array( 'slick-main' ), CHILD_THEME_VERSION, true );
    
    // AOS script: https://michalsnik.github.io/aos/
    wp_enqueue_script(
        'aos-script',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );
    
    // Muuri
    wp_register_script(
		'muuri-main',
        'https://cdn.jsdelivr.net/npm/muuri@0.9.5/dist/muuri.min.js',
		// get_stylesheet_directory_uri() . '/vendor/muuri/muuri.min.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
    
    // // AOS init
    // wp_enqueue_script(
    //     'aos-script',
    //     get_stylesheet_directory_uri() . '/js/aos-init.js',
    //     array('aos-script'),
    //     CHILD_THEME_VERSION,
    //     true
    // );
    
    // AOS style: https://michalsnik.github.io/aos/
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