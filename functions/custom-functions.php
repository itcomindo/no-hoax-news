<?php

/**
 * Changed excerpt length to 30 words
 */
function emersonthis_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'emersonthis_excerpt_length');

// remove tag
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }

    return $title;
});


/*
* Function which displays your post date in time ago format
*/

function meks_time_ago()
{
    return human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago');
}



/*
* Comment Field Order
* unset (disable field)
*/

add_filter('comment_form_fields', 'mo_comment_fields_custom_order');
function mo_comment_fields_custom_order($fields)
{
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset($fields['comment']);
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['cookies']);
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    // $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}



/*
* this is popular post on sidebar
*/


function this_is_popular_post() {

$popularpostbyview = array(
    'meta_key' => 'wp_post_views_count', // set custom meta key
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 10,
);

// Invoke the query
$prime_posts = new WP_Query($popularpostbyview);

if ($prime_posts->have_posts()): ?>
    <ul>
        <?php
while ($prime_posts->have_posts()): $prime_posts->the_post();
    ?>
	                <li>
	                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
	                      <?php the_title();?>
	                    </a>
	                </li>
	            <?php
endwhile;
wp_reset_postdata();
?>
    </ul>
<?php
endif;

}

/*
* Text Captcha
*/

function this_is_nhx_text_captcha() {
?>

    <form id="nhx_text_captcha">
        <label class="captchalabel" for="captcha">Isi captcha berapa
        <small>9x20=?</small></label>
        <input class="captcha_kosong" name="captcha" type="text" id="formcaptcha" placeholder="isi jawaban disini">
        <input id="cancel_send_comment" class="cancel_send_comment_is_off" value="Cancel Comment" type="button">
    </form>
<?php
}

/*
* Remove p what wrap image in content
*/

/**
 * Move image inside <p> tag above the <p> tag while preserving any link around image.
 * Can be prevented by adding any attribute or whitespace to <p> tag, e.g. <p class="yolo"> or even <p >
 */
function gc_remove_p_tags_around_images($content)
{
    $contentWithFixedPTags = preg_replace_callback('/<p>((?:.(?!p>))*?)(<a[^>]*>)?\s*(<img[^>]+>)(<\/a>)?(.*?)<\/p>/is', function ($matches) {
        /*
        Groups     Regex             Description
        <p>            starting <p> tag
        1    ((?:.(?!p>))*?)        match 0 or more of anything not followed by p>
        .(?!p>)         anything that's not followed by p>
        ?:             non-capturing group.
         *?        match the ". modified by p> condition" expression non-greedily
        2    (<a[^>]*>)?        starting <a> tag (optional)
        \s*            white space (optional)
        3    (<img[^>]+>)        <img> tag
        \s*            white space (optional)
        4    (<\/a>)?         ending </a> tag (optional)
        5    (.*?)<\/p>        everything up to the final </p>

        i modifier         case insensitive
        s modifier        allows . to match multiple lines (important for 1st and 5th group)
         */

        // image and (optional) link: <a ...><img ...></a>
        $image = $matches[2] . $matches[3] . $matches[4];

        // content before and after image. wrap in <p> unless it's empty
        $content = trim($matches[1] . $matches[5]);
        if ($content) {
            $content = '<p>' . $content . '</p>';
        }

        return $image . $content;

    }, $content);

    // On large strings, this regular expression fails to execute, returning NULL
    return is_null($contentWithFixedPTags) ? $content : $contentWithFixedPTags;
}
add_filter('the_content', 'gc_remove_p_tags_around_images');


/*
* automatic add alt and title attribute when upload images
* Automatically set the image Title, Alt-Text, Caption & Description upon upload
*/


add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

 
    // Check if uploaded file is an image, else do nothing
 
    if ( wp_attachment_is_image( $post_ID ) ) {
 
        $my_image_title = get_post( $post_ID )->post_title;
 
        // Sanitize the title:  remove hyphens, underscores & extra spaces:
        $my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
 
        // Sanitize the title:  capitalize first letter of every word (other letters lower case):
        $my_image_title = ucwords( strtolower( $my_image_title ) );
 
        // Create an array with the image meta (Title, Caption, Description) to be updated
        // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
        $my_image_meta = array(
            'ID'        => $post_ID,            // Specify the image (ID) to be updated
            'post_title'    => $my_image_title,     // Set image Title to sanitized title
            'post_excerpt'  => $my_image_title,     // Set image Caption (Excerpt) to sanitized title
            'post_content'  => $my_image_title,     // Set image Description (Content) to sanitized title
        );
 
        // Set the image Alt-Text
        update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title);

        // Set the image Alt-Text
        update_post_meta( $post_ID, '_wp_attachment_image_title', $my_image_title);
 
        // Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post( $my_image_meta );
 
    } 
}

/*
* Add itemprop image markup to img tags
*/
add_filter('the_content', 'vmf_add_itemprop_image_markup', 2);
function vmf_add_itemprop_image_markup($content)
{
    //Replace the instance with the itemprop image markup.
    $judul_post = get_the_title();
    $string = '<img';
    $replace = '<img itemprop="image" title="' . $judul_post . '" ';
    $content = str_replace($string, $replace, $content);
    return $content;
}

