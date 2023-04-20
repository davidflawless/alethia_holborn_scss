<?php
function section_title($string_array,$tag) { ?>

    <div id="section-title" class="row justify-content-center">
        
        <div class="col-12 col-md-auto pb-3">

            <?php mobile_text($string_array, $tag); ?>

        </div>
    </div>

<?php 
} // End of Function


// Removes <br/> for mobile devices
function mobile_text($string_array, $tag) { 
    
    //my_print_r($string_array);
    ?>

    <div class="d-none d-lg-block">
        <?php 
        if ($tag != '') {
            echo '<'.$tag.'>  <span class="text-color-'.$string_array['colour'].'">'.$string_array['text'].'</span></'.$tag.'>';
        } else {
            echo '<span class="text-color-'.$string_array['colour'].'">'.$string_array['text'].'</span>';
        }
        ?>
    </div>

    <div class="d-block d-lg-none">
        <?php
        if ($tag != '') {
            //echo '<'.$tag.'>  <span class="text-color-'.$string_array['colour'].'">   '.str_replace('<br />', '', $string_array['text']).'</span></'.$tag.'>';

            echo '<'.$tag.'>  <span class="text-color-'.$string_array['colour'].'">   '.strip_tags($string_array['text'],'<br />').'</span></'.$tag.'>';
        } else {
            echo '<span class="text-color-'.$string_array['colour'].'">'.strip_tags($string_array['text'],'<br />').'</span>';
        } 
        ?>
    </div>
<?php
} // End of Function
?>