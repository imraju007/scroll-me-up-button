<div class="scrollmeup_section_header">
    <h3>Icon Design</h3>
    <p>Choose Default Switch Icon</p>
</div>

<div class="scrollmeup_settings_with_switch_preview">
    <div class="scrollmeup_preview_section_block">
        <div class="scrollmeup_switch_items scrollmeup_icon_design scrollmeup_ignore" data-switch_id="<?php echo esc_attr($settings["scrollmeup_icon_design"]) ?>">
            <?php
            $number_of_image = 17;
            for($i = 1; $i <= $number_of_image ; $i++ ){
                ?>
                <div class="scrollmeup_switch_item  <?php echo esc_attr($settings["scrollmeup_icon_design"] == "icon_".$i ? "active" : "") ?>" data-switch_id="<?php echo esc_attr('icon_'.$i); ?>">
                    <img width="55px" src="<?php echo esc_url(SCROLLMEUP_IMG_DIR . "icons/icon_".$i.".svg") ?>">
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <div class="scrollmeup_switch_preview_container">
        <div class="scrollmeup_switch_preview">
            <div class="scrollmeup_switch_preview_icon" style="-webkit-mask: url(<?php echo SCROLLMEUP_IMG_DIR.'icons/'.esc_attr($settings["scrollmeup_icon_design"]); ?>.svg) no-repeat center;mask: url(<?php echo SCROLLMEUP_IMG_DIR.'icons/'.esc_attr($settings["scrollmeup_icon_design"]); ?>.svg) no-repeat center;"></div>
            <span class="scrollmeup_switch_preview_text" style="<?php echo ($settings["scrollmeup_text_switch"] == "1")?'': 'display:none;'; ?>"><?php echo esc_attr($settings["scrollmeup_switch_text"]); ?></span>
        </div>
    </div>

</div>