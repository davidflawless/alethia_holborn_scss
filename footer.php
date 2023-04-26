<?php
    $pageid 	= get_the_ID();
    $siteurl 	= site_url();
    $themeurl   = get_template_directory_uri();


    //my_print_r($footer_text);
?>


<footer class="template-footer">


        

            <div class="template-footer-site-logo-group">
                        
                <?php if ( has_custom_logo()) : ?>
        
                    <a  class="template-footer-site-logo-link" href="<?php echo $siteurl; ?>">
                        <?php the_custom_logo(); ?>
                    </a>
                
                <?php endif; ?>

            </div>

        

        <p class="abstract-typography-footer-copyright">Copyright &copy; <?= date("Y"); ?> Holborn</p>

</footer>

<?php wp_footer();?>

</body>

</html>