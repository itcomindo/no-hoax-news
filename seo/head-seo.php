<?php

function this_is_head_seo()
{
    ?>

<title><?php echo this_is_seo_page_title(); ?> | <?php echo get_bloginfo(); ?></title>
<meta name="description" content="<?php echo carbon_get_post_meta(get_the_ID(), 'meta_description'); ?>">
<?php echo robots_instruction(); ?>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php
$pilihan_tipe_post = carbon_get_post_meta(get_the_ID(), 'pilihan_tipe_post');
    if (is_single() & $pilihan_tipe_post == 'gallery') {
?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
}

}

function this_is_seo_page_title()
{

    $ask_custom_title      = carbon_get_post_meta(get_the_ID(), 'use_custom_title');
    $this_the_custom_title = carbon_get_post_meta(get_the_ID(), 'the_custom_title');

    if (is_category() or is_tag()) {
        $archive_title = get_the_archive_title();
        echo $archive_title;
    } elseif ($ask_custom_title == 'true') {
        echo $this_the_custom_title;
    } else {
        echo get_the_title();
    }

}
