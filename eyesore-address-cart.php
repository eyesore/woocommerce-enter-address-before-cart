<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://eyesoreinc.com
 * @since             1.0.0
 * @package           Eyesore_Address_Cart
 *
 * @wordpress-plugin
 * Plugin Name:       Eyesore Woocommerce Enter Address Before Cart
 * Plugin URI:        https://eyesoreinc.com
 * Description:       Wordpress WooCommerce plugin that creates a "Shipping Address" page and requires a shipping address to be entered before going to the cart page
 * Version:           1.0.0
 * Author:            Jesse Smith
 * Author URI:        https://eyesoreinc.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       eyesore-address-cart
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-eyesore-address-cart-activator.php
 */
function activate_eyesore_address_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-eyesore-address-cart-activator.php';
	Eyesore_Address_Cart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-eyesore-address-cart-deactivator.php
 */
function deactivate_eyesore_address_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-eyesore-address-cart-deactivator.php';
	Eyesore_Address_Cart_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_eyesore_address_cart' );
register_deactivation_hook( __FILE__, 'deactivate_eyesore_address_cart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-eyesore-address-cart.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_eyesore_address_cart() {

	$plugin = new Eyesore_Address_Cart();
	$plugin->run();

}
run_eyesore_address_cart();
