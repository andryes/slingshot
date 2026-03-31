<?php
/**
 * Holds the Admin Controller Config class instance.
 *
 * @package Admin_Controller
 */

namespace MoEmbedPowerBI\Controller;

use MoEmbedPowerBI\Wrappers\secureInput;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle admin controller functionalities.
 */
class adminController {

	/**
	 * Holds the Admin Controller class instance.
	 *
	 * @var Admin_Controller
	 */
	private static $instance;

	/**
	 * Object instance(Admin Controller) getter method.
	 *
	 * @return Admin_Controller
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function for tab wise controller call.
	 *
	 * @return void
	 */
	public function mo_epbr_admin_controller() {

		// Only process requests that have mo_epbr_tab (admin controller requests)
		// Skip feedback forms and other requests handled by adminObserver
		if ( ! isset( $_POST['mo_epbr_tab'] ) || empty( $_POST['mo_epbr_tab'] ) ) {
			return;
		}

		// Additional safety check - ensure this is a POST request
		if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
			return;
		}

		// Get basic form data using secure wrapper (skip nonce verification as individual controllers handle it).
		$controller_data = secureInput::mo_epbr_get_secure_data(
			'', // No nonce action as individual controllers handle it
			array(
				'mo_epbr_tab' => 'text',
				'option'      => 'text',
			),
			'_wpnonce',
			'POST',
			false // Skip admin check as individual controllers handle it
		);

		if ( empty( $controller_data ) ) {
			return;
		}

		// Validate required fields exist (double-check after secure input processing)
		if ( ! isset( $controller_data['mo_epbr_tab'] ) || ! isset( $controller_data['option'] ) ) {
			return;
		}

		$tab_switch = $controller_data['mo_epbr_tab'];
		$handler    = self::get_controller();
		$option     = $controller_data['option'];
		
		switch ( $tab_switch ) {
			case 'app_config':
				$handler = appConfig::get_controller();
				break;

			case 'pb_app_config':
				$handler = powerBIConfig::get_controller();
				break;

			case 'settings_tab':
				$handler = powerBIsettingsConfig::get_controller();
				break;

			case 'account_setup_tab':
				$handler = accountSetupConfig::get_controller();
				break;

			default:
				// Invalid tab, return silently
				return;
		}
		
		// Check if the method exists before calling it
		if ( method_exists( $handler, 'mo_epbr_save_settings' ) ) {
			$handler->mo_epbr_save_settings( $option );
		}
	}
}
