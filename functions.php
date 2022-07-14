<?php

/**
 * Enable support for post thumbnails and featured images.
 */
add_theme_support('post-thumbnails');

/**
 * Add support for two custom navigation menus.
 */
register_nav_menus(array(
    'topbar' => __('Topbar Menu', 'nohoaxnews'),
    'primary' => __('Primary Menu', 'nohoaxnews'),
    'header' => __('Header Menu', 'nohoaxnews'),
    'footer' => __('Footer Menu', 'nohoaxnews'),

));


/**
 * Enable support for the following post formats:
 * aside, gallery, quote, image, and video
 */
add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));


/*
 * load CSS Internal
 */
function nhx_internal_css()
{
wp_enqueue_style('root', get_template_directory_uri() . '/css/root.css');
wp_enqueue_style('topbar', get_template_directory_uri() . '/css/topbar.css');
wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css');
wp_enqueue_style('header_menu', get_template_directory_uri() . '/css/header-menu.css');
wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css');
wp_enqueue_style('color_pallets', get_template_directory_uri() . '/css/vars.css');
wp_enqueue_style('search_form', get_template_directory_uri() . '/css/search-form.css');
wp_enqueue_style('floating_ads', get_template_directory_uri() . '/css/floating-ads.css');
wp_enqueue_style('ads_in_loop', get_template_directory_uri() . '/css/ads-in-loop.css');
wp_enqueue_style('cta', get_template_directory_uri() . '/css/cta.css');
wp_enqueue_style('ads-popup', get_template_directory_uri() . '/css/ads-popup.css');
wp_enqueue_style('archive-css', get_template_directory_uri() . '/css/archive.css');

if (is_single()) {
    wp_enqueue_style('single_post-css', get_template_directory_uri() . '/css/single-post.css');
    wp_enqueue_style('comment-css', get_template_directory_uri() . '/css/comment.css');
} elseif (is_page() & (!is_front_page())) {
    wp_enqueue_style('page-css', get_template_directory_uri() . '/css/page.css');
} elseif (is_front_page()) {
    wp_enqueue_style('headline_css', get_template_directory_uri() . '/css/headline.css');
    wp_enqueue_style('blog-index', get_template_directory_uri() . '/css/blog-index.css');
    wp_enqueue_style('slide_post', get_template_directory_uri() . '/css/slide-post.css');


}

}
add_action('wp_head', 'nhx_internal_css', 3);

/*
 * load external css
 */

function this_is_external_css() {
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<?php
}
add_action( 'wp_head', 'this_is_external_css', 5);




/*
 * load js internal
*/

function nhx_internal_js()
{
    wp_enqueue_script('nhx_global_js', get_template_directory_uri() . '/js/global.js');
    wp_enqueue_script('ads-popup-js', get_template_directory_uri() . '/js/ads-popup.js');

}
add_action('wp_enqueue_scripts', 'nhx_internal_js');

/*
 * plugin, js, functin conditionaling
 * which is only perform when needed
 * Frontpage
 * Single
 */
function this_is_js_and_css_perform_on_frontpage()
{
// frontpage only
if(is_front_page()) {

    // flickity
    wp_enqueue_script('flickity-category-select_js', get_template_directory_uri() . '/js/flickity-category-select.js');
    this_is_flickity();
}
}
add_action('wp_head', 'this_is_js_and_css_perform_on_frontpage');

// Single Post

function this_is_enqueue_script_perform_on_single_post() {
if(is_single()) {
    wp_enqueue_script('captcha_comment_form', get_template_directory_uri() . '/js/captcha-comment_form.js');
}
}
add_action('wp_enqueue_scripts', 'this_is_enqueue_script_perform_on_single_post');

// Category Page and Tag

function this_is_enqueue_script_perform_on_archive_cat_and_tag() {


if(is_category()) {
    // Infinite Scroll Start
    wp_enqueue_script('infinite_scroll_js', get_template_directory_uri() . '/plugins/infinite-scroll/infinite-scroll.pkgd.min.js');
    wp_enqueue_script('infinite_scroll_js_config', get_template_directory_uri() . '/plugins/infinite-scroll/infinite-config.js');
    // Infinite Scroll End
}
}
add_action('wp_enqueue_scripts', 'this_is_enqueue_script_perform_on_archive_cat_and_tag');


/*
 * template part containing functions and or PHP Functions Used to perform
 * Function
 * Elements
 * Plugins
 * Ads
 * SEO
 * Fields
 * Widget
 * Blocks (Gutenberg)
 */

// Functions
// include get_template_directory() . '/functions/classic-editor.php';
include get_template_directory() . '/functions/custom-functions.php';

// Elements

include get_template_directory() . '/elements/nhx-homepage.php';
include get_template_directory() . '/elements/nhx-single.php';
include get_template_directory() . '/elements/nhx-header.php';
include get_template_directory() . '/elements/nhx-footer.php';
include get_template_directory() . '/elements/nhx-topbar.php';
include get_template_directory() . '/elements/nhx-search-form.php';
include get_template_directory() . '/elements/nhx-slide-post.php';
include get_template_directory() . '/elements/nhx-content-in-slide-post.php';
include get_template_directory() . '/ads/ads-popup.php';
include get_template_directory() . '/elements/nhx-blog-index.php';
include get_template_directory() . '/elements/nhx-cta.php';
include get_template_directory() . '/elements/nhk-page-template.php';
include get_template_directory() . '/elements/nhx-comment-form.php';
include get_template_directory() . '/elements/nhx-archive.php';

// Plugins
include get_template_directory() . '/plugins/nhx-plugins.php';


// ADS
include get_template_directory() . '/ads/ads-below-header-menu.php';
include get_template_directory() . '/ads/floating-ads-left.php';
include get_template_directory() . '/ads/floating-ads-right.php';
include get_template_directory() . '/ads/ads-in-loop.php';



// SEO
include get_template_directory() . '/seo/head-seo.php';
include get_template_directory() . '/seo/global-seo.php';


// Fields
include get_template_directory() . '/fields/category-background.php';
include get_template_directory() . '/fields/option-tipe-post.php';
include get_template_directory() . '/fields/nhx-themes-options.php';
include get_template_directory() . '/fields/ads-popup.php';
include get_template_directory() . '/fields/seo-meta.php';

// Widgets
include get_template_directory() . '/widget/widget-test.php';

// Enable Disable Classic Editor
function tr_endis_classic_editor() {
    $classic_editor_is = carbon_get_theme_option('nhx_classic_editor_option');
    if ($classic_editor_is == 'yes') {
        add_filter('use_block_editor_for_post', '__return_false');
    } else {
        add_filter('use_block_editor_for_post', '__return_true');
    }
}
add_action('admin_init', 'tr_endis_classic_editor');



/*
* WARNING!!!
* PLEASE DO NOT TOUCH CODE ABOVE WITH NO KNOWLEDGE
* ADD YOUR OWN CODE BELOW THIS
*/