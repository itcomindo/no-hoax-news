<?php

function this_is_the_is_blog_index()
{
    $paged = get_query_var("page") ? get_query_var("page") : 1;

    $blog_index = [
        "post_type" => "post",
        "posts_per_page" => 6,
        "ignore_sticky_posts" => 1,
        "paged" => $paged,
    ];

    $query = new WP_Query($blog_index);
    ?>

<section id="pr_nhx_blog_index" class="section">
    <div class="content">


        <!-- Left Column -->
        <div id="blog_index_left" class="col_in_box_one">
            <h3>Popular Postssss</h3>
            <?php this_is_popular_post(); ?>
            <?php dynamic_sidebar( 'widget_in_blog_index' ); ?>
            <h3>Popular Post</h3>
            <p>Post dengan view terbanyak akan masuk sini.</p>
            <h3>Most Commented</h3>
            <p>post dengan komentar paling banyak akan masuk sini</p>
            <h3>Prakiraan Cuaca</h3>
            <p>Embedan prakiraan cuaca kayaknya bagus masuk sini.</p>
        </div>

        <!-- Right Column -->
        <div id="blog_index_right" class="wr_blog_index col_in_box_one">


            <?php
$counter = 1;
    while ($query->have_posts()):

        $query->the_post();
        $ini_tipe_post = carbon_get_post_meta(
            get_the_ID(),
            "pilihan_tipe_post"
        );
        $ini_url_video = carbon_get_post_meta(
            get_the_ID(),
            "video_url"
        );
        $media_gallery = carbon_get_post_meta(
            get_the_ID(),
            "crb_media_gallery"
        );
        ?>

		            <div class="item_blog_index <?php echo $ini_tipe_post; ?>">


		                <span class="tipe_post"><?php echo $ini_tipe_post; ?></span>

		                <a title="<?php the_title_attribute(); ?>"  href="<?php echo the_permalink(); ?>">

		                    <div class="wr_fi_standard_blog_index">

                                <img width="266.88" height="177.73" alt="<?php the_title();?>" title="<?php the_title();?>"
		                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
		                    </div>

		                    <div class="wr_fi_gallery_blog_index">
		                        <?php foreach ($media_gallery as $i => $image) {?>
		                        <span><img title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"  width="667" height="432" src="<?php echo wp_get_attachment_url($image); ?>"></span>
		                        <?php }?>
		                    </div>

                            <div class="wr_fi_video_blog_index">

                                <img width="667.2" height="432" alt="<?php the_title();?>" title="<?php the_title();?>"
		                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
		                    </div>





		                </a>


		                <div class="post_meta_in_blog_index">

		                    <h3><a title="<?php the_title_attribute(); ?>"  href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h3>

		                    <span class="excerpt_in_blog_index"><?php echo strip_tags(
            get_the_excerpt()
        ); ?></span>

		                    <span class="wr_date_and_author_in_blog_index">
		                        <span class="this_is_date">
		                            <i class='bx bx-time-five'></i> <?php echo get_the_date(); ?>
		                        </span>
		                        <span class="this_is_author_in_blog_index">Written by: <?php echo get_the_author(); ?></span>
		                    </span>

		                    <span class="icon_play_in_blog_index"><a title="<?php the_title_attribute(); ?>" href="<?php echo the_permalink(); ?>"><i
		                                class='bx bx-lg bx-play-circle'></i></a></span>

		                    <span class="btn_in_blog_index"><a title="<?php the_title_attribute(); ?>" href="<?php echo the_permalink(); ?>">Baca Berita</a></span>

		                </div>

		            </div>

		            <?php
    if ($counter % 3 == 0) {?>
		            <div class="ads_in_blog_index">
		                <h3>Ini Iklan Juga Ya!</h3>
		                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel aspernatur distinctio
		                    recusandae.</span>
		                <a title="ads" rel="noopener" href="#">Buynow</a>
		            </div>
		            <?php }
        $counter++;

    endwhile;
    ?>

            <?php function nhx_pagination_links($query)
    {
        $currentPage = max(1, get_query_var("paged", 1));
        $pages = range(1, max(1, $query->max_num_pages));
        return array_map(function ($page) use ($currentPage) {
            return (object) [
                "isCurrent" => $page == $currentPage,
                "page" => $page,
                "url" => get_pagenum_link($page),
            ];
        }, $pages);
    }?>

            <ul class="pagination_in_blog_index">
                <?php foreach (nhx_pagination_links($query) as $link): ?>
                <li>
                    <?php if ($link->isCurrent): ?>
                    <strong><?php _e($link->page);?></strong>
                    <?php else: ?>
                    <a class="pagination__next" href="<?php esc_attr_e($link->url);?>">
                        <?php _e($link->page);?>
                    </a>
                    <?php endif;?>
                </li>
                <?php endforeach;?>
            </ul>

        </div>
</section>
<?php
}
