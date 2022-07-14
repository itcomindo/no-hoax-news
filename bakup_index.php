<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */
get_header();
this_is_global_header();

?>

<main id="global_site_content">

<?php

this_is_floating_ads_right();
this_is_floating_ads_left();

// if Frontpage atau Home

if (is_front_page() || is_home()) {

    this_is_homepage();
    box_one();
    this_is_cta();
    this_is_the_is_blog_index();

} else {

    this_is_page();

}

// if Page

if (is_page()) {

} else {

    // do something else
}

// if Single Post

if (is_single()) {

} else {

    // do something else
    // echo '<h3>no content here</h3>';
}

// if tag

if (is_tag()) {

    // this_is_tag();
    echo '<div class="under"><h1>UNDER KONSTUKSIONG!!!!</h1></div>';

} else {

    // do something else
}

// if category

if (is_category()) {

    //this_is_category();
    echo '<div class="under"><h1>UNDER KONSTUKSIONG!!!!</h1></div>';

} else {

    // do something else
}

// if Search

if (is_search()) {

    //this_is_category();
    echo '<div class="under"><h1>UNDER KONSTUKSIONG!!!!</h1></div>';

} else {

    // do something else
}

?>

</main>

<?php get_footer();
