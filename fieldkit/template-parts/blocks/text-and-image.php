<?php
	$header = $text_and_image['header'];
	$heading = $text_and_image['heading'];
	$body = $text_and_image['body'];
	$image = $text_and_image['image'];
	$background_image = $text_and_image['background_image'];
?>

<section class="section section-home-text-and-image-1">
		<div class="section__inner">
			<h1><?php echo $header;?></h1>
			<div class="section-home-text-and-image-1__text"
			style="background-image: url(<?php echo $background_image['url'];?>
			)">
				<div class="rich-text">
					<h2 class="heading-3"><?php echo $heading; ?></h2>
					<?php echo $body; ?>
				</div>
			</div>
			<div class="section-home-text-and-image-1__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
		</div>
	</section>
