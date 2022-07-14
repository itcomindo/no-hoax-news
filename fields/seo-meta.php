<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// SEO META IN POST AND PAGE

add_action('carbon_fields_register_fields', 'seo_meta_description');
function seo_meta_description()
{
    Container::make('post_meta', 'Custom Data')
        ->where('post_type', '=', 'post')
        ->or_where('post_type', '=', 'page')
        ->add_fields([
            // pertanyaan mau pakai custom title gk?
            Field::make('checkbox', 'use_custom_title', 'Aktifkan Custom Title')
                ->set_option_value('yes'),

            // jawaban kalau, iya saya mau !!
            Field::make('text', 'the_custom_title', 'Custom Title')
                ->set_attribute('data-*', 'ketik placeholder')
                ->set_attribute('maxLength', 71)
                ->set_attribute('placeholder', 'tidak lebih dari 70 karakter')
                ->set_conditional_logic([
                    [
                        'field' => 'use_custom_title',
                        'value' => true,
                    ],
                ]),

            Field::make('html', 'treeh_keterangan_custom_title')->set_html(
                '<small>Custom Title Hanya Aktif dibagian head tidak merubah oroginal title klean</small>'
            )
                ->set_conditional_logic([
                    [
                        'field' => 'use_custom_title',
                        'value' => true,
                    ],
                ]),

            Field::make('textarea', 'meta_description', 'Meta Descrption')
                ->set_attribute('placeholder', 'max 160 karakter')
                ->set_required(true)
                ->set_attribute('maxLength', 160),

            Field::make(
                'radio',
                'index_this_content',
                __('Robots Instruction')
            )->set_options([
                'index, follow' => 'index, follow',
                'index, nofollow' => 'index, nofollow',
                'noindex' => 'noindex',
                'index, follow, noarchive' => 'index, follow, noarchive',
                'index, nofollow, noarchive' => 'index, nofollow, noarchive',
            ]),
        ]);
}

function seo_custom_title()
{
    $ask_custom_title = carbon_get_post_meta(get_the_ID(), 'use_custom_title');
    $this_the_custom_title = carbon_get_post_meta(get_the_ID(), 'the_custom_title');

    if ($ask_custom_title == 'true') {?> <title><?php echo $this_the_custom_title; ?> -
    <?php echo get_bloginfo('name') ?> </title> <?php } else {?>
<title><?php echo the_title(); ?> - <?php echo get_bloginfo('name') ?></title> <?php
}
}

// Instruksikan Robots
function robots_instruction()
{
    $robots = carbon_get_post_meta(get_the_ID(), 'index_this_content');?>
    <meta name="robots" content="<?php echo $robots; ?>">
    <?php
}

function display_seo_meta_description()
{
    seo_custom_title();
    $seo_meta_desc = carbon_get_post_meta(get_the_ID(), 'meta_description');
    $check_seo_meta = strlen($seo_meta_desc);

// Membuat Meta Description

    if ($check_seo_meta <= 1) {
        // show default SEO meta (Title and Excerpt)
        $content_excerpt = strip_tags(get_the_excerpt());
        $content_title = get_the_title();?>
<meta name="description" content="<?php echo $content_title . $content_excerpt; ?>"> <?php } else {?>
<meta name="description" content="<?php echo $seo_meta_desc; ?>"> <?php
}?>
<?php robots_instruction();
}

add_action('wp_head', 'display_seo_meta_description', 1);

function treeh_style_seo()
{?>
<style>
    #treeh_your_title {
        font-size:20px !important;
        font-weight: 600;
        color: darkred !important;
    }
.treeh_wr_custom_title_counter {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.treeh_wr_custom_title_counter small {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2px 4px;
    font-size:16px;
}

.treeh_wr_custom_title_counter span {
    width: calc(100% / 3);
    padding: 2px 4px;
}
</style>
<?php
}

add_action('admin_head', 'treeh_style_seo', 1);
