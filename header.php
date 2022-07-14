<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?>>

<head>
    <?php this_is_head_seo();?>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<?php this_is_global_header() ?>

<body <?php body_class();?>>
<main id="global_site_content">
  <?php wp_body_open();?>

  <!-- floating ads conditional -->

<?php
$floating_ads_status = carbon_get_theme_option('nhx_ask_aktifkan_floating_ads');
if($floating_ads_status == 'yes') {
  this_is_floating_ads_left();
  this_is_floating_ads_right();
}

