<?php /* Template Name: About */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$about_header = get_field('about_header');
	$heading = $about_header['heading'];
	$background_image = $about_header['background_image'];
	?>
	<header class="section section-about-header">
		<div class="section__inner">
			<h1 class="heading-1 section-about-header__heading"><?php echo $heading; ?></h1>
			<div class="section-about-header__background">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
		</div>
	</header>

	<?php
	$about_text_and_image_grid = get_field('about_text_and_image_grid');
	$header_heading = $about_text_and_image_grid['header_heading'];
	$header_body = $about_text_and_image_grid['header_body'];
	$items = $about_text_and_image_grid['items'];
	?>
	<section class="section section-about-text-and-image-grid">
		<div class="section__inner">
			<header class="section-about-text-and-image-grid__header rich-text rich-text--heading-4">
				<h2 class="heading-2"><?php echo $header_heading; ?></h2>
				<?php echo $header_body; ?>
			</header>
			<ul class="section-about-text-and-image-grid__list">
				<?php
				foreach($items as $item) :
					$heading = $item['heading'];
					$body = $item['body'];
					$image = $item['image'];
				?>
					<li class="section-about-text-and-image-grid__item">
						<div class="section-about-text-and-image-grid__item-text rich-text rich-text--heading-5">
							<h3 class="heading-3"><?php echo $heading; ?></h3>
							<?php echo $body; ?>
						</div>
						<div class="section-about-text-and-image-grid__item-image">
							<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php
	$about_values = get_field('about_values');
	$header_heading = $about_values['header_heading'];
	$items = $about_values['items'];
	?>
	<section class="section section-about-values">
		<div class="section__inner section__inner--inset">
			<header class="section-about-values__header">
				<h2 class="heading-3"><?php echo $header_heading; ?></h2>
			</header>
			<ul class="section-about-values__list">
				<?php
				foreach($items as $item) :
					$icon = $item['icon'];
					$text = $item['text'];
				?>
					<li class="section-about-values__item">
						<div class="section-about-values__icon">
							<?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
						</div>
						<h3 class="section-about-values__item-text heading-4"><?php echo $text; ?></h3>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</main>
<?php get_footer(); ?>
