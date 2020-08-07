<?php
$header_heading = get_sub_field('header_heading');
$header_body = get_sub_field('header_body');
$items = get_sub_field('items');
?>
<section class="section section-definition-list">
	<div class="section__inner">
		<?php if ($header_heading || $header_body) : ?>
			<header class="rich-text section-definition-list__header">
				<?php if ($header_heading) : ?>
					<h2 class="heading-4"><?php echo $header_heading; ?></h2>
				<?php endif; ?>
				<?php if ($header_body) echo $header_body; ?>
			</header>
		<?php endif; ?>
		<div class="section-definition-list__list">
			<?php
			foreach ($items as $item) :
				$image = $item["image"];
				$name = $item["name"];
				$definition = $item["definition"];
			?>
				<div class="section-definition-list__item">
					<?php if ($image) : ?>
						<div class="section-definition-list__item-image">
							<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
						</div>
					<?php endif; ?>
					<div class="section-definition-list__item-text rich-text">
						<h3 class="section-definition-list__item-text-name heading-5"><?php echo $name; ?></h3>
						<?php echo $definition; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
