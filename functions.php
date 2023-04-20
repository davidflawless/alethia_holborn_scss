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
		//'mobile' 			=> __( 'Mobile Menu', 'Mediagrin - Bootstrap' ),
		'footer' 			=> __( 'Footer Menu', 'Mediagrin - Bootstrap' ),
		//'sub-footer' 		=> __( 'Sub Footer Menu', 'Mediagrin - Bootstrap' ),
	) );





    // Add Li items to end of Haeder menu	
	// add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
	// function your_custom_menu_item ( $items, $args ) {
	//     if ($args->theme_location == 'primary') {
	// 	    $themeurl   = get_template_directory_uri();
	// 	    // $items .= '<li><a href="#" role="button" data-toggle="modal"><img src="'.$themeurl.'/img/search_icon.svg" alt="" /></a></li>';
    //         $items .= '<li class="search-icon"><a href="#" data-bs-toggle="modal" data-bs-target="#search-modal"   ><img src="'.$themeurl.'/img/search.svg" alt="" width="22" height="23" /></a></li>';

	//     }
	//     return $items;
    // } 





    add_filter( 'embed_oembed_html', 'wpse_embed_oembed_html', 99, 4 );
    function wpse_embed_oembed_html( $cache, $url, $attr, $post_ID ) {
    
    return '<div class="video-container">' . $cache . '</div>';
    }





	

    // if( function_exists('acf_add_options_page') ) {
	 
	// 	$page = acf_add_options_page(array(
	// 		'page_title' 	=> 'Theme Options',
	// 		'menu_title' 	=> 'Theme Options',
	// 		'menu_slug' 	=> 'app-settings',
	// 		'capability' 	=> 'edit_posts',
	// 		'redirect' 	=> false
	// 	));


	 
	// }


	
	function arphabet_widgets_init() {

		// register_sidebar( array(
		// 	'name'          => 'Home Widget',
		// 	'id'            => 'home_widgets',
		// 	'before_widget' => '<div id="home_widget"><div class="widget-top">',
		// 	'after_widget'  => '</div>',
		// 	'before_title'  => '<h3>',
		// 	'after_title'   => '</h3></div>'
		// ) );


		// register_sidebar( array(
		// 	'name'          => 'Events sidebar',
		// 	'id'            => 'events_sidebar',
		// 	'before_widget' => '<div id="events-widget">',
		// 	'after_widget'  => '</div>',
		// 	'before_title'  => '<h3>',
		// 	'after_title'   => '</h3>'
		// ) );

		// register_sidebar( array(
		// 	'name'          => 'Sitemap Widget',
		// 	'id'            => 'sitemap_widget',
		// 	'before_widget' => '<div class="sitemap">',
		// 	'after_widget'  => '</div>',
		// 	//'before_title'  => '<h2>',
		// 	//'after_title'   => '</h2>',
		// ) );
	
	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );


	
	function remove_default_image_sizes( $sizes) {
	    //unset( $sizes['thumbnail']);  // Keep this as its used in the media section of the CMS
	    //unset( $sizes['medium']);
	    //unset( $sizes['large']);
	     
	    return $sizes;
	}
	add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');
	
	
	function add_image_sizes()
	{
		if ( function_exists( 'add_image_size' ) ) { 

            add_image_size( 'mobile_logo', 50, 9999 );
            add_image_size( 'desktop_logo', 125, 9999 );
            add_image_size( 'side_img_large', 1815, 9999 );

            add_image_size( 'img_675', 675, 9999 );
        
	    }
	}
	add_action('after_setup_theme', 'add_image_sizes');



    // Move Yoast to bottom
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


    add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );