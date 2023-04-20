<?php get_header(); ?>


<section id="search-results" class="container-xxl">
    
    <div class="row">

        <div class="col-12 py-5">
            <h1>Search results: "<?php echo esc_html( get_search_query() ); ?>"</h1>
        </div>

        <div class="col-12 search-results">

                <?php
                    $s=get_search_query();
                    $args = array (
                        's' => $s,
                        //'post_type'         => 'post',
                        'posts_per_page'    => 200,
                        'orderby'           => 'date',
                        'order'             => 'DSC',
                    );
                    // The Query
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) {
                        $x=0;
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); 
                            
                            $p2p_cat[$x]        = get_p2p_category($the_query->posts[$x]->ID);
                            $youtube_url[$x]    = get_yt_data($the_query->posts[$x]->ID);
                            //$flag_data[$x]      = get_p2p_country($the_query->posts[$x]->ID);
                            $tag_data[$x]       = get_p2p_tags($the_query->posts[$x]->ID);
                            
                            ?>
                            
                            <div class="row">

                                <div class="col-12 col-md-4 col-lg-3 pe-md-4">

                                    <?php
                                    $video_type[$x] = get_video_type_slug($the_query->posts[$x]->ID);

                                    if ( has_post_thumbnail() ) {
                                    
                                        $thumb      = array();
                                        $thumb_id   = get_post_thumbnail_id($the_query->posts[$x]->ID);
                                        $featured   = featured_data($thumb, $thumb_id);

                                        //my_print_r($featured);
                                        ?>

                                        <?php if ($the_query->posts[$x]->post_type == 'p2p_articles') { ?>
                                            <a href="<?php echo $cpt_array[$x]['permalink']; ?> ">
                                        <?php } ?>

                                        <?php if ($the_query->posts[$x]->post_type == 'p2p_video') { ?>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#video-modal-<?php echo $x; ?>">
                                        <?php } ?>

                                        <?php if ($the_query->posts[$x]->post_type == 'p2p_podcast') { ?>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#podcast-modal-<?php echo $x; ?>">
                                        <?php } ?>

                                            <div class="d-block d-md-none">
                                                <?php
                                                $loading        = 'lazy';
                                                $img_d_xxl      = 'img_390';
                                                $img_d_xl       = 'img_390';
                                                $img_tablet     = 'large';
                                                $img_mobile     = 'img_390';
                                                
                                                img_featured_mobile(
                                                    $loading,
                                                    $img_mobile,
                                                    $featured 
                                                );
                                                ?>
                                            </div>
                                        
                                        
                                            <div class="d-none d-md-block">
                                                <?php
                                                $loading        = 'lazy';
                                                $img_d_xxl      = 'img_294';
                                                $img_d_xl       = 'img_294';
                                                $img_tablet     = 'large';
                                                $img_mobile     = 'img_390';
                                                
                                                img_featured(
                                                    $loading,
                                                    $img_d_xxl,
                                                    $img_d_xl,
                                                    $img_tablet,
                                                    $img_mobile,
                                                    
                                                    $featured
                                                );
                                                ?>
                                            </div>
                                        </a>


                                        <!-- Social Share & Flag -->

                                        <div class="row py-3">

                                            <div class="col-8">
                                                
                                                <?php 
                                                $r = rand(); 
                                                
                                                if ($the_query->posts[$x]->post_type == 'p2p_articles') {
                                                    $share_url[$x] = $cpt_array[$x]['permalink'];
                                                }
                                                
                                                if ($the_query->posts[$x]->post_type == 'p2p_video') {

                                                    //$share_yt__url[$x]  = get_yt_data($the_query->posts[$x]->ID); 
                                                    $share_url[$x]      = 'https://www.youtube.com/watch?v='.$youtube_url[$x].'';
                                                }

                                                if ($the_query->posts[$x]->post_type == 'p2p_podcast') {
                                                    $share_url[$x] = 'Podcast to go here...';
                                                }
                                                ?>

                                                <div id="share-<?php echo $r; ?>">
                                                    <script>
                                                    jQuery(function() {
                                                        $("#share-<?php echo json_encode($r); ?>").jsSocials({
                                                            shareIn: "popup",
                                                            showLabel: false,
                                                            showCount: false,
                                                            url: '<?php echo $share_url[$x]; ?>',
                                                            shares: ["linkedin", "twitter", "email", "whatsapp"]
                                                        });
                                                    });
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="col-4">

                                                <div class="row justify-content-end">
                                                    <div class="col-auto ps-0 text-end">
                                                        <?php /*
                                                        <a href="<?php echo $flag_data[$x]['flag_url']; ?>">
                                                            <img src="<?php echo $flag_data[$x]['flag_img']; ?>" width="40" height="27">
                                                        </a>
                                                        */ ?>

                                                        <?php
                                                        for ($a = 0; $a <= 10; $a++) { ?>
                                                            <a class="p2p-tag" href="<?php echo $tag_data[$x][$a]['tag_url'];?>">  <?php echo ' '.$tag_data[$x][$a]['tag_name']; ?></a>
                                                        <?php
                                                        } ?>
                                                    </div>
                                                </div>            
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </div>

                                <!-- Right side content -->

                                <div class="col-12 col-md-8 col-lg-9 position-relative ps-md-4 border-left">

                                    <div class="title-block">
                                        <div class="interview-title">
                                            <h6>
                                            <span class="text-color-green"><?php echo $p2p_cat[$x]; ?> / </span>    
                                                
                                            <?php the_title(); ?></h6>
                                        </div>
                                    </div>


                                    <div class="pt-3">
                                        <p><?php echo get_the_date('l, j F Y'); ?></p>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>



                                    <?php if ($the_query->posts[$x]->post_type == 'p2p_articles') { ?>
                                        <div class="permalink-btn">
                                            <?php
                                            $external_url = get_field('external_url');
                                            if ($external_url) { ?>
                                                <a href="<?php echo $external_url; ?>" class="btn" target="_blank">Read more</a>
                                            <?php
                                            } else { ?>
                                                <a href="<?php the_permalink(); ?>" class="btn">Read more</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ($the_query->posts[$x]->post_type == 'p2p_video') { ?>

                                        <div class="modal-btn">
                                            <a class="btn" data-bs-toggle="modal" data-bs-target="#video-modal-<?php echo $x; ?>">
                                                <?php if ($video_type[$x] == 'interview') { 
                                                    echo 'Watch the Interview';
                                                } elseif ($video_type[$x] == 'webinar') {
                                                    echo 'Watch the Webinar';
                                                } ?>
                                            </a>
                                        </div>

                                    <?php } ?>


                                    <?php if ($the_query->posts[$x]->post_type == 'p2p_podcast') { ?>
                                        <div class="modal-btn">
                                            <a class="btn" data-bs-toggle="modal" data-bs-target="#podcast-modal-<?php echo $x; ?>">Listen to the Podcast</a>
                                        </div>
                                    <?php } ?>

                                </div>


                                <div class="col-12 py-4">
                                    <hr/>
                                </div>

                            </div>

                            <!-- Modals -->

                            <?php if ($the_query->posts[$x]->post_type == 'p2p_video') { ?>

                                <div class="modal video-modal" id="video-modal-<?php echo $x; ?>">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">

                                                <div class="interview-title pt-3">
                                                    <h3><?php the_title(); ?></h3>
                                                </div>

                                                <div class="interview-player pb-4">
                                                    <div class="video-container">
                                                        <iframe loading="lazy" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_url[$x]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }?>


                            <?php if ($the_query->posts[$x]->post_type == 'p2p_podcast') { ?>

                                <div class="modal podcast-modal" id="podcast-modal-<?php echo $x; ?>">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">

                                                <div class="featured-img">
                                                    <?php
                                                    $loading        = 'lazy';
                                                    $img_d_xxl      = 'large';
                                                    $img_d_xl       = 'large';
                                                    $img_tablet     = 'large';
                                                    $img_mobile     = 'large';
                                                    
                                                    img_featured(
                                                        $loading,
                                                        $img_d_xxl,
                                                        $img_d_xl,
                                                        $img_tablet,
                                                        $img_mobile,
                                                        $featured
                                                    );
                                                    ?>
                                                </div>

                                                <div class="interview-title pt-3">
                                                    <h3><?php the_title(); ?></h3>
                                                </div>

                                                <div class="podcast-player pb-4">

                                                    <?php $podcast_url[$x] = get_mp3_data($the_query->posts[$x]->ID); ?>

                                                    <audio controls>
                                                        <source src="<?php echo $podcast_url[$x]; ?>" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }

                        $x++;
                        }
                    
                    } else { ?>   
                        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p> 
                    <?php 
                    } 
                ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>