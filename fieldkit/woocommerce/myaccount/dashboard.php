<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>

<h1>Account Dashboard</h1>
<p class="body--medium">
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		__('Welcome, %1$s!', 'woocommerce'),
		esc_html($current_user->display_name)
	);
	?>
</p>

<div class="dashboard-portal">
	<?php
	$iconorders = '<svg><use xlink:href="' . get_template_directory_uri() . "/assets/icons/sprite.svg#icon-orders" . '" /></svg>';
	$iconaddresses = '<svg><use xlink:href="' . get_template_directory_uri() . "/assets/icons/sprite.svg#icon-addresses" . '" /></svg>';
	$iconuser = '<svg><use xlink:href="' . get_template_directory_uri() . "/assets/icons/sprite.svg#icon-user" . '" /></svg>';
	?>
	<ul>
		<li>
			<?php
			printf(
				__(
					'<a href="%1$s">%2$s %3$s</a>',
					'woocommerce'
				),
				esc_url(wc_get_endpoint_url('orders')),
				$iconorders,
				esc_html__('View recent orders', 'fieldkit')
			);
			?>
		</li>
		<li>
			<?php
			printf(
				__(
					'<a href="%1$s">%2$s %3$s</a>',
					'woocommerce'
				),
				esc_url(wc_get_endpoint_url('edit-address')),
				$iconaddresses,
				esc_html__('Manage Addresses', 'fieldkit')
			);
			?>
		</li>
		<li>
			<?php
			printf(
				__(
					'<a href="%1$s">%2$s %3$s</a>',
					'woocommerce'
				),
				esc_url(wc_get_endpoint_url('edit-account')),
				$iconuser,
				esc_html__('Edit Account', 'fieldkit')
			);
			?>
		</li>

	</ul>
</div>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
