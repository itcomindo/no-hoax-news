<?php

function this_is_global_header()
{
    this_is_topbar();
    ?>

<header id="header" class="section">
    <div class="content">
        <div id="wr_logo">
            <h2><a href="/">NoHoaxNews</a></h2>
        </div>
        <div id="wr_ads_in_header">
            <a rel="noopener" title="iklan" href="#"><img src="\wp-content\themes\no-hoax-news\img\ad_728x90_2.webp" alt="970 banner" title="970banner"></a>
        </div>
    </div>
</header>
<section id="header_menu" class="section">
    <div class="content"><?php
wp_nav_menu(array(
    'menu' => 'Header Menu',
));?> 
</div>
</section>
<?php this_is_ads_below_header_menu(); ?>

<?php
}