<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://eyesoreinc.com
 * @since      1.0.0
 *
 * @package    Eyesore_Address_Cart
 * @subpackage Eyesore_Address_Cart/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Eyesore_Address_Cart
 * @subpackage Eyesore_Address_Cart/includes
 * @author     Jesse Smith <jesse@eyesoreinc.com>
 */
class Eyesore_Address_Cart_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'eyesore-address-cart',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
