<?php

function this_is_footer()
{
?>
<footer id="nhx_footer" class="section">
    <div class="content">
        <div id="footer_row1">
            <div id="col_footer_left" class="col_in_footer_row1"><i class='bx-md bx bxl-telegram' ></i> Don't Missed Us!</div>
            <div id="col_footer_right" class="col_in_footer_row1">
                <form id="milist" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" class="milist_form" name="" placeholder="Join Our Telegram Channel"
                        value="<?php echo get_search_query(); ?>">
                    <input class="btn_milist" type="submit" value="Joint!">
                </form>
            </div>
        </div>
        <div id="footer_row2">
            <h2>NoHoax<span>News</span></h2>
            <span>Membanggakan Bangsa Dengan Informasi Yang Tidak Pasti</span>
            <span>NoHoaxNews Jln. Kebahagian Semu No.115 Tanjung Balai Kabupaten Sleman, Kota Palembang, Jawa Barat 19854</span>
            <span class="text_footer_phone">(021) 8987-5454 & 0812-3456-7890</span>
            <span class="email_in_footer">kondektur@nohoaxnews.com</span>

            <span class="wr_sosmed_footer"><i class='bx bx-sm bxl-facebook' ></i> <i class='bx-sm bx bxl-twitter' ></i> <i class='bx-sm bx bxl-instagram' ></i> <i class='bx-sm bx bxl-youtube' ></i> <i class='bx-sm bx bxl-whatsapp' ></i> <i class='bx-sm bx bxl-tiktok' ></i> <i class='bx-sm bx bxl-linkedin' ></i> <i class='bx-sm bx bxl-reddit' ></i></span>
        </div>
        <div id="footer_row3">
            <div id="frow3_col1" class="col_in_footer">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt voluptas, dignissimos dolorem
                    accusantium nostrum illo.</p>
            </div>

            <div id="frow3_col2" class="col_in_footer">
                <h3>News Categories</h3>
                <?php wp_nav_menu(array(
        'menu' => 'Footer Menu',
    ));?>
            </div>

            <div id="frow3_col3" class="col_in_footer">
                <h3>Get in Touch!</h3>
                <?php wp_nav_menu(array(
        'menu' => 'Topbar Menu',
    ));?>

            </div>

            <div id="frow3_col4" class="col_in_footer">
                <h3>Belum Jelas!</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt voluptas, dignissimos dolorem
                    accusantium nostrum illo.</p>
            </div>
        </div>
    </div>

<!-- Algo Aktifkan Slide Popup -->

<?php
$option_slide_ads = carbon_get_theme_option('nhx_ask_aktifkan_slide_ads');
if ($option_slide_ads == 'yes') {
    echo this_is_slide_ads_popup();
}
?>

<!-- Algo Aktifkan Lightbox Js -->

<?php
$pilihan_tipe_post = carbon_get_post_meta(get_the_ID(), 'pilihan_tipe_post');
    if (is_single() & $pilihan_tipe_post == 'gallery') {
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
<?php
}
?>






</footer>
<section id="copyright" class="section">
    <div class="content">
        <span>Developed by BudiHaryono.com with no <i class='bx bxs-heart' ></i></span>
    </div>
</section>
<?php
}