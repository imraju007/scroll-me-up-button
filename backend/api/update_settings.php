<?php

$result = [];

/* Check if user has admin capabilities */
if ( current_user_can( 'manage_options' ) ) {

	if ( isset( $_REQUEST['scrollmeup_enable_switch'] ) ) {
		$input_fields = [
			'scrollmeup_enable_switch',
			'scrollmeup_icon_design',
			'scrollmeup_text_switch',
			'scrollmeup_switch_text',
			'scrollmeup_text_font_size',
			'scrollmeup_text_font_weight',
			'scrollmeup_text_font_color',
			'scrollmeup_text_vertical',
			'scrollmeup_text_margin_top',
			'scrollmeup_text_margin_bottom',
			'scrollmeup_switch_position',
			'scrollmeup_switch_margin_top',
			'scrollmeup_switch_margin_bottom',
			'scrollmeup_switch_margin_left',
			'scrollmeup_switch_margin_right',
			'scrollmeup_switch_padding_x',
			'scrollmeup_switch_padding_y',
			'scrollmeup_switch_width_height',
			'scrollmeup_switch_border_radius',
			'scrollmeup_switch_icon_width',
			'scrollmeup_use_background',
			'scrollmeup_switch_bg',
			'scrollmeup_switch_icon_color'
		];
		foreach ( $input_fields as $input_field ) {
			$this->base_admin->settings->process_request_data( $_REQUEST, $input_field );
		}

		$result = [ "status" => "true", "msg" => "Done" ];

	} else {
		$result = [ "status" => 'false', "msg" => "Invalid Input" ];
	}
} else {
	$result = [ "status" => 'false', "msg" => "Invalid User" ];
}

echo json_encode( $result, JSON_UNESCAPED_UNICODE );