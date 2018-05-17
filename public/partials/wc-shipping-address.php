<?php do_action('wceabc_before_form'); ?>
<form method="POST">
	<?php do_action('wceabc_before_inputs'); ?>
	<?php $checkout->checkout_form_shipping(); ?>
	<input type="submit" value="Continue to Cart">
	<input type="hidden" name="eye_save_address" value="1" />
	<?php do_action('wceabc_after_inputs'); ?>
</form>
<?php do_action('wceabc_after_form'); ?>
<style>
 #ship-to-different-address{
 	display:none;
 }
</style>