<?php
/**
 * Plugin Name:       Scroll Me Up Button
 * Plugin URI:        https://imraju.com/scroll-me-up-button
 * Description:       Easy way to add a scroll to top button in your WordPress Site.
 * Version:           2.0.0
 * Author:            Md. Israfil Mahmud Raju
 * Author URI:        https://imraju.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       scroll-me-up
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

defined( 'SCROLLMEUP_VERSION' ) or define( 'SCROLLMEUP_VERSION', '2.0.0' );
defined( 'SCROLLMEUP_PATH' ) or define( 'SCROLLMEUP_PATH', plugin_dir_path( __FILE__ ) );
defined( 'SCROLLMEUP_IMG_DIR' ) or define( 'SCROLLMEUP_IMG_DIR', plugin_dir_url( __FILE__ ) . 'assets/img/' );
defined( 'SCROLLMEUP_IMG_PATH' ) or define( 'SCROLLMEUP_IMG_PATH', plugin_dir_path( __FILE__ ) . 'assets/img/' );
defined( 'SCROLLMEUP_CSS_DIR' ) or define( 'SCROLLMEUP_CSS_DIR', plugin_dir_url( __FILE__ ) . 'assets/css/' );
defined( 'SCROLLMEUP_JS_DIR' ) or define( 'SCROLLMEUP_JS_DIR', plugin_dir_url( __FILE__ ) . 'assets/js/' );


require_once SCROLLMEUP_PATH . 'includes/ScrollMeUpSettings.php';
require_once SCROLLMEUP_PATH . 'includes/ScrollMeUpFields.php';
require_once SCROLLMEUP_PATH . 'backend/class-scrollmeup-ajax.php';
require_once SCROLLMEUP_PATH . 'backend/class-scrollmeup-admin.php';


require_once SCROLLMEUP_PATH . 'frontend/class-scrollmeup-ajax.php';
require_once SCROLLMEUP_PATH . 'frontend/class-scrollmeup-client.php';
