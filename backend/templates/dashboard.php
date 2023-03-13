<?php

$settings = $this->settings->get_all_scrollmeup_settings();

?>
<div class="scrollmeup_main">

    <div class="scrollmeup_body">

        <div class="scrollmeup_body_header">
            <button class="scrollmeup_body_header_save_btn scrollmeup_ignore" onclick="scrollmeup_save()">SAVE CHANGES</button>
        </div>

        <div class="scrollmeup_section_block">
            <div class="scrollmeup_checkbox_setting scrollmeup_enable_switch">
                <label class="scrollmeup_checkbox_item scrollmeup_ignore"><input type="checkbox" <?php echo esc_attr($settings["scrollmeup_enable_switch"] == "1" ? "checked" : "") ?>><span class="scrollmeup_checkbox_checkmark"></span></label>
                <div class="scrollmeup_checkbox_setting_details">
                    <h4>Enable Switch</h4>
                    <p>Check to show the Switch in your Website's frontend.</p>
                </div>
            </div>
        </div>


        <?php include SCROLLMEUP_PATH . "backend/templates/views/icons.php"; ?>
        <?php include SCROLLMEUP_PATH . "backend/templates/views/position.php"; ?>
        <?php include SCROLLMEUP_PATH . "backend/templates/views/advance.php"; ?>





    </div>

</div>
