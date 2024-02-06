<?php

$result = array();

/* Check if user has admin capabilities */
if ( current_user_can( 'manage_options' ) ) {

	if ( isset( $_REQUEST['scrollmeup_enable_switch'] ) ) {

		/* Control */
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_enable_switch" );

		/* Icon */
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_icon_design" );

		/* Text */
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_switch" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_text" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_font_size" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_font_weight" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_font_color" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_vertical" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_margin_top" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_text_margin_bottom" );

		/* Position */
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_position" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_margin_top" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_margin_bottom" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_margin_left" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_margin_right" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_padding_x" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_padding_y" );

		/* Advanced */
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_width_height" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_border_radius" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_icon_width" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_bg" );
		$this->base_admin->settings->process_request_data( $_REQUEST, "scrollmeup_switch_icon_color" );

		$result = array( "status" => "true" );

	} else {
		$result = array( "status" => 'false1' );
	}
} else {
	$result = array( "status" => 'false' );
}

echo json_encode( $result, JSON_UNESCAPED_UNICODE );