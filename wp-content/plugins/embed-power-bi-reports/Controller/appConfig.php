<?php
/**
 * Holds the Admin Controller Config class instance.
 *
 * @package Admin_Controller
 */

namespace MoEmbedPowerBI\Controller;

use MoEmbedPowerBI\Wrappers\pluginConstants;
use MoEmbedPowerBI\Wrappers\wpWrapper;
use MoEmbedPowerBI\Wrappers\secureInput;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle app configurations tab functionalities.
 */
class appConfig {

	/**
	 * Holds the App Config class instance.
	 *
	 * @var App_Config
	 */
	private static $instance;

	/**
	 * Object instance(App Config Controller) getter method.
	 *
	 * @return App_Config
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to save the configurations of app config tab and perform other actions.
	 *
	 * @param string $option Stores the option value from the form submitted.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {
		switch ( $option ) {
			case 'mo_epbr_client_config_option':
				$this->mo_epbr_save_client_config();
				break;

			case 'mo_epbr_add_sso_button_wp_login':
				$this->mo_epbr_add_sso_button();
				break;
		}
	}

	/**
	 * Function to check whether the array is empty or null
	 *
	 * @param pointer $input Input pointer to the array.
	 * @param array   $arr Array containing input values.
	 * @return pointer
	 */
	private function mo_epbr_check_for_empty_or_null( &$input, $arr ) {
		// Get secure form data
		$form_fields = array();
		foreach ( $arr as $key ) {
			$form_fields[ $key ] = 'text';
		}

		$form_data = secureInput::mo_epbr_get_secure_data(
			'mo_epbr_client_config_option',
			$form_fields,
			'_wpnonce'
		);

		if ( empty( $form_data ) ) {
			return false;
		}

		foreach ( $arr as $key ) {
			if ( ! isset( $form_data[ $key ] ) || empty( $form_data[ $key ] ) ) {
				return false;
			}
			$input[ $key ] = $form_data[ $key ];
		}
		return $input;
	}

	/**
	 * Function to save the client configuration.
	 *
	 * @return void
	 */
	private function mo_epbr_save_client_config() {
		// Nonce verification is handled by mo_epbr_check_for_empty_or_null()
		$input_arr     = array( 'client_id', 'client_secret', 'redirect_uri', 'tenant_id' );
		$sanitized_arr = array();
		if ( ! $this->mo_epbr_check_for_empty_or_null( $sanitized_arr, $input_arr ) ) {
			wpWrapper::mo_epbr__show_error_notice( esc_html__( 'Input is empty or present in the incorrect format.', 'embed-power-bi-reports' ) );
			return;
		}
		// Get UPN ID from secure form data
		$upn_data                       = secureInput::mo_epbr_get_secure_data(
			'mo_epbr_client_config_option',
			array( 'upn_id' => 'text' ),
			'_wpnonce'
		);
		$sanitized_arr['upn_id']        = $upn_data['upn_id'] ?? '';
		$sanitized_arr['client_secret'] = wpWrapper::mo_epbr_encrypt_data( $sanitized_arr['client_secret'], hash( 'sha256', $sanitized_arr['client_id'] ) );
		wpWrapper::mo_epbr_set_option( pluginConstants::APPLICATION_CONFIG_OPTION, $sanitized_arr );
		wpWrapper::mo_epbr__show_success_notice( esc_html__( 'Settings Saved Successfully.', 'embed-power-bi-reports' ) );
	}

	/**
	 * Function to add the SSO login button via azure ad on WordPress login page.
	 *
	 * @return void
	 */
	private function mo_epbr_add_sso_button() {
		$app_config = wpWrapper::mo_epbr_get_option( pluginConstants::APPLICATION_CONFIG_OPTION );
		$app_id     = '';
		if ( ! empty( $app_config ) && isset( $app_config['client_id'] ) ) {
			$app_id = $app_config['client_id'];
		}
		if ( $app_id ) {
			$sso_data = secureInput::mo_epbr_get_secure_data(
				'mo_epbr_add_sso_button_wp_login',
				array(
					'option'                    => 'text',
					'mo_epbr_add_sso_button_wp' => 'checkbox',
				),
				'_wpnonce'
			);

			if ( ! empty( $sso_data ) && 'mo_epbr_add_sso_button_wp_login' === $sso_data['option'] ) {
				wpWrapper::mo_epbr_set_option( 'mo_epbr_add_sso_button_wp', $sso_data['mo_epbr_add_sso_button_wp'] ?? false );
				wpWrapper::mo_epbr__show_success_notice( esc_html__( 'Settings Updated Successfully.', 'embed-power-bi-reports' ) );
			}
		} else {
			wpWrapper::mo_epbr__show_error_notice( 'Kindly configure the application to use the login functionality.' );
		}
	}
}
