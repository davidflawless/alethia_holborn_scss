<?php
function featured_data($thumb, $thumb_id) {
    
    $args = array(
        'post_type' => 'attachment',
        'include'   => $thumb_id
    );
    $thumbs = get_posts( $args );

    if ( $thumbs ) {

        $thumb['alt']       = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
        $thumb['desc']      = $thumbs[0]->post_content;
        $thumb['title']     = $thumbs[0]->post_title;
        $thumb['caption']   = $thumbs[0]->post_excerpt;

        // add the additional image sizes
        foreach ( get_intermediate_image_sizes() as $size ) {
            $thumb['sizes'][$size] = wp_get_attachment_image_src( $thumb_id, $size, false );
        }
    }
    return $thumb;
}




function featured_img_setup($my_id) {

    //my_print_r($data_array->ID);

    // Get Featured image data
    if ( has_post_thumbnail($my_id) ) {

        $thumb      = array();
        $thumb_id   = get_post_thumbnail_id($my_id);
        $featured   = featured_data($thumb, $thumb_id);
        
        $returned_array['featured']   = $featured;

        //my_print_r($returned_array['featured']);

        return $returned_array['featured'];
    }
} // End of function







function img_array_data($my_id) {

    if (get_field('c__single_image',$my_id)['image_array'] != '') {

        // *** If image data is wanted as a Featured image array
        // *** and so displayed via the img_featured() function *** ///

            // $slide_thumb                   = array();
            // $slide_img_id                  = get_field('c__single_image')['image_array']['id'];
            // $$returned_array['slide_img']  = featured_data($slide_thumb, $slide_img_id);

        // *** If image data is wanted as a standard image array
        // *** and so displayed via the img_display() function *** ///

        $returned_array = get_field('c__single_image',$my_id)['image_array'];
        
        return $returned_array;
    }
} // End of function



function gallery_img_array($my_id) {

    if (get_field('c__gallery_images',$my_id) != '') {

        $returned_array = get_field('c__gallery_images',$my_id);
        
        return $returned_array;

    }
} // End of function


function gallery_img_zip($my_id) {

    if (get_field('c__download_file',$my_id) != '') {

        $returned_array = get_field('c__download_file',$my_id);
        
        return $returned_array;

    }
} // End of function



function event_date($my_id) {

    if (get_field('event_date',$my_id)['c__date'] != '') {

        $returned_array = get_field('event_date',$my_id)['c__date'] ;
        
        return $returned_array;

    }
} // End of function


// MP3 data
function get_podcast_data($my_id) {

    $returned_array['postcast_urls']['podcast_author']          = get_field('podcast_author', $my_id);
    $returned_array['postcast_urls']['spotify_podcast_url']     = get_field('podcast_spotify_url', $my_id);
    $returned_array['postcast_urls']['apple_podcast_url']       = get_field('podcast_apple_url', $my_id);
    $returned_array['postcast_urls']['google_podcast_url']      = get_field('podcast_google_url', $my_id);
    $returned_array['postcast_urls']['youtube_podcast_url']     = get_field('podcast_youtube_music_url', $my_id);
    return $returned_array['postcast_urls'];
}


// YouTube ID Data
function get_yt_data($my_id) {

    if (get_field('youtube_id', $my_id) != '') {

        $returned_array['yt_id'] = get_field('youtube_id', $my_id);
        return $returned_array['yt_id'];
    }
}


// Get Video Type - Custom Taxonomy
function get_video_type_slug($my_id) {

    $terms = get_the_terms( $my_id , 'p2p_video_type' );
    if ($terms) {
        foreach ( $terms as $term ):
            $returned_array['video_type'] = $term->slug;
        endforeach;

        return $returned_array['video_type'];
    }
}


// Get P2P category - Custom Taxonomy
function get_p2p_category($my_id) {

    $terms = get_the_terms( $my_id , 'p2p_category' );
    if ($terms) {
        foreach ( $terms as $term ):
            $returned_array = $term->name;
        endforeach;

        return $returned_array;
    }
}


// get P2P Country
function get_p2p_country($my_id) {

    $terms = get_the_terms( $my_id , 'p2p_country' );
    if ($terms) {
        //$flag_array = array();
        foreach ( $terms as $term ):

            $returned_array['slug']         =  $term->slug;
            $returned_array['flag_img']     = get_field('c__single_image', $term)['image_url'];
            $returned_array['flag_url']     =  get_term_link( $term );
            
        endforeach;

        return $returned_array;
    }
}



// Get P2P tags
function get_p2p_tags($my_id) {

    $terms = get_the_terms( $my_id , 'p2p_tags' );
    if ($terms) {

        $x = 0;
        foreach ( $terms as $term ):

            $returned_array[$x]['tag_slug']         =  $term->slug;
            $returned_array[$x]['tag_name']         =  $term->name;
            $returned_array[$x]['tag_url']     =  get_term_link( $term );
            $x++;
            
        endforeach;

        return $returned_array;
    }
}


// Get Post Category (name)
function get_post_category($my_id) {

    $categories = $terms = get_the_category( $my_id , 'post' );
    if ($categories) {
        foreach( $categories as $category ) {
            $returned_array['cat_name'] = $category->name;
        }

        return $returned_array;
    }
}







function cpt_select($cpt_select) {

    $x=0;
    foreach($cpt_select as $cpt) {
        $cpt_array[$x]['id']        = $cpt->ID;
        $cpt_array[$x]['title']     = $cpt->post_title;
        $cpt_array[$x]['post_name'] = $cpt->post_name;
        $cpt_array[$x]['excerpt']   = $cpt->post_excerpt;
        $cpt_array[$x]['content']   = $cpt->post_content;
        $cpt_array[$x]['permalink'] = get_permalink( $cpt->ID );
        $cpt_array[$x]['post_type'] = $cpt->post_type;


        $cpt_array[$x]['ext url']   = get_field('external_url', $cpt->ID);
        if ($cpt_array[$x]['ext url']) {
            $cpt_array[$x]['permalink'] = $cpt_array[$x]['ext url'];
        }
        
        //my_print_r($cpt);

        // Get Featured image data
        $cpt_array[$x]['featured']      = featured_img_setup($cpt->ID);

        // Get square image data
        $cpt_array[$x]['square_img']    = img_array_data($cpt->ID);

        // Get slider image data
        $cpt_array[$x]['slider_img']    = img_array_data($cpt->ID);

        // Get podcasts mp3 url
        $cpt_array[$x]['postcast_urls'] = get_podcast_data($cpt->ID);

        // Get YouTube ID
        $cpt_array[$x]['yt_id']         = get_yt_data($cpt->ID);

        // Alt Title, Texta & Image
        $cpt_array[$x]['alt_title']     = get_field('alt_title_and_text', $cpt->ID)['c__text_single'];
        $cpt_array[$x]['alt_text']      = get_field('alt_title_and_text', $cpt->ID)['c__text_textarea'];
        $cpt_array[$x]['alt_video']     = get_field('alt_video_image', $cpt->ID)['c__single_image'];


        // get video type (Taxonomy)
        $cpt_array[$x]['video_type']    = get_video_type_slug($cpt->ID);

        // Get post category
        //$cpt_array[$x]['cat_name']      = get_post_category($cpt->ID);

       // Get P2P category
       //$cpt_array[$x]['p2p_cat_name']   = get_p2p_category($cpt->ID);

        // Get P2P Tags
        $cpt_array[$x]['p2p_tags']       = get_p2p_tags($cpt->ID);

       // Get P2P Country
       $returned_array = get_p2p_country($cpt->ID);
       $cpt_array[$x]['flag_img'] = $returned_array['flag_img'];
       $cpt_array[$x]['flag_url'] = $returned_array['flag_url'];



        //my_print_r($cpt_array);
        $x++;

        
    }
    return $cpt_array;
}








function cpt_posts($cpt_slug,$cpt_cat_id,$cpt_perpage,$cpt_offset,$cpt_orderby,$cpt_order,$cpt_tax,$cpt_term) {

    if ($cpt_tax != 'null') {
        $args = array(
            'post_type'         => $cpt_slug,
            'posts_per_page'    => $cpt_perpage,
            'offset'            => $cpt_offset,
            'orderby'           => $cpt_orderby,
            'order'             => $cpt_order,
            'cat'               => $cpt_cat_id,
            'post__not_in'      => array( get_the_ID() ),
            'tax_query' => array(
                array (
                    'taxonomy' => $cpt_tax,
                    'field' => 'slug',
                    'terms' => $cpt_term,
                )
            ),
        );
    }
    
    else { 
        $args = array(
            'post_type'         => $cpt_slug,
            'posts_per_page'    => $cpt_perpage,
            'offset'            => $cpt_offset,
            'orderby'           => $cpt_orderby,
            'order'             => $cpt_order,
            'cat'               => $cpt_cat_id,
            'post__not_in'      => array( get_the_ID() ),
        );


    }

    //my_print_r($args);

    //$cpt_array = run_the_query($args);

    $cpt_query = new WP_Query( $args );

    $x=0;
    if ( $cpt_query->have_posts() ) {
        while ( $cpt_query->have_posts() ) {
            $cpt_query->the_post(); 
            
            //my_print_r($cpt_query);

            $cpt_array[$x]['id']        = get_the_id();
            $cpt_array[$x]['title']     = get_the_title();
            $cpt_array[$x]['post_name'] = get_post_field( 'post_name', get_post() );
            $cpt_array[$x]['excerpt']   = get_the_excerpt();
            $cpt_array[$x]['content']   = get_the_content();
            $cpt_array[$x]['permalink'] = get_the_permalink();

            $cpt_array[$x]['ext_url']   = get_field('external_url', $post->ID);
            if ($cpt_array[$x]['ext_url']) {
                $cpt_array[$x]['permalink'] = $cpt_array[$x]['ext_url'];
            }

            // Get Featured image data
            $cpt_array[$x]['featured']      = featured_img_setup($post->ID);

            // Get square image data
            $cpt_array[$x]['square_img']    = img_array_data($post->ID);

            // Get slider image data
            $cpt_array[$x]['slider_img']    = img_array_data($post->ID);
            
            // Get podcasts mp3 url
            $cpt_array[$x]['postcast_urls'] = get_podcast_data($post->ID);

            // Get YouTube ID
            $cpt_array[$x]['yt_id']         = get_yt_data($post->ID);

            // get video type (Taxonomy)
            $cpt_array[$x]['video_type']    = get_video_type_slug($post->ID);

            // get Gallery images
            $cpt_array[$x]['gallery_imgs']  = gallery_img_array($post->ID);

            // get Gallery images zip file
            $cpt_array[$x]['gallery_zip']  = gallery_img_zip($post->ID);

            // get Event date
            $cpt_array[$x]['event_date'] = event_date($post->ID);

            // Get post category
            //$cpt_array[$x]['cat_name']      = get_post_category($post->ID);

            // Get P2P category
            //$cpt_array[$x]['p2p_cat_name']   = get_p2p_category($post->ID);

            // Get P2P Tags
            $cpt_array[$x]['p2p_tags']       = get_p2p_tags($post->ID); 

            // Get P2P Country
            $returned_array = get_p2p_country($post->ID);
            $cpt_array[$x]['flag_img'] = $returned_array['flag_img'];
            $cpt_array[$x]['flag_url'] = $returned_array['flag_url'];
            
            $x++;
        }
    }


    //my_print_r($cpt_array);
    return $cpt_array;
}





function cpt_posts_tax($cpt_slug,$cpt_cat_id,$cpt_perpage,$cpt_offset,$cpt_orderby,$cpt_order,$cpt_tax_1,$cpt_term_1,$cpt_tax_2,$cpt_term_2) {

    $args = array(
        'post_type'         => $cpt_slug,
        'posts_per_page'    => $cpt_perpage,
        'offset'            => $cpt_offset,
        'orderby'           => $cpt_orderby,
        'order'             => $cpt_order,
        'cat'               => $cpt_cat_id,
        'post__not_in'      => array( get_the_ID() ),
        'tax_query' => array(
            array (
                'taxonomy' => $cpt_tax_1,
                'field' => 'slug',
                'terms' => $cpt_term_1,
            ),
            array (
                'taxonomy' => $cpt_tax_2,
                'field' => 'slug',
                'terms' => $cpt_term_2,
            )
        ),
    );
    
    //my_print_r($args);

    $cpt_query = new WP_Query( $args );

    $x=0;
    if ( $cpt_query->have_posts() ) {
        while ( $cpt_query->have_posts() ) {
            $cpt_query->the_post(); 
            
            //my_print_r($cpt_query);

            $cpt_array[$x]['id']        = get_the_id();
            $cpt_array[$x]['title']     = get_the_title();
            $cpt_array[$x]['post_name'] = get_post_field( 'post_name', get_post() );
            $cpt_array[$x]['excerpt']   = get_the_excerpt();
            $cpt_array[$x]['content']   = get_the_content();
            $cpt_array[$x]['permalink'] = get_the_permalink();

            $cpt_array[$x]['ext_url']   = get_field('external_url', $post->ID);
            if ($cpt_array[$x]['ext_url']) {
                $cpt_array[$x]['permalink'] = $cpt_array[$x]['ext_url'];
            }

            // Get Featured image data
            $cpt_array[$x]['featured']      = featured_img_setup($post->ID);
            

            // Get square image data
            $cpt_array[$x]['square_img']    = img_array_data($post->ID);

            // Get slider image data
            $cpt_array[$x]['slider_img']    = img_array_data($post->ID);

            // Get podcasts mp3 url
            $cpt_array[$x]['postcast_urls'] = get_podcast_data($post->ID);

            // Get YouTube ID
            $cpt_array[$x]['yt_id']         = get_yt_data($post->ID);

            // get video type (Taxonomy)
            $cpt_array[$x]['video_type']    = get_video_type_slug($post->ID);

            // Get post category
            //$cpt_array[$x]['cat_name']      = get_post_category($post->ID);

            // Get P2P category
            //$cpt_array[$x]['p2p_cat_name']   = get_p2p_category($post->ID);

            // Get P2P Tags
            $cpt_array[$x]['p2p_tags']       = get_p2p_tags($post->ID);

            // Get P2P Country
            $returned_array = get_p2p_country($post->ID);
            $cpt_array[$x]['flag_img'] = $returned_array['flag_img'];
            $cpt_array[$x]['flag_url'] = $returned_array['flag_url'];
            
            $x++;
        }
    }

    //my_print_r($cpt_array);
    return $cpt_array;
}






function display_post_articles($article_array,$count_start,$count_end,$var__site_id) { 

    for ($x = $count_start; $x <= $count_end; $x++) { ?>

        <div class="col-12 col-md-4 position-relative">

            <a href="<?php echo $article_array[$x]['permalink']; ?>" <?php if ($article_array[$x]['ext_url']) { echo 'target="_blank"';} ?> > 
                
                <div class="title-block">
                    <div class="article-title">
                        <h6>
                        <?php /* <span class="text-color-green"><?php echo $article_array[$x]['p2p_cat_name']; ?> / </span> */ ?>
                        <?php echo $article_array[$x]['title']; ?>
                        </h6>
                    </div>
                </div>

                <div class="article-excerpt">
                    <p><?php echo wp_trim_words( $article_array[$x]['excerpt'], 12 ); ?></p>
                </div>
            </a>

            <div class="row pt-3">

                <div class="col-12">
                    <hr/>
                </div>

                <div class="col-12 col-md-8 post-footer">

                    <?php if ($var__site_id !== 4) { // If NOT P2P Omidria ?>
                    
                        <?php $r = rand(); ?>

                        <div id="share-<?php echo $x; ?>">
                            <script>
                            jQuery(function() {
                                $("#share-<?php echo json_encode($x); ?>").jsSocials({
                                    shareIn: "popup",
                                    showLabel: false,
                                    showCount: false,
                                    url: '<?php echo $article_array[$x]['permalink'] ?>',
                                    shares: ["linkedin", "twitter", "email", "whatsapp"]
                                });

                                $("#share-<?php echo json_encode($r); ?>").jsSocials("refresh");
                            });
                            </script>
                        </div>

                    <?php } ?>
                </div>

                <div class="col-12 col-md-4">

                    <div class="row justify-content-end">
                        <div class="col-auto ps-0 text-end">
                            
                            <?php /*
                            <a href="<?php echo $article_array[$x]['flag_url']; ?>">
                                <img src="<?php echo $article_array[$x]['flag_img']; ?>" width="40" height="27">
                            </a>
                            */ ?>
                            <?php
                            for ($a = 0; $a <= 10; $a++) { ?>
                                <a class="p2p-tag" href="<?php echo $article_array[$x]['p2p_tags'][$a]['tag_url'];?>">  <?php echo ' '.$article_array[$x]['p2p_tags'][$a]['tag_name']; ?></a>
                            <?php
                            } ?>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    <?php 
    } 
}



function display_teaser_podcast($podcasts_url_spotify,$podcasts_url_apple,$podcasts_url_google,$podcasts_url_ytm) { 
    
    $themeurl = get_template_directory_uri();
    ?>

    <div class="podcast-link-pos">

        <div class="row justify-content-center">

            <div class="col-10 col-md-11 col-xl-10">

                <div class="row links-pos">

                    <?php if ($podcasts_url_spotify) { ?>
                        <div class="col-6 col-sm-3 col-md-3 px-2 py-2 py-md-0">
                            <a href="<?= $podcasts_url_spotify ?>" class="podcast-btn" target="_blank">
                                <img src="<?= $themeurl; ?>/img/listen-on-spotify.webp">
                            </a>
                        </div>
                    <?php } ?>

                    <?php if ($podcasts_url_apple) { ?>
                        <div class="col-6 col-sm-3 col-md-3 px-2 py-2 py-md-0">
                            <a href="<?= $podcasts_url_apple; ?>" class="podcast-btn" target="_blank">
                                <img src="<?= $themeurl; ?>/img/listen-on-apple-podcasts.webp">
                            </a>
                        </div>
                    <?php } ?>

                    <?php if ($podcasts_url_google) { ?>
                        <div class="col-6 col-sm-3 col-md-3 px-2 py-2 py-md-0">
                            <a href="<?= $podcasts_url_google; ?>" class="podcast-btn" target="_blank">
                                <img src="<?= $themeurl; ?>/img/listen-on-google-podcasts.webp">
                            </a>
                        </div>
                    <?php } ?>

                    <?php if ($podcasts_url_ytm) { ?>
                        <div class="col-6 col-sm-3 col-md-3 ps-2 py-2 py-md-0">
                            <a href="<?= $podcasts_url_ytm; ?>" class="podcast-btn" target="_blank">
                                <img src="<?= $themeurl; ?>/img/listen-on-youtube.webp">
                            </a>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
<?php
}
?>