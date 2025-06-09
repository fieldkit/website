<section id="fieldkit_klaviyo_integration" aria-labelledby="fieldkit_newsletter_heading">
	<h2 id="fieldkit_newsletter_heading" class="heading-4">
		<?php esc_html_e('Sign up to receive updates about FieldKit', 'fieldkit'); ?>
	</h2>
	<?php
	$newsletter_page_id = get_field('footer_settings_-_newsletter_page', 'option');
	$newsletter_page_url = $newsletter_page_id ? get_permalink($newsletter_page_id) : '#';
	?>
	<a href="<?php echo esc_url($newsletter_page_url); ?>" id="klaviyo_signup" class="button" role="button" name="subscribe">
		<?php esc_html_e('Sign up', 'fieldkit'); ?>
	</a>
</section>