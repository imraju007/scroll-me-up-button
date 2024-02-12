<?php

$settings = $this->settings->get_all_scrollmeup_settings();

?>
<div class="scrollmeup_main">

    <div class="scrollmeup_sidebar">
        <div class="scrollmeup_sidebar_label">
            <span>Scroll Me Up</span>
        </div>
        <div class="scrollmeup_save_btn_container">
            <button class="scrollmeup_save_btn scrollmeup_ignore" onclick="scrollmeup_save()">SAVE CHANGES</button>
        </div>
    </div>

    <div class="scrollmeup_container">
        <div class="scrollmeup_body">
            <div class="scrollmeup_menu">
                <ul>
                    <li class="active" data-ref="scrollmeup_general">General</li>
                    <li data-ref="scrollmeup_icons">Icons</li>
                    <li data-ref="scrollmeup_text">Text</li>
                    <li data-ref="scrollmeup_position">Position</li>
                    <li data-ref="scrollmeup_advance">Advance</li>
                </ul>
            </div>
            <div class="scrollmeup_menu_content">
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/general.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/icons.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/text.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/position.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/advance.php"; ?>
            </div>
        </div>
        <div class="scrollmeup_preview">
            <div class="scrollmeup_switch_preview">
                <div class="scrollmeup_switch_preview_icon" style="-webkit-mask: url(<?php echo SCROLLMEUP_IMG_DIR.'icons/'.esc_attr($settings["scrollmeup_icon_design"]); ?>.svg) no-repeat center;mask: url(<?php echo SCROLLMEUP_IMG_DIR.'icons/'.esc_attr($settings["scrollmeup_icon_design"]); ?>.svg) no-repeat center;"></div>
                <span class="scrollmeup_switch_preview_text" style="<?php echo ($settings["scrollmeup_text_switch"] == "1")?'': 'display:none;'; ?>"><?php echo esc_attr($settings["scrollmeup_switch_text"]); ?></span>
            </div>
        </div>
    </div>
</div>
