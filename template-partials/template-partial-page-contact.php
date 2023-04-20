<?php
/**
	* Template Partial : Page - Vision
*/
?>

<?php

// :: Knight Frank

$knight_frank_contact_block__contact_details    = get_field('contact_block')['knight_frank']['contact_block__contact_details'];

// my_print_r($knight_frank_contact_block__contact_details);

$knight_frank_contact_block__logo               = get_field('contact_block')['knight_frank']['contact_block__logo'];

// :: Bluebook

$bluebook_contact_block__contact_details                     = get_field('contact_block')['bluebook']['contact_block__contact_details'];

$bluebook_contact_block__logo                                = get_field('contact_block')['bluebook']['contact_block__logo'];

// :: Spinner filler

$image_right_url                                = get_field('image_right')['url'];

$image_right_overlay                            = get_field('image_right_overlay')['url'];


// :: inline styles for background
$var__image_right_url__style    = '';

$var__image_right_url__body     = '';

if ($image_right_url) { 
    
    $image_right_url = 'background-image: url(' . $image_right_url . ');';

    $var__image_right_url__body .= $image_right_url; 

} 

$var__image_right_url__style    .= 'style="' . $var__image_right_url__body . '"';

// :: Layout helper
$lh__layout_name = 'template-partial-page-contact';
    
?>




<div class="<?= $lh__layout_name ?>">

    <div class="scaffolding-container">
    
        <div class="scaffolding-row">

            <div class="<?= $lh__layout_name ?>-group">

                <div class="<?= $lh__layout_name ?>-content">
                
                    <div class="abstract-typography-wysiwyg-editor-standard--white">
                        
                        <?= the_content(); ?>

                   </div>
                   
                </div>

                <?php
                // Star includes here

                
                ?>
                <?php
                // --------------
                // Spinner filler
                // --------------
                ?>
                <div class="template-partial-page-spinner-filler">
                    
                    <div class="template-partial-page-spinner-filler-grid">

                        <div class="template-partial-page-spinner-filler-grid-item"></div>

                        <div class="template-partial-page-spinner-filler-grid-item" <?= $var__image_right_url__style ?>></div>

                    </div>

                    <?php
                    // ------------------------
                    // Spinner filler - Spinner
                    // ------------------------
                    ?>
                    <div class="template-partial-page-spinner-filler-img">

                        <img 
                        src="<?= $image_right_overlay; ?>"
                        width="100%" 
                        height="auto"
                        alt="<?= $outer_img['alt']; ?>"
                        title="<?= $outer_img['title']; ?>" 
                        longdesc="<?= $outer_img['description']; ?>"
                        >

                    </div>
                    <?php
                    // -------------------------
                    // /Spinner filler - Spinner
                    // =========================
                    ?>                    

                </div>
                <?php
                // ---------------
                // /Spinner filler
                // ===============
                ?>

                <?php
                // -----------------
                // Contact Us : Grid
                // -----------------
                ?>
                <div class="<?= $lh__layout_name ?>-grid">

                    <?php
                    // ------------------------
                    // Contact Us : Grid Item 1
                    // ------------------------
                    ?>
                    <div class="<?= $lh__layout_name ?>-grid-item">

                        <?php
                        //Contact Us : Grid Item 1 - Logo
                        // ------------------------------
                        ?>                    

                        <?php 
                                $image = $knight_frank_contact_block__logo['id'];
                                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) {
                                    echo wp_get_attachment_image( $image, $size,"" , ["class" => $lh__layout_name . "-grid-item-logo","alt"=>"some"] );
                                }
                                ?>                        

                        <?php
                        //Contact Us : Grid Item 1 - Details
                        // ---------------------------------
                        ?>                        
                        <?php
                        foreach ($knight_frank_contact_block__contact_details as $key => $value) {

                            $echo_dump = '';

                            $echo_dump .= '<ul class="abstract-typography-list__contact-us-list">';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item">' . $value['name'] . '</li>';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item">M: <a href="tel:' . $value['mobile'] . '">' . $value['mobile'] . '</a></li>';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item">T: <a href="tel:' . $value['telephone'] . '">' . $value['telephone'] . '</a></li>';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item"><a href="mailto:' . $value['email'] . '">' . $value['email'] . '</a></li>';
                            $echo_dump .= '</ul>';

                            echo $echo_dump;
                            
                        }
                        ?>

                    </div>
                    <?php
                    // ------------------------
                    // Contact Us : Grid Item 1
                    // ========================
                    ?>


                    <?php
                    // ------------------------
                    // Contact Us : Grid Item 2
                    // ------------------------
                    ?>
                    <div class="<?= $lh__layout_name ?>-grid-item">

                    <?php
                        //Contact Us : Grid Item 1 - Logo
                        // ------------------------------
                        ?>                    

                        <?php 
                                $image = $bluebook_contact_block__logo['id'];
                                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) {
                                    echo wp_get_attachment_image( $image, $size,"" , ["class" => $lh__layout_name . "-grid-item-logo","alt"=>"some"] );
                                }
                                ?>                        

                        <?php
                        //Contact Us : Grid Item 1 - Details
                        // ---------------------------------
                        ?>                        
                        <?php
                        foreach ($bluebook_contact_block__contact_details as $key => $value) {

                            $echo_dump = '';

                            $echo_dump .= '<ul class="abstract-typography-list__contact-us-list">';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item">' . $value['name'] . '</li>';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item">M: <a href="tel:' . $value['mobile'] . '">' . $value['mobile'] . '</a></li>';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item">T: <a href="tel:' . $value['telephone'] . '">' . $value['telephone'] . '</a></li>';
                            $echo_dump .= '<li class="abstract-typography-list__contact-us-list-item"><a href="mailto:' . $value['email'] . '">' . $value['email'] . '</a></li>';
                            $echo_dump .= '</ul>';

                            echo $echo_dump;
                            
                        }
                        ?>

                    
                    
                    </div>
                    <?php
                    // ------------------------
                    // Contact Us : Grid Item 2
                    // ========================
                    ?>                    

                </div>
                <?php
                // ------------------
                // /Contact Us : Grid
                // ==================
                ?>                

                
        
            </div>

        </div>

    </div>

</div>