# Eyesore Woocommerce Enter Address Before Cart
* Creates a page called "Shipping Address"
* Uses shortcode [wc-shipping-form] on this page embedding woocommerces shipping form
* Redirects to this page when Shipping Address 1 is empty
* When this page is posted to, saves information and redirects to cart

## TODO 
* Add Actions and Filters
* Add Settings
* Add more validation than just Address 1
* Test on multiple woocommerce sites

## Hooks
### FILTERS
* wceabc_valid_shipping - Whether or not to redirect to shipping_address page
	* Parameters - $valid (boolean), $shipping (shipping address array)
	* Called In - Eyesore_Address_Cart_Public::before_cart() 
	* Return - Boolean please
### Actions
* wceabc_before_form - Done in markup before form
	* Called In - wc-shipping-address.php (Eyesore_Address_Cart_Public::wc_shipping_address_shortcode())
* wceabc_after_form - Done in markup after form
	* Called In - wc-shipping-address.php (Eyesore_Address_Cart_Public::wc_shipping_address_shortcode())