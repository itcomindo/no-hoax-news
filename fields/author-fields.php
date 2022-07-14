<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('user_meta', 'nhx_author_fields')
    ->add_fields(array(
        Field::make('text', 'crb_city_and_post', 'City and post code'),
        Field::make('text', 'crb_street', 'Street Name'),
    ));
