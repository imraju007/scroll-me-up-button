
function scrollmeup_save() {
    'use strict';
    jQuery('.scrollmeup_body_header_save_btn').text('SAVING..').prop('disabled', true);

    var post_data = {
        'action': 'scrollmeup_update_settings',

        /* Enable/Disable */
        'scrollmeup_enable_switch':         jQuery(".scrollmeup_enable_switch input[type='checkbox']:checked").length > 0 ? "1" : "0",

        /* Icon */
        'scrollmeup_icon_design':           jQuery(".scrollmeup_icon_design").attr("data-switch_id"),

        /* Text */
        'scrollmeup_text_switch':           jQuery(".scrollmeup_text_switch input[type='checkbox']:checked").length > 0 ? "1" : "0",
        'scrollmeup_switch_text':           jQuery(".scrollmeup_switch_text input[type='text']").val(),
        'scrollmeup_text_font_size':        jQuery(".scrollmeup_text_font_size input[type='number']").val(),
        'scrollmeup_text_font_weight':      jQuery(".scrollmeup_text_font_weight input[type='number']").val(),
        'scrollmeup_text_font_color':       jQuery(".scrollmeup_text_font_color input[type='color']").val(),
        'scrollmeup_text_vertical':         jQuery(".scrollmeup_text_vertical input[type='checkbox']:checked").length > 0 ? "1" : "0",
        'scrollmeup_text_margin_top':       jQuery(".scrollmeup_text_margin_top input[type='number']").val(),
        'scrollmeup_text_margin_bottom':    jQuery(".scrollmeup_text_margin_bottom input[type='number']").val(),

        /* Position */
        'scrollmeup_switch_position':       jQuery(".scrollmeup_switch_position select").val(),
        'scrollmeup_switch_margin_top':     jQuery(".scrollmeup_switch_margin_top input").val(),
        'scrollmeup_switch_margin_bottom':  jQuery(".scrollmeup_switch_margin_bottom input").val(),
        'scrollmeup_switch_margin_left':    jQuery(".scrollmeup_switch_margin_left input").val(),
        'scrollmeup_switch_margin_right':   jQuery(".scrollmeup_switch_margin_right input").val(),
        'scrollmeup_switch_padding_x':      jQuery(".scrollmeup_switch_padding_x input").val(),
        'scrollmeup_switch_padding_y':      jQuery(".scrollmeup_switch_padding_y input").val(),

        /* Advance */
        'scrollmeup_switch_width_height':   jQuery(".scrollmeup_switch_width_height input").val(),
        'scrollmeup_switch_border_radius':  jQuery(".scrollmeup_switch_border_radius input").val(),
        'scrollmeup_switch_icon_width':     jQuery(".scrollmeup_switch_icon_width input").val(),
        'scrollmeup_switch_bg':             jQuery(".scrollmeup_switch_bg input").val(),
        'scrollmeup_switch_icon_color':     jQuery(".scrollmeup_switch_icon_color input").val(),

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

jQuery(document).ready(function($) {
    $(".scrollmeup_switch_item").on('click ', function(){
        if(jQuery(this).prev().prop('nodeName')){
            console.log(jQuery(this).prev().prop('nodeName'))
        }else{
            console.log(jQuery(this).attr('type'))
        }

        jQuery(".scrollmeup_switch_items .scrollmeup_switch_item").removeClass("active");
        jQuery(this).addClass("active");
        process_preview_image(this, jQuery(this).attr('data-switch_id'))
    });

    $(".scrollmeup_body select").on('change', function(event){
        if(jQuery(this).prev().prop('nodeName')){
            console.log(jQuery(this).prev().prop('nodeName'))
        }else{
            console.log(jQuery(this).attr('type'))
        }
        if('scrollmeup_switch_position' === event.target.parentNode.classList[1]){
            var position = event.target.value;
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
        process_preview_select(event.target.parentNode.classList[1], event.target.value);
    });
    // $('.scrollmeup_body :checkbox').on('change', function() {
    //     if(jQuery(this).prev().prop('nodeName')){
    //         console.log(jQuery(this).prev().prop('nodeName'))
    //     }else{
    //         console.log(jQuery(this).attr('type'))
    //     }
    //     if('scrollmeup_text_switch' === this.parentNode.parentNode.classList[1]){
    //         if (this.checked) {
    //             jQuery(".scrollmeup_text_settings_sections").removeClass("deactive");
    //             jQuery(".scrollmeup_switch_preview_text").css('display', 'block');
    //         } else {
    //             jQuery(".scrollmeup_text_settings_sections").addClass("deactive");
    //             jQuery(".scrollmeup_switch_preview_text").css('display', 'none');
    //         }
    //     }
    //     process_preview_checkbox(this.parentNode.parentNode.classList[1], this.checked);
    // });
    $(".scrollmeup_body input").on('input', function(event) {
        if(jQuery(this).prev().prop('nodeName')){
            console.log(jQuery(this).prev().prop('nodeName'))
        }else{
            console.log(jQuery(this).attr('type'))
        }
        if('checkbox' === jQuery(this).attr('type')){
            if('scrollmeup_text_switch' === this.parentNode.parentNode.classList[1]){
                if (this.checked) {
                    jQuery(".scrollmeup_text_settings_sections").removeClass("deactive");
                    jQuery(".scrollmeup_switch_preview_text").css('display', 'block');
                } else {
                    jQuery(".scrollmeup_text_settings_sections").addClass("deactive");
                    jQuery(".scrollmeup_switch_preview_text").css('display', 'none');
                }
            }
            process_preview_checkbox(this.parentNode.parentNode.classList[1], this.checked);
        }
        process_preview_input(event.target.parentNode.classList[1], event.target.value)
    });

    function process_preview_input(field, value) {
        const preview_container = $('.scrollmeup_switch_preview_container');
        const preview_item_container = $('.scrollmeup_switch_preview');
        const preview_icon = $('.scrollmeup_switch_preview_icon');
        const preview_text = $('.scrollmeup_switch_preview_text');
        switch (field) {
            case 'scrollmeup_switch_text':
                preview_text.text(value)
                break;
            case 'scrollmeup_text_font_size':
                preview_text.css('font-size', value + 'px');
                break;
            case 'scrollmeup_text_font_weight':
                preview_text.css('font-weight', value);
                break;
            case 'scrollmeup_text_font_color':
                preview_text.css('color', value);
                break;
            case 'scrollmeup_text_margin_top':
                preview_text.css('margin-top', value + 'px');
                break;
            case 'scrollmeup_text_margin_bottom':
                preview_text.css('margin-bottom', value + 'px');
                break;
            case 'scrollmeup_switch_margin_bottom':
                preview_item_container.css('margin-bottom', value + 'px');
                break;
            case 'scrollmeup_switch_margin_top':
                preview_item_container.css('margin-top', value + 'px');
                break;
            case 'scrollmeup_switch_margin_left':
                preview_item_container.css('margin-left', value + 'px');
                break;
            case 'scrollmeup_switch_margin_right':
                preview_item_container.css('margin-right', value + 'px');
                break;
            case 'scrollmeup_switch_padding_x':
                preview_item_container.css('padding-left', value + 'px');
                preview_item_container.css('padding-right', value + 'px');
                break;
            case 'scrollmeup_switch_padding_y':
                preview_item_container.css('padding-top', value + 'px');
                preview_item_container.css('padding-bottom', value + 'px');
                break;
            case 'scrollmeup_switch_width_height':
                preview_item_container.css('height', value + 'px');
                preview_item_container.css('width', value + 'px');
                break;
            case 'scrollmeup_switch_border_radius':
                preview_item_container.css('border-radius', value + '%');
                break;
            case 'scrollmeup_switch_icon_width':
                preview_icon.css('width', value + 'px');
                break;
            case 'scrollmeup_switch_bg':
                preview_item_container.css('background', value)
                break;
            case 'scrollmeup_switch_icon_color':
                preview_icon.css('background-color', value)
                break;
            default:
                break;
        }
    }
    function process_preview_select(field, selector) {
        const preview_container = $('.scrollmeup_switch_preview_container');
        if('scrollmeup_switch_position' === field){
            switch (selector) {
                case 'bottom_left':
                    preview_container.css('align-items', 'end');
                    preview_container.css('justify-content', 'start');
                    break;
                case 'bottom_right':
                    preview_container.css('align-items', 'end');
                    preview_container.css('justify-content', 'end');
                    break;
                case 'top_right':
                    preview_container.css('align-items', 'start');
                    preview_container.css('justify-content', 'end');
                    break;
                case 'top_left':
                    preview_container.css('align-items', 'start');
                    preview_container.css('justify-content', 'start');
                    break;
                default:
                    break;
            }
        }

    }
    function process_preview_checkbox(field, selector) {
        const preview_item_container = $('.scrollmeup_switch_preview');
        const preview_text = $('.scrollmeup_switch_preview_text');
        switch (field) {
            case 'scrollmeup_text_vertical':
                if(selector){
                    preview_text.css('transform', 'rotate(90deg)');
                }else{
                    preview_text.css('transform', 'none');
                }
                break;
            case 'scrollmeup_enable_switch':
                if(selector){
                    preview_item_container.css('display', 'flex');
                }else{
                    preview_item_container.css('display', 'none');
                }
                break;
            default:
                break;
        }

    }
    function process_preview_image(field, value) {
        const preview_icon = $('.scrollmeup_switch_preview_icon');
        preview_icon.css("-webkit-mask", "url(" + scrollmeup_data.scrollmeup_img_url + "icons/" + value + ".svg) no-repeat center");
        preview_icon.css("mask", "url(" + scrollmeup_data.scrollmeup_img_url + "icons/" + value + ".svg) no-repeat center");

    }
});



