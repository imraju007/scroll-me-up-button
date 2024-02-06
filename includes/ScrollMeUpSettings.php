<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'ScrollMeUpSettings' ) ) {
	class ScrollMeUpSettings {
		public $base_admin;

		function __construct( $base_admin ) {

			$this->base_admin = $base_admin;

			$defaultOption = array();
			if ( ! get_option( "scrollmeup_settings" ) ) {
				update_option( 'scrollmeup_settings', $defaultOption );
			}

		}


		public function updateSettings( $key, $value = "<<scrollmeup_empty_value>>" ) {
			$exits           = false;
			$exitingValue    = null;
			$dataSettings    = get_option( "scrollmeup_settings" );
			$dataNewSettings = array();
			foreach ( $dataSettings as $singleSettings ) {
				if ( isset( $singleSettings['key'] ) ) {
					if ( $singleSettings['key'] == $key ) {
						$exits                   = true;
						$exitingValue            = $singleSettings['value'];
						$singleSettings['value'] = ( $value != "<<scrollmeup_empty_value>>" ) ? $value : $singleSettings['value'];
					}
				}
				if ( $value != "<<scrollmeup_empty_value>>" ) {
					$dataNewSettings[] = $singleSettings;
				}
			}
			if ( $exits && $value != "<<scrollmeup_empty_value>>" ) {
				update_option( 'scrollmeup_settings', $dataNewSettings );
			} else if ( ! $exits && $value != "<<scrollmeup_empty_value>>" ) {
				$dataNewSettings[] = array( "key" => $key, "value" => $value );
				update_option( 'scrollmeup_settings', $dataNewSettings );
			} else if ( $exits && $value == "<<scrollmeup_empty_value>>" ) {
				return stripslashes( $exitingValue );
			} else {
				return null;
			}
		}

		public function process_request_data($request, $field) {
			if(isset($request[$field])){
				$this->updateSettings($field, sanitize_text_field($request[$field]));
			}
		}

		public function get_all_scrollmeup_settings() {
			$settings = array();

			$settings["scrollmeup_enable_switch"] = $this->process_data_from_option( "scrollmeup_enable_switch", "1" );

			/* Icon */
			$settings["scrollmeup_icon_design"] = $this->process_data_from_option( "scrollmeup_icon_design", "icon_1" );

			/* Text */
			$settings["scrollmeup_text_switch"]        = $this->process_data_from_option( "scrollmeup_text_switch", "0" );
			$settings["scrollmeup_switch_text"]        = $this->process_data_from_option( "scrollmeup_switch_text", "Up" );
			$settings["scrollmeup_text_font_size"]     = $this->process_data_from_option( "scrollmeup_text_font_size", "14" );
			$settings["scrollmeup_text_font_weight"]    = $this->process_data_from_option( "scrollmeup_text_font_weight", "500" );
			$settings["scrollmeup_text_font_color"]    = $this->process_data_from_option( "scrollmeup_text_font_color", "#ffffff" );
			$settings["scrollmeup_text_vertical"]      = $this->process_data_from_option( "scrollmeup_text_vertical", "0" );
			$settings["scrollmeup_text_margin_top"]    = $this->process_data_from_option( "scrollmeup_text_margin_top", "0" );
			$settings["scrollmeup_text_margin_bottom"] = $this->process_data_from_option( "scrollmeup_text_margin_bottom", "0" );

			/* Position */
			$settings["scrollmeup_switch_position"]      = $this->process_data_from_option( "scrollmeup_switch_position", "bottom_right" );
			$settings["scrollmeup_switch_margin_top"]    = $this->process_data_from_option( "scrollmeup_switch_margin_top", "40" );
			$settings["scrollmeup_switch_margin_bottom"] = $this->process_data_from_option( "scrollmeup_switch_margin_bottom", "40" );
			$settings["scrollmeup_switch_margin_left"]   = $this->process_data_from_option( "scrollmeup_switch_margin_left", "40" );
			$settings["scrollmeup_switch_margin_right"]  = $this->process_data_from_option( "scrollmeup_switch_margin_right", "40" );
			$settings["scrollmeup_switch_padding_x"]  = $this->process_data_from_option( "scrollmeup_switch_padding_x", "10" );
			$settings["scrollmeup_switch_padding_y"]  = $this->process_data_from_option( "scrollmeup_switch_padding_y", "10" );

			/* Advanced */
			$settings["scrollmeup_switch_width_height"]  = $this->process_data_from_option( "scrollmeup_switch_width_height", "64" );
			$settings["scrollmeup_switch_border_radius"] = $this->process_data_from_option( "scrollmeup_switch_border_radius", "50" );
			$settings["scrollmeup_switch_icon_width"]    = $this->process_data_from_option( "scrollmeup_switch_icon_width", "35" );
			$settings["scrollmeup_switch_bg"]            = $this->process_data_from_option( "scrollmeup_switch_bg", "#121116" );
			$settings["scrollmeup_switch_icon_color"]    = $this->process_data_from_option( "scrollmeup_switch_icon_color", "#ffffff" );

			return $settings;
		}

		public function process_data_from_option( $field, $default_value ) {
			$data = $this->updateSettings( $field );

			return ( $data == null ) ? $default_value : $data;
		}

	}
}
