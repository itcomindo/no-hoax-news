<?php


function featured_post_one()
{
    $home_blog_posts = [
        "post_type" => "post",
        "posts_per_page" => 5,
        "ignore_sticky_posts" => 1,
    ];?>

<?php
$query = new WP_Query($home_blog_posts);?>

<section id="pr_fp_one" class="section">

    <div class="fp_content_grid">


        <?php while ($query->have_posts()):
        $query->the_post();
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $output .= '<span class="cat_rep_home"><a class="' . esc_html($category->name) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a title="' . esc_html($category->name) . '"></span>' . $separator;
            }
        }
        ?>

        <!-- ITEM Start -->
        <div class="item_fp_one">
            <?php this_is_ads_in_loop(); ?>
            <!-- TOP -->
            <div class="wr_fi_in_fp_one">

                <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
                    <img width="83" height="55.27" alt="<?php the_title();?>" title="<?php the_title();?>"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
                </a>
                <span class="cat_in_fp_one"><?php echo trim($output, $separator); ?></span>
            </div>

            <!-- Bottom -->
            <div class="wr_head_in_fp_one">

                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
                </a>

                <span class="post_meta_in_fp_one">
                    <span>By:<?php the_author();?></span>
                    <span><i class='bx bx-time-five'></i> <?php echo get_the_date(); ?></span>
                </span>

                <span class="excerpt_in_fp_one">
                    <?php the_excerpt();?>
                </span>

                <button>Baca Berita</button>
            </div>
        </div>
        <!-- ITEM END -->


        <?php
endwhile;
    wp_reset_query();?>
    </div>
</section>
<?php
}


// Featured Post Category Bisnis


function category_bisnis_featured_post()
{
    $home_blog_posts = [
        "post_type" => "post",
        "posts_per_page" => 5,
        "category_name" => "bisnis",
        "ignore_sticky_posts" => 1,
    ]; ?>

<?php    
    $query = new WP_Query($home_blog_posts); ?>

<section id="pr_fp_one" class="section">

    <div class="fp_content_grid">


        <?php while ($query->have_posts()):
        $query->the_post();
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach( $categories as $category ) {
                    $output .= '<span class="cat_rep_home"><a class="' . esc_html( $category->name ) . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></span>' . $separator;
                }
            }
            ?>

        <!-- ITEM Start -->
        <div class="item_fp_one">
            <?php this_is_ads_in_loop();?>

            <!-- TOP -->
            <div class="wr_fi_in_fp_one">

                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <img alt="<?php the_title(); ?>" title="<?php the_title(); ?>"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(),"large"); ?>">
                </a>
                <span class="cat_in_fp_one"><?php echo trim( $output, $separator ); ?></span>
            </div>

            <!-- Bottom -->
            <div class="wr_head_in_fp_one">

                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>

                <span class="post_meta_in_fp_one">
                    <span>By:<?php the_author(); ?></span>
                    <span><i class='bx bx-time-five'></i> <?php echo get_the_date(); ?></span>
                </span>

                <span class="excerpt_in_fp_one">
                    <?php the_excerpt(); ?>
                </span>

                <button>Baca Berita</button>
            </div>
        </div>
        <!-- ITEM END -->


        <?php
    endwhile;
    wp_reset_query();?>
    </div>
</section>
<?php
}



// Featured Post Category Olahraga

function category_olahraga_featured_post()
{
    $home_blog_posts = [
        "post_type" => "post",
        "posts_per_page" => 5,
        "category_name" => "olahraga",
        "ignore_sticky_posts" => 1,
    ];?>

<?php
$query = new WP_Query($home_blog_posts);?>

<section id="pr_fp_one" class="section">

    <div class="fp_content_grid">


        <?php while ($query->have_posts()):
        $query->the_post();
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $output .= '<span class="cat_rep_home"><a class="' . esc_html($category->name) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></span>' . $separator;
            }
        }
        ?>

        <!-- ITEM Start -->
        <div class="item_fp_one">
            <?php this_is_ads_in_loop(); ?>
            <!-- TOP -->
            <div class="wr_fi_in_fp_one">

                <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
                    <img alt="<?php the_title();?>" title="<?php the_title();?>"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
                </a>
                <span class="cat_in_fp_one"><?php echo trim($output, $separator); ?></span>
            </div>

            <!-- Bottom -->
            <div class="wr_head_in_fp_one">

                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
                </a>

                <span class="post_meta_in_fp_one">
                    <span>By:<?php the_author();?></span>
                    <span><i class='bx bx-time-five'></i> <?php echo get_the_date(); ?></span>
                </span>

                <span class="excerpt_in_fp_one">
                    <?php the_excerpt();?>
                </span>

                <button>Baca Berita</button>
            </div>
        </div>
        <!-- ITEM END -->


        <?php
endwhile;
    wp_reset_query();?>
    </div>
</section>
<?php
}



// Featured Post Category Food

function category_food_featured_post()
{
    $home_blog_posts = [
        "post_type" => "post",
        "posts_per_page" => 5,
        "category_name" => "food",
        "ignore_sticky_posts" => 1,
    ];?>

<?php
$query = new WP_Query($home_blog_posts);?>

<section id="pr_fp_one" class="section">

    <div class="fp_content_grid">


        <?php while ($query->have_posts()):
        $query->the_post();
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $output .= '<span class="cat_rep_home"><a class="' . esc_html($category->name) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></span>' . $separator;
            }
        }
        ?>

        <!-- ITEM Start -->
        <div class="item_fp_one">
            <?php this_is_ads_in_loop(); ?>
            <!-- TOP -->
            <div class="wr_fi_in_fp_one">

                <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
                    <img alt="<?php the_title();?>" title="<?php the_title();?>"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
                </a>
                <span class="cat_in_fp_one"><?php echo trim($output, $separator); ?></span>
            </div>

            <!-- Bottom -->
            <div class="wr_head_in_fp_one">

                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
                </a>

                <span class="post_meta_in_fp_one">
                    <span>By:<?php the_author();?></span>
                    <span><i class='bx bx-time-five'></i> <?php echo get_the_date(); ?></span>
                </span>

                <span class="excerpt_in_fp_one">
                    <?php the_excerpt();?>
                </span>

                <button>Baca Berita</button>
            </div>
        </div>
        <!-- ITEM END -->


        <?php
endwhile;
    wp_reset_query();?>
    </div>
</section>
<?php
}



// Featured Post Category Hobby

function category_hobby_featured_post()
{
    $home_blog_posts = [
        "post_type" => "post",
        "posts_per_page" => 5,
        "category_name" => "hobby",
        "ignore_sticky_posts" => 1,
    ];?>

<?php
$query = new WP_Query($home_blog_posts);?>

<section id="pr_fp_one" class="section">

    <div class="fp_content_grid">


        <?php while ($query->have_posts()):
        $query->the_post();
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $output .= '<span class="cat_rep_home"><a class="' . esc_html($category->name) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></span>' . $separator;
            }
        }
        ?>

        <!-- ITEM Start -->
        <div class="item_fp_one">
            <?php this_is_ads_in_loop(); ?>
            <!-- TOP -->
            <div class="wr_fi_in_fp_one">

                <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
                    <img alt="<?php the_title();?>" title="<?php the_title();?>"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
                </a>
                <span class="cat_in_fp_one"><?php echo trim($output, $separator); ?></span>
            </div>

            <!-- Bottom -->
            <div class="wr_head_in_fp_one">

                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
                </a>

                <span class="post_meta_in_fp_one">
                    <span>By:<?php the_author();?></span>
                    <span><i class='bx bx-time-five'></i> <?php echo get_the_date(); ?></span>
                </span>

                <span class="excerpt_in_fp_one">
                    <?php the_excerpt();?>
                </span>

                <button>Baca Berita</button>
            </div>
        </div>
        <!-- ITEM END -->


        <?php
endwhile;
    wp_reset_query();?>





    </div>
</section>
<?php
}