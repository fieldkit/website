<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$home_hero = get_field('home_hero');
	// $heading = $home_hero['heading'];
	?>
	<header class="section section-home-hero">
		<div class="section__inner">
			<div>
				<h1></h1>
				<p></p>
				<div>
					<?php
					if ($link) {
						$link['class_name'] = 'button button--primary';
						set_query_var('link', $link);
						get_template_part('template-parts/utilities/link');
					}
					?>
				</div>
			</div>
			<div>
				<?php echo wp_get_attachment_image($image['ID'], 'full', false, ['class' => '']);  ?>
			</div>
		</div>
	</header>

	<?php
	$home_icon_grid = get_field('home_icon_grid');
	// $heading = $home_icon_grid['heading'];
	?>
	<section class="section section-home-icon-grid">
		<div class="section__inner"></div>
	</section>

	<?php
	$home_product_grid = get_field('home_product_grid');
	// $heading = $home_product_grid['heading'];
	?>
	<section class="section section-home-product-grid">
		<div class="section__inner"></div>
	</section>

	<?php
	$home_text_and_image_1 = get_field('home_text_and_image_1');
	// $heading = $home_text_and_image_1['heading'];
	?>
	<section class="section section-home-text-and-image-1">
		<div class="section__inner"></div>
	</section>

	<?php
	$home_callout = get_field('home_callout');
	// $heading = $home_icon_grid['heading'];
	?>
	<section class="section section-home-callout">
		<div class="section__inner section__inner--inset"></div>
	</section>

	<?php
	$home_text_and_image_2 = get_field('home_text_and_image_2');
	// $heading = $home_text_and_image_2['heading'];
	?>
	<section class="section section-home-text-and-image-2">
		<div class="section__inner section__inner--inset"></div>
	</section>
</main>
<?php get_footer(); ?>
