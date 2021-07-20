<?php /* Template Name: Fieldkit Platform */ ?>
<?php get_header(); ?>
<main class="site-main page-template-fk-platform">
	<?php
	$fieldkit_platform_header = get_field('fieldkit_platform_header');
	$heading = $fieldkit_platform_header['heading'];
	$background_image = $fieldkit_platform_header['background_image'];
	?>
	<header class="section section-about-header">
		<div class="section__inner">
			<h1 class="heading-1 section-about-header__heading"><?php echo $heading; ?></h1>
			<div class="section-about-header__background hide-mobile">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
			<div class="section-about-header__background section-about-header__background-mobile hide-desktop">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Mobile_About_Header.svg" alt="">
			</div>
		</div>
	</header>

	<?php
	$fieldkit_platform_block = get_field('fieldkit_platform_block');
	$heading = $fieldkit_platform_block['heading'];
	$body = $fieldkit_platform_block['body'];
	$icon = $fieldkit_platform_block['icon'];
	$link = $fieldkit_platform_block['link'];
	?>
	<?php if($heading || $body || $icon || $link) : ?>
	<section class="section section-cta-block">
	<div class="section__inner section__inner--inset">
		<div class="section-cta-block__container">
			<div class="section-cta-block__icon">
				<?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
			</div>
			<div class="section-cta-block__body rich-text rich-text--large">
				<?php if($heading) : ?>
					<h2 class="heading-3"><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ($body) echo $body; ?>
				<?php
				if ($link) {
					$link['class_name'] = 'button button--tertiary section-cta-block__link';
					set_query_var('link', $link);
					get_template_part('template-parts/utilities/link');
				}
				?>
			</div>
		</div>
	</div>
</section>

	<?php endif; ?>

	<?php
	$fieldkit_platform_text_and_image_grid = get_field('fieldkit_platform_text_and_image_grid');
	$header_heading = $fieldkit_platform_text_and_image_grid['header_heading'];
	$header_body = $fieldkit_platform_text_and_image_grid['header_body'];
	$items = $fieldkit_platform_text_and_image_grid['items'];
	?>
	<section class="section section-about-text-and-image-grid section-fk-platform-text-and-image-grid">
		<div class="section__inner">
			<header class="section-about-text-and-image-grid__header rich-text rich-text--large">
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
						<div class="section-about-text-and-image-grid__item-text rich-text rich-text--large">
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
	$fieldkit_platform_callout = get_field('fieldkit_platform_callout');
	$heading = $fieldkit_platform_callout['heading'];
	$body = $fieldkit_platform_callout['body'];
	$item = $fieldkit_platform_callout['item'];
	?>
	<?php if($heading || $body || $row) : ?>
	<section class="section section-services-callout">
		<div class="section__inner section__inner--inset">
			<?php if($heading || $body) : ?>
			<div class="rich-text rich-text--large">
				<?php if($heading) : ?>
				<h2 class="heading-3"><?php echo $heading; ?></h2>
				<?php endif; ?>
				<?php if ($body) echo $body; ?>
			</div>
			<?php endif; ?>
			<?php
			foreach ($item as $row) :
			$links = $row['link']; ?>
				<?php if($links) : ?>
				<a class="button button--primary section-services-callout__link" href="<?php echo $links['url']; ?>" target="<?php echo $links['target']; ?>"><?php echo $links['title']; ?></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
