<?php

$settings = $this->settings->get_all_scrollmeup_settings();

?>
<div class="scrollmeup_main">

    <div class="scrollmeup_sidebar">
        <div class="scrollmeup_sidebar_label">
            <span>Scroll Me Up</span>
        </div>
        <div class="scrollmeup_sidebar_right_content">
            <ul>
                <li class="info" data-ref="scrollmeup_info"><img src="<?php echo esc_url(SCROLLMEUP_IMG_DIR).'info.svg' ?>" alt="Info"></li>
            </ul>
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
                    <li data-ref="scrollmeup_advance">Advanced</li>
                </ul>
                <div class="scrollmeup_save_btn_container">
                    <button class="scrollmeup_save_btn scrollmeup_ignore" onclick="scrollmeup_save()">SAVE CHANGES</button>
                </div>
            </div>
            <div class="scrollmeup_menu_content">
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/general.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/icons.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/text.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/position.php"; ?>
	            <?php include SCROLLMEUP_PATH . "backend/templates/views/advance.php"; ?>
            </div>
        </div>
        <div class="scrollmeup_content_right">
            <div class="scrollmeup_preview">
                <label>PREVIEW</label>
                <div class="scrollmeup_switch_preview">
                    <div class="scrollmeup_switch_preview_icon" style="-webkit-mask: url(<?php echo SCROLLMEUP_IMG_DIR.'icons/'.esc_attr($settings["scrollmeup_icon_design"]); ?>.svg) no-repeat center;mask: url(<?php echo SCROLLMEUP_IMG_DIR.'icons/'.esc_attr($settings["scrollmeup_icon_design"]); ?>.svg) no-repeat center;"></div>
                    <span class="scrollmeup_switch_preview_text" style="<?php echo ($settings["scrollmeup_text_switch"] == "1")?'': 'display:none;'; ?>"><?php echo esc_attr($settings["scrollmeup_switch_text"]); ?></span>
                </div>
            </div>
            <div class="scrollmeup_template">
                <div class="scrollmeup_template_header">
                    <h3>Templates</h3>
                    <p></p>
                </div>
                <div class="scrollmeup_template_body">
	                <?php
	                $icons = $this->settings->get_all_templete_icons();
	                if( count($icons) > 0){
		                foreach ($icons as $icon){
			                ?>
                            <div class="scrollmeup_template_items" style="background-image: url(<?php echo esc_url($icon['url']) ?>);">
                                <div></div>
                                <span data-tmp_name="<?php echo esc_url($icon['name']) ?>">Import</span>
                            </div>
			                <?php
		                }
	                }
	                ?>
                </div>
            </div>
        </div>

    </div>

    <div class="scrollmeup_right_popup_panel">
        <div class="scrollmeup_right_popup_header">
            <img class="close-popup" src="<?php echo esc_url(SCROLLMEUP_IMG_DIR).'close.svg' ?>" alt="Info">
        </div>
        <div class="scrollmeup_right_popup_body">
	        <?php include SCROLLMEUP_PATH . "backend/templates/views/info.php"; ?>
        </div>
        <div class="scrollmeup_right_popup_footer">
            <span><a href="https://imraju.com" target="_blank">imraju.com</a></span>
        </div>
    </div>
</div>
