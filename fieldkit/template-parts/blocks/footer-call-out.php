<?php
$heading = $footer_call_out['heading'];
$body = $footer_call_out['body'];
$link = $footer_call_out['link'];
?>
<section class="section section-services-callout">
	<div class="section__inner section__inner--inset">
		<div class="rich-text rich-text--large">
			<h2 class="heading-3"><?php echo $heading; ?></h2>
			<?php if ($body) echo $body; ?>
		</div>
		<?php
		if ($link) {
			$link['class_name'] = 'button--primary section-services-callout__link';
			set_query_var('link', $link);
			get_template_part('template-parts/utilities/link');
		}
		?>
	</div>
</section>
