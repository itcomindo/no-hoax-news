<?php
function this_is_single_post()
{
    $featured_image = get_the_post_thumbnail_url();
    global $post;
    $author_id          = $post->post_author;
    $media_gallery      = carbon_get_post_meta(get_the_ID(), 'crb_media_gallery');
    $pilihan_tipe_post  = carbon_get_post_meta(get_the_ID(), 'pilihan_tipe_post');
    $video_source       = carbon_get_post_meta(get_the_ID(), 'video_source');
    $youtube_video_url  = carbon_get_post_meta(get_the_ID(), 'youtube_video_url');
    $uploaded_video_url = carbon_get_post_meta(get_the_ID(), 'uploaded_video_url');

?>


<section id="nhx_pr_single_post" class="section">
    <div class="content">

        <!-- column Left Containing the Post -->
        <div id="col_left" class="col_in_single_post <?php echo $pilihan_tipe_post ?>">
            <h1><?php echo get_the_title(); ?></h1>
            <span class="nhx_popular_post">
                <?php positronx_set_post_views(get_the_ID());?>
            </span>
            <span class="wr_date_and_author_in_in_single_post">
                <?php the_post();?>
                <span class="this_is_date"> <i class='bx bx-time-five'></i> <?php echo meks_time_ago(); ?></span>
                <span class="this_is_author_in_in_single_post"> By: <?php the_author();?> <?php edit_post_link();?>
                </span>
            </span>

            <!-- Post Featured Image Start -->

            <?php

    if ($pilihan_tipe_post == 'standard') {?>

                <div class="wr_fi">
                <img src="<?php echo $featured_image ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
            </div>

            <?php
} elseif ($pilihan_tipe_post == 'gallery') {?>

            <div class="wr_fi"><img src="<?php echo $featured_image ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></div>

            <div class="this_is_post_with_gallery">
                <?php foreach ($media_gallery as $i => $image) {?>
                    <div class="flimag_wr">
                        <a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="nhx_photo_in_gallery" data-title="Photo by: <?php the_author();?>"> <img src="<?php echo wp_get_attachment_url($image); ?>"></a>
                    </div>
                <?php
}?>
                    </div>
                <?php
} else {
        ?>
            <div class="this_wr_is_video_player <?php echo $pilihan_tipe_post ?>">
                <?php

        if ($video_source == 'youtube') {

            $yturl = str_replace("watch?v=", "embed/", $youtube_video_url);
            ?>

                        <iframe width="667" height="400" src="<?php echo $yturl ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
} elseif ($video_source == 'upload') {?>

                        <iframe width="667" height="400" src="<?php echo $uploaded_video_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php
} else {
            // nothing
        }

        ?>
            </div>
            <?php
}
    ?>

            <!-- Post Content Start -->
            <div class="the_content"><?php the_content();?></div>
            <!-- Post Content End -->

            <!-- comment Form -->
            <?php comments_template();?>



        </div>
        <?php // this_is_lightbox();?>
        <div id="col_right" class="col_in_single_post"></div>
    </div>

</section>


<?php
}