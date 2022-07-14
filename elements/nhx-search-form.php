<?php

function this_is_search_form_in_header() {?>


<form id="searchform_in_header" class="searchform_in_header_is_not_active" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="search-field" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
    <input type="submit" value="Search">
</form>





<?php
}