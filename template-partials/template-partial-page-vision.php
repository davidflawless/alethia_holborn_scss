<?php
/**
	* Template Partial : Page - Vision
*/
?>

<?php

$image_right_url        = get_field('image_right')['url'];

$image_right_overlay    = get_field('image_right_overlay')['url'];

$vision__text_block_1 = get_field('vision__text_block_1')['c__text_wysiwyg'];

$vision__text_block_2 = get_field('vision__text_block_2')['c__text_wysiwyg'];

// :: inline styles for background
$var__image_right_url__style    = '';

$var__image_right_url__body     = '';

if ($image_right_url) { 
    
    $image_right_url = 'background-image: url(' . $image_right_url . ');';

    $var__image_right_url__body .= $image_right_url; 

} 

$var__image_right_url__style    .= 'style="' . $var__image_right_url__body . '"';

// :: Layout helper
$lh__layout_name = 'template-partial-page-vision';
    
?>




<div class="<?= $lh__layout_name ?>">

    <div class="scaffolding-container">
    
        <div class="scaffolding-row">

            <div class="<?= $lh__layout_name ?>-group">

                
                <div class="abstract-typography-wysiwyg-editor-standard">
                    
                    <?= the_content(); ?>

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

                <?= $vision__text_block_1; ?>

                <?= $vision__text_block_2; ?>
        
            </div>

        </div>

    </div>

</div>