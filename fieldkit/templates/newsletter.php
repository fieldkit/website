<?php /* Template Name: Newsletter */ ?>
<?php get_header(); ?>
<main class="site-main">

	<header class="section section-contact-header">
		<div class="section__inner">
			<div class="rich-text">
				<h1 class="heading-1 section-contact-header__heading">
					<?php echo get_the_title(); ?>
				</h1>
			</div>

			<div class="section-contact-header__background hide-mobile">
				<?php if (is_page('partner-with-us')): ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-with-us-header.png" alt="">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Contact_Header-scaled.png" alt="">
				<?php endif; ?>
			</div>
			<div class="section-contact-header__background section-contact-header__background-mobile hide-desktop">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Mobile_About_Header.svg" alt="">
			</div>
		</div>
	</header>

	<?php
	$newsletter_heading = get_field('newsletter_heading');
	$newsletter_content = get_field('newsletter_content');
	$newsletter_shortcode = get_field('newsletter_shortcode');
	?>
	<?php if ($newsletter_heading || $newsletter_content || $newsletter_shortcode): ?>
		<header class="section section-contact-form">
			<div class="section__inner">

				<?php if ($newsletter_heading || $newsletter_content): ?>
					<div class="section-contact-form__heading">
						<?php if ($newsletter_heading): ?>
							<h2 class="heading-2"><?php echo $newsletter_heading; ?></h2>
						<?php endif; ?>
						<?php if ($newsletter_content) echo $newsletter_content; ?>
					</div>
				<?php endif; ?>
				<div class="klaviyo-form">
					<?php if ($newsletter_shortcode) echo $newsletter_shortcode; ?>
				</div>
			</div>
		</header>
	<?php endif; ?>
</main>
<?php get_footer(); ?>