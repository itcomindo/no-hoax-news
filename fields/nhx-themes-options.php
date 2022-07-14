<?php
add_filter('carbon_fields_user_meta_container_admin_only_access', '__return_false');
require_once WP_PLUGIN_DIR . '/carbon-fields/carbon-fields-plugin.php';

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'treeh_themes_options');
function treeh_themes_options()
{
    $basic_options_container = Container::make('theme_options', 'No Hoax News')
        ->set_icon('dashicons-image-filter')
        ->add_fields(array(
            Field::make('text', 'crb_text', 'Text Field'),
        ));

    // Add second options page under 'Basic Options'
    Container::make('theme_options', __('Themes Header'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_fields(array(
            Field::make('text', 'treeh_header_menu', 'Header Menu')
                ->set_attribute('placeholder', 'ketik nama menu'),
        ));

    // Add third options page under "Appearance"
    Container::make('theme_options', __('Themes Appearances'))
        ->set_page_parent($basic_options_container) // identificator of the "Appearance" admin section
        ->add_fields(array(
            Field::make('color', 'crb_background_color', __('Background Color')),
            Field::make('image', 'crb_background_image', __('Background Image')),
        ));

    // Add third options page under "Appearance"
    Container::make('theme_options', __('Ads Manager'))
        ->set_page_parent($basic_options_container) // identificator of the "Appearance" admin section
        ->add_fields(array(

            Field::make('select', 'nhx_ask_aktifkan_floating_ads', __('Aktifkan Floating Ads'))
                ->add_options([
                    'no'  => 'No',
                    'yes' => 'Yes',
                ]),

            Field::make('select', 'nhx_floating_ads_left_active', __('Ads Source for Floating Ads Left'))
                ->set_conditional_logic([
                    [
                        'field' => 'nhx_ask_aktifkan_floating_ads',
                        'value' => 'yes',
                    ],
                ])
                ->add_options(array(
                    'none'      => __('None'),
                    'html'      => __('HTML'),
                    'image'     => __('Image'),
                    'googleads' => __('Google Ads'),
                )),

            Field::make('textarea', 'nhx_ads_floating_left_html', __('Ads on Floating Left Position'))
                ->set_attribute('placeholder', 'berisi tag html')
                ->set_conditional_logic([
                    [
                        'field' => 'nhx_floating_ads_left_active',
                        'value' => 'html',
                    ],
                ]),

            Field::make('text', 'nhx_ads_floating_left_google', __('Google Ads on Floating Left'))
                ->set_attribute('placeholder', 'cukup ketik: ca-pub_454545')
                ->set_conditional_logic([
                    [
                        'field' => 'nhx_floating_ads_left_active',
                        'value' => 'googleads',
                    ],
                ]),

            // Slide Ads

            Field::make('select', 'nhx_ask_aktifkan_slide_ads', __('Aktifkan Slide Ads'))
                ->add_options([
                    'nope' => 'Nope',
                    'yes'  => 'Yes',
                ]),

        ));

    // Plugins Option Start
    Container::make('theme_options', __('Konfigurasi Fitur'))
        ->set_page_parent($basic_options_container)
        ->add_fields(array(
            // Field-field berisi Konfigurasi Fitur Start

            // disable gutenberg script location in functions.php
            Field::make('select', 'nhx_classic_editor_option', 'Classic Editor')
                ->set_help_text('fitur untuk mengaktifkan dan menonaktifkan gutenberg editor')
                ->set_default_value('yes')
                ->add_options([
                    'yes' => 'Yes',
                    'no'  => 'No',
                ]),

            // Field-field berisi Konfigurasi Fitur End Kalok Nambah Masukin Diatas Yea
        ));
    // Plugins options end

    // Konfigurasi Homepage Start
    Container::make('theme_options', 'Konfigurasi Homepage')
        ->set_page_parent($basic_options_container)
        ->add_fields(array(
            // Field untuk konfigurasi homepage Start
            // seprator start
            Field::make( 'separator', 'headline_start', 'Headline Section'),
            // seprator
            // post title on headline start
            Field::make('select', 'nhx_post_title_lenght_option', 'Trim Judul Post')
                ->set_classes( 'field-headline-class' )
                ->set_help_text('fitur untuk membatasi jumlah line/baris pada judul post supaya seragam dan rapih *default yes 3 line')
                ->set_default_value('yes')
                ->add_options([
                    'yes' => 'Yes',
                    'no'  => 'No',
                ]),
            Field::make('select', 'nhx_post_title_value', 'Pilih Jumlah Line/Baris')
                ->set_help_text('pilih max line/baris')
                ->set_default_value('3')
                ->add_options([
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ])
                ->set_conditional_logic([
                    [
                    'field' => 'nhx_post_title_lenght_option',
                    'value' => 'yes',
                    ],
                ]),
            // post excerpt on headline start
            Field::make('select', 'nhx_post_excerpt_lenght_option', 'Trim Post excerpt')
                ->set_help_text('fitur untuk membatasi jumlah line/baris pada post excerpt supaya seragam dan rapih *default yes 2 line')
                ->set_default_value('yes')
                ->add_options([
                    'yes' => 'Yes',
                    'no'  => 'No',
                ]),
            Field::make('select', 'nhx_post_excerpt_value', 'Pilih Jumlah Line/Baris')
                ->set_help_text('pilih max line/baris')
                ->set_default_value('2')
                ->add_options([
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ])
                ->set_conditional_logic([
                    [
                    'field' => 'nhx_post_excerpt_lenght_option',
                    'value' => 'yes',
                    ],
                ]),

            Field::make( 'separator', 'slide_content_start', __( 'Slider Post' ) )
                



            // Field untuk konfigurasi homepage End Kalok Nambah Masukin Diatas Yea
        ));
    // Konfigurasi Homepage End

    
}
