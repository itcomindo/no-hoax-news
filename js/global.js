document.addEventListener(
  'DOMContentLoaded',
  function () {
    jQuery(document).ready(function () {
      // search form header
      jQuery('#toggle_search_in_header').click(function () {
        jQuery('#searchform_in_header').toggleClass(
          'searchform_in_header_is_not_active searchform_in_header_is_active',
        )
      })

      // Floating Ads Left

      var containerWidth = jQuery('.content').outerWidth()
      var elementWidth = jQuery('.floating_ads_left').outerWidth()
      var containerOffsetLeft = jQuery('.content').offset().left
      var containerOffsetRight =
        containerOffsetLeft + containerWidth - elementWidth + elementWidth
      jQuery('.floating_ads_left').css('right', containerOffsetRight)

      // Floating Ads right

      // var containerWidth = jQuery(".content").outerWidth();
      // var fladsright = jQuery('.floating_ads_right').outerWidth()
      // var containerOffsetLeft = jQuery('.content').offset().left
      // var containerOffsetRight =
      //   containerOffsetLeft + containerWidth - fladsright + fladsright
      // jQuery('.floating_ads_right').css('left', containerOffsetRight)

      // Sroll Up Floatin Ads

      //   Header
      let header = jQuery('.floating_ads')
      jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop()

        if (scroll >= 200) {
          header.removeClass('xxx').addClass('when_scroll_to_top')
        } else {
          header.removeClass('when_scroll_to_top').addClass('xxx')
        }
      })

      // Flickity Post Slider

      var elem = document.querySelector('.main-carousel')
      var flkty = new Flickity(elem, {
        // options
        cellAlign: 'left',
        contain: true,
      })

      // element argument can be a selector string
      //   for an individual element
      var flkty = new Flickity('#wr_featured_post', {
        // options
        wrapAround: true,
        pageDots: false,
        prevNextButtons: false,
      })

      // flkty.select( index, isWrapped, isInstant )

      var buttonGroup = document.querySelector(
        '.list_trigger_feature_stories_group',
      )
      var buttons = buttonGroup.querySelectorAll(
        '.list_trigger_feature_stories',
      )
      buttons = fizzyUIUtils.makeArray(buttons)

      buttonGroup.addEventListener('click', function (event) {
        // filter for button clicks
        if (!matchesSelector(event.target, '.list_trigger_feature_stories')) {
          return
        }
        var index = buttons.indexOf(event.target)
        flkty.select(index)
      })
    })
  },
  false,
)
