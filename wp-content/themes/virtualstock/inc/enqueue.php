<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		//Waypoints
		wp_enqueue_script( 'waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js');
		//Counter-up jQuery plugin
		wp_enqueue_script( 'counter-up-script', get_template_directory_uri() . '/js/jquery.counterup.min.js', array(), true ); 
		// Owl-carousel 2.0
		wp_enqueue_style( 'owl-carousel-styles', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_style( 'owl-carousel-theme', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', array(), $the_theme->get( 'Version' ) );

		wp_enqueue_script( 'owl-carousel-scripts', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), true);

		// Simple Parallax from http://pixelcog.github.io/parallax.js/
		wp_enqueue_script( 'parallax-scripts', get_template_directory_uri() . '/js/parallax.min.js', array(), true);
		
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
