<?php
/**
 * Handles Account Setup Configuration.
 *
 * @package embed-power-bi-reports\Controller
 */

namespace MoEmbedPowerBI\Controller;

use MoEmbedPowerBI\API\CustomerEPBR;
use MoEmbedPowerBI\Wrappers\wpWrapper;
use MoEmbedPowerBI\Wrappers\secureInput;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle account setup Configurations.
 */
class accountSetupConfig {

	/**
	 * Holds the Account Setup Config class instance.
	 *
	 * @var Account_Setup_Config
	 */
	private static $instance;

	/**
	 * Object instance(Account Setup Config) getter method.
	 *
	 * @return Account_Setup_Config
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to execute form actions based on the option value recieved in post request.
	 *
	 * @param array $option This contains option value for admin controller to carry out respective actions.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {

		if ( ! isset( $option ) ) {
			return;
		}
		switch ( $option ) {

			case 'mo_api_account_registration_setup_option':
				$this->mo_epbr_account_registration_setup();
				break;

			case 'mo_api_remove_account_option':
				$this->mo_epbr_remove_account();
				break;

			case 'mo_api_account_login_setup_option':
				$this->mo_epbr_account_login_setup();
				break;

			case 'mo_api_is_login':
				$this->mo_epbr_is_login();
				break;

			case 'mo_api_is_regis':
				$this->mo_epbr_is_regis();
				break;

		}
	}

	/**
	 * Function to execute the account registration setup.
	 *
	 * @return void
	 */
	private function mo_epbr_account_registration_setup() {

		if ( ! $this->mo_epbr_is_extension_installed( 'curl' ) ) {
			wpWrapper::mo_epbr__show_success_notice( 'ERROR: PHP cURL extension is not installed or disabled. Login failed.' );
			return;
		}

		// Get secure user data using centralized function
		$user_data = secureInput::mo_epbr_get_secure_data(
			'mo_api_account_registration_setup_option',
			array(
				'account_email'        => 'email',
				'account_pwd'          => 'password',
				'confirm_account_pwd'  => 'password',
			),
			'_wpnonce'
		);

		// Check if we got valid data (includes nonce and capability verification)
		if ( empty( $user_data ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'Security validation failed.' );
			return;
		}

		// Check required fields
		if ( empty( $user_data['account_email'] ) || empty( $user_data['account_pwd'] ) || empty( $user_data['confirm_account_pwd'] ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'All the fields are required. Please enter valid entries.' );
			return;
		}

		// Validate password patterns
		if ( wpWrapper::mo_epbr_check_password_pattern( $user_data['account_pwd'] ) || 
			 wpWrapper::mo_epbr_check_password_pattern( $user_data['confirm_account_pwd'] ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'Minimum 6 characters should be present. Maximum 15 characters should be present. Only following symbols (!@#.$%^&*-_) should be present.' );
			return;
		}

		// Extract sanitized data
		$email            = $user_data['account_email'];
		$password         = $user_data['account_pwd'];
		$confirm_password = $user_data['confirm_account_pwd'];
		wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_email', $email );

		if ( strcmp( $password, $confirm_password ) === 0 ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_password', $password );
			$customer       = new CustomerEPBR();
			$customer_exist = json_decode( $customer->mo_epbr_check_customer(), true );

			if ( ! is_null( $customer_exist ) ) {
				if ( strcasecmp( $customer_exist['status'], 'CUSTOMER_NOT_FOUND' ) === 0 ) {
					$response = $this->create_mo_customer();
					if ( is_array( $response ) && array_key_exists( 'status', $response ) && 'success' === $response['status'] ) {
						wpWrapper::mo_epbr__show_success_notice( 'Successfully Registered' );
					} else {
						wpWrapper::mo_epbr__show_error_notice( 'Something went wrong. Please try again after some time.' );
					}
				} else {
					$response = $this->get_mo_current_customer();
					if ( is_array( $response ) && array_key_exists( 'status', $response ) && 'success' === $response['status'] ) {
						wpWrapper::mo_epbr__show_success_notice( 'Successfully Logged In' );
					}
				}
			}
		} else {
			wpWrapper::mo_epbr__show_error_notice( "Password Doesn't match" );
		}
	}
	/**
	 * Method to perform account login under account setup tab.
	 *
	 * @return void
	 */
	private function mo_epbr_account_login_setup() {

		if ( ! $this->mo_epbr_is_extension_installed( 'curl' ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'ERROR: PHP cURL extension is not installed or disabled. Login failed.' );
			return;
		}

		// Get secure user data using centralized function
		$user_data = secureInput::mo_epbr_get_secure_data(
			'mo_api_account_login_setup_option',
			array(
				'account_email' => 'email',
				'account_pwd'   => 'password',
			),
			'_wpnonce'
		);

		// Check if we got valid data (includes nonce and capability verification)
		if ( empty( $user_data ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'Security validation failed.' );
			return;
		}

		// Check required fields
		if ( empty( $user_data['account_email'] ) || empty( $user_data['account_pwd'] ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'All the fields are required. Please enter valid entries.' );
			return;
		}

		// Validate password pattern
		if ( wpWrapper::mo_epbr_check_password_pattern( $user_data['account_pwd'] ) ) {
			wpWrapper::mo_epbr__show_error_notice( 'Minimum 6 characters should be present. Maximum 15 characters should be present. Only following symbols (!@#.$%^&*-_) should be present.' );
			return;
		}

		// Extract sanitized data
		$email    = $user_data['account_email'];
		$password = $user_data['account_pwd'];
		wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_email', $email );
		wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_password', $password );

		$customer = new CustomerEPBR();
		$content  = $customer->mo_epbr_get_customer_key();

		if ( ! $content ) {
			return;
		}

		$customer_key = json_decode( $content, true );

		if ( json_last_error() === JSON_ERROR_NONE ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_customer_key', $customer_key['id'] );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_api_key', $customer_key['apiKey'] );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_customer_token', $customer_key['token'] );
			if ( ! empty( $customer_key['phone'] ) ) {
				wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_phone', $customer_key['phone'] );
			}

			wpWrapper::mo_epbr__show_success_notice( 'Successfully Logged In' );

		} else {
			wpWrapper::mo_epbr__show_error_notice( 'Invalid username or password. Please try again.' );
		}
	}

	/**
	 * Function to remove account.
	 *
	 * @return void
	 */
	private function mo_epbr_remove_account() {
	if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( __( 'You do not have permission to perform this action.' ) );
    }
		check_admin_referer( 'mo_api_remove_account_option' );
		wpWrapper::mo_epbr_deactivate();
		delete_option( 'mo_epbr_registration_status' );
	}

	/**
	 * Function to check whether the extension is installed or nor.
	 *
	 * @param string $extension_name Holds the name of extension.
	 * @return boolean
	 */
	private function mo_epbr_is_extension_installed( $extension_name ) {
		if ( in_array( $extension_name, get_loaded_extensions(), true ) ) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * Function to create new customer.
	 *
	 * @return array
	 */
	public function create_mo_customer() {
		$customer     = new CustomerEPBR();
		$customer_key = json_decode( $customer->mo_epbr_create_customer(), true );
		if ( ! is_null( $customer_key ) ) {
			$response = array();
			if ( strcasecmp( $customer_key['status'], 'CUSTOMER_USERNAME_ALREADY_EXISTS' ) === 0 ) {
				$api_response = $this->get_mo_current_customer();
				if ( $api_response ) {
					$response['status'] = 'success';
				} else {
					$response['status'] = 'error';
				}
			} elseif ( strcasecmp( $customer_key['status'], 'SUCCESS' ) === 0 ) {
				wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_customer_key', $customer_key['id'] );
				wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_api_key', $customer_key['api_key'] );
				wpWrapper::mo_epbr_set_option( 'mo_epbr_customer_token', $customer_key['token'] );
				delete_option( 'mo_epbr_verify_customer' );
				$response['status'] = 'success';
				return $response;
			}
			return $response;
		}
	}

	/**
	 * Function to get the current miniorange user.
	 *
	 * @return array
	 */
	public function get_mo_current_customer() {
		$customer = new CustomerEPBR();
		$content  = $customer->mo_epbr_get_customer_key();

		if ( ! is_null( $content ) ) {
			$customer_key = json_decode( $content, true );
			$response     = array();
			if ( json_last_error() === JSON_ERROR_NONE ) {
				wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_customer_key', $customer_key['id'] );
				wpWrapper::mo_epbr_set_option( 'mo_epbr_admin_api_key', $customer_key['apiKey'] );
				wpWrapper::mo_epbr_set_option( 'mo_epbr_customer_token', $customer_key['token'] );
				delete_option( 'mo_epbr_verify_customer' );
				$response['status'] = 'success';
				return $response;
			} else {
				wpWrapper::mo_epbr__show_error_notice( 'You already have an account with miniOrange. Please enter a valid password.' );
				$response['status'] = 'error';
				return $response;
			}
		}
	}

	/**
	 * Fucntion to check whether the customer is successfully logged in.
	 *
	 * @return void
	 */
	private function mo_epbr_is_login() {
		// Get secure login data with nonce verification
		$login_data = secureInput::mo_epbr_get_secure_data( 'mo_api_is_login', array() );

		// If nonce verification fails, deny access
		if ( empty( $login_data ) || ! isset( $login_data['_verified'] ) ) {
			wp_die( 'Security check failed' );
		}
		
		wpWrapper::mo_epbr_set_option( 'mo_epbr_registration_status', 'Login User' );
	}

	/**
	 * Function to check whether the customer was successfully registered or not.
	 *
	 * @return void
	 */
	private function mo_epbr_is_regis() {
		// Get secure registration data
		$regis_data = secureInput::mo_epbr_get_secure_data( 'mo_api_is_regis', array() );

		// If nonce verification fails, deny access
		if ( empty( $regis_data ) || ! isset( $regis_data['_verified'] ) ) {
			wp_die( 'Security check failed' );
		}
		wpWrapper::mo_epbr_set_option( 'mo_epbr_registration_status', '' );
	}
}
