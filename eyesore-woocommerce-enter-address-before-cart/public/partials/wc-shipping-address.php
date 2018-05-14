<form method="POST">
	<?php $checkout->checkout_form_shipping(); ?>
	<input type="submit" value="Continue to Cart">
	<input type="hidden" name="eye_save_address" value="1" />
</form>
<style>
 #ship-to-different-address{
 	display:none;
 }
</style>