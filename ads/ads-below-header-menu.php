<?php

function this_is_ads_below_header_menu() {?>

<section id="pr_ads_below_header_menu" class="section">
    <div class="content">
        <div class="ads_container">
            <div class="namecheap">
            <h3>Namecheap Promo & Coupon Codes</h3>
            <span>Get Online With Namecheap And Save Up To 98% On Domains, Hosting & SSL</span>
            <button>Shop Now</button>
            </div>
        </div>
    </div>
</section>



<?php
}

function this_is_css_namecheap() {?>
<style>
    .ads_container {
        width:100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #f5f5f5;
        border:1px solid rgba(0,0,0,0.1);
        padding: 16px;
    }
    .namecheap {
        width: 80%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        row-gap: 16px;
        background-color: white;
        padding:32px 16px;
    }
    .namecheap h3 {
        font-size: 28px;
        font-weight: 400;
    }
    .namecheap span {
        margin-top: 4px;
        margin-bottom:4px;
        line-height: 1px;
    }
    .namecheap button {
        background-color: #333;
        color: white;
        border: 1px solid #333;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        margin-top: 8px;
        margin-bottom:8px;
        padding: 8px 26px;
        border-radius: 3px;
    }
</style>
<?php
}



add_action( 'wp_head', 'this_is_css_namecheap', 10 );