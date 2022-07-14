<?php
function kupret()
{
    $home_blog_posts = [
        "post_type" => "post",
        "posts_per_page" => 5,
        "ignore_sticky_posts" => 1,
    ];?>

<?php
$query = new WP_Query($home_blog_posts);?>

<section id="pr_fp_one" class="section"> <!-- section/class/id ganti/hapus/rubah atau sesuaikan dengan themes atau tidak dipakai juga gpp -->

    <div class="content">  <!-- div/class/id ganti/hapus/rubah atau sesuaikan dengan themes atau tidak dipakai juga gpp -->

        <div class="contoh"> <!-- karena pembungkus content itu adalah ini -->


            <?php while ($query->have_posts()):
        $query->the_post();
        ?>

	            <!-- ITEM Start -->
	            <div class="item_kupret">
	                <a href="<?php the_permalink();?>">
	                    <span class="tanggal_posting">
                            <span class="bulan"><?php echo get_the_date('F'); ?></span>
                            <span class="tanggal"><?php echo get_the_date('j'); ?></span></span>
	                    <span class="judul_exc">
	                        <h3><?php the_title();?></h3>
	                        <span class="kupret_exc">
	                            <?php the_excerpt();?>
	                        </span>
	                    </span>
	                </a>


	            </div>
	            <!-- ITEM END -->


	            <?php endwhile;
    wp_reset_query();
}
?>
        </div>
    </div>
</section>