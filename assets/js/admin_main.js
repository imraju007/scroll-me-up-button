
function scrollmeup_save() {
    'use strict';
    jQuery('.scrollmeup_body_header_save_btn').text('SAVING..').prop('disabled', true);

    var post_data = {
        'action': 'scrollmeup_update_settings',

        /* Enable/Disable */
        'scrollmeup_enable_switch':         jQuery(".scrollmeup_enable_switch input[type='checkbox']:checked").length > 0 ? "1" : "0",

        /* Icon */
        'scrollmeup_icon_design':           jQuery(".scrollmeup_icon_design .active").attr("data-switch_id"),

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
        'scrollmeup_switch_icon_width':     jQuery(".scrollmeup_switch_icon_width input").val(),
        'scrollmeup_switch_icon_color':     jQuery(".scrollmeup_switch_icon_color input").val(),
        'scrollmeup_use_background':        jQuery(".scrollmeup_use_background input[type='checkbox']:checked").length > 0 ? "1" : "0",
        'scrollmeup_switch_bg':             jQuery(".scrollmeup_use_background input[type='checkbox']:checked").length > 0 ? jQuery(".scrollmeup_switch_bg input").val():"transparent",
        'scrollmeup_switch_border_radius':  jQuery(".scrollmeup_switch_border_radius input").val(),

    };

    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status === "true") {
                jQuery('.scrollmeup_body_header_save_btn').text('SAVE CHANGES').prop('disabled', false);
                notification_handler({parent: '.scrollmeup_main', text: obj.msg, time: 3000});
            }
        }
    });
}

function notification_handler(data = {}) {
    jQuery(data.parent).append('<div class="scrollmeup_notification">' + data.text + '</div>');
    jQuery('.scrollmeup_notification').addClass('show');
    setTimeout(function () {
        jQuery('.scrollmeup_notification').removeClass('show');
    }, data.time);
    setTimeout(function () {
        jQuery('.scrollmeup_main .scrollmeup_notification').remove();
    }, data.time*2);

}

jQuery(document).ready(function($) {
    init();

    $(".scrollmeup_menu ul li").on('click ', function(){
        jQuery(".scrollmeup_menu ul li").removeClass("active");
        jQuery(this).addClass('active')
        jQuery(".scrollmeup_menu_content").children().removeClass("active");
        const ref_class = jQuery(this).attr('data-ref');
        jQuery(`.scrollmeup_menu_content .${ref_class}`).addClass("active");
    });

    $(".scrollmeup_sidebar_right_content ul li").on('click ', function(){
        const right_popup_panel = jQuery(".scrollmeup_right_popup_panel");
        right_popup_panel.addClass('active');
        jQuery(`.scrollmeup_right_popup_panel .${jQuery(this).attr('data-ref')}`).addClass('active');
        right_popup_panel.attr('data-ref', jQuery(this).attr('data-ref'))
    });

    $(".scrollmeup_right_popup_panel .close-popup").on('click ', function(){
        const ref_class = jQuery(this).parent().parent().attr('data-ref');
        jQuery(".scrollmeup_right_popup_panel").removeClass("active");
        setTimeout(function () {
            jQuery(`.scrollmeup_right_popup_panel .${ref_class}`).removeClass("active");
        },500)

    });

    $(".scrollmeup_switch_item").on('click ', function(){
        jQuery(".scrollmeup_switch_items .scrollmeup_switch_item").removeClass("active");
        jQuery(this).addClass("active");
        process_preview_image(this, jQuery(this).attr('data-switch_id'))
    });

    $(".scrollmeup_body select").on('change', function(event){
        process_preview_input(event.target.parentNode.classList[1], event.target.value);
    });

    $(".scrollmeup_body input").on('input', function(event) {
        if('checkbox' === jQuery(this).attr('type')){
            process_preview_input(this.parentNode.parentNode.classList[1], this.checked? "1":"0");
        }
        process_preview_input(event.target.parentNode.classList[1], event.target.value)
    });

    $(".scrollmeup_template_items span").on('click ', function(){
        jQuery(this).parent().parent().addClass('processing');
        process_template(jQuery(this).attr('data-tmp_name').replace("http://", ""));
    });

    const properties = {
        'scrollmeup_text_switch': {
            type: 'choice',
            choice : {
                '1': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_switch_preview_text', cssProperty: 'display', helper:'block'},
                        {selector: '.scrollmeup_text_settings_sections', cssProperty: 'display', helper:'block'},
                        {selector: '.scrollmeup_switch_preview', cssProperty: 'height', helper:'fit-content'}
                    ]
                },
                '0': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_switch_preview_text',cssProperty: 'display', helper:'none'},
                        {selector: '.scrollmeup_text_settings_sections', cssProperty: 'display', helper:'none'}
                    ]
                },
            }
        },
        'scrollmeup_switch_text': {
            type: 'text',
            selector: '.scrollmeup_switch_preview_text',
            values : []
        },
        'scrollmeup_text_font_size': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_text', cssProperty: 'font-size', helper: 'px'}]
        },
        'scrollmeup_text_font_weight': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_text',cssProperty: 'font-weight', helper: ''}]
        },
        'scrollmeup_text_font_color': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_text',cssProperty: 'color', helper: ''}]
        },
        'scrollmeup_text_margin_top': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_text', cssProperty: 'margin-top', helper:'px'}]
        },
        'scrollmeup_text_margin_bottom': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_text', cssProperty: 'margin-bottom', helper:'px'}]
        },
        'scrollmeup_switch_margin_top': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'margin-top', helper:'px'}]
        },
        'scrollmeup_switch_margin_left': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'margin-left', helper:'px'}]
        },
        'scrollmeup_switch_margin_bottom': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'margin-bottom', helper:'px'}]
        },
        'scrollmeup_switch_margin_right': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'margin-right', helper:'px'}]
        },
        'scrollmeup_switch_padding_x': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'padding-left', helper:'px'},{selector: '.scrollmeup_switch_preview', cssProperty: 'padding-right', helper:'px'}]
        },
        'scrollmeup_switch_padding_y': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'padding-top', helper:'px'},{selector: '.scrollmeup_switch_preview', cssProperty: 'padding-bottom', helper:'px'}]
        },
        'scrollmeup_switch_width_height': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'width', helper:'px'}]
        },
        'scrollmeup_switch_border_radius': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'border-radius', helper:'%'}]
        },
        'scrollmeup_switch_icon_width': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_icon', cssProperty: 'width', helper:'px'}, {selector: '.scrollmeup_switch_preview_icon', cssProperty: 'height', helper:'px'}]
        },
        'scrollmeup_switch_bg': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview', cssProperty: 'background', helper:''}]
        },
        'scrollmeup_switch_icon_color': {
            type: 'style',
            values : [{selector: '.scrollmeup_switch_preview_icon', cssProperty: 'background-color', helper:''}]
        },
        'scrollmeup_switch_position': {
            type: 'choice',
            choice : {
                'bottom_left': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_preview', cssProperty: 'align-items', helper: 'end'},
                        {selector: '.scrollmeup_preview', cssProperty: 'justify-content', helper: 'start'},
                        {selector: '.scrollmeup_switch_margin_bottom_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_bottom', cssProperty: 'display', helper: 'flex'},
                        {selector: '.scrollmeup_switch_margin_left_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_left', cssProperty: 'display', helper: 'flex'},
                        {selector: '.scrollmeup_switch_margin_top_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_top', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_right_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_right', cssProperty: 'display', helper: 'none'}
                    ]
                },
                'bottom_right': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_preview', cssProperty: 'align-items', helper: 'end'},
                        {selector: '.scrollmeup_preview', cssProperty: 'justify-content', helper: 'end'},
                        {selector: '.scrollmeup_switch_margin_bottom_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_bottom', cssProperty: 'display', helper: 'flex'},
                        {selector: '.scrollmeup_switch_margin_left_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_left', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_top_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_top', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_right_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_right', cssProperty: 'display', helper: 'flex'}
                    ]
                },
                'top_right': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_preview', cssProperty: 'align-items', helper: 'start'},
                        {selector: '.scrollmeup_preview', cssProperty: 'justify-content', helper: 'end'},
                        {selector: '.scrollmeup_switch_margin_bottom_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_bottom', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_left_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_left', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_top_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_top', cssProperty: 'display', helper: 'flex'},
                        {selector: '.scrollmeup_switch_margin_right_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_right', cssProperty: 'display', helper: 'flex'}
                    ]
                },
                'top_left': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_preview', cssProperty: 'align-items', helper: 'start'},
                        {selector: '.scrollmeup_preview', cssProperty: 'justify-content', helper: 'start'},
                        {selector: '.scrollmeup_switch_margin_bottom_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_bottom', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_left_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_left', cssProperty: 'display', helper: 'flex'},
                        {selector: '.scrollmeup_switch_margin_top_separator', cssProperty: 'display', helper: 'block'},
                        {selector: '.scrollmeup_switch_margin_top', cssProperty: 'display', helper: 'flex'},
                        {selector: '.scrollmeup_switch_margin_right_separator', cssProperty: 'display', helper: 'none'},
                        {selector: '.scrollmeup_switch_margin_right', cssProperty: 'display', helper: 'none'}
                    ]
                }
            }
        },
        'scrollmeup_text_vertical': {
            type: 'choice',
            choice : {
                '1': {
                    type : 'style',
                    values: [{selector: '.scrollmeup_switch_preview_text', cssProperty: 'transform', helper:'rotate(90deg)'}]
                },
                '0': {
                    type : 'style',
                    values: [{selector: '.scrollmeup_switch_preview_text', cssProperty: 'transform', helper:'none'}]
                },
            }
        },
        'scrollmeup_enable_switch': {
            type: 'choice',
            choice : {
                '1': {
                    type : 'style',
                    values: [{selector: '.scrollmeup_switch_preview', cssProperty: 'display', helper:'flex'}]
                },
                '0': {
                    type : 'style',
                    values: [{selector: '.scrollmeup_switch_preview', cssProperty: 'display', helper:'none'}]
                },
            }
        },
        'scrollmeup_icon_design': {
            type: 'icon',
            values: []
        },
        'scrollmeup_use_background': {
            type: 'choice',
            choice : {
                '1': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_switch_bg', cssProperty: 'display', helper:'flex'},
                        {selector: '.scrollmeup_switch_border_radius', cssProperty: 'display', helper:'flex'},
                        {selector: '.scrollmeup_switch_bg_separator', cssProperty: 'display', helper:'block'},
                        {selector: '.scrollmeup_switch_border_radius_separator', cssProperty: 'display', helper:'block'},
                        {selector: '.scrollmeup_switch_preview', cssProperty: 'background', helper:jQuery(".scrollmeup_switch_bg input").val()}
                    ]
                },
                '0': {
                    type : 'style',
                    values: [
                        {selector: '.scrollmeup_switch_bg', cssProperty: 'display', helper:'none'},
                        {selector: '.scrollmeup_switch_border_radius', cssProperty: 'display', helper:'none'},
                        {selector: '.scrollmeup_switch_bg_separator', cssProperty: 'display', helper:'none'},
                        {selector: '.scrollmeup_switch_border_radius_separator', cssProperty: 'display', helper:'none'},
                        {selector: '.scrollmeup_switch_preview', cssProperty: 'background', helper:'transparent'}
                    ]
                },
            }
        }

    }
    function process_preview_input(selector, choice_value) {
        if (properties[selector]) {
            if('text' === properties[selector].type){
                $(properties[selector].selector).text(choice_value)
            }
            if('style' === properties[selector].type){
                properties[selector].values.forEach(value => {
                    $(value.selector).css(value.cssProperty, choice_value + value.helper);
                });
            }
            if('choice' === properties[selector].type){
                if('style' === properties[selector].choice[choice_value].type){
                    properties[selector].choice[choice_value].values.forEach(value => {
                        $(value.selector).css(value.cssProperty, value.helper);
                    });
                }

            }
        }
    }

    function process_preview_image(field, value) {
        const preview_icon = $('.scrollmeup_switch_preview_icon');
        preview_icon.css("-webkit-mask", "url(" + scrollmeup_data.scrollmeup_img_url + "icons/" + value + ".svg) no-repeat center");
        preview_icon.css("mask", "url(" + scrollmeup_data.scrollmeup_img_url + "icons/" + value + ".svg) no-repeat center");
    }

    function process_preview_from_saved_data(data = {}){
        if('icon' === properties[data.field].type){
            process_preview_image(data.field, data.value);
        }else{
            process_preview_input(data.field, data.value);
        }
    }

    function init() {
        ajax_request({ parameter: {
                'action': 'scrollmeup_settings_data'
            } }, function(response) {
            if (response.status === "true") {
                jQuery.each(response.data, function(key, value) {
                    process_preview_from_saved_data({field: key, value: value})
                });
            }
        });

    }

    function process_template(tmp_name){
        ajax_request({ parameter: {
                'action': 'scrollmeup_import_template',
                'template_name' : tmp_name
            } }, function(response) {
            if (response.status === "true") {
                setTimeout(function (){
                    notification_handler({parent: '.scrollmeup_main', text: "Imported", time: 3000});
                    location.reload();
                },3000);
            }
        });
    }

    function ajax_request(data = {}, callback) {
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: data.parameter,
            success: function (res) {
                console.log(res);
                const parsedResponse = JSON.parse(res);
                if (typeof callback === 'function') {
                    callback(parsedResponse);
                }
            }
        });
    }

});






