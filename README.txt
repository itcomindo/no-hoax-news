.floating_ads {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    top: calc(3em + 4px);
    height: 600px;
    padding: 3em 4px;
    text-align: center;
    transition: 0.3s linear all;
    z-index: 88888;
}

.floating_ads_left,
.floating_ads_right  {
    width: 168px;
    /* background-color: #f5f5f5; */
    position: fixed;
    align-items: center;
    justify-content: space-between;
}

.floating_ads_left {
    background: linear-gradient(to bottom, rgb(11, 11, 195), darkblue);
    color: white;
}

.floating_ads_right {
    background: linear-gradient(to bottom, rgb(138, 6, 8), darkred);
    color: white;
}


.when_scroll_to_top {
    transform: translateY(-3em) !important;
    transition: 0.3s linear all;
}