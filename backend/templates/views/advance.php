<div class="scrollmeup_section_header">
    <h3>Advanced Customization</h3>
    <p>Customize the Selected Switch Design in Your Way</p>
</div>
<div class="scrollmeup_settings_with_switch_preview">

    <div class="scrollmeup_preview_section_block">

        <div class="scrollmeup_switch_customize_container">
            <div class="scrollmeup_input_select_setting scrollmeup_switch_width_height">
                <div class="scrollmeup_input_select_setting_details">
                    <h4>Switch Width</h4>
                    <p>Set the width of the Floating Switch in pixel. Height will be auto maintained.</p>
                </div>
                <input type="number" data-default="60" value="<?php echo esc_attr($settings["scrollmeup_switch_width_height"]) ?>">
            </div>
            <div class="scrollmeup_section_block_separator"></div>
            <div class="scrollmeup_input_select_setting scrollmeup_switch_border_radius">
                <div class="scrollmeup_input_select_setting_details">
                    <h4>Border Radius</h4>
                    <p>Set the border radius of the Switch in pixel.</p>
                </div>
                <input type="number" data-default="7" value="<?php echo esc_attr($settings["scrollmeup_switch_border_radius"]) ?>">
            </div>
            <div class="scrollmeup_section_block_separator"></div>
            <div class="scrollmeup_input_select_setting scrollmeup_switch_icon_width">
                <div class="scrollmeup_input_select_setting_details">
                    <h4>Icon Width</h4>
                    <p>Set the width of the Switch Icon in pixel. Height will be auto maintained.</p>
                </div>
                <input type="number" data-default="30" value="<?php echo esc_attr($settings["scrollmeup_switch_icon_width"]) ?>">
            </div>
            <div class="scrollmeup_section_block_separator"></div>
            <div class="scrollmeup_input_select_setting scrollmeup_switch_bg">
                <div class="scrollmeup_input_select_setting_details">
                    <h4>Switch Background</h4>
                    <p>Set the background color of the Switch.</p>
                </div>
                <input type="color" data-default="#121116" value="<?php echo esc_attr($settings["scrollmeup_switch_bg"]) ?>">
            </div>
            <div class="scrollmeup_section_block_separator"></div>
            <div class="scrollmeup_input_select_setting scrollmeup_switch_icon_color">
                <div class="scrollmeup_input_select_setting_details">
                    <h4>Switch Icon Color</h4>
                    <p>Set the color of the Floating Switch Icon.</p>
                </div>
                <input type="color" data-default="#ffffff" value="<?php echo esc_attr($settings["scrollmeup_switch_icon_color"]) ?>">
            </div>
        </div>

    </div>

    <div class="scrollmeup_switch_preview_container">
        <div class="scrollmeup_switch_preview">
            <div class="scrollmeup_switch scrollmeup_switch_apple">
                <span class="scrollmeup_switch_icon"></span>
            </div>
        </div>
    </div>


</div>