<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'ScrollMeUpAdminAjax' ) ) {
	class ScrollMeUpAdminAjax {

		public $base_admin;

		public function __construct( $base_admin ) {
			$this->base_admin = $base_admin;
			add_action( 'wp_ajax_scrollmeup_update_settings', [ $this, 'scrollmeup_update_settings' ] );
			add_action( 'wp_ajax_scrollmeup_settings_data', [ $this, 'scrollmeup_settings_data' ] );
			add_action( 'wp_ajax_scrollmeup_import_template', [ $this, 'scrollmeup_import_template' ] );
		}

		public function scrollmeup_update_settings() {
			include_once SCROLLMEUP_PATH . "backend/api/update_settings.php";
			wp_die();
		}

		public function scrollmeup_settings_data() {
			include_once SCROLLMEUP_PATH . "backend/api/get_settings.php";
			wp_die();
		}

		public function scrollmeup_import_template() {
			include_once SCROLLMEUP_PATH . "backend/api/import_template.php";
			wp_die();
		}

	}
}
