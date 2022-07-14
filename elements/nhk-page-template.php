<?php

function this_is_page() {?>
    <section id="nhx_page" class="section">
        <div class="content">
            <h1 id="nhx_page_title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </section>
<?php
}