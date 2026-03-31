<?php
/**
 * Handles powerBI settings Configurations.
 *
 * @package embed-power-bi-reports\Controller
 */

namespace MoEmbedPowerBI\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use MoEmbedPowerBI\Wrappers\wpWrapper;
use MoEmbedPowerBI\Wrappers\secureInput;

/**
 * Class to handle all the functionalitites related to Power BI Settings Config tab.
 */
class powerBIsettingsConfig {

	/**
	 * Holds the Power BI Settings Config class instance.
	 *
	 * @var Power_BI_Settings_Config
	 */
	private static $instance;

	/**
	 * Object instance(Power BI Settings Config) getter method.
	 *
	 * @return Power_BI_Settings_Config
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to call the other functions according to the form submitted.
	 *
	 * @param mixed $option Has the option value sent from the form submitted.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {
		switch ( $option ) {
			case 'mo_epbr_report_settings':
				$this->mo_epbr_update_report_settings();
		}
	}

	/**
	 * Function to update the report settings in database.
	 *
	 * @return void
	 */
	private function mo_epbr_update_report_settings() {
		// Get secure settings data
		$settings_data = secureInput::mo_epbr_get_secure_data(
			'mo_epbr_report_settings',
			array(
				'mo_epbr_add_filters_pane'     => 'checkbox',
				'mo_epbr_add_page_navigation'  => 'checkbox',
				'languages'                    => 'select',
				'localelanguages'              => 'select',
				'embed_mobile_height'          => 'text',
				'embed_mobile_width'           => 'text',
				'embed_mobile_breakpoint'      => 'text',
			),
			'_wpnonce'
		);

		if ( empty( $settings_data ) ) {
			return;
		}

		// Process checkbox values
		wpWrapper::mo_epbr_set_option( 'mo_epbr_add_filters_pane', $settings_data['mo_epbr_add_filters_pane'] ?? false );
		wpWrapper::mo_epbr_set_option( 'mo_epbr_add_page_navigation', $settings_data['mo_epbr_add_page_navigation'] ?? false );

		// Process select values
		if ( ! empty( $settings_data['languages'] ) ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_selected_language_for_embed', $settings_data['languages'] );
		}
		if ( ! empty( $settings_data['localelanguages'] ) ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_selected_locale_language_for_embed', $settings_data['localelanguages'] );
		}

		// Process text values
		if ( ! empty( $settings_data['embed_mobile_height'] ) ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_embed_mobile_height', $settings_data['embed_mobile_height'] );
		}
		if ( ! empty( $settings_data['embed_mobile_width'] ) ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_embed_mobile_width', $settings_data['embed_mobile_width'] );
		}
		if ( ! empty( $settings_data['embed_mobile_breakpoint'] ) ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_mobile_display_breakpoint', $settings_data['embed_mobile_breakpoint'] );
		}
		wpWrapper::mo_epbr__show_success_notice( 'Settings Updated Successfully.' );
	}
}
