<?php


function carda_script_register() {

    wp_enqueue_script('carda-js', get_template_directory_uri() . '/blocks/carda/carda.js');

}

add_action( 'wp_enqueue_script', 'carda_script_register');