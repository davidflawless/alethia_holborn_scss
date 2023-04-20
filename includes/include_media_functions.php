<?php

function img_featured (
    $loading,
    $img_mobile,
    $featured_array
) { 
    //my_print_r($featured_array['sizes'][$img_d_xxl][0]);
    //my_print_r($featured_array);
  
    ?>
    <img src="<?= $featured_array['sizes'][$img_mobile][0]; ?>"
        width="<?= $featured_array['sizes'][$img_mobile][1]; ?>"
        height="<?= $featured_array['sizes'][$img_mobile][2]; ?>"
        alt="<?= $featured_array['alt']; ?>"
        title="<?= $featured_array['title']; ?>"
        longdesc="<?= $featured_array['desc']; ?>" loading="<?= $loading; ?>"
        srcset="<?= $featured_array['sizes'][$img_mobile][0]; ?> <?= $featured_array['sizes'][$img_mobile][1]; ?>w"
        sizes="(max-width: <?= $featured_array['sizes'][$img_mobile][1]; ?>) 100vw <?= $featured_array['sizes'][$img_mobile][1]; ?>px"
    >
<?php  
}




function img_display(
    $loading,
    $img_size,
    $img_array
) { 
    //my_print_r($img_array);
    
    if ($img_array['subtype'] != 'svg+xml') { 
    ?>

    <img 
        src="<?= $img_array['sizes'][$img_size]; ?>"
        width="<?= $img_array['sizes'][$img_size.'-width']; ?>"
        height="<?= $img_array['sizes'][$img_size.'-height']; ?>" 
        alt="<?= $img_array['alt']; ?>"
        title="<?= $img_array['title']; ?>" 
        longdesc="<?= $img_array['description']; ?>"
        loading="<?= $loading; ?>" 
        srcset="
            <?= $img_array['sizes'][$img_size]; ?> <?= $img_array['sizes'][$img_size.'-width']; ?>w"
        
    
        sizes="(max-width: <?= $img_array['sizes'][$img_size.'-width']; ?>) 100vw <?= $img_array['sizes'][$img_size.'-width']; ?>px"
        
    >

    <?php
    } else {  ?>

        <img 
            src="<?= $img_array['url']; ?>"
            width="100%" 
            height="auto"
            alt="<?= $img_array['alt']; ?>"
            title="<?= $img_array['title']; ?>" 
            longdesc="<?= $img_array['description']; ?>"
        >


    <?php
    
    }
}
?>