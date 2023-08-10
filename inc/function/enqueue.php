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
    
    wp_enqueue_style( 'dashicons' );
    
    // Theme styles
	wp_enqueue_style( 
        'theme-styles', 
        get_bloginfo( 'stylesheet_directory') . '/assets/dist/theme-style.css', 
        array(), 
        CHILD_THEME_VERSION 
    );
	            
    // Muuri
    wp_register_script(
		'muuri-main',
        'https://cdn.jsdelivr.net/npm/muuri@0.9.5/dist/muuri.min.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
    
    // GSAP animation library
    wp_register_script(
		'gsap',
        'https://unpkg.co/gsap@3/dist/gsap.min.js',
		'',
		CHILD_THEME_VERSION,
		true
	);
    
    wp_register_script(
		'gsap-mouse-animation',
        get_stylesheet_directory_uri() . '/assets/js/mouse-animation.js',
		array( 'gsap' ),
		CHILD_THEME_VERSION,
		true
	);
        
    wp_register_script(
		'gsap-animate-sections',
        get_stylesheet_directory_uri() . '/assets/js/animate-sections.js',
		array( 'gsap', 'jquery' ),
		CHILD_THEME_VERSION,
		true
	); 
    
    wp_register_script(
		'pulse-animations',
        get_stylesheet_directory_uri() . '/assets/js/pulse-animations.js',
		'',
		CHILD_THEME_VERSION,
		true
	); 
    
    wp_register_script(
		'image-positioning',
        get_stylesheet_directory_uri() . '/assets/js/image-positioning.js',
		'',
		CHILD_THEME_VERSION,
		true
	); 

    // Slick
    wp_register_script(
        'slick-main-script',
        get_stylesheet_directory_uri() . '/vendor/slick/slick.min.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );
    
    wp_register_script(
        'slick-partners-slider-init',
        get_stylesheet_directory_uri() . '/assets/js/slick-partners-slider-init.js',
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
    
    wp_register_script(
        'popper',
        'https://unpkg.com/@popperjs/core@2',
        '',
        CHILD_THEME_VERSION,
        true
    );
    
    wp_register_script(
        'popper-init',
        get_stylesheet_directory_uri() . '/assets/js/popper-init.js',
        array('popper'),
        CHILD_THEME_VERSION,
        true
    );
    
    wp_register_script(
        'interactivity',
        get_stylesheet_directory_uri() . '/assets/js/interactivity.js',
        array( 'gsap', 'jquery' ),
        CHILD_THEME_VERSION,
        true
    );
    	
}