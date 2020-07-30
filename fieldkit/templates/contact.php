<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$contact_header = get_field('contact_header');
	$heading = $contact_header['heading'];
	$body = $contact_header['body'];
	$background_image = $contact_header['background_image'];
	?>
	<header class="section section-contact-header">
		<div class="section__inner">
			<div class="rich-text">
				<?php if (is_page('partner-with-us') ):?>
					<div class="section-contact-header__heading hide-mobile">
						<h1 class="heading-1"><?php echo $heading; ?></h1>
						<?php if ($body) echo $body; ?>
					</div>
					<h1 class="heading-1 section-contact-header__heading hide-desktop">Partner with Us</h1>
				<?php else : ?>
					<h1 class="heading-1 section-contact-header__heading"><?php echo get_the_title(); ?></h1>
				<?php endif; ?>
			</div>
			<div class="section-contact-header__background hide-mobile">
				<?php if (is_page('partner-with-us') ):?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-with-us-header.png" alt="">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Contact_Header-scaled.png" alt="">
				<?php endif; ?>
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>

			<div class="section-contact-header__background section-contact-header__background-mobile hide-desktop">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Mobile_About_Header.svg" alt="">
			</div>


		</div>
	</header>

	<?php
	$contact_form = get_field('contact_form');
	$contact_form_7_shortcode = $contact_form['contact_form_7_shortcode'];
	?>
	<header class="section section-contact-form">
		<div class="section__inner">
			<?php if (!is_page('partner-with-us') ):?>
			<div class="section-contact-form__heading">
				<h2 class="heading-2"><?php echo $heading; ?></h2>
				<?php if ($body) echo $body; ?>
			</div>
			<?php else: ?>
			<div class="section-contact-form__heading hide-desktop">
				<h2 class="heading-2"><?php echo $heading; ?></h2>
				<?php if ($body) echo $body; ?>
			</div>
			<?php endif; ?>
			<div class="section-contact-form__required">*Required</div>
			<?php
			if ($contact_form_7_shortcode) {
				$contact_form_markup = do_shortcode($contact_form_7_shortcode);
				echo $contact_form_markup;
			}
			?>
		</div>
	</header>
</main>
<?php get_footer(); ?>
