<?php /* Template Name: Support */ ?>
<?php get_header(); ?>
<main class="site-main page-template-support">
	<?php
	$support_header = get_field('support_header');
	$heading = $support_header['heading'];
	$body = $support_header['body'];
	$background_image = $support_header['background_image'];
	?>
	<header class="section section-about-header">
		<div class="section__inner">
			<div class="section-about-header__text">
				<h1 class="heading-1 section-about-header__heading"><?php echo $heading; ?></h1>
				<?php if($body) : ?>
				<div class="section-about-header__body rich-text">
					<?php echo $body; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="section-about-header__background hide-mobile">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
			<div class="section-about-header__background section-about-header__background-mobile hide-desktop">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Mobile_About_Header.svg" alt="">
			</div>
		</div>
	</header>


	<?php
		$items = get_field('items');
	?>

	<section class="section section-card-grid">
		<div class="section__inner">
			<div class="card-list">
				<?php
				foreach($items as $card_item) :
					$heading = $card_item['heading'];
					$body = $card_item['body'];
					$icon = $card_item['icon'];
				?>
				<div class="card-item">
					<div class="card">
						<div class="card-image">
							<?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
						</div>
						<div class="card-text">
							<div class="card-heading">
								<h3 class="heading-6"><?php echo $heading; ?></h3>
							</div>
							<div class="card-body rich-text">
								<?php echo $body; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
		$cta_block = get_field('cta_block');
		$heading = $cta_block['heading'];
		$body = $cta_block['body'];
		$link = $cta_block['link'];
		$background_color = $cta_block['background_color'];
	?>

	<section class="section section-support-callout">
		<div class="section__inner">
			<div class="section-cta-block">
				<div class="rich-text rich-text--large">
					<h2 class="heading-3"><?php echo $heading; ?></h2>
					<?php if ($body) echo $body; ?>
				</div>
				<?php
				if ($link) {
					$link['class_name'] = 'button button--tertiary section-cta-block__link';
					set_query_var('link', $link);
					get_template_part('template-parts/utilities/link');
				}
				?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
