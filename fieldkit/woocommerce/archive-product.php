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

$id = get_option( 'woocommerce_shop_page_id' );
$products_text_and_image_1 = get_field('products_text_and_image_1', $id);
$product_grid_text = get_field('product_grid_text', $id);
$services_grid_text = get_field('services_grid_text', $id);
$products_text_and_image_2 = get_field('products_text_and_image_2', $id);

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

<?php
$header = $products_text_and_image_1['header'];
$heading = $products_text_and_image_1['heading'];
$body = $products_text_and_image_1['body'];
$link1 = $products_text_and_image_1['link_1'];
$link2 = $products_text_and_image_1['link_2'];
$image = $products_text_and_image_1['image'];
$background_image = $products_text_and_image_1['background_image']['url'];
?>
<section class="section section-product-services" style="background-image: url('<?php echo $background_image; ?>')">
	<div class="section__inner">
		<h1 class="heading-1"><?php echo $header; ?></h1>
		<div class="section-product-services-container">
			<div class="section-product-services__text">
				<div class="rich-text">
					<h2 class="heading-2"><?php echo $heading; ?></h2>
					<p><?php echo $body; ?></p>
				</div>
				<div class="section-product-services__buttons">
					<a href="<?php echo $link1['url']; ?>" class="product-services-button disable-woo-button button--primary"><?php echo $link1['title']; ?></a>
					<a href="<?php echo $link2['url']; ?>" class="product-services-button disable-woo-button button--primary"><?php echo $link2['title']; ?></a>
				</div>
			</div>
			<div class="section-product-services__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
		</div>
	</div>
</section>

<?php
$heading = $product_grid_text['heading'];
$body = $product_grid_text['body'];
$items = $product_grid_text['items'];
?>
<div class="anchor-point" id="packages"></div>
<section class="section section-product-fieldkit-packages">
	<div class="section__inner">
		<div class="section-product-fieldkit-packages-header rich-text">
			<h3 class="heading-2"><?php echo $heading; ?></h3>
			<p><?php echo $body; ?></p>
		</div>
		<div class="section-product-fieldkit-packages__products">
			<?php
			foreach($items as $post) :
				setup_postdata($post);
				$image = [
					'ID' => get_post_thumbnail_id()
				];
				$heading = get_the_title();
				$link = [
					title => 'View Product',
					url => get_the_permalink(),
				];
			?>
				<div class="product-fieldkit-packages__products-item">
					<div class="rich-text">
						<h3 class="product-fieldkit-packages__heading"><a href="<?php echo get_the_permalink(); ?>"><?php echo $heading; ?></a></h3>
						<p class="heading-6 product-fieldkit-packages__products-item-note">(Available Soon)</p>
					</div>
					<div class="product-fieldkit-packages__products-item-image">
						<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
					</div>
					<?php
					if ($link) :
						$link['class_name'] = 'disable-woo-button button--primary';
					?>
						<div class="product-fieldkit-packages__products-button">
							<?php
							set_query_var('link', $link);
							get_template_part('template-parts/utilities/link');
							?>
						</div>
					<?php endif; ?>
				</div>
			<?php
			endforeach;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<?php
$heading = $services_grid_text['heading'];
$body = $services_grid_text['body'];
$services_list = $services_grid_text['services_list'];
$heading_2 = $services_grid_text['heading_2'];
$link = $services_grid_text['link'];
?>
<div class="anchor-point" id="services"></div>
<section class="section section-product-fieldkit-services">
	<div class="section__inner">
		<header class="section-product-fieldkit-services-header rich-text">
			<h2 class="heading-2"><?php echo $heading; ?></h2>
			<p><?php echo $body; ?></p>
		</header>
		<ul class="product-fieldkit-services__list">
			<?php
			foreach ($services_list as $item) :
				$title = $item['title'];
				$text = $item['text'];
			?>
				<li class="rich-text">
					<h3 class="heading-3"><?php echo $title; ?></h3>
					<p><?php echo $text; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
		<footer class="fieldkit-services-header-bottom">
			<h3 class="heading-3"><?php echo $heading_2; ?></h3>
			<a href="<?php echo $link['url']; ?>" class="disable-woo-button button--primary"><?php echo $link['title']; ?></a>
		</footer>
	</div>
</section>


<?php
$heading = $products_text_and_image_2['heading'];
$body = $products_text_and_image_2['body'];
$link = $products_text_and_image_2['link'];
$image = $products_text_and_image_2['image'];
?>
<section class="section section-product-partner-with-us">
	<div class="section__inner">
		<div class="section-product-partner-with-us-container">
			<div class="section-product-partner-with-us__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
			<div class="section-product-partner-with-us__info">
				<h3 class="heading-3"><?php echo $heading; ?></h3>
				<div class="section-product-partner-with-us__text">
					<?php echo $body; ?>
				</div>
				<a href="<?php echo $link['url']; ?>" class="link link--large"><?php echo $link['title']; ?></a>
			</div>
		</div>
	</div>
</section>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
<?php
get_footer( 'shop' );
