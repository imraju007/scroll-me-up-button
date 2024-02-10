<style>
    :root {
        --scroll-me-up-btn-bg-color:        <?php echo esc_attr($this->data_settings["scrollmeup_switch_bg"]); ?>;
        --scroll-me-up-btn-height:           <?php if($this->data_settings["scrollmeup_text_switch"] == "0"){echo esc_attr($this->data_settings["scrollmeup_switch_width_height"]).'px';}else{ echo esc_attr("fit-content");}  ?>;
        --scroll-me-up-btn-width:          <?php echo esc_attr($this->data_settings["scrollmeup_switch_width_height"]); ?>px;
        --scroll-me-up-btn-border-radius:   <?php echo esc_attr($this->data_settings["scrollmeup_switch_border_radius"]); ?>%;
        --scroll-me-up-btn-margin-top:      <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_top"]); ?>px;
        --scroll-me-up-btn-margin-bottom:   <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_bottom"]); ?>px;
        --scroll-me-up-btn-margin-left:     <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_left"]); ?>px;
        --scroll-me-up-btn-margin-right:    <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_right"]); ?>px;
        --scroll-me-up-btn-padding-x:       <?php echo esc_attr($this->data_settings["scrollmeup_switch_padding_x"]); ?>px;
        --scroll-me-up-btn-padding-y:       <?php echo esc_attr($this->data_settings["scrollmeup_switch_padding_y"]); ?>px;
        --scroll-me-up-icon-color:          <?php echo esc_attr($this->data_settings["scrollmeup_switch_icon_color"]); ?>;
        --scroll-me-up-icon-width:          <?php echo esc_attr($this->data_settings["scrollmeup_switch_icon_width"]); ?>px;
        --scroll-me-up-icon-height:          <?php echo esc_attr($this->data_settings["scrollmeup_switch_icon_width"]); ?>px;
        --scroll-me-up-icon: url(<?php echo esc_attr(SCROLLMEUP_IMG_DIR."icons/".$this->data_settings["scrollmeup_icon_design"]); ?>.svg);
        --scroll-me-up-text-size:           <?php echo esc_attr($this->data_settings["scrollmeup_text_font_size"]); ?>px;
        --scroll-me-up-text-weight:         <?php echo esc_attr($this->data_settings["scrollmeup_text_font_weight"]); ?>;
        --scroll-me-up-text-color:          <?php echo esc_attr($this->data_settings["scrollmeup_text_font_color"]); ?>;
        --scroll-me-up-text-vertical:       <?php echo esc_attr($this->data_settings["scrollmeup_text_vertical"] == 0 ? 'none' : 'rotate(90deg)'); ?>;
        --scroll-me-up-text-margin-top:     <?php echo esc_attr($this->data_settings["scrollmeup_text_margin_top"]); ?>px;
        --scroll-me-up-text-margin-bottom:  <?php echo esc_attr($this->data_settings["scrollmeup_text_margin_bottom"]); ?>px;

    }
</style>

<div id='scroll-me-up-button' class='scroll_me_up_btn scrollmeup_<?php echo esc_attr($this->data_settings["scrollmeup_switch_position"]); ?>'>
    <div class='scroll_me_up_btn_icon'></div>
	<?php if($this->data_settings["scrollmeup_text_switch"] == "1"){ ?>
    <span class="scroll_me_up_btn_text"><?php echo esc_attr($this->data_settings["scrollmeup_switch_text"]); ?></span>
    <?php } ?>
</div>