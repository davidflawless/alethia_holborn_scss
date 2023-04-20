<?php
// Add site-id to body class to allow site-specific styling in a central style.css file
// (this code goes in your theme's functions.php or in a site-specific plugin)


function site_id_in_body_class($classes) {
    $this_id = get_current_blog_id();
    $classes[] = 'site-id-'.$this_id;
    return $classes;
}
add_filter('body_class', 'site_id_in_body_class');

//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

?>