<?php
/**
	* Template Name: Page - Availability
*/
?>


<?php
    $side_logo      = get_field('side_logo');

    //my_print_r($side_logo);

    $loading        = 'eager';
    $img_desktop    = 'large';
    $img_tablet     = 'medium';
    $img_mobile     = 'medium';

    $image_right_url        = get_field('image_right')['url'];
    $image_right_overlay    = get_field('image_right_overlay');
?>


<?php get_header(); ?> 



<div id="page-availability" class="container-fluid">

    <div class="row">

        <div class="col-12 col-lg-8 col-xl-5 col-xxl-5 px-lg-5">

            <div class="contact-details__pos">

                <?php
                if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php the_content(); ?>			
                        </div>     
                    </article> <?php
                endwhile; 
                ?>        
            </div>
        </div>


        <div class="col-12 offset-xl-3 col-xl-4 img-right" style="background-image: url(<?= $image_right_url; ?>)">

            <div class="img-right__overlay-pos">
                
                <div class="d-block d-lg-none">
                    <?php
                    img_display(
                        $loading,
                        $img_mobile,
                        $image_right_overlay
                    );
                    ?>
                </div>

                <div class="d-none d-lg-block d-xl-none">
                    <?php
                    img_display(
                        $loading,
                        $img_tablet,
                        $image_right_overlay
                    );
                    ?>
                </div>

                <div class="d-none d-xl-block">
                    <?php
                    img_display(
                        $loading,
                        $img_desktop,
                        $image_right_overlay
                    );
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>