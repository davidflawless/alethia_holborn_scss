<?php
	$pageid 	= 1022; // News / Blog
	//$pageid 	= get_the_ID();
	$siteurl 	= site_url();
    $themeurl  = get_template_directory_uri();

    // $size_m         = 'img-m-384';
    // $size_p         = 'img-p-341';
    // $size_l         = 'img-l-461';
    // $size_d         = 'img-d-550';
    $loading        = 'lazy';

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var('paged') : 1;					
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 8,
		//'offset' => 1,
		'paged' => $paged,
	);
	
	// The Query
	$query = new WP_Query( $args );
	$x=0;
	
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
            $post_title[$x] 	= get_the_title();
			$post_excerpt[$x] 	= get_the_excerpt();
			$post_permalink[$x] = get_the_permalink();
			$post_date[$x] 		= get_the_date('l, j F Y');
			$post_author[$x] 	= get_the_author();

			if ( has_post_thumbnail() ) {
                $thumb_url[$x] = get_the_post_thumbnail( $post_id, 'img-d-450' ); 
                //my_print_r($thumb_url[$x]);
            }
			$featured_alt[$x] = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			$post_background_colour[$x] = get_field('hero_background_colour');

			$total_posts = $x;
			$x++;
		}
	}
?>

<?php get_header(); ?>

<?php include('inc/page-hero-image.php'); ?>

<section id="blog">

    <div class="container">

        <div class="row">

            <div class="col-12 col-md-8">

                <div class="row">
                    <?php
                    //if ($total_posts) {
                    if ( $query->have_posts() ) {
                        for ($x = 0; $x <= $total_posts; $x++) { ?>
                            <div class="col-12 col-lg-6">
                                <div class="news-img">
                                    <a href="<?php echo $post_permalink[$x]; ?>"><?php echo $thumb_url[$x]; ?></a>
                                </div>
                                <h2><a href="<?php echo $post_permalink[$x]; ?>"><?php echo $post_title[$x]; ?></a></h2>
                                <p class="post-date"><?php echo $post_date[$x]; ?></p>
                                <div class="the_excerpt">
                                    <?php echo $post_excerpt[$x]; ?>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        echo '<h3 class="warning">Sorry but there are no posts at this time!</h3>';
                    }
                    ?>
                </div>
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

            <div class="col-12">
                <div class="pag-pos">
                    <div id="pagination">
                        <?php pagination_bar($query); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>