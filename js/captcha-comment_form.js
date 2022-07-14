document.addEventListener(
  'DOMContentLoaded',
  function () {
    jQuery(function () {
      jQuery('input[name="captcha"]').keyup(function () {
        var jawabanCaptcha = jQuery(this).val();
        if (jawabanCaptcha == 180) {
          jQuery('.captchalabel, .captcha_kosong').addClass('this_is_display_none');
          jQuery('#respond form .form-submit input').addClass('submit_button_is_active');
          jQuery('#cancel_send_comment').addClass('cancel_send_comment_is_on');
          jQuery('#cancel_send_comment').removeClass('cancel_send_comment_is_off');
        } else {
          jQuery('#respond form .form-submit input').removeClass('submit_button_is_active');
          Query('.captchalabel, .captcha_kosong').removeClass('this_is_display_none');
          jQuery('#cancel_send_comment').removeClass('cancel_send_comment_is_on');
          jQuery('#cancel_send_comment').addClass('cancel_send_comment_is_off');

        }
      });

      jQuery("#cancel_send_comment").click(function () {
        jQuery(this).removeClass('cancel_send_comment_is_on');
        jQuery(this).addClass('cancel_send_comment_is_off');
        jQuery('.captchalabel, .captcha_kosong').removeClass('this_is_display_none');
        jQuery('#respond form .form-submit input').removeClass('submit_button_is_active');
        jQuery('input[name="captcha"]').val('');
      });








    })
  },
  false,
)
