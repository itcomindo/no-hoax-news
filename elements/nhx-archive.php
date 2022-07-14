<?php

function this_is_archive()


{
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $currentCategory = single_cat_title("", false);
    $arc = [
        "post_type" => "post",
        "posts_per_page" => 3,
        "ignore_sticky_posts" => 1,
        "category_name" => $currentCategory,
        "paged" => $paged,
    ];

    $query = new WP_Query($arc);
    ?>

    <section id="nhx_archive" class="section">
        <div id="nhx_wr_item_archive" class="content">
            <?php
            $counter = 1;
            while ($query->have_posts()):
                $query->the_post();
            ?>

                <div class="nhx_item_arc">

                    <div class="wr_fi_in_archive">

                    <img alt="<?php the_title();?>" title="<?php the_title();?>"  src="<?php echo get_the_post_thumbnail_url(get_the_ID(),"large"); ?>">

                    </div>
                    <div class="wr_meta_post_in_archve">
                    <h3><a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a></h3>
                    <span class="btn_readmore_in_archive">Read More</span>
                    </div>
                </div>

        

<?php
wp_reset_postdata();
if ($counter % 3 == 0) {?>
		            <div class="ads_in_archive">
		                <h3>Ini Iklan Juga Ya!</h3>
		                <span>Lorem ipsum dolor sit amet consectetur adipi.</span>
		                <a href="#">Buynow</a>
		            </div>
		            <?php }
        $counter++;
endwhile; ?>

<!-- pagination -->



</div>
<div class="nhx_wr_pagination">

<?php next_posts_link(); ?>
<?php previous_posts_link(); ?>

</div>
    </section>
<?php
}