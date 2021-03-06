<?php
function this_is_homepage()
{
    nhx_post_headline();
}
// Theme option for homepage
function this_is_the_post_title() {
	$nhx_post_title_lenght_option = carbon_get_theme_option('nhx_post_title_lenght_option');
	$nhx_post_title_value = carbon_get_theme_option('nhx_post_title_value');
	$post_title_headline_first_col_font_size = carbon_get_theme_option('post_title_headline_first_col_font_size');
	if ($nhx_post_title_lenght_option == 'yes') {?>
	<h3 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: <?php echo $nhx_post_title_value;?>; -webkit-box-orient: vertical;"><?php the_title();?></h3>
	<?php
	} else { ?>
		<h3><?php the_title();?></h3>
	<?php
	}
}


// Post Headline
function nhx_post_headline()
{
    $homeblogposts = [
        "post_type"           => "post",
        "posts_per_page"      => 9,
        "ignore_sticky_posts" => 1,
    ];

    $query = new WP_Query($homeblogposts);?>
    <div id="pr_headline" class="section">
    	<div id="wr_headline" class="content headline">
        <?php
while ($query->have_posts()):
        $query->the_post();?>
	        <div class="item-headline">
			<?php
    $categories = get_the_category();
        $separator  = ' ';
        $output     = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $catbgcolor   = carbon_get_term_meta($category->term_id, 'background_color_for_category');
                $catlinkcolor = carbon_get_term_meta($category->term_id, 'cat_link_color');
                $output .= '<li style="background-color: ' . $catbgcolor . '";>
	                <a style="color:' . $catlinkcolor . '"; href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>' . $separator;
            }
        }
        ?>
				<div class="wr-fi_headline">
					<a href="<?php the_permalink();?>" title="<?php the_title();?>">
						<img width="236" height="157.17" alt="<?php the_title();?>" title="<?php the_title();?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>">
			        </a>
					<!-- Category -->
			        <ul class="catlink_headline"><?php echo trim($output); ?></ul>
			    </div>

			    <div class="wr-meta_headline">
			    	<!-- Title start -->
					<a title="<?php the_title_attribute();?>"  href="<?php the_permalink();?>">
						<?php echo this_is_the_post_title(); ?>
					</a>
					<!-- Title End -->
					<!-- Excerpt -->
			        <span class="wr-excerpt_headline"><?php echo strip_tags(get_the_excerpt()); ?></span>
			        <button class="btn-headline"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >Baca Berita</a></button>
			        <span class="wr-date_headline">
			        	<span><i class='bx bx-time-five'></i><?php echo get_the_date(); ?></span></span>
			    </div>
			</div>

			<?php endwhile;?>
		<?php wp_reset_query();?>
    	</div>
	</div>
<?php
}
