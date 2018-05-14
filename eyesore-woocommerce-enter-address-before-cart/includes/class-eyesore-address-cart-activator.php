<?php

/**
 * Fired during plugin activation
 *
 * @link       https://eyesoreinc.com
 * @since      1.0.0
 *
 * @package    Eyesore_Address_Cart
 * @subpackage Eyesore_Address_Cart/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Eyesore_Address_Cart
 * @subpackage Eyesore_Address_Cart/includes
 * @author     Jesse Smith <jesse@eyesoreinc.com>
 */
class Eyesore_Address_Cart_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		//create shipping-address page with [wc-shipping-address] inside
		wp_insert_post(array(
			'post_title' => 'Shipping Address',
			'post_content' => '[wc-shipping-address]',
			'post_status' => 'publish',
			'post_type' => 'page'
		));
	}

}
