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

			$defaultOption = [];
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
					if ( $singleSettings['key'] === $key ) {
						$exits                   = true;
						$exitingValue            = $singleSettings['value'];
						$singleSettings['value'] = ( $value !== "<<scrollmeup_empty_value>>" ) ? $value : $singleSettings['value'];
					}
				}
				if ( $value !== "<<scrollmeup_empty_value>>" ) {
					$dataNewSettings[] = $singleSettings;
				}
			}
			if ( $exits && $value !== "<<scrollmeup_empty_value>>" ) {
				update_option( 'scrollmeup_settings', $dataNewSettings );
			} else if ( ! $exits && $value !== "<<scrollmeup_empty_value>>" ) {
				$dataNewSettings[] = array( "key" => $key, "value" => $value );
				update_option( 'scrollmeup_settings', $dataNewSettings );
			} else if ( $exits && $value === "<<scrollmeup_empty_value>>" ) {
				return stripslashes( $exitingValue );
			} else {
				return null;
			}
		}

		public function process_request_data( $request, $field ) {
			if ( isset( $request[ $field ] ) ) {
				$this->updateSettings( $field, sanitize_text_field( $request[ $field ] ) );
			}
		}

		public function get_all_scrollmeup_settings() {
			$settings = [];

			$this->process_data_from_option( $settings, "scrollmeup_enable_switch", "1" );

			/* Icon */
			$this->process_data_from_option( $settings, "scrollmeup_icon_design", "icon_1" );

			/* Text */
			$this->process_data_from_option( $settings, "scrollmeup_text_switch", "0" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_text", "Up" );
			$this->process_data_from_option( $settings, "scrollmeup_text_font_size", "14" );
			$this->process_data_from_option( $settings, "scrollmeup_text_font_weight", "500" );
			$this->process_data_from_option( $settings, "scrollmeup_text_font_color", "#000000" );
			$this->process_data_from_option( $settings, "scrollmeup_text_vertical", "0" );
			$this->process_data_from_option( $settings, "scrollmeup_text_margin_top", "0" );
			$this->process_data_from_option( $settings, "scrollmeup_text_margin_bottom", "0" );

			/* Position */
			$this->process_data_from_option( $settings, "scrollmeup_switch_position", "bottom_right" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_margin_top", "40" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_margin_bottom", "40" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_margin_left", "40" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_margin_right", "40" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_padding_x", "10" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_padding_y", "10" );

			/* Advanced */
			$this->process_data_from_option( $settings, "scrollmeup_switch_width_height", "64" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_icon_width", "35" );
			$this->process_data_from_option( $settings, "scrollmeup_switch_icon_color", "#000000" );
			$this->process_data_from_option( $settings, "scrollmeup_use_background", "0" );
			if("1" == $this->updateSettings( 'scrollmeup_use_background' )){
				$this->process_data_from_option( $settings, "scrollmeup_switch_bg", "#121116" );
				$this->process_data_from_option( $settings, "scrollmeup_switch_border_radius", "50" );
			}else{
				$this->process_data_from_option( $settings, "scrollmeup_switch_bg", "transparent" );
				$this->process_data_from_option( $settings, "scrollmeup_switch_border_radius", "0" );
			}


			return $settings;
		}

		public function process_data_from_option( &$settings, $field, $default_value ) {
			$data = $this->updateSettings( $field );
			$settings[$field] = ( $data == null ) ? $default_value : $data;
		}

		public function get_all_icons() {
			$result    = [];
			$directory = SCROLLMEUP_IMG_PATH . 'icons/';

			if ( is_dir( $directory ) ) {
				foreach ( scandir( $directory ) as $file ) {
					if ( $file !== '.' && $file !== '..' ) {
						$fullPath = SCROLLMEUP_IMG_DIR . 'icons/' . $file;
						$result[] = [
							'url'                 => $fullPath,
							'name'                => pathinfo( $fullPath, PATHINFO_FILENAME ),
							'name_with_extension' => wp_basename( $fullPath )
						];
					}
				}
			} else {
				echo 'Directory does not exist or is not accessible.';
			}

			return $result;
		}
		public function get_all_templete_icons() {
			$result    = [];
			$directory = SCROLLMEUP_IMG_PATH . 'templates/';

			if ( is_dir( $directory ) ) {
				foreach ( scandir( $directory ) as $file ) {
					if ( $file !== '.' && $file !== '..' ) {
						$fullPath = SCROLLMEUP_IMG_DIR . 'templates/' . $file;
						$result[] = [
							'url'                 => $fullPath,
							'name'                => pathinfo( $fullPath, PATHINFO_FILENAME ),
							'name_with_extension' => wp_basename( $fullPath )
						];
					}
				}
			}

			return $result;
		}

		public function template_import($template_data){
			update_option( 'scrollmeup_settings', $template_data );
		}

	}
}
