<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://eyesoreinc.com
 * @since      1.0.0
 *
 * @package    Eyesore_Address_Cart
 * @subpackage Eyesore_Address_Cart/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Eyesore_Address_Cart
 * @subpackage Eyesore_Address_Cart/public
 * @author     Jesse Smith <jesse@eyesoreinc.com>
 */
class Eyesore_Address_Cart_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eyesore_Address_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eyesore_Address_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eyesore-address-cart-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eyesore_Address_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eyesore_Address_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eyesore-address-cart-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Registers all shortcodes for plugin
	 * @return nil
	 */
	public function register_shortcodes(){
		add_shortcode('wc-shipping-address', array($this, 'wc_shipping_address_shortcode'));
	}

	/**
	 * Shipping Address form shortcode for woocommerce
	 * @return string
	 */
	public function wc_shipping_address_shortcode(){
		$checkout = WC_Checkout::instance();
		ob_start();
		include(dirname(__FILE__). '/partials/wc-shipping-address.php');
		return ob_get_clean();
	}

	public function check_for_save(){
		if($_POST['eye_save_address']){
			global $woocommerce;
			$cart_url = $woocommerce->cart->get_cart_url();
			$checkout = WC_Checkout::instance();
			WC()->customer->set_props( array(
				'shipping_country'   => isset( $_POST['shipping_country'] ) ? wp_unslash( $_POST['shipping_country'] )    : null,
				'shipping_state'     => isset( $_POST['shipping_state'] ) ? wp_unslash( $_POST['shipping_state'] )        : null,
				'shipping_postcode'  => isset( $_POST['shipping_postcode'] ) ? wp_unslash( $_POST['shipping_postcode'] )  : null,
				'shipping_city'      => isset( $_POST['shipping_city'] ) ? wp_unslash( $_POST['shipping_city'] )          : null,
				'shipping_address_1' => isset( $_POST['shipping_address_1'] ) ? wp_unslash( $_POST['shipping_address_1'] )    : null,
				'shipping_address_2' => isset( $_POST['shipping_address_2'] ) ? wp_unslash( $_POST['shipping_address_2'] ): null,
			) );
			wp_redirect($cart_url);
			exit;
		}
	}

	public function before_cart(){
		if(is_page('cart')){
			$shipping = WC()->customer->get_shipping();
			if(empty($shipping['address_1'])){
				wp_redirect(get_permalink( get_page_by_title( 'Shipping Address' ) ));
				exit;
			}
		}
	}

}
