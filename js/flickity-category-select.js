document.addEventListener('DOMContentLoaded', function () {

    jQuery(function () {

        jQuery('.list_trigger_feature_stories_group li').click(function () {
            jQuery('.list_trigger_feature_stories').removeClass('list_trigger_feature_stories')
            jQuery(this).addClass('list_trigger_feature_stories is_active');
        });

    });


}, false)
