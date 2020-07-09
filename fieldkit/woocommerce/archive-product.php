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

?>

<section class="section section-product-services">
	<div class="section__inner">
		<h1 class="heading-1">Product and Services</h1>
		<div class="section-product-services-container">
			<div class="section-product-services__text">
				<div class="rich-text">
					<h2 class="heading-2">Built on the values of open source technology</h2>
					<p class="heading-4">We’ve designed each product offering to work together as part of an integrated, modular system.</p>
				</div>
				<div class="section-product-services__buttons">
					<a href="#" class="product-services-button disable-woo-button button--primary">FieldKit Products</a>
					<a href="#" class="product-services-button disable-woo-button button--primary">FieldKit Services</a>
				</div>
			</div>
			<div class="section-product-services__image">
			<img width="2160" height="2016" src="https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header.png" class="vc_single_image-img attachment-full" alt="People deploying FieldKit stations in the environment" srcset="https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header.png 2160w, https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header-600x560.png 600w, https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header-300x280.png 300w, https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header-1024x956.png 1024w, https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header-768x717.png 768w, https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header-1536x1434.png 1536w, https://www.fieldkit.org/wp-content/uploads/2019/11/ProductServices_Header-2048x1911.png 2048w" sizes="(max-width: 2160px) 100vw, 2160px">			</div>
		</div>
	</div>
</section>

<section class="section section-product-fieldkit-packages">
	<div class="section__inner">
		<div class="section-product-fieldkit-packages-header">
			<h3 class="heading-3">FieldKit Packages</h3>
			<div class="section-product-fieldkit-packages__text">
			These kits will come prepackaged with necessary modules, sensors, and prefabricated bottom plates for environmental monitoring. We are excited to bring these to market in 2020.
			</div>
		</div>
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

		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
		?>
	</div>
</section>

<section class="section section-product-fieldkit-services">
	<div class="section__inner">
		<div class="section-product-fieldkit-services-header">
			<h2 class="heading-2">FieldKit Services</h2>
			<div class="product-fieldkit-services__text">The FieldKit team is made up of hardware engineers, designers, sensor developers, software engineers, field experts, and quality assurance that know the FieldKit architecture backwards and forwards.</div>

		</div>
		<ul class="product-fieldkit-services__list">
			<li>
				<h3 class="heading-3">Custom Sensor Module Design </h3>
				<div class="product-fieldkit-services__list-text">We custom design sensors for clients to meet their environmental monitoring needs.</div>
			</li>
			<li>
				<h3 class="heading-3">Custom Sensor Module Design </h3>
				<div class="product-fieldkit-services__list-text">We custom design sensors for clients to meet their environmental monitoring needs.</div>
			</li>
			<li>
				<h3 class="heading-3">Custom Sensor Module Design </h3>
				<div class="product-fieldkit-services__list-text">We custom design sensors for clients to meet their environmental monitoring needs.</div>
			</li>
			<li>
				<h3 class="heading-3">Custom Sensor Module Design </h3>
				<div class="product-fieldkit-services__list-text">We custom design sensors for clients to meet their environmental monitoring needs.</div>
			</li>
		</ul>
		<h3 class="heading-3">Want to learn more about FieldKit stations and services?</h3>
		<a href="#" class="disable-woo-button button--primary">Contact Us</a>
	</div>
</section>

<section class="section section-product-partner-with-us">
	<div class="section__inner">
		<div class="section-product-partner-with-us-container">
			<div class="section-product-partner-with-us__image">
				<img src="https://www.fieldkit.org/wp-content/uploads/2019/11/person-and-birds.svg" alt="">
			</div>
			<div class="section-product-partner-with-us__info">
				<h3 class="heading-3">Didn’t find the perfect environmental sensor?</h3>
				<div class="section-product-partner-with-us__text">
				You can always order a custom-made environmental sensor module.
				</div>
				<a href="#" class="button--link">Partner with us</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer( 'shop' );
