
<?php
$header_heading = get_sub_field('header_heading');
$header_body = get_sub_field('header_body');
$image = get_sub_field('image');
$text = get_sub_field('text');
?>
<section class="section section-introduction">
	<div class="section__inner">
		<header class="rich-text rich-text--large section-introduction__header">
			<h1 class="heading-2 section-introduction__heading"><?php echo $header_heading; ?></h1>
			<?php echo $header_body; ?>
		</header>
		<div class="section-introduction__content">
			<div class="section-introduction__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
			<div class="section-introduction__text rich-text"><?php echo $text; ?></div>
		</div>
	</div>
</section>
