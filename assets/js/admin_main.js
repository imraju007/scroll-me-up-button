function scrollmeup_icon_design_click(view, switch_id){
    'use strict';
    jQuery(".scrollmeup_switch_items .scrollmeup_switch_item").removeClass("active");
    jQuery(view).addClass("active");
    jQuery(view).parent().attr("data-switch_id", switch_id);

}

function scrollmeup_switch_position_change(view){
    'use strict';
    var position = jQuery(view).val();
    if(position === "top_right"){
        jQuery(".scrollmeup_switch_margin_top").show().prev().show()
        jQuery(".scrollmeup_switch_margin_right").show().prev().show()
        jQuery(".scrollmeup_switch_margin_bottom").hide().prev().hide()
        jQuery(".scrollmeup_switch_margin_left").hide().prev().hide()
    }else if(position === "top_left"){
        jQuery(".scrollmeup_switch_margin_top").show().prev().show()
        jQuery(".scrollmeup_switch_margin_left").show().prev().show()
        jQuery(".scrollmeup_switch_margin_bottom").hide().prev().hide()
        jQuery(".scrollmeup_switch_margin_right").hide().prev().hide()
    }else if(position === "bottom_right"){
        jQuery(".scrollmeup_switch_margin_bottom").show().prev().show()
        jQuery(".scrollmeup_switch_margin_right").show().prev().show()
        jQuery(".scrollmeup_switch_margin_top").hide().prev().hide()
        jQuery(".scrollmeup_switch_margin_left").hide().prev().hide()
    }else if(position === "bottom_left"){
        jQuery(".scrollmeup_switch_margin_bottom").show().prev().show()
        jQuery(".scrollmeup_switch_margin_left").show().prev().show()
        jQuery(".scrollmeup_switch_margin_top").hide().prev().hide()
        jQuery(".scrollmeup_switch_margin_right").hide().prev().hide()
    }
    jQuery(".scrollmeup_switch_margin_top input").val("40")
    jQuery(".scrollmeup_switch_margin_right input").val("40")
    jQuery(".scrollmeup_switch_margin_bottom input").val("40")
    jQuery(".scrollmeup_switch_margin_left input").val("40")
}

function scrollmeup_save() {
    'use strict';
    jQuery('.scrollmeup_body_header_save_btn').text('SAVING..').prop('disabled', true);

    var post_data = {
        'action': 'scrollmeup_update_settings',


        /* Enable/Disable */
        'scrollmeup_enable_switch': jQuery(".scrollmeup_enable_switch input[type='checkbox']:checked").length > 0 ? "1" : "0",

        /* Icon */
        'scrollmeup_icon_design': jQuery(".scrollmeup_icon_design").attr("data-switch_id"),

        /* Position */
        'scrollmeup_switch_position': jQuery(".scrollmeup_switch_position select").val(),
        'scrollmeup_switch_margin_top': jQuery(".scrollmeup_switch_margin_top input").val(),
        'scrollmeup_switch_margin_bottom': jQuery(".scrollmeup_switch_margin_bottom input").val(),
        'scrollmeup_switch_margin_left': jQuery(".scrollmeup_switch_margin_left input").val(),
        'scrollmeup_switch_margin_right': jQuery(".scrollmeup_switch_margin_right input").val(),
        /* Advance */
        'scrollmeup_switch_width_height': jQuery(".scrollmeup_switch_width_height input").val(),
        'scrollmeup_switch_border_radius': jQuery(".scrollmeup_switch_border_radius input").val(),
        'scrollmeup_switch_icon_width': jQuery(".scrollmeup_switch_icon_width input").val(),
        'scrollmeup_switch_bg': jQuery(".scrollmeup_switch_bg input").val(),
        'scrollmeup_switch_icon_color': jQuery(".scrollmeup_switch_icon_color input").val(),

    };

    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status === "true") {
                jQuery('.scrollmeup_body_header_save_btn').text('SAVE CHANGES').prop('disabled', false);
            }
        }
    });
}