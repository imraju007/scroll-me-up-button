<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['scrollmeup_enable_switch'])){

        /* Control */
        if(isset($_REQUEST['scrollmeup_enable_switch'])){
            $this->base_admin->settings->updateSettings("scrollmeup_enable_switch", sanitize_text_field($_REQUEST['scrollmeup_enable_switch']));
        }
        if(isset($_REQUEST['scrollmeup_icon_design'])){
            $this->base_admin->settings->updateSettings("scrollmeup_icon_design", sanitize_text_field($_REQUEST['scrollmeup_icon_design']));
        }
        if(isset($_REQUEST['scrollmeup_switch_position'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_position", sanitize_text_field($_REQUEST['scrollmeup_switch_position']));
        }
        if(isset($_REQUEST['scrollmeup_switch_margin_top'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_margin_top", sanitize_text_field($_REQUEST['scrollmeup_switch_margin_top']));
        }
        if(isset($_REQUEST['scrollmeup_switch_margin_bottom'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_margin_bottom", sanitize_text_field($_REQUEST['scrollmeup_switch_margin_bottom']));
        }
        if(isset($_REQUEST['scrollmeup_switch_margin_left'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_margin_left", sanitize_text_field($_REQUEST['scrollmeup_switch_margin_left']));
        }
        if(isset($_REQUEST['scrollmeup_switch_margin_right'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_margin_right", sanitize_text_field($_REQUEST['scrollmeup_switch_margin_right']));
        }
        if(isset($_REQUEST['scrollmeup_switch_width_height'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_width_height", sanitize_text_field($_REQUEST['scrollmeup_switch_width_height']));
        }
        if(isset($_REQUEST['scrollmeup_switch_border_radius'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_border_radius", sanitize_text_field($_REQUEST['scrollmeup_switch_border_radius']));
        }
        if(isset($_REQUEST['scrollmeup_switch_icon_width'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_icon_width", sanitize_text_field($_REQUEST['scrollmeup_switch_icon_width']));
        }
        if(isset($_REQUEST['scrollmeup_switch_bg'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_bg", sanitize_text_field($_REQUEST['scrollmeup_switch_bg']));
        }
        if(isset($_REQUEST['scrollmeup_switch_icon_color'])){
            $this->base_admin->settings->updateSettings("scrollmeup_switch_icon_color", sanitize_text_field($_REQUEST['scrollmeup_switch_icon_color']));
        }



        $result = array("status" => "true");

    }else{
        $result = array("status" => 'false1');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);