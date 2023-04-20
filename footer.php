<?php
    $pageid 	= get_the_ID();
    $siteurl 	= site_url();
    $themeurl   = get_template_directory_uri();


    //my_print_r($footer_text);
?>


<footer>

    <div class="footer-logo__pos">

        <a href="<?php echo $siteurl; ?>">
            <?php
            $site_logo = get_field('site_logo','option')['c__single_image'];
            
            $loading        = 'lazy';
            $img_mobile     = 'mobile_logo';
            ?>
            
            <div class="d-block d-xl-none">
                <?php
                img_display(
                    $loading,
                    $img_mobile,
                    $site_logo
                );
                ?>
            </div>

        </a>
    </div>

    <div class="copyright">
        <p>Copyright &copy; <?= date("Y"); ?> Holborn</p>
    </div>

</footer>

<?php wp_footer();?>

</body>

</html>