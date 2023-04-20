<?php

    // *****************************************
    //
    //      Load globally needed CSS in the Footer
    // 
    // *****************************************
    function prefix_add_footer_styles() {
        
        wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
        wp_enqueue_style( 'cookie-law-info' );
        wp_enqueue_style( 'cookie-law-info-gdpr' );

    };
    add_action( 'get_footer', 'prefix_add_footer_styles' );

    // *****************************************
    //
    //      Load globally header Styles & Scripts
    // 
    // *****************************************
    function register_scripts_styles() {

        // *****************************************
        //
        //      Styles
        // 
        // *****************************************

        // Load Bootstrap 5 CSS
        //
        wp_register_style( 'bootstrap-5-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), version_id(), false );
        wp_enqueue_style( 'bootstrap-5-style');




        // JS Socials CSS
        //
        // wp_register_style( 'js-socials-css', get_template_directory_uri() . '/css/jssocials.css', array(), version_id(), 'screen');
        // wp_enqueue_style( 'js-socials-css');
       
        // wp_register_style( 'js-socials-theme-css', get_template_directory_uri() . '/css/jssocials-theme-plain.css', array(), version_id(), 'screen');
        // wp_enqueue_style( 'js-socials-theme-css');





        // Load Slick Slider CSS
        //        
        wp_enqueue_style( 'slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), version_id(), 'screen' ); 


        // Global
        //
        // wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css', array(), version_id(), 'screen');
        wp_enqueue_style( 'styles_min', get_theme_file_uri() . '/build/css/styles.min.css', array(), '', 'screen' );
        // wp_enqueue_style( 'layout', get_theme_file_uri() . '/build/css/styles.min.css', array(), '', 'screen');

        
        
        // Basic and 404
        //
        // if ( is_page_template( array ('page-basic.php', '404.php') ) ) :
            
        //     // CSS
        //     //
        //     wp_enqueue_style( 'basic', get_template_directory_uri() . '/css/basic.css', array(), version_id());

        // endif;


        // *****************************************
        //
        //      Scripts
        // 
        // *****************************************

        // Deregister Wordpress css so thay can be called on the pages they are needed
        //
        wp_dequeue_style( 'wc-blocks-style' );
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wpsl-styles' );
        wp_dequeue_style( 'aws-style' );     
        wp_dequeue_style( 'cookie-law-info' );
        wp_dequeue_style( 'cookie-law-info-gdpr' );

        
		
	    // Deregister Wordpress default JQuery > Register JQuery
        //
	    wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), true);
		wp_enqueue_script('jquery');

        wp_register_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js#asyncload', array( 'jquery' ), version_id(), true );
		wp_enqueue_script( 'popper-js' );

        // Deregister JS
        // wp_deregister_script('google-map');
        // wp_deregister_script('google-map-init');


		wp_register_script( 'bootstrap-5-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js#asyncload', array( 'jquery' ), version_id(), true );
        wp_enqueue_script( 'bootstrap-5-script' );

        // wp_register_script( 'in-view', get_template_directory_uri() . '/js/jquery.inview.min.js#asyncload', array( 'jquery' ), version_id(), true );
        // wp_enqueue_script( 'in-view' );
        
        
        // wp_register_script( 'js-social-min', get_template_directory_uri() .'/js/jssocials.min.js#asyncload', array( 'jquery' ), version_id(), true );
		// wp_enqueue_script( 'js-social-min' );


        wp_register_script( 'font-awesome', 'https://kit.fontawesome.com/2e60eee91b.js', array( 'jquery' ), version_id(), true );
		wp_enqueue_script( 'font-awesome' );

        // wp_register_script( 'slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js#asyncload', array( 'jquery' ), true );
        // wp_enqueue_script( 'slider' );

        wp_register_script( 'match-height-js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', '', '', true );
		wp_enqueue_script( 'match-height-js' ); 


        // wp_register_script( 'global-script', get_template_directory_uri() . '/js/sitejs-min.js', array( 'jquery' ), version_id(), true );
		// wp_enqueue_script( 'global-script' );

        wp_register_script( 'global-script', get_template_directory_uri() . '/build/js/scripts.min.js', array( 'jquery' ), version_id(), true );
		wp_enqueue_script( 'global-script' );        

	}    
	add_action('wp_enqueue_scripts', 'register_scripts_styles');


    // Defer JS scripts - unless jquery core
    //
    function defer_parsing_of_js( $url ) {
        if ( is_user_logged_in() ) return $url; //don't break WP Admin
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.min.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        return str_replace( ' src', ' defer src', $url );
    }
    add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


    function add_async_forscript($url) {
        if (strpos($url, '#asyncload')===false)
            return $url;
        else if (is_admin())
            return str_replace('#asyncload', '', $url);
        else
            return str_replace('#asyncload', '', $url)."' async='async"; 
    }
    add_filter('clean_url', 'add_async_forscript', 11, 1);