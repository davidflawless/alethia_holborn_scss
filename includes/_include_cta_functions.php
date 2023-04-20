<?php
function cta_standard_data($cta) {

if( $cta ): 
    $cta_array['url']     = $cta['url'];
    $cta_array['title']   = $cta['title'];
    $cta_array['target']  = $cta['target'] ? $cta['target'] : '_self';
endif;

return $cta_array;
}





function cta($cta,$r) {

//my_print_r($cta);
$themeurl  	    = get_template_directory_uri();
$show_cat       = $cta['show_cta'];
$btn_colour     = $cta['cta_button_colour'];
$btn_txt_colour = $cta['cta_button_text_colour'];

if ($show_cat) :

    $cta_option             = $cta['cta_options'];
    $show_video_modal[$r]   = false;
    $show_reveal[$r]        = false;

    //my_print_r($show_video_modal[$r]);

    switch ($cta_option) {
        case "standard":
            
            $cta_standard = $cta['cta_standard'];
            
            if( $cta_standard ): 
                $cta_array[$r]['url']     = $cta_standard['url'];
                $cta_array[$r]['title']   = $cta_standard['title'];
                $cta_array[$r]['target']  = $cta_standard['target'] ? $cta_standard['target'] : '_self';
            endif; ?>

<a class="animated-link" href="<?php echo $cta_array[$r]['url']; ?>" target="<?php echo $cta_array[$r]['target']; ?>">

    <?php
            break;



        case "modal_video":
            
            $cta_array[$r]['title'] = $cta['cta_text'];
            $cta_modal_video        = $cta['cta_modal_video'];    
            
            if ($cta_modal_video) {
                $cta_array[$r]['youtube_id'] = $cta_modal_video['youtube_id'];
                $show_video_modal[$r]   = true;
            } ?>

    <a class="animated-link" href="#" data-bs-toggle="modal" data-bs-target="#cta_video_modal-<?php echo $r; ?>">

        <?php
            break;


        case "reveal_text":
            
            $cta_array[$r]['title'] = $cta['cta_text'];
            $cta_reveal_text        = $cta['cta_reveal_text'];
            
            if ($cta_reveal_text) {
                $cta_array[$r]['reveal_text'] = $cta_reveal_text['reveal_text'];
                $show_reveal[$r] = true;
            }
            ?>

        <a class="reveal-btn" href="#" data-bs-toggle="collapse" data-bs-target="#reveal-<?php echo $r; ?>">

            <?php
            break;

    }
    ?>

            <div class="row">

                <div class="col-auto">
                    <p class="text-color-<?php echo $btn_txt_colour; ?>"><?php echo $cta_array[$r]['title']; ?></p>
                </div>

                <div class="col-auto px-md-1">

                    <img loading="eager" class="btn-arrow"
                        src="<?php echo $themeurl; ?>/img/arrow-<?php echo $btn_colour; ?>.svg"
                        title="<?php echo $cta_array[$r]['title']; ?>" alt="<?php echo $cta_array[$r]['title']; ?>"
                        longdesc="<?php echo $cta_array[$r]['title']; ?>" width="32" height="32">
                </div>
            </div>
        </a>


        <?php if ( $show_video_modal[$r] && $cta_array[$r]['youtube_id'] ) { ?>


        <div class="modal fade video-modal" id="cta_video_modal-<?php echo $r; ?>">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="video-container">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/<?php echo $cta_array[$r]['youtube_id'];?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <?php } ?>


        <?php if ( $show_reveal[$r] && $cta_array[$r]['reveal_text'] ) { ?>

        <div id="reveal-<?php echo $r; ?>" class="collapse revealed-text">
            <div class="row pt-3">
                <div class="col-auto">
                    <?php echo $cta_array[$r]['reveal_text']; ?>
                </div>
            </div>
        </div>

        <?php } ?>

        <?php
endif;
}
?>