<?php   
    $pageid 	= 451; // News / Blog
    $siteurl 	= site_url();
?>

<?php get_header(); ?>

<?php include('inc/page-hero-image.php'); ?>

<section id="single">

	<?php /*
	<a href="<?php echo site_url(); ?>/blog/" class="back-to"><i class="fa fa-chevron-left" aria-hidden="true"></i>back to blog list</a>
	*/ ?>

    <div class="container">

        <div class="row">

            <div class="col-12 col-md-8">

                <?php
                if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content single-body">
                            <h1><?php the_title(); ?></h1>
                            <p class="post-date"><?php echo get_the_date('l, j F Y'); ?></p>
                            <?php the_content(); ?>
                        </div>
                    </article> 
                <?php endwhile; ?>

            </div>

            <div class="col-12 col-md-4">
                
                <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" id="search-blog" class="search-field" placeholder="Search ..." value="" name="s" title="" />
                    <?php /* <input type="submit" class="submit" name="submit" id="searchsubmit" value="search" /> */ ?>
                </form>

                <ul class="cat-list">
                    <?php
                    $categories = get_categories( array(
                        //'orderby' => 'name',
                        //'order'   => 'DSC'
                        'parent' => 0
                    ) ); ?>

                    <li><a href="<?php echo $siteurl;?>/news/">All categories</a></li>
                    
                    <?php

                    foreach( $categories as $category ) { ?>
                        <li><a href="<?php echo get_category_link( $category->term_id ); ?>" class=""><?php echo $category->name; ?></a></li>
                    <?php
                    } ?>
                </ul>
                
                <h2 class="latest-news">Latest News</h2>
                <?php //the_field('juicer_code_snippet', $pageid); ?>

                <script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
                <link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
                <ul class="juicer-feed" data-feed-id="lubricant-expo" data-per="2"><h1 class="referral"><a href="https://www.juicer.io">Powered by Juicer.io</a></h1></ul>
            
            </div>


        </div>
    </div>

</section>

<?php get_footer(); ?>