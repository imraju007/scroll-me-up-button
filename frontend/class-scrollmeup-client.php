<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'ScrollMeUpClient' ) ) {
	class ScrollMeUpClient {
		public $settings;

		public $data_settings;

		public function __construct() {
			$this->settings = new ScrollMeUpSettings( $this );
			new ScrollMeUpClientAjax( $this );

			$this->data_settings = $this->settings->get_all_scrollmeup_settings();


			add_action( 'wp_enqueue_scripts', [ $this, 'scrollmeup_client_enqueue' ] );
			add_action( 'wp_footer', [ $this, 'scrollmeup_client_script' ] );
		}

		function scrollmeup_client_enqueue() {
			wp_enqueue_style( 'scrollmeup-client-main', SCROLLMEUP_CSS_DIR . 'client_main.css', [], SCROLLMEUP_VERSION );
			wp_enqueue_script( 'scrollmeup-client-main', SCROLLMEUP_JS_DIR . 'client_main.js', [], SCROLLMEUP_VERSION );

		}

		function scrollmeup_client_script() {
			include_once SCROLLMEUP_PATH . "frontend/templates/client_script.php";
		}
	}
}

new ScrollMeUpClient();