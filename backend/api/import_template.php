<?php
if ( ! defined( 'WPINC' ) ) die;

$result = [];
if ( current_user_can( 'manage_options' ) ) {
	function process_import_data ($import_data){
		$import_data = json_decode($import_data, true);
		$dataSettings = [];
		foreach($import_data as $key => $value)
		{
			$dataSettings[] = array( "key" => $key, "value" => $value );
		}
		return $dataSettings;
	}
	$template_data = [
		"icon_10000000" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_54","scrollmeup_text_switch":"1","scrollmeup_switch_text":"Top","scrollmeup_text_font_size":"16","scrollmeup_text_font_weight":"700","scrollmeup_text_font_color":"#000000","scrollmeup_text_vertical":"0","scrollmeup_text_margin_top":"10","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"45","scrollmeup_switch_icon_color":"#000000","scrollmeup_use_background":"0","scrollmeup_switch_bg":"transparent","scrollmeup_switch_border_radius":"10"}',
		"icon_10000001" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_7","scrollmeup_text_switch":"1","scrollmeup_switch_text":"Top","scrollmeup_text_font_size":"16","scrollmeup_text_font_weight":"700","scrollmeup_text_font_color":"#000000","scrollmeup_text_vertical":"1","scrollmeup_text_margin_top":"15","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"50","scrollmeup_switch_icon_color":"#000000","scrollmeup_use_background":"0","scrollmeup_switch_bg":"transparent","scrollmeup_switch_border_radius":"10"}',
		"icon_10000010" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_19","scrollmeup_text_switch":"0","scrollmeup_switch_text":"Top","scrollmeup_text_font_size":"16","scrollmeup_text_font_weight":"700","scrollmeup_text_font_color":"#000000","scrollmeup_text_vertical":"1","scrollmeup_text_margin_top":"15","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"50","scrollmeup_switch_icon_color":"#ffffff","scrollmeup_use_background":"1","scrollmeup_switch_bg":"#000000","scrollmeup_switch_border_radius":"50"}',
		"icon_10000011" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_52","scrollmeup_text_switch":"1","scrollmeup_switch_text":"Top","scrollmeup_text_font_size":"16","scrollmeup_text_font_weight":"700","scrollmeup_text_font_color":"#000000","scrollmeup_text_vertical":"0","scrollmeup_text_margin_top":"5","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"50","scrollmeup_switch_icon_color":"#000000","scrollmeup_use_background":"0","scrollmeup_switch_bg":"transparent","scrollmeup_switch_border_radius":"10"}',
		"icon_10000100" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_16","scrollmeup_text_switch":"0","scrollmeup_switch_text":"Top","scrollmeup_text_font_size":"16","scrollmeup_text_font_weight":"700","scrollmeup_text_font_color":"#000000","scrollmeup_text_vertical":"1","scrollmeup_text_margin_top":"15","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"50","scrollmeup_switch_icon_color":"#ffffff","scrollmeup_use_background":"1","scrollmeup_switch_bg":"#000000","scrollmeup_switch_border_radius":"8"}',
		"icon_10000101" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_9","scrollmeup_text_switch":"1","scrollmeup_switch_text":"UP","scrollmeup_text_font_size":"14","scrollmeup_text_font_weight":"600","scrollmeup_text_font_color":"#ef5812","scrollmeup_text_vertical":"0","scrollmeup_text_margin_top":"5","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"45","scrollmeup_switch_icon_color":"#ef5812","scrollmeup_use_background":"0","scrollmeup_switch_bg":"transparent","scrollmeup_switch_border_radius":"10"}',
		"icon_10000110" => '{"scrollmeup_enable_switch":"1","scrollmeup_icon_design":"icon_4","scrollmeup_text_switch":"0","scrollmeup_switch_text":"Top","scrollmeup_text_font_size":"16","scrollmeup_text_font_weight":"700","scrollmeup_text_font_color":"#000000","scrollmeup_text_vertical":"1","scrollmeup_text_margin_top":"15","scrollmeup_text_margin_bottom":"10","scrollmeup_switch_position":"bottom_right","scrollmeup_switch_margin_top":"40","scrollmeup_switch_margin_bottom":"40","scrollmeup_switch_margin_left":"40","scrollmeup_switch_margin_right":"40","scrollmeup_switch_padding_x":"10","scrollmeup_switch_padding_y":"10","scrollmeup_switch_width_height":"50","scrollmeup_switch_icon_width":"50","scrollmeup_switch_icon_color":"#f5a201","scrollmeup_use_background":"1","scrollmeup_switch_bg":"#013c58","scrollmeup_switch_border_radius":"8"}',

	];

	$template_name = sanitize_text_field($_REQUEST['template_name']);
	$this->base_admin->settings->template_import(process_import_data($template_data[$template_name]));

	$result        = [ "status" => "true" , "msg" => "Success" ];
}else{
	$result        = [ "status" => "false", "msg" => 'Invalid User' ];
}

echo json_encode( $result, JSON_UNESCAPED_UNICODE );