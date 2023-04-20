<?php

$post_slug = $post->post_name;

if($post_slug == 'vision'):

    get_template_part( 'template-partials/template-partial-page-' . $post_slug );

elseif($post_slug == 'contact'):

    get_template_part( 'template-partials/template-partial-page-' . $post_slug);

endif;
