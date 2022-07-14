document.addEventListener(
  'DOMContentLoaded',
  function () {
    jQuery('#toggle_close_ads_popup').click(function () {
      //alert('hi');
      jQuery('#ads_popup').toggleClass(
        'ads_popup_is_active ads_popup_is_not_active',
      )

      jQuery('#toggleclose').toggleClass(
        'block_display_block block_display_none',
      )
      jQuery('#toggleopen').toggleClass(
        'block_display_none block_display_block',
      )
    })
  },
  false,
)
