<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;



get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

$shop_page_id = wc_get_page_id( 'shop' );

if(!is_product_category()){
$text_and_image = get_field('text_and_image',$shop_page_id);
if($text_and_image){
	include(locate_template('template-parts/blocks/text-and-image.php', false, false));
}

$call_out = get_field('call_out',$shop_page_id);
if($call_out){
	include(locate_template('template-parts/blocks/call-out.php', false, false));
}

include(locate_template('template-parts/blocks/navbar-secondary.php', false, false));


$header = get_field('header',$shop_page_id);
$header['variant'] = "medium";
if($header){
	include(locate_template('template-parts/blocks/header.php', false, false));
}
}else{

global $post;
$cat_id = 'term_'.get_the_terms( $post->ID, 'product_cat' )[0]->term_id;

	$text_and_image = get_field('text_and_image',$shop_page_id);
	if($text_and_image){
		include(locate_template('template-parts/blocks/text-and-image.php', false, false));
	}

	$call_out = get_field('call_out',$shop_page_id);
	if($call_out){
		include(locate_template('template-parts/blocks/call-out.php', false, false));
	}
	include(locate_template('template-parts/blocks/navbar-secondary.php', false, false));

	$header = get_field('header',$cat_id);
	$header['variant'] = "medium";
	if($header){
	include(locate_template('template-parts/blocks/header.php', false, false));
	}

	$product_feed_text_and_image = get_field('product_feed_text_and_image',$cat_id);
	if($product_feed_text_and_image){
	include(locate_template('template-parts/blocks/product-feed-text-and-image.php', false, false));
	}
}
?>
<div class="woocommerce-products">

<?php if ( is_active_sidebar( 'product-header' ) ) : ?>
    <ul id="sidebar">
        <?php dynamic_sidebar( 'product-header' ); ?>
    </ul>
<?php endif; ?>

<?php
if ( woocommerce_product_loop() ) {


	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */

	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();
	echo '</div>';
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
if(is_product_category()){

	$pre_footer = get_field('pre_footer',$cat_id);
	if($pre_footer){
		include(locate_template('template-parts/blocks/pre-footer.php', false, false));
	}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */


}

get_footer( 'shop' );
