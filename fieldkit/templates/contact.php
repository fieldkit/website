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
				<h1 class="heading-1 section-contact-header__heading"><?php echo $heading; ?></h1>
				<?php if ($body) echo $body; ?>
			</div>
			<div class="section-contact-header__background">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Contact_Header-scaled.png" alt="">
				<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
			</div>
		</div>
	</header>

	<?php
	$contact_form = get_field('contact_form');
	$contact_form_7_shortcode = $contact_form['contact_form_7_shortcode'];
	?>
	<header class="section section-contact-form">
		<div class="section__inner">
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
