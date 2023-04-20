<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php /* <title ><?php wp_title( '|', true, 'right' ); ?></title> */ ?>
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" CONTENT="noindex,nofollow">
    <!-- <meta name="google-site-verification" content="2RcmV1vaKn2wEBQNAB5aLNYZa9waova_pfw3RdvtkVg" /> -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />


    <?php
        //$pageid 	    = get_the_ID();
        $blog_id        = get_current_blog_id();
        $homeurl        = home_url();
		$siteurl 	    = site_url();
		$themeurl  	    = get_template_directory_uri();

        $bg_colour      = get_field('page_colours')['block__page_colours'];

        $show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
	?>

    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?> style="background-color: <?= $bg_colour; ?>">

    <header id="header" class="template-header">




                    <div class="template-header-site-logo">
                        
                        <?php if ( has_custom_logo() && $show_title ) : ?>
	                    
                            <?php the_custom_logo(); ?>
                        
                        <?php endif; ?>

                    </div>
                </div>

                <div class="template-header-primary-nav">

                    <div class="template-partial-header__navigation-primary-toggle-control">

                        <div class="template-partial-header__navigation-primary-toggle-control-group">

                            <div id="burger" class="burger burger-squeeze">

                                <div class="burger-lines"></div>

                            </div>

                        </div>

                    </div>   

                    <?php

                        $menu_type = "primary";
                        
                        $arg = array(
                            'menu'              => $menu_type,
                            'theme_location'    => $menu_type,
                            'depth'             => 3,
                            'container'         => 'div',
                            'container_class'   => 'template-header-primary-nav-list',
                            'container_id'      => 'holborn-nav',
                            'menu_class'        => 'navbar-nav',
                            //'items_wrap'      	=> $menu_wrap,
                            // 'fallback_cb'       => 'bootstrap_5_wp_nav_menu_walker::fallback',
                            // 'walker'            => new bootstrap_5_wp_nav_menu_walker()
                        ); 
                        
                        wp_nav_menu( $arg ); 
                    ?>
                </div>


            </div>
        </div>
    </header>