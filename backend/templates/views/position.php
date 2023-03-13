<div class="scrollmeup_section_header">
    <h3>Position Customization</h3>
    <p>Customize the Switch Position for perfect placement</p>
</div>
<div class="scrollmeup_section_block">
    <div class="scrollmeup_input_select_setting scrollmeup_switch_position">
        <div class="scrollmeup_input_select_setting_details">
            <h4>Switch Position</h4>
            <p>Choose to screen position where the Switch should be displayed.</p>
        </div>
        <select onchange="scrollmeup_switch_position_change(this)">
            <option <?php echo esc_attr($settings["scrollmeup_switch_position"] == "top_right" ? "selected" : "") ?> value="top_right">Top Right</option>
            <option <?php echo esc_attr($settings["scrollmeup_switch_position"] == "top_left" ? "selected" : "") ?> value="top_left">Top Left</option>
            <option <?php echo esc_attr($settings["scrollmeup_switch_position"] == "bottom_right" ? "selected" : "") ?> value="bottom_right">Bottom Right</option>
            <option <?php echo esc_attr($settings["scrollmeup_switch_position"] == "bottom_left" ? "selected" : "") ?> value="bottom_left">Bottom Left</option>
        </select>
    </div>
    <div class="scrollmeup_section_block_separator" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "top") !== false ? "" : "display: none;") ?>"></div>
    <div class="scrollmeup_input_select_setting scrollmeup_switch_margin_top" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "top") !== false ? "" : "display: none;") ?>">
        <div class="scrollmeup_input_select_setting_details">
            <h4>Margin from Top</h4>
            <p>Customize default margin from the top of the Switch.</p>
        </div>
        <input type="number" value="<?php echo esc_attr($settings["scrollmeup_switch_margin_top"]) ?>">
    </div>
    <div class="scrollmeup_section_block_separator" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "bottom") !== false ? "" : "display: none;") ?>"></div>
    <div class="scrollmeup_input_select_setting scrollmeup_switch_margin_bottom" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "bottom") !== false ? "" : "display: none;") ?>">
        <div class="scrollmeup_input_select_setting_details">
            <h4>Margin from Bottom</h4>
            <p>Customize default margin from the bottom of the Switch.</p>
        </div>
        <input type="number" value="<?php echo esc_attr($settings["scrollmeup_switch_margin_bottom"]) ?>">
    </div>
    <div class="scrollmeup_section_block_separator" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "left") !== false ? "" : "display: none;") ?>"></div>
    <div class="scrollmeup_input_select_setting scrollmeup_switch_margin_left" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "left") !== false ? "" : "display: none;") ?>">
        <div class="scrollmeup_input_select_setting_details">
            <h4>Margin from Left</h4>
            <p>Customize default margin from the left of the Switch.</p>
        </div>
        <input type="number" value="<?php echo esc_attr($settings["scrollmeup_switch_margin_left"]) ?>">
    </div>
    <div class="scrollmeup_section_block_separator" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "right") !== false ? "" : "display: none;") ?>"></div>
    <div class="scrollmeup_input_select_setting scrollmeup_switch_margin_right" style="<?php echo esc_attr(strpos($settings["scrollmeup_switch_position"], "right") !== false ? "" : "display: none;") ?>">
        <div class="scrollmeup_input_select_setting_details">
            <h4>Margin from Right</h4>
            <p>Customize default margin from the right of the Switch.</p>
        </div>
        <input type="number" value="<?php echo esc_attr($settings["scrollmeup_switch_margin_right"]) ?>">
    </div>
</div>