<?php

if (!function_exists('fieldkit_setup')) {
	function fieldkit_setup()
	{
		add_post_type_support('page', 'excerpt');
		add_theme_support('custom-logo');
		add_theme_support('html5', array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'script',
			'search-form',
			'style'
		));
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		add_theme_support('woocommerce');
		load_theme_textdomain('fieldkit');
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );

	}
}
add_action('after_setup_theme', 'fieldkit_setup');

function fieldkit_scripts()
{
	$theme_version = wp_get_theme()->get('Version');
	wp_enqueue_script(
		'fieldkit-script',
		get_theme_file_uri('/assets/scripts/main.bundle.js'),
		array(),
		$theme_version,
		true
	);
}
add_action('wp_enqueue_scripts', 'fieldkit_scripts');

function fieldkit_styles()
{
	$theme_version = wp_get_theme()->get('Version');
	wp_enqueue_style(
		'fieldkit-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);
}
add_action('wp_enqueue_scripts', 'fieldkit_styles');

function fieldkit_menus()
{
	$locations = array(
		'footer-legal' => __('Footer - Legal', 'fieldkit'),
		'footer-other' => __('Footer - Other', 'fieldkit'),
		'footer-support' => __('Footer - Support', 'fieldkit'),
		'header' => __('Header', 'fieldkit'),
		'account' => __('Account', 'fieldkit'),
		'product-guide-sidebar' => __('Product Guide Sidebar', 'fieldkit'),
		'product-feed-navigation' => __('Product Feed Navigation', 'fieldkit'),
	);
	register_nav_menus($locations);
}
add_action('init', 'fieldkit_menus');

function fieldkit_upload_mimes($mimes = array())
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'fieldkit_upload_mimes');

function fieldkit_wp_head()
{
	$matomo_snippet = get_field('matomo_snippet', 'option');
	if ($matomo_snippet) echo $matomo_snippet;
}
add_action('wp_head', 'fieldkit_wp_head', 0);

function fieldkit_wpseo_metabox_prio() {
	return 'low';
}
add_filter('wpseo_metabox_prio', 'fieldkit_wpseo_metabox_prio');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'capability' => 'edit_posts',
		'menu_slug' => 'theme-settings',
		'menu_title' => 'Theme Settings',
		'page_title' => 'Theme Settings',
		'redirect' => false
	));
}

function fieldkit_get_icon($icon_name, $attributes = array())
{
	$html = '<img';
	foreach ($attributes as $name => $value) {
		$html .= " $name=" . '"' . $value . '"';
	}
	$html .= ' alt="' . $icon_name . '" src="' . get_template_directory_uri() . '/assets/icons/' . $icon_name . '.svg" />';
	return $html;
}

// Remove the breadcrumbs
function fieldkit_remove_wc_breadcrumbs()
{
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}
add_action('init', 'fieldkit_remove_wc_breadcrumbs');

// Remove related products output
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// Remove category tags
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Remove product thumbnail link
function wc_remove_link_on_thumbnails($html)
{
	return strip_tags($html, '<div><img>');
}
add_filter('woocommerce_single_product_image_thumbnail_html', 'wc_remove_link_on_thumbnails');

function fieldkit_widget() {
    register_sidebar(array(
        'name' => "Product Header",
        'id' => 'product-header',
    ));
}
add_action('widgets_init', 'fieldkit_widget');

function woo_remove_product_tabs($tabs)
{
	unset($tabs['reviews']);
	return $tabs;
}
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);


add_filter( 'wcwl_join_waitlist_message_text', 'change_waitlist_message' );
function change_waitlist_message( $text ) {
return __('Join the waitlist to be emailed when this product becomes available.');
}

add_filter( 'wcwl_join_waitlist_success_message_text', 'change_waitlist_success_message_text' );
function change_waitlist_success_message_text( $text ) {
return __('You have been added to the waitlist for this product.');
}

add_filter( 'wcwl_leave_waitlist_success_message_text', 'change_leave_waitlist_success_message_text' );
function change_leave_waitlist_success_message_text( $text ) {
return __('You have been removed from the waitlist for this product.');
}

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

add_action('woocommerce_payment_complete_order_status', 'fieldkit_change_order_object_for_katana', 10, 2);
function fieldkit_change_order_object_for_katana($status, $order_id)
{
	$order = wc_get_order($order_id);
	$unique_products_array = array(); // Keeps track of unique products of the order
	foreach ( $order->get_items() as $item_id => $item ) {
		$product = $item->get_product();
		$product_type = $product->get_type();
		$sku = $product->get_sku();
		if (!$sku && $product_type == "bundle") {
			wc_delete_order_item($item_id);
		} else {
			// If there's a duplicate item, merge them as one item
			if (isset($unique_products_array[$sku])) {
				$unique_product_item = $unique_products_array[$sku][0];
				$unique_product_item_id = $unique_products_array[$sku][1];

				$current_product_quantity = $unique_product_item->get_quantity() + $item->get_quantity();
				$current_product_subtotal = $unique_product_item->get_subtotal() + $item->get_subtotal();
				$current_product_total = $unique_product_item->get_total() + $item->get_total();

				$unique_product_item->set_quantity($current_product_quantity);
				$unique_product_item->set_subtotal($current_product_subtotal);
				$unique_product_item->set_total($current_product_total);

				wc_update_order_item_meta($unique_product_item_id, '_full_amount', $current_product_full_total);
				wc_update_order_item_meta($unique_product_item_id, '_full_amount_formatted', wc_price($current_product_full_total));

				wc_delete_order_item($item_id);
				$unique_product_item->save();
			} else {
				$unique_products_array[$sku] = array($item, $item_id);
				$update_total = true;
			}
		}
	}

	return $order;
}
