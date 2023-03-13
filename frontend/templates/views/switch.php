<style>
    :root{
        --scroll-me-up-btn-bg-color: <?php echo esc_attr($this->data_settings["scrollmeup_switch_bg"]); ?>;
        --scroll-me-up-btn-width: <?php echo esc_attr($this->data_settings["scrollmeup_switch_width_height"]); ?>px;
        --scroll-me-up-btn-height: <?php echo esc_attr($this->data_settings["scrollmeup_switch_width_height"]); ?>px;
        --scroll-me-up-btn-border-radius: <?php echo esc_attr($this->data_settings["scrollmeup_switch_border_radius"]); ?>%;
        --scroll-me-up-btn-margin-top: <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_top"]); ?>px;
        --scroll-me-up-btn-margin-bottom: <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_bottom"]); ?>px;
        --scroll-me-up-btn-margin-left: <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_left"]); ?>px;
        --scroll-me-up-btn-margin-right: <?php echo esc_attr($this->data_settings["scrollmeup_switch_margin_right"]); ?>px;
        --scroll-me-up-icon-color: <?php echo esc_attr($this->data_settings["scrollmeup_switch_icon_color"]); ?>;
        --scroll-me-up-icon-width: <?php echo esc_attr($this->data_settings["scrollmeup_switch_icon_width"]); ?>px;
        --scroll-me-up-icon: url(../img/icons/<?php echo esc_attr($this->data_settings["scrollmeup_icon_design"]); ?>.svg);

    }
</style>

<div id='scroll-me-up-button' class='scroll_me_up_btn scrollmeup_<?php echo esc_attr($this->data_settings["scrollmeup_switch_position"]); ?>'>
    <div class='scroll_me_up_btn_icon'></div>
</div>