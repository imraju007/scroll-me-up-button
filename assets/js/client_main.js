jQuery(document).ready(function($) {
    var scrollMeUpBtn = jQuery('#scroll-me-up-button');
    scrollMeUpBtn.hide();
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 80) {
            scrollMeUpBtn.fadeIn();
        } else {
            scrollMeUpBtn.fadeOut();
        }
    });

    scrollMeUpBtn.click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 'slow');
        return false;
    });

});