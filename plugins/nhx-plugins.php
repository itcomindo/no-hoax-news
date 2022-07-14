<?php

function this_is_flickity()
{

    wp_enqueue_script('internal-flickity-js', get_template_directory_uri() . '/plugins/flickity/flickity.pkgd.min.js');
    wp_enqueue_style('internal-flickity-css', get_template_directory_uri() . '/plugins/flickity/flickity-min.css');

}


include get_template_directory() . '/plugins/popular-post/popular-post.php';
