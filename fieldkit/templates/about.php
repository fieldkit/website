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
			<div class="section-about-header__background hide-mobile">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
			<div class="section-about-header__background section-about-header__background-mobile hide-desktop">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Mobile_About_Header.svg" alt="">
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

	<?php
	$about_partnerships_block = get_field('about_partnerships_block');
	$heading = $about_partnerships_block['heading'];
	$body = $about_partnerships_block['body'];
	?>
	<?php if($heading || $body) : ?>
	<section class="section section-about-partnerships">
		<div class="section__inner section__inner--inset">
			<div class="rich-text rich-text--large">
				<?php if($heading) : ?><h2 class="heading-3"><?php echo $heading; ?></h2><?php endif; ?>
				<?php if($body) : ?><?php echo $body; ?><?php endif; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php
	$about_funders = get_field('about_funders');
	$header = $about_funders['header'];
	$image = $about_funders['image'];
	$rich_text = $about_funders['rich_text'];
	?>
	<?php if($header || $image || $rich_text) : ?>
	<section class="section section-about-featured-partnership">
		<div class="section__inner">
			<div class="section-about-featured-partnership-header">
				<?php if($header) : ?><h2 class="heading-4"><?php echo $header; ?></h2><?php endif; ?>
			</div>
			<div class="section-about-featured-partnership-container">
				<div class="section-about-featured-partnership-image">
					<?php if($image) : ?><?php echo wp_get_attachment_image($image['ID'], 'full'); ?><?php endif; ?>
				</div>
				<div class="section-about-featured-partnership-text rich-text rich-text--large">
					<?php if($rich_text) : ?><?php echo $rich_text; ?><?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php
	$about_past_funders = get_field('about_past_funders');
	$heading = $about_past_funders['heading'];
	$item = $about_past_funders['item'];
	?>
	<?php if($heading || $item) : ?>
	<section class="section section-about-funders">
		<div class="section__inner">
			<div class="section-about-funders-header">
				<?php if($heading) : ?><h2 class="heading-4"><?php echo $heading; ?></h2><?php endif; ?>
			</div>
			<?php if($item) : ?>
			<div class="section-about-funders-list">
				<?php
				foreach ($item as $row) :
				$image = $row['image']; ?>
				<div class="section-about-funders-item">
					<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php
	$about_partner_institutions = get_field('about_partner_institutions');
	$heading = $about_partner_institutions['heading'];
	$item = $about_partner_institutions['item'];
	?>
	<?php if($heading || $item) : ?>
	<section class="section section-about-partners">
		<div class="section__inner">
			<div class="section-about-partners-header">
				<?php if($heading) : ?><h2 class="heading-4"><?php echo $heading; ?></h2><?php endif; ?>
			</div>
			<?php if($item) : ?>
			<div class="section-about-partners-list">
				<?php
				foreach ($item as $row) :
				$image = $row['image']; ?>
				<div class="section-about-partners-item">
					<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php
	$about_callout = get_field('about_callout');
	$heading = $about_callout['heading'];
	$body = $about_callout['body'];
	$item = $about_callout['item'];
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
