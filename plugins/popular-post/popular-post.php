<?php

/**
 * Most View Post or Popular Post
 * Positron functions and definitions
 */
function positronx_set_post_views($post_id)
{
    $count_key = 'wp_post_views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

function positronx_track_post_views($post_id)
{
    if (!is_single()) {
        return;
    }

    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }

    positronx_set_post_views($post_id);
}

add_action('wp_head', 'positronx_track_post_views');

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
