<?php
defined('ABSPATH' ) || exit;
get_header('shop');
?>
<main class="site-main">
	<?php
	$shop_header = get_field('shop_header');
	// $heading = $shop_header['heading'];
	?>
	<?php do_action('woocommerce_before_main_content'); ?>
	<header class="section section-shop-hero">
		<h1><?php woocommerce_page_title(); ?></h1>
	</header>

	<?php
	$shop_product_grid = get_field('shop_product_grid');
	// $heading = $shop_product_grid['heading'];
	?>
	<section class="section section-shop-product-grid">
		<div class="section__inner section__inner--inset">
			<header></header>
			<?php
			if (woocommerce_product_loop()) :
				do_action('woocommerce_before_shop_loop');
				woocommerce_product_loop_start();
				if (wc_get_loop_prop('total')) :
			?>
				<div class="product-feed">
					<ul class="product-feed__list">
						<?php
						while (have_posts()) :
							the_post();
							do_action('woocommerce_shop_loop');
						?>
							<li class="product-feed__item"><?php get_template_part('template-parts/teaser-product'); ?></li>
						<?php
							woocommerce_product_loop_end();
						endwhile;
						?>
					</ul>
				</div>
			<?php
				endif;
				woocommerce_product_loop_end();
			endif;
			?>
		</div>
	</section>
	<?php do_action('woocommerce_after_main_content'); ?>

	<?php
	$shop_services = get_field('shop_services');
	// $heading = $shop_services['heading'];
	?>
	<section class="section section-shop-services">
		<div class="section__inner">
			<header></header>
			<footer></footer>
		</div>
	</section>

	<?php
	$shop_text_and_image_footer = get_field('shop_text_and_image_footer');
	// $heading = $shop_text_and_image_footer['heading'];
	?>
	<footer class="section section-shop-text-and-image-footer">
		<div class="section__inner section__inner--inset"></div>
	</footer>
</main>
<?php
get_footer('shop');
