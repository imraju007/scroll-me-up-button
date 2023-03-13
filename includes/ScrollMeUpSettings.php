<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'ScrollMeUpSettings' ) ) {
    class ScrollMeUpSettings
    {
        public $base_admin;

        function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            $defaultOption = array();
            if (!get_option("scrollmeup_settings")) {
                update_option('scrollmeup_settings', $defaultOption);
            }

        }


        public function updateSettings($key, $value = "<<scrollmeup_empty_value>>")
        {
            $exits = false;
            $exitingValue = Null;
            $dataSettings = get_option("scrollmeup_settings");
            $dataNewSettings = array();
            foreach ($dataSettings as $singleSettings) {
                if (isset($singleSettings['key'])) {
                    if ($singleSettings['key'] == $key) {
                        $exits = true;
                        $exitingValue = $singleSettings['value'];
                        $singleSettings['value'] = ($value != "<<scrollmeup_empty_value>>") ? $value : $singleSettings['value'];
                    }
                }
                if ($value != "<<scrollmeup_empty_value>>") {
                    $dataNewSettings[] = $singleSettings;
                }
            }
            if ($exits && $value != "<<scrollmeup_empty_value>>") {
                update_option('scrollmeup_settings', $dataNewSettings);
            } else if (!$exits && $value != "<<scrollmeup_empty_value>>") {
                $dataNewSettings[] = array("key" => $key, "value" => $value);
                update_option('scrollmeup_settings', $dataNewSettings);
            } else if ($exits && $value == "<<scrollmeup_empty_value>>") {
                return stripslashes($exitingValue);
            }else{
                return Null;
            }
        }

        public function get_all_scrollmeup_settings(){
            $settings = array();

            $settings["scrollmeup_enable_switch"] = $this->updateSettings("scrollmeup_enable_switch");
            $settings["scrollmeup_enable_switch"] = ($settings["scrollmeup_enable_switch"] == Null) ? "1" : $settings["scrollmeup_enable_switch"];

            $settings["scrollmeup_icon_design"] = $this->updateSettings("scrollmeup_icon_design");
            $settings["scrollmeup_icon_design"] = ($settings["scrollmeup_icon_design"] == Null) ? "icon_1" : $settings["scrollmeup_icon_design"];

            $settings["scrollmeup_switch_position"] = $this->updateSettings("scrollmeup_switch_position");
            $settings["scrollmeup_switch_position"] = ($settings["scrollmeup_switch_position"] == Null) ? "bottom_right" : $settings["scrollmeup_switch_position"];

            $settings["scrollmeup_switch_margin_top"] = $this->updateSettings("scrollmeup_switch_margin_top");
            $settings["scrollmeup_switch_margin_top"] = ($settings["scrollmeup_switch_margin_top"] == Null) ? "40" : $settings["scrollmeup_switch_margin_top"];

            $settings["scrollmeup_switch_margin_bottom"] = $this->updateSettings("scrollmeup_switch_margin_bottom");
            $settings["scrollmeup_switch_margin_bottom"] = ($settings["scrollmeup_switch_margin_bottom"] == Null) ? "40" : $settings["scrollmeup_switch_margin_bottom"];

            $settings["scrollmeup_switch_margin_left"] = $this->updateSettings("scrollmeup_switch_margin_left");
            $settings["scrollmeup_switch_margin_left"] = ($settings["scrollmeup_switch_margin_left"] == Null) ? "40" : $settings["scrollmeup_switch_margin_left"];

            $settings["scrollmeup_switch_margin_right"] = $this->updateSettings("scrollmeup_switch_margin_right");
            $settings["scrollmeup_switch_margin_right"] = ($settings["scrollmeup_switch_margin_right"] == Null) ? "40" : $settings["scrollmeup_switch_margin_right"];

            $settings["scrollmeup_switch_width_height"] = $this->updateSettings("scrollmeup_switch_width_height");
            $settings["scrollmeup_switch_width_height"] = ($settings["scrollmeup_switch_width_height"] == Null) ? "64" : $settings["scrollmeup_switch_width_height"];

            $settings["scrollmeup_switch_border_radius"] = $this->updateSettings("scrollmeup_switch_border_radius");
            $settings["scrollmeup_switch_border_radius"] = ($settings["scrollmeup_switch_border_radius"] == Null) ? "50" : $settings["scrollmeup_switch_border_radius"];

            $settings["scrollmeup_switch_icon_width"] = $this->updateSettings("scrollmeup_switch_icon_width");
            $settings["scrollmeup_switch_icon_width"] = ($settings["scrollmeup_switch_icon_width"] == Null) ? "35" : $settings["scrollmeup_switch_icon_width"];

            $settings["scrollmeup_switch_bg"] = $this->updateSettings("scrollmeup_switch_bg");
            $settings["scrollmeup_switch_bg"] = ($settings["scrollmeup_switch_bg"] == Null) ? "#121116" : $settings["scrollmeup_switch_bg"];

            $settings["scrollmeup_switch_icon_color"] = $this->updateSettings("scrollmeup_switch_icon_color");
            $settings["scrollmeup_switch_icon_color"] = ($settings["scrollmeup_switch_icon_color"] == Null) ? "#ffffff" : $settings["scrollmeup_switch_icon_color"];
            return $settings;
        }

    }
}
