<?php
/**
 * Handles OAuth SSO flow
 *
 * @package embed-power-bi-reports\LoginFlow
 */

namespace MoEmbedPowerBI\LoginFlow;

use MoEmbedPowerBI\Wrappers\wpWrapper;
use MoEmbedPowerBI\Wrappers\pluginConstants;
use MoEmbedPowerBI\Wrappers\secureInput;
use MoEmbedPowerBI\API\Authorization;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle OAuth SSO Functionalities.
 */
class OAuthSSO {

	/**
	 * Holds the instance of class.
	 *
	 * @var OAuthSSO
	 */
	private static $instance;

	/**
	 * Object instance(OAuthSSO) getter method.
	 *
	 * @return OAuthSSO
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to handle sso function calling on basis of option and request values.
	 *
	 * @return void
	 */
	public function mo_epbr_perform_sso() {
		$option = secureInput::mo_epbr_get_safe_param( 'option', 'text', '' );
		if ( ! empty( $option ) ) {
			if ( 'oauthlogin' === $option ) {
				$this->mo_epbr_config_oauth();
			}
		}

		if ( ! empty( secureInput::mo_epbr_get_secure_cookie( 'Oauth_User_Cookie', 'text' ) ) && ! is_user_logged_in() ) {
			echo "<script> document.cookie = 'Oauth_User_Cookie=UsedCookie;path=/;max-age=0;' </script>";
		}

		$oauth_data = secureInput::mo_epbr_get_secure_data( '', array( 'code' => 'text', 'state' => 'text' ), '', 'REQUEST', false );
		if ( ! empty( $oauth_data['code'] ) && 'cGhvdG9zeW5j' === $oauth_data['state'] ) {
			$code = $oauth_data['code'];
			wpWrapper::mo_epbr_set_option( 'mo_epbr_code', $code );
			$this->mo_epbr_retrieve_access_token( $code );
		}
	}

	/**
	 * Function for oauth configurations.
	 *
	 * @return void
	 */
	public function mo_epbr_config_oauth() {
		$oauth_code = secureInput::mo_epbr_get_secure_data( '', array( 'code' => 'text' ), '', 'REQUEST', false );
		if ( empty( $oauth_code['code'] ) ) {
			$app = wpWrapper::mo_epbr_get_option( pluginConstants::APPLICATION_CONFIG_OPTION );
			if ( empty( $app['client_id'] ) || empty( $app['client_secret'] ) || empty( $app['tenant_id'] ) ) {
				wp_die( 
					'<h1>Configuration Error</h1><p>Microsoft Graph Application is not fully configured. Please configure Client ID, Client Secret, and Tenant ID before using SSO login.</p><p><a href="' . esc_url( admin_url( 'admin.php?page=mo_epbr&tab=app_config' ) ) . '">Configure Application</a></p>',
					'SSO Configuration Error',
					array( 'back_link' => true )
				);
			}
			$client_id                  = $app['client_id'];
			$redirect_uri               = ! empty( $app['redirect_uri'] ) ? $app['redirect_uri'] : site_url();
			$tenant_id                  = ! empty( $app['tenant_id'] ) ? $app['tenant_id'] : '';
			$scope                      = 'openid email';
			$authorize_url              = wpWrapper::mo_epbr_get_url_endpoint() . 'authorize';
			$authorization_redirect_url = $authorize_url . '?response_type=code&client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&state=cGhvdG9zeW5j&scope=' . $scope;
			header( 'Location: ' . $authorization_redirect_url );
			exit();}
	}

	/**
	 * Function to get the access token using the auth code received.
	 *
	 * @param mixed $authorization_code Holds the auth code received.
	 * @return void
	 */
	public function mo_epbr_retrieve_access_token( $authorization_code ) {
		$app      = wpWrapper::mo_epbr_get_option( 'mo_epbr_application_config' );
		$clientid = $app['client_id'];
		if ( ! $clientid ) {
			return;
		}
		$redirect_url = ! empty( $app['redirect_uri'] ) ? $app['redirect_uri'] : site_url();
		$tenantid     = ! empty( $app['tenant_id'] ) ? $app['tenant_id'] : '';
		if ( isset( $app['client_secret'] ) && ! empty( $app['client_secret'] ) ) {
			$clientsecret = wpWrapper::mo_epbr_decrypt_data( $app['client_secret'], hash( 'sha256', $clientid ) );
		} else {
			$clientsecret = '';
		}
		$scope          = 'openid email offline_access';
		$token_endpoint = wpWrapper::mo_epbr_get_url_endpoint() . 'token';
		$headers        = array(
			'Accept'       => 'application/json',
			'charset'      => 'UTF - 8',
			'Content-Type' => pluginConstants::CONTENT_TYPE_VAL,
		);
		$body           = array(
			'grant_type'    => pluginConstants::GRANT_TYPE_AUTHCODE,
			'client_id'     => $clientid,
			'client_secret' => $clientsecret,
			'scope'         => $scope,
			'redirect_uri'  => $redirect_url,
			'code'          => $authorization_code,
		);
		foreach ( $body as $key => $value ) {
			$body[ $key ] = html_entity_decode( $value );
		}
		$controller    = Authorization::get_controller();
		$content       = $controller->mo_epbr_post_request( esc_url_raw( $token_endpoint ), $headers, $body );
		
		if ( isset( $content['error'] ) ) {
			$error_message = isset( $content['error_description'] ) ? $content['error_description'] : 'Failed to retrieve access token';
			wp_die(
				'<h1>Authentication Error</h1><p><strong>Error:</strong> ' . esc_html( $content['error'] ) . '</p><p><strong>Description:</strong> ' . esc_html( $error_message ) . '</p><p>This may happen if your Client Secret has expired or the configuration is incorrect.</p><p><a href="' . esc_url( admin_url( 'admin.php?page=mo_epbr&tab=app_config' ) ) . '">Check Application Configuration</a></p>',
				'SSO Authentication Error',
				array( 'back_link' => true )
			);
		}
		
		$access_token  = ! empty( $content['access_token'] ) ? $content['access_token'] : '';
		$refresh_token = ! empty( $content['refresh_token'] ) ? $content['refresh_token'] : '';

		if ( empty( $access_token ) ) {
			wp_die(
				'<h1>Authentication Error</h1><p>Failed to retrieve access token from Azure AD. Please check your application configuration.</p><p><a href="' . esc_url( admin_url( 'admin.php?page=mo_epbr&tab=app_config' ) ) . '">Configure Application</a></p>',
				'SSO Authentication Error',
				array( 'back_link' => true )
			);
		}
		
		wpWrapper::mo_epbr_set_session_value( 'mo_epbr_refresh_token', $refresh_token );
		echo "<script> document.cookie = 'Oauth_User_Cookie=SSOUser; path=/';</script>";
		$this->mo_epbr_login_validate( $access_token );
	}

	/**
	 * Function to validate the successfull login of user.
	 *
	 * @param mixed $access_token Holds the access token of the user.
	 * @return void
	 */
	public function mo_epbr_login_validate( $access_token ) {
			$exploded_access_token = explode( '.', $access_token );
			// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode -- We need to decrypt and decode access token.
			$decoded_access_token = isset( $exploded_access_token ) ? json_decode( base64_decode( $exploded_access_token[1] ), true ) : '';
		if ( isset( $decoded_access_token['upn'] ) ) {
			$email_id = $decoded_access_token['upn'];
		}
			$user = isset( $email_id ) ? get_user_by( 'login', $email_id ) : '';
		if ( $user ) {
			$user_id = $user->ID;
			wp_set_current_user( $user->ID );
			wp_set_auth_cookie( $user->ID );
			$user = get_user_by( 'ID', $user->ID );
			do_action( 'wp_login', $user->user_login, $user );
			wp_safe_redirect( home_url() );
			exit;
		} else {
			isset( $email_id ) ? $this->mo_epbr_handle_user_register( $email_id ) : '';
		}
	}

	/**
	 * Function to handle the user registration process on WordPress.
	 *
	 * @param string $email_id Holds the email id of the user logged in.
	 * @return void
	 */
	public function mo_epbr_handle_user_register( $email_id ) {
		$random_password = wp_generate_password( 10, false );
		if ( strlen( $email_id ) > 60 ) {
			wp_die( esc_attr( 'You are not allowed to login. Please contact your administrator' ) );
		}
		$user_id = wp_create_user( $email_id, $random_password, $email_id );
		$user    = get_user_by( 'login', $email_id );
		wp_update_user( array( 'ID' => $user_id ) );
		wp_set_current_user( $user->ID );
		wp_set_auth_cookie( $user->ID );
		$user = get_user_by( 'ID', $user->ID );
		do_action( 'wp_login', $user->user_login, $user );
		wp_safe_redirect( home_url() );
		exit;
	}
}
