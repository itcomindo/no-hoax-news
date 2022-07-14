<?php

// CARBON FIELDS SECTION

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/*
 * CUSTOMIZE CATEGORY BACKGROUND COLOR
 */

add_action('carbon_fields_register_fields', 'category_background');
function category_background()
{
    Container::make('term_meta', __('Term Options', 'crb'))
        ->where('term_taxonomy', '=', 'category')
        ->add_fields(array(
            Field::make('color', 'background_color_for_category', 'Background Color'),
            Field::make('color', 'cat_link_color', 'Link Color'),
        ));
}
