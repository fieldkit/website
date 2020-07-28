<?php
$header_heading = get_sub_field('header_heading');
$header_body = get_sub_field('header_body');
$image = get_sub_field('image');
?>
<section class="section section-image">
	<div class="section__inner">
		<?php if ($header_heading || $header_body) : ?>
			<div class="section-image__header rich-text">
				<?php if ($header_heading) : ?>
					<h2 class="heading-2 section-image__heading"><?php echo $header_heading; ?></h2>
				<?php endif; ?>
				<?php if ($header_body) echo $header_body; ?>
			</div>
		<?php endif; ?>
		<div class="section-image__image">
			<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
		</div>
	</div>
</section>
