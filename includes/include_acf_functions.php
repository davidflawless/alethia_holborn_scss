<?php
// Theme options
if( function_exists('acf_add_options_page') ) {
	
	// acf_add_options_page(array(
	// 	'page_title' 	=> 'Theme Options',
	// 	'menu_title'	=> 'Theme Options',
	// 	'menu_slug' 	=> 'custom-plugin-options',
	// 	'capability'	=> 'edit_posts',
	// 	'redirect'		=> false
	// ));



    acf_add_options_page(array(
        'page_title' 	=> 'Theme Options',
        'menu_title' 	=> 'Theme Options',
        'menu_slug' 	=> 'app-settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false
    ));


	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

    // acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Modal Settings',
	// 	'menu_title'	=> 'Modals',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}










// Set ACF JSON path for export from CMS 
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}


// Load ACF into active theme for syncing.
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}
?>