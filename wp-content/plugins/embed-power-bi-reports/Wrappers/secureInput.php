<?php
/**
 * Secure Input Handler for PowerBI Plugin
 * 
 * This file contains the centralized secure input handling function
 * as per security guidelines to avoid direct $_GET, $_POST, $_REQUEST usage
 *
 * @package embed-power-bi-reports\Wrappers
 */

namespace MoEmbedPowerBI\Wrappers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle secure input validation and sanitization
 */
class secureInput {

	/**
	 * Secure helper function to get user data from POST/GET/REQUEST
	 * 
	 * @param string $nonce_action The nonce action name
	 * @param array  $fields Array of field mappings (post_key => sanitization_type)
	 * @param string $nonce_key The nonce field name (default: '_wpnonce')
	 * @param string $method HTTP method to check ('POST', 'GET', 'REQUEST')
	 * @param bool   $require_admin Whether to require admin capabilities
	 * @param bool   $is_ajax Whether this is an AJAX request
	 * @return array Sanitized user data or empty array on failure
	 */
	public static function mo_epbr_get_secure_data( $nonce_action, $fields, $nonce_key = '_wpnonce', $method = 'POST', $require_admin = true, $is_ajax = false ) {
		
		try {
			// Validate input parameters
			if ( ! is_array( $fields ) ) {
				// Log parameter validation error for debugging
				if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
					error_log( 'secureInput: Invalid fields parameter - expected array, got: ' . gettype( $fields ) );
				}
				return array();
			}

			// Validate method parameter
			if ( ! is_string( $method ) || ! in_array( strtoupper( $method ), array( 'GET', 'POST', 'REQUEST' ), true ) ) {
				if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
					error_log( 'secureInput: Invalid method parameter: ' . $method );
				}
				return array();
			}

			// Get input data based on method
			$input_data = self::mo_epbr_get_input_data( $method );

			// Perform security validations
			if ( ! self::mo_epbr_validate_security( $input_data, $nonce_key, $nonce_action, $require_admin, $is_ajax ) ) {
				return array();
			}

			// Sanitize and return field data (if fields is empty, just return array with verified flag)
			if ( empty( $fields ) ) {
				return array( '_verified' => true );
			}
			
			return self::mo_epbr_sanitize_fields( $input_data, $fields );
			
		} catch ( Exception $e ) {
			// Log error for debugging but don't expose details to users
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'secureInput error: ' . $e->getMessage() );
			}
			return array();
		} catch ( Error $e ) {
			// Catch PHP 7+ fatal errors (like foreach on non-array)
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'secureInput fatal error: ' . $e->getMessage() );
			}
			return array();
		}
	}

	/**
	 * Get input data based on HTTP method
	 * 
	 * @param string $method HTTP method ('POST', 'GET', 'REQUEST')
	 * @return array Input data array
	 */
	private static function mo_epbr_get_input_data( $method ) {
		switch ( strtoupper( $method ) ) {
			case 'GET':
				return $_GET;
			case 'REQUEST':
				return $_REQUEST;
			case 'POST':
			default:
				return $_POST;
		}
	}

	/**
	 * Validate security requirements (nonce, capabilities)
	 * 
	 * @param array  $input_data The input data array
	 * @param string $nonce_key The nonce field name
	 * @param string $nonce_action The nonce action name
	 * @param bool   $require_admin Whether admin capabilities are required
	 * @param bool   $is_ajax Whether this is an AJAX request
	 * @return bool True if validation passes, false otherwise
	 */
	private static function mo_epbr_validate_security( $input_data, $nonce_key, $nonce_action, $require_admin, $is_ajax = false ) {
		// Admin capability check
		if ( $require_admin ) {
			if ( ! is_user_logged_in() ) {
				return false;
			}
			if ( ! current_user_can( 'manage_options' ) ) {
				return false;
			}
		}

		// Nonce verification with AJAX support
		if ( ! empty( $nonce_key ) && ! empty( $nonce_action ) ) {
			if ( $is_ajax ) {
				// For AJAX requests, use check_ajax_referer
				if ( ! wp_doing_ajax() || ! check_ajax_referer( $nonce_action, $nonce_key, false ) ) {
					return false;
				}
			} else {
				// For regular requests, use wp_verify_nonce
				if ( ! isset( $input_data[ $nonce_key ] ) ) {
					return false;
				}
				$nonce = sanitize_text_field( wp_unslash( $input_data[ $nonce_key ] ) );
				if ( ! wp_verify_nonce( $nonce, $nonce_action ) ) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * Sanitize field data based on type
	 * 
	 * @param array $input_data The input data array
	 * @param array $fields Field mapping (field_name => sanitization_type)
	 * @return array Sanitized field data
	 */
	private static function mo_epbr_sanitize_fields( $input_data, $fields ) {
		$user_data = array();

		// Validate that $fields is an array to prevent foreach errors
		if ( ! is_array( $fields ) ) {
			return $user_data;
		}

		foreach ( $fields as $input_key => $sanitization_type ) {
			if ( isset( $input_data[ $input_key ] ) ) {
				$value = wp_unslash( $input_data[ $input_key ] );
				$user_data[ $input_key ] = self::mo_epbr_apply_sanitization( $value, $sanitization_type );
			}
		}

		return $user_data;
	}

	/**
	 * Apply specific sanitization based on type
	 * 
	 * @param mixed  $value The value to sanitize
	 * @param string $sanitization_type The type of sanitization to apply
	 * @return mixed Sanitized value
	 */
	private static function mo_epbr_apply_sanitization( $value, $sanitization_type ) {
		switch ( $sanitization_type ) {
			case 'email':
				return sanitize_email( $value );

			case 'username':
				return sanitize_user( $value, true );

			case 'text':
			case 'text_field':
			case 'password':
			case 'phone':
			case 'option':
			case 'select':
				return sanitize_text_field( $value );

			case 'textarea':
				return sanitize_textarea_field( $value );

			case 'url':
				return esc_url_raw( $value );

			case 'checkbox':
				return ( 'on' === $value ) ? true : false;

			case 'array':
			case 'n_array':
				return self::mo_epbr_sanitize_array( $value );

			case 'raw':
				// For cases where we need the raw value (use sparingly)
				return $value;

			default:
				// Default to text field sanitization
				return sanitize_text_field( $value );
		}
	}

	/**
	 * Sanitize array data recursively
	 * 
	 * @param mixed $value The array value to sanitize
	 * @return array Sanitized array
	 */
	private static function mo_epbr_sanitize_array( $value ) {
		if ( ! is_array( $value ) ) {
			return sanitize_text_field( $value );
		}

		$sanitized_array = array();
		foreach ( $value as $key => $item ) {
			$sanitized_key = sanitize_text_field( $key );
			if ( is_array( $item ) ) {
				$sanitized_array[ $sanitized_key ] = self::mo_epbr_sanitize_array( $item );
			} else {
				$sanitized_array[ $sanitized_key ] = sanitize_text_field( $item );
			}
		}

		return $sanitized_array;
	}

	/**
	 * Convenience method for admin-only operations with full security
	 * 
	 * @param string $nonce_action The nonce action name
	 * @param array  $fields Array of field mappings
	 * @param string $nonce_key The nonce field name (default: '_wpnonce')
	 * @param string $method HTTP method ('POST', 'GET', 'REQUEST')
	 * @param bool   $is_ajax Whether this is an AJAX request
	 * @return array Sanitized user data or empty array on failure
	 */
	public static function mo_epbr_get_admin_data( $nonce_action, $fields, $nonce_key = '_wpnonce', $method = 'POST', $is_ajax = false ) {
		return self::mo_epbr_get_secure_data( $nonce_action, $fields, $nonce_key, $method, true, $is_ajax );
	}

	/**
	 * Convenience method for non-admin operations (no capability check)
	 * 
	 * @param string $nonce_action The nonce action name
	 * @param array  $fields Array of field mappings
	 * @param string $nonce_key The nonce field name (default: '_wpnonce')
	 * @param string $method HTTP method ('POST', 'GET', 'REQUEST')
	 * @param bool   $is_ajax Whether this is an AJAX request
	 * @return array Sanitized user data or empty array on failure
	 */
	public static function mo_epbr_get_user_data( $nonce_action, $fields, $nonce_key = '_wpnonce', $method = 'POST', $is_ajax = false ) {
		return self::mo_epbr_get_secure_data( $nonce_action, $fields, $nonce_key, $method, false, $is_ajax );
	}

	/**
	 * Convenience method for AJAX admin operations
	 * 
	 * @param string $nonce_action The nonce action name
	 * @param array  $fields Array of field mappings
	 * @param string $nonce_key The nonce field name (default: '_wpnonce')
	 * @param string $method HTTP method ('POST', 'GET', 'REQUEST')
	 * @return array Sanitized user data or empty array on failure
	 */
	public static function mo_epbr_get_ajax_data( $nonce_action, $fields, $nonce_key = '_wpnonce', $method = 'POST' ) {
		return self::mo_epbr_get_secure_data( $nonce_action, $fields, $nonce_key, $method, true, true );
	}

	/**
	 * Convenience method for public data (no nonce or capability check)
	 * 
	 * @param array  $fields Array of field mappings
	 * @param string $method HTTP method ('POST', 'GET', 'REQUEST')
	 * @return array Sanitized user data
	 */
	public static function mo_epbr_get_public_data( $fields, $method = 'POST' ) {
		$input_data = self::mo_epbr_get_input_data( $method );
		return self::mo_epbr_sanitize_fields( $input_data, $fields );
	}

	/**
	 * Secure helper for cookie data
	 * 
	 * @param string $cookie_name The cookie name to retrieve
	 * @param string $sanitization_type How to sanitize the cookie value
	 * @return string Sanitized cookie value or empty string
	 */
	public static function mo_epbr_get_secure_cookie( $cookie_name, $sanitization_type = 'text' ) {
		if ( ! isset( $_COOKIE[ $cookie_name ] ) ) {
			return '';
		}

		$value = wp_unslash( $_COOKIE[ $cookie_name ] );

		switch ( $sanitization_type ) {
			case 'email':
				return sanitize_email( $value );
			case 'url':
				return esc_url_raw( $value );
			case 'text':
			default:
				return sanitize_text_field( $value );
		}
	}

	/**
	 * Helper for simple GET parameter without nonce (for navigation, tabs, etc.)
	 * 
	 * @param string $param_name The GET parameter name
	 * @param string $sanitization_type How to sanitize the value
	 * @param string $default_value Default value if parameter not set
	 * @return string Sanitized parameter value
	 */
	public static function mo_epbr_get_safe_param( $param_name, $sanitization_type = 'text', $default_value = '' ) {
		if ( ! isset( $_GET[ $param_name ] ) ) {
			return $default_value;
		}

		$value = wp_unslash( $_GET[ $param_name ] );

		switch ( $sanitization_type ) {
			case 'email':
				return sanitize_email( $value );
			case 'url':
				return esc_url_raw( $value );
			case 'text':
			default:
				return sanitize_text_field( $value );
		}
	}
}
?>

