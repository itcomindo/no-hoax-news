<?php

function box_one()
{
    ?>

<section id="pr_box_one" class="section">
    <div id="wr_box_one" class="content">
        <div id="box_one_left" class="col_in_box_one">
            <div id="inner_box_one_left_first_row">
                <!-- Toggle Fitur Content Start -->
                <div class="wr_toggle_ibo_left">
                    <span class="wr_text_featured_stories"><i class='bx bx-sm bx-podcast'></i> Featured Stories</span>
                    <span>
                        <ul class="list_trigger_feature_stories_group">
                            <li class="list_trigger_feature_stories is_active" id="ALL">ALL</li>
                            <li class="list_trigger_feature_stories" aria-label="Page dot 2" id="Bisnis">Bisnis</li>
                            <li class="list_trigger_feature_stories" id="Olahraga">Olahraga</li>
                            <li class="list_trigger_feature_stories" id="Food">Food</li>
                            <li class="list_trigger_feature_stories" id="Hobby">Hobby</li>
                        </ul>
                    </span>
                </div>
                <!-- Toggle Fitur Content End -->
            </div>
            <!-- Featured Post Start -->
            <div id="wr_featured_post">

                <div id="fpbc_all" class="featured_post_by_cat">
                    <?php featured_post_one();?>
                </div>
                <div id="fpbc_bisnis" class="featured_post_by_cat">
                    <?php category_bisnis_featured_post();?>
                </div>
                <div class="featured_post_by_cat">
                    <?php category_olahraga_featured_post();?>
                </div>
                <div class="featured_post_by_cat">
                    <?php category_food_featured_post();?>
                </div>
                <div class="featured_post_by_cat">
                    <?php category_hobby_featured_post();?>
                </div>
                
            </div>
        </div>
        <div id="box_one_right" class="col_in_box_one">
            <?php dynamic_sidebar( 'home_right_1' ); ?>
            <img width="228" height="190.33" src="\wp-content\themes\no-hoax-news\img\ad_sidebar.webp" alt="iklan" title="iklan">

            <img width="228" height="190.33" src="\wp-content\themes\no-hoax-news\img\banner_two.webp" alt="iklan" title="iklan">

            <img width="228" height="190.33" src="\wp-content\themes\no-hoax-news\img\ads_3.webp" alt="iklan" title="iklan">


        </div>
    </div>
</section>



<?php
}