<?php /* Template Name: How It Works */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$how_it_works_header = get_field('how_it_works_header');
	$heading = $how_it_works_header['heading'];
	$background_image = $how_it_works_header['background_image'];
	?>
	<header class="section section-how-it-works-header">
		<div class="section__inner">
			<h1 class="heading-1 section-how-it-works-header__heading"><?php echo $heading; ?></h1>
			<div class="section-how-it-works-header__background">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
		</div>
	</header>

	<?php
	$how_it_works_steps = get_field('how_it_works_steps');
	$items = $how_it_works_steps['items'];
	?>
	<section class="section section-how-it-works-steps">
		<div class="section__inner">
			<ul class="section-how-it-works-steps__list">
				<?php
				foreach($items as $item) :
					$image = $item['image'];
					$heading = $item['heading'];
					$body = $item['body'];
				?>
					<li class="section-how-it-works-steps__item">
						<div class="section-how-it-works-steps__item-image">
							<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
						</div>
						<div class="section-how-it-works-steps__item-text rich-text">
							<h2 class="heading-2"><?php echo $heading; ?></h2>
							<?php echo $body; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php
	$how_it_works_step_by_step = get_field('how_it_works_step_by_step');
	$header_heading = $how_it_works_step_by_step['header_heading'];
	$items = $how_it_works_step_by_step['items'];
	?>
	<section class="section section-how-it-works-step-by-step">
		<div class="section__inner">
			<header class="section-how-it-works-step-by-step__header">
				<h2 class="heading-2"><?php echo $header_heading; ?></h2>
			</header>
			<ul class="section-how-it-works-step-by-step__list">
				<?php
				foreach($items as $item) :
					$image = $item['image'];
					$heading = $item['heading'];
					$time = $item['time'];
					$body = $item['body'];

				?>
					<li class="section-how-it-works-step-by-step__item">
						<div class="section-how-it-works-step-by-step__item-image">
							<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
						</div>
						<div class="section-how-it-works-step-by-step__item-text rich-text">
							<h2 class="heading-3"><?php echo $heading; ?></h2>
							<div class="section-how-it-works-step-by-step__item-time"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-timer.png" alt=""><?php echo $time; ?></div>
							<?php echo $body; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</main>
<?php get_footer(); ?>
