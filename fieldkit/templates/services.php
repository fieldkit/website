<?php /* Template Name: Services */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$services_header = get_field('services_header');
	$heading = $services_header['heading'];
	$body = $services_header['body'];
	$background_image = $services_header['background_image'];
	?>
	<header class="section section-services-header">
		<div class="section__inner">
			<div class="rich-text section-services-header__heading">
				<h1 class="heading-2"><?php echo $heading; ?></h1>
				<?php if ($body) echo $body; ?>
			</div>
			<div class="section-services-header__background">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
		</div>
	</header>
	<?php
	$services_text_grid = get_field('services_text_grid');
	$items = $services_text_grid['items'];
	?>
	<section class="section section-services-text-grid">
		<div class="section__inner">
			<ul class="section-services-text-grid__list">
				<?php
				foreach($items as $item) :
					$heading = $item['services_heading'];
					$body = $item['services_body'];
				?>
				<li class="section-services-text-grid__item">
					<div class="section-services-text-grid__item-text rich-text rich-text--large">
						<h3 class="heading-3"><?php echo $heading; ?></h3>
						<?php echo $body; ?>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php
	$services_callout = get_field('services_callout');
	$heading = $services_callout['heading'];
	$body = $services_callout['body'];
	$link = $services_callout['link'];
	?>
	<section class="section section-services-callout">
		<div class="section__inner section__inner--inset">
			<div class="rich-text rich-text--large">
				<h2 class="heading-3"><?php echo $heading; ?></h2>
				<?php if ($body) echo $body; ?>
			</div>
			<?php
			if ($link) {
				$link['class_name'] = 'button button--primary section-services-callout__link';
				set_query_var('link', $link);
				get_template_part('template-parts/utilities/link');
			}
			?>
		</div>
	</section>
</main>
<?php get_footer(); ?>
