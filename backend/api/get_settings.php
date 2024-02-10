<?php

$result = [];

/* Check if user has admin capabilities */
if ( current_user_can( 'manage_options' ) ) {
	$result = ["status" => "true", "data" => $this->base_admin->settings->get_all_scrollmeup_settings()];
}

echo json_encode( $result, JSON_UNESCAPED_UNICODE );