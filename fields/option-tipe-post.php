<?php

// CARBON FIELDS SECTION

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'tipe_post');
function tipe_post()
{
    Container::make('post_meta', 'Tipe Post')
        ->Where('post_type', '=', 'post')
        ->add_fields(array(
            Field::make('select', 'pilihan_tipe_post')
                ->set_options(array(
                    'standard' => 'Standard',
                    'video' => 'Video',
                    'gallery' => 'Gallery',
                )),

            Field::make('media_gallery', 'crb_media_gallery', __('Media Gallery'))
                ->set_type(array('image', 'video'))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'pilihan_tipe_post',
                        'value' => 'gallery',
                    ),
                )),

            Field::make('select', 'video_source')
                ->set_options(array(
                    'pilih' => 'Pilih',
                    'youtube' => 'Youtube',
                    'upload' => 'Upload',
                ))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'pilihan_tipe_post',
                        'value' => 'video',
                    ),
                )),
                
            Field::make('text', 'youtube_video_url', 'URL Video')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'video_source',
                        'value' => 'youtube',
                    ),
                )),

            Field::make( 'file', 'uploaded_video_url', __( 'File' ) )
            ->set_type( array( 'video/mp4' ) )
            ->set_value_type( 'url' )
            ->set_conditional_logic(array(
                    array(
                        'field' => 'video_source',
                        'value' => 'upload',
                    ),
                ))

        ));


}




