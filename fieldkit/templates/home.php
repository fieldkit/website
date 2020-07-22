<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$home_hero = get_field('home_hero');
	$heading = $home_hero['heading'];
	$body = $home_hero['body'];
	$link = $home_hero['link'];
	$image = $home_hero['image'];
	$background_image = $home_hero['background_image'];
	?>
	<header class="section section-home-hero">
		<div class="section__inner">
			<div class="section-home-hero__text">
				<div class="rich-text">
					<h1 class="heading-1"><?php echo $heading; ?></h1>
					<p class="heading-4"><?php echo $body; ?></p>
				</div>
				<?php
				if ($link) {
					$link['class_name'] = 'button button--primary section-home-hero__link';
					set_query_var('link', $link);
					get_template_part('template-parts/utilities/link');
				}
				?>
			</div>
			<div class="section-home-hero__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
		</div>
		<div class="section-home-hero__background">
			<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
		</div>
	</header>

	<?php
	$home_icon_grid = get_field('home_icon_grid');
	$items = $home_icon_grid['items'];
	$last_item = $home_icon_grid['last_item'];
	?>
	<section class="section section-home-icon-grid">
		<div class="section__inner">
			<ul class="section-home-icon-grid__list">
				<?php
				foreach($items as $item) :
					$icon = $item['icon'];
					$heading = $item['heading'];
					$body = $item['body'];
				?>
					<li class="section-home-icon-grid__item">
						<div class="section-home-icon-grid__item-icon">
							<?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
						</div>
						<div class="section-home-icon-grid__item-text rich-text">
							<h2 class="heading-6"><?php echo $heading; ?></h2>
							<?php echo $body; ?>
						</div>
					</li>
				<?php endforeach; ?>
				<?php
				if ($last_item) :
					$icon = $last_item['icond'];
					$heading = $last_item['heading'];
					$link = $last_item['link'];
				?>
					<li class="section-home-icon-grid__last-item">
						<div class="section-home-icon-grid__last-item-inner">
							<div class="section-home-icon-grid__last-item-top">
								<?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
								<h2 class="heading-5 section-home-icon-grid__last-item-heading"><?php echo $heading; ?></h2>
							</div>
							<?php
							if ($link) {
								$link['class_name'] = 'button button--primary section-home-icon-grid__last-item-link';
								set_query_var('link', $link);
								get_template_part('template-parts/utilities/link');
							}
							?>
						</div>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</section>

	<?php
	$home_product_grid = get_field('home_product_grid');
	$items = $home_product_grid['items'];
	?>
	<section class="section section-home-product-grid">
		<div class="section__inner">
			<ul class="section-home-product-grid__list">
				<?php
				foreach($items as $post) :
					setup_postdata($post);
					$image = [
						'ID' => get_post_thumbnail_id()
					];
					$heading = get_the_title();
					$body = get_the_excerpt();
					$link = [
						title => 'Learn More',
						url => get_the_permalink(),
					];
				?>
					<li class="section-home-product-grid__item">
						<div class="section-home-product-grid__item-image">
							<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
						</div>
						<div class="section-home-product-grid__item-text">
							<div class="rich-text">
								<h2 class="heading-6"><?php echo $heading; ?></h2>
								<p><?php echo $body; ?></p>
							</div>
							<?php
							if ($link) {
								$link['class_name'] = 'button button--primary section-home-product-grid__item-link';
								set_query_var('link', $link);
								get_template_part('template-parts/utilities/link');
							}
							?>
						</div>
					</li>
				<?php
				endforeach;
				wp_reset_postdata();
				?>
			<ul>
		</div>
	</section>

	<?php
	$home_text_and_image_1 = get_field('home_text_and_image_1');
	$heading = $home_text_and_image_1['heading'];
	$body = $home_text_and_image_1['body'];
	$link = $home_text_and_image_1['link'];
	$image = $home_text_and_image_1['image'];
	?>
	<section class="section section-home-text-and-image-1">
		<div class="section__inner">
			<div class="section-home-text-and-image-1__text">
				<div class="rich-text">
					<h2 class="heading-3"><?php echo $heading; ?></h2>
					<p class="heading-5"><?php echo $body; ?></p>
				</div>
				<?php
				if ($link) {
					$link['class_name'] = 'link link--large section-home-text-and-image-1__link';
					set_query_var('link', $link);
					get_template_part('template-parts/utilities/link');
				}
				?>
			</div>
			<div class="section-home-text-and-image-1__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
		</div>
	</section>

	<?php
	$home_callout = get_field('home_callout');
	$heading = $home_callout['heading'];
	$body = $home_callout['body'];
	$link = $home_callout['link'];
	?>
	<section class="section section-home-callout">
		<div class="section__inner section__inner--inset">
			<div class="rich-text">
				<h2 class="heading-3"><?php echo $heading; ?></h2>
				<?php echo $body; ?>
			</div>
			<?php
			if ($link) {
				$link['class_name'] = 'button button--tertiary section-home-callout__link';
				set_query_var('link', $link);
				get_template_part('template-parts/utilities/link');
			}
			?>
		</div>
	</section>

	<?php
	$home_text_and_image_2 = get_field('home_text_and_image_2');
	$heading = $home_text_and_image_2['heading'];
	$body = $home_text_and_image_2['body'];
	$link = $home_text_and_image_2['link'];
	$image = $home_text_and_image_2['image'];
	?>
	<section class="section section-home-text-and-image-2">
		<div class="section__inner section__inner--inset">
			<div class="section-home-text-and-image-2__text">
				<div class="rich-text">
					<h2 class="heading-3"><?php echo $heading; ?></h2>
					<p class="heading-5"><?php echo $body; ?></p>
				</div>
				<?php
				if ($link) {
					$link['class_name'] = 'link link--large section-home-text-and-image-2__link';
					set_query_var('link', $link);
					get_template_part('template-parts/utilities/link');
				}
				?>
			</div>
			<div class="section-home-text-and-image-2__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
