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

function fieldkit_widget()
{
    register_sidebar(
	array(
        'id' => 'sensors-header',
        'name' => __('Sensor Type Category', 'fieldkit'),
	));

	register_sidebar(
		array(
			'id' => 'accessories-header',
			'name' => __('Accessories Category', 'fieldkit'),
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
	foreach ( $order->get_items() as $item_id => $item ) {
		$product = $item->get_product();
		$product_type = $product->get_type();
		$sku = $product->get_sku();
		if (!$sku && $product_type == "bundle") {
			wc_delete_order_item($item_id);
		}
	}
	if ($order && 'cod' === $order->get_payment_method()) {
		$status = 'completed';
	}
	return $status;
}

function fieldkit_customize_register($wp_customize)
{
	$wp_customize->add_setting(
		'dark_logo',
		array(
			'default' => '',
			'theme_supports' => 'custom-logo',
		)
	);
	$wp_customize->add_control(new WP_Customize_Media_Control(
		$wp_customize,
		'dark_logo',
		array(
			'label' => __('Dark Logo', 'fieldkit'),
			'priority' => 8,
			'section' => 'title_tagline',
			'settings' => 'dark_logo',
		)
	));
}
add_action('customize_register', 'fieldkit_customize_register');


add_action( 'woocommerce_after_add_to_cart_form', 'fieldkit_sku', 5 );
function fieldkit_sku(){
	global $product;

	if($product->get_children()){

		echo '<p class="sku">';

		if( $product->get_sku()){
			echo '[' . $product->get_sku() .'] ';
		}

		foreach ($product->get_children() as $key => $value) {
			if(wc_get_product( $value )->get_sku()){
				echo '<span id=sku-child-'. $key .'>[' . 	wc_get_product( $value )->get_sku() .']</span> ';
			}
		}
		echo '</p>';
	}else{
		if( $product->get_sku()){
			echo '<p class="sku">[' . $product->get_sku() .']</p>';
		}
	}

}


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'fieldkit_loop_product_thumbnail', 10 );
function fieldkit_loop_product_thumbnail() {
    global $product;
    $size = "full";

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    echo $product ? $product->get_image( $image_size ) : '';
}

add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'fk_disable_shipping_calc_on_cart', 99 );
function fk_disable_shipping_calc_on_cart( $show_shipping ) {
	if( is_cart() ) {
		return false;
	}
	return $show_shipping;
}
//shipping
add_filter( 'woocommerce_shipping_calculator_enable_state', '__return_false' );
add_filter( 'woocommerce_shipping_calculator_enable_city', '__return_false' );
add_filter( 'woocommerce_shipping_calculator_enable_postcode', '__return_false' );
add_filter( 'woocommerce_shipping_chosen_method', '__return_false', 99);

//cart
add_filter( 'woocommerce_persistent_cart_enabled', '__return_false' );
add_action( 'woocommerce_thankyou', 'order_received_empty_cart_action', 10, 1 );
function order_received_empty_cart_action( $order_id ){
	WC()->cart->empty_cart(true);
	WC()->session->set('cart', array());
}


// this is for subpages (product guide subpages)
function mv_is_subpage( $page = null )
{
    global $post;
    if ( ! is_page() )
        return false;
    if ( ! isset( $post->post_parent ) OR $post->post_parent <= 0 )
        return false;
    if ( ! isset( $page ) ) {
        return true;
    } else {
        if ( is_int( $page ) ) {
            if ( $post->post_parent == $page )
                return true;
        } else if ( is_string( $page ) ) {
            $parent = get_ancestors( $post->ID, 'page' );
            if ( empty( $parent ) )
                return false;
            $parent = get_post( $parent[0] );
            if ( $parent->post_name == $page )
                return true;
        }
        return false;
    }
}


/**
 * Disable WooCommerce resize for SVG images. WooCommerce 6
 */
// add_filter( 'wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4 );

// function fix_wp_get_attachment_image_svg( $image, $attachment_id, $size, $icon ) {
//     // Check if WooCommerce is enabled
//     if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

//         if ( ! is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
//             $attachment = get_post( $attachment_id );
//             $mime_type = $attachment->post_mime_type; // Get the attachment mime_type

//             if ( $mime_type === 'image/svg+xml' ) {
//                 return false;
//             }
//         }
//     }

//     return $image;
// }



//yith preorder DEPRECATED
// if ( class_exists( 'YITH_Pre_Order_Premium' ) ) {
// 	remove_filter( 'woocommerce_get_stock_html', array( YITH_Pre_Order_Premium::instance()->frontend, 'show_date_on_single_product' ), 99 );
// 	add_filter( 'woocommerce_get_stock_html', 'show_date_on_single_product_custom', 99, 3 );

// 	function show_date_on_single_product_custom( $availability_html, $availability, $product = false ) {
// 	 global $sitepress;

// 	 if (!$product){
// 		$product = YITH_Pre_Order_Premium::instance()->frontend->product_from_availability;
// 	 }

// 	 $id          = $sitepress ? yit_wpml_object_id($product->get_id(), 'product', true, $sitepress->get_default_language() ) : $product->get_id();

// 	 if ( YITH_Pre_Order()::is_pre_order_active( $id ) ) {
// 	 return $availability_html . YITH_Pre_Order_Premium::instance()->frontend->print_availability_date( $id );   }
// 	 return $availability_html;
// 	}
// }
