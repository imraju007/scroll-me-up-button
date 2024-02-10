<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'ScrollMeUpAdmin' ) ) {
	class ScrollMeUpAdmin {

		public $settings;
		public $fields;

		public $data_settings;
		public $unique_id;

		public function __construct() {
			$this->settings = new ScrollMeUpSettings( $this );
			$this->fields   = new ScrollMeUpFields();
			new ScrollMeUpAdminAjax( $this );

			$this->data_settings = $this->settings->get_all_scrollmeup_settings();
			$this->unique_id     = rand();

			add_action( "admin_menu", [ $this, 'scrollmeup_admin_menu' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'scrollmeup_admin_enqueue' ] );

		}

		function scrollmeup_admin_menu() {
			$icon_url = SCROLLMEUP_IMG_DIR . "scrollmeup_icon.svg";
			add_menu_page( "ScrollMeUp", "ScrollMeUp", 'manage_options', "scrollmeup-dashboard", array(
				$this,
				'scrollmeup_admin_dashboard'
			), $icon_url, 6 );
			add_submenu_page( "scrollmeup-dashboard", "ScrollMeUp", 'Dashboard', "manage_options", 'scrollmeup-dashboard', array(
				$this,
				'scrollmeup_admin_dashboard'
			) );
		}

		function scrollmeup_admin_enqueue( $page ) {
			if ( $page == "toplevel_page_scrollmeup-dashboard" ) {
				wp_enqueue_style( 'scrollmeup-admin-main', SCROLLMEUP_CSS_DIR . 'admin_main.css', array(), SCROLLMEUP_VERSION );

				wp_enqueue_script( 'scrollmeup-admin-main', SCROLLMEUP_JS_DIR . 'admin_main.js', array( 'jquery' ), SCROLLMEUP_VERSION );
				wp_enqueue_media();
				$smu_data = array( 'scrollmeup_img_url' => SCROLLMEUP_IMG_DIR );
				wp_localize_script( 'scrollmeup-admin-main', 'scrollmeup_data', $smu_data );
			}
		}

		function scrollmeup_admin_dashboard() {
			include_once SCROLLMEUP_PATH . "backend/templates/dashboard.php";
		}
	}
}
if ( is_admin() ) {
	new ScrollMeUpAdmin();
}