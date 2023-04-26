<?php

    // WordPress 4.7+ introduce get_theme_file_path() functions to include file on WordPress theme.
    // Searches in the stylesheet directory before the template directory so themes which inherit from a parent theme can just override one file.
    // https://developer.wordpress.org/reference/functions/get_theme_file_path/

    include get_theme_file_path( '/includes/include_scripts_styles.php' );
    include get_theme_file_path( '/includes/include_media_functions.php' );
    include get_theme_file_path( '/includes/include_acf_functions.php' );

	
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'custom-background' ); 
    add_post_type_support( 'page', 'excerpt' );

	
	add_filter( 'big_image_size_threshold', '__return_false' );

    function my_print_r($array_data) {
        echo '<pre>';
        print_r($array_data);
        echo '</pre>';
    }
    	
	define ('VERSION', rand());

	function version_id() {
		if ( WP_DEBUG )
			return time();
			return VERSION;
	}
	
    // Register Custom Navigation Walker
	// require_once('bootstrap_5_wp_nav_menu_walker.php');
	
	register_nav_menus( array(
		'primary' 			=> __( 'Primary Menu', 'Mediagrin - Bootstrap' ),
	) );

    // Move Yoast to bottom
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
