<?php

function instagram() { 
    $instagram_url = get_sub_field('sm_url');
    if ($instagram_url) { ?>
        <li>
        <a class="instagram" href="<?php echo $instagram_url; ?>" target="_blank">
            <i class="fa fa-instagram icon-bg"></i>
            <span class="sr-only">Instagram</span>
        </a>
        </li>
    <?php 
    } 
}

function facebook() {
    $facebook_url = get_sub_field('sm_url');
    if ($facebook_url) { ?>
        <li>
        <a class="facebook" href="<?php echo $facebook_url; ?>" target="_blank">
            <i class="fa fa-facebook-f icon-bg"></i>
            <span class="sr-only">Facebook</span>
        </a>
        </li>
    <?php 
    } 
}

function twitter() { 
    $twitter_url = get_sub_field('sm_url');
    if ($twitter_url) { ?>
        <li>
        <a class="twitter" href="<?php echo $twitter_url; ?>" target="_blank">
            <i class="fa fa-twitter icon-bg"></i>
            <span class="sr-only">Twitter</span>
        </a>
        </li>
    <?php 
    } 
}

function linkedin() { 
    $linkedin_url = get_sub_field('sm_url');
    if ($linkedin_url) { ?>
        <li>
        <a class="linkedin" href="<?php echo $linkedin_url; ?>" target="_blank">
            <i class="fa fa-linkedin icon-bg"></i>
            <span class="sr-only">Linked In</span>
        </a>
        </li>
    <?php 
    } 
}




function youtube() { 
    $youtube_url = get_sub_field('sm_url');
    if ($youtube_url) { ?>
        <li>
        <a class="youtube" href="<?php echo $youtube_url; ?>" target="_blank">
            <i class="fa fa-youtube icon-bg"></i>
            <span class="sr-only">Youtube</span>
        </a>
        </li>
    <?php 
    } 
}

function vimeo() {
    $vimeo_url = get_sub_field('sm_url');
    if ($vimeo_url) { ?>
        <li>
        <a class="instagram" href="<?php echo $vimeo_url; ?>" target="_blank">
            <i class="fa fa-vimeo icon-bg"></i>
            <span class="sr-only">Vimeo</span>
        </a>
        </li>
    <?php 
    } 
}



?>