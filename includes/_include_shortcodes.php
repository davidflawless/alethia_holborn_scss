<?php
// Social Media shortcode function
function social_media() {

    // **
    // Functions to display the out can be found in 'include_social_functions.php'
    //**

    // if( have_rows('sm_instruction','option') ):
    //     while ( have_rows('sm_instruction','option') ) : the_row();
    //         $social_media_links = get_sub_field('social_media_links','option');
    //     endwhile;
    // endif;

    // if ($social_media_links == 'yes') :
    
    ?>

    <ul class="social-media">

        <?php
        if( have_rows('social_media', 'option' ) ):

            while ( have_rows('social_media', 'option' ) ) : the_row();

                if( get_row_layout() == 'twitter' ):
            
                    twitter();

                elseif( get_row_layout() == 'facebook' ): 
                
                    facebook();
                    
                elseif( get_row_layout() == 'instagram' ): 

                    instagram();
                    
                elseif( get_row_layout() == 'youtube' ): 
                        
                    youtube();
                    
                elseif( get_row_layout() == 'vimeo' ): 

                    vimeo();

                elseif( get_row_layout() == 'linkedin' ): 

                    linkedin();
            
                endif;

            endwhile;

        else :

            // no layouts found

        endif;	
        ?>

    </ul>

    <?php
    //endif;
}   
add_shortcode('flawless-social-media', 'social_media');








// Google maps shortcode function
function google_map() {

    // Google map
    $google_map_option 	= get_field('google_map_option','option');
    $location 			= get_field('google_map','option');

    $val_x = get_field('map_position_offset_x', 'option');
    $val_y = get_field('map_position_offset_y', 'option');

    echo '<script>';
    echo 'val_x = ' . json_encode($val_x) . ';';
    echo 'val_y = ' . json_encode($val_y) . ';';
    echo '</script>';

     

    if ($google_map_option == 'Yes') {

        if( !empty($location) ) { ?>
<div class="acf-map">
    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php 
        }
    }

    $path = $siteurl.'/wp-content/plugins/mediagrin-global-options/includes/';
    wp_register_script( 'google-map-init', $path. 'js/google-maps-min.js', array('google-map', 'jquery'), version_id(), true );  
    wp_enqueue_script( 'google-map-init' );

    $google_map_api_key = get_field('google_map_api_key','options');
    

    wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key='.$google_map_api_key, array(), '5', false);
}
add_shortcode('flawless-google-map', 'google_map'); 




// Social Share shortcode function
function social_share() {

    // Social Share
    $add_social_share 	= get_field('add_social_share','option');
    if ($add_social_share == 'Yes') {

        $showlabel = 'false';
        $showcount = 'false';
        $would_like_to = get_field('would_like_to','option');

        if( $would_like_to ):
            foreach( $would_like_to as $like_to ):
                if ($like_to == 'showlabel') {
                    $showlabel = 'true';
                }

                if ($like_to == 'showcount') {
                    $showcount = 'true';
                    //$showcount = '"'.'inside'.'"';
                }
            endforeach;
        endif;

        $display_in = get_field('display_in', 'option');

        switch ($display_in) {
            case "popup":
                $sharein = '"'.'popup'.'"';
                break;
            case "blank":
                $sharein = '"'.'blank'.'"';
                break;
            case "self":
                $sharein = '"'.'self'.'"';
                break;
            default:
                $sharein = '"'.'popup'.'"';
        }


        $socials = get_field('social_share','options');

        if( $socials ):
            $wanted_socials = '';
            foreach( $socials as $key => $social ): 
                $wanted_socials .= '"'.$social.'"';
                if (next($socials)==true) { 
                    $wanted_socials .= ", "; 
                }
            endforeach;
        endif;

        $path = plugin_dir_url( __FILE__ );

        wp_enqueue_style( 'jssocial', $path. 'css/jssocials.css', version_id(), false);
        wp_enqueue_style( 'jssocial-theme', $path. 'css/jssocials-theme-flat.css', false);

        wp_register_script( 'jssocials', $path. 'js/jssocials-min.js', array( 'jquery' ));
        wp_enqueue_script( 'jssocials' );
        ?>

<script>
$(document).ready(function() {
    $("#share").jsSocials({
        showLabel: <?php echo $showlabel; ?>,
        showCount: <?php echo $showcount; ?>,
        shareIn: <?php echo $sharein; ?>,
        //shares: ["twitter", "googleplus", "linkedin", "email" ]
        shares: [<?php echo $wanted_socials; ?>]
    });
});
</script>

<div id="share"></div>

<?php
    } 
}
add_shortcode('flawless-social-share', 'social_share');
?>