<?php

function this_is_topbar()
{?>
<section id="nhx_topbar" class="section">
    <div class="content">
        <div id="nhx_topbar_left" class="col_in_topbar">
            <a title="<?php echo get_bloginfo(); ?>" href="/">
                <i class='bx bx-sm bxs-home'></i>
            </a>
            <?php
wp_nav_menu(array(
    'menu' => 'Topbar Menu',
));

    ?>
        </div>
        <div id="nhx_topbar_right" class="col_in_topbar">
            <?php this_is_search_form_in_header(); ?>
            <i id="toggle_search_in_header" class='bx bx-md bx-search-alt-2'></i>
        </div>
    </div>
</section>
<?php
}