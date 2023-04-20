<?php
/**
	* Template Name: Page - Home
*/


	$pageid 	    = get_the_ID();
    //$var__site_id   = get_current_blog_id();
    //$blog_id        = 1;
	$siteurl 	    = site_url();
	$themeurl       = get_template_directory_uri();
    // $network_url    = network_home_url();
    //$network_url    = 'https://web-dev.rayner.com/hub/';

    $f__front_page_animated_graphic_outer_level          = get_field('f__front_page_animated_graphic_outer_level');
    $f__front_page_animated_graphic_inner_level_one      = get_field('f__front_page_animated_graphic_inner_level_one');
    $f__front_page_animated_graphic_inner_level_two      = get_field('f__front_page_animated_graphic_inner_level_two');
    
    $f__front_page_animated_graphic_centre_image         = get_field('f__front_page_animated_graphic_centre_image'); 
    $f__front_page_animated_graphic_centre_image_white   = get_field('f__front_page_animated_graphic_centre_image_white');
    
?>

<?php get_header(); ?>



<section id="front-page">
        
        <div class="front-page-group">

            <div class="front-page-site-logo">

                <div class="front-page-site-logo__outer-img">
                    <img 
                    src="<?= $f__front_page_animated_graphic_outer_level['url']; ?>"
                    width="100%" 
                    height="auto"
                    alt="<?= $outer_img['alt']; ?>"
                    title="<?= $outer_img['title']; ?>" 
                    longdesc="<?= $outer_img['description']; ?>"
                    >

                </div>

                <div class="front-page-site-logo__inner-level-img-one">
                    <img 
                    src="<?= $f__front_page_animated_graphic_inner_level_one['url']; ?>"
                    width="100%" 
                    height="auto"
                    alt="<?= $inner_img['alt']; ?>"
                    title="<?= $$inner_img['title']; ?>" 
                    longdesc="<?= $inner_img['description']; ?>"
                    >
                </div>              

                <div class="front-page-site-logo__inner-level-img-two">
                    <img 
                    src="<?= $f__front_page_animated_graphic_inner_level_two['url']; ?>"
                    width="100%" 
                    height="auto"
                    alt="<?= $inner_img['alt']; ?>"
                    title="<?= $$inner_img['title']; ?>" 
                    longdesc="<?= $inner_img['description']; ?>"
                    >
                </div>                              
                
                <div class="front-page-site-logo__centre-img--brown">
                    
                    <img 
                    src="<?= $f__front_page_animated_graphic_centre_image['url']; ?>"
                    width="100%" 
                    height="auto"
                    alt="<?= $centre_img['alt']; ?>"
                    title="<?= $centre_img['title']; ?>" 
                    longdesc="<?= $centre_img['description']; ?>"
                    >
                </div>

                <div class="front-page-site-logo__centre-img--white">
                    <img 
                    src="<?= $f__front_page_animated_graphic_centre_image_white['url']; ?>"
                    width="100%" 
                    height="auto"
                    alt="<?= $centre_img['alt']; ?>"
                    title="<?= $centre_img['title']; ?>" 
                    longdesc="<?= $centre_img['description']; ?>"
                    >
                </div>                            
                
            </div>
        </div>
        
</section>


<?php get_footer(); ?>