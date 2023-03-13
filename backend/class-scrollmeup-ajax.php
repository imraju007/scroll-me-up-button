<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ScrollMeUpAdminAjax')) {
    class ScrollMeUpAdminAjax
    {

        public $base_admin;

        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
            add_action( 'wp_ajax_scrollmeup_update_settings', array($this, 'scrollmeup_update_settings') );
        }

        public function scrollmeup_update_settings() {
            include_once SCROLLMEUP_PATH . "backend/api/update_settings.php";
            wp_die();
        }

    }
}
