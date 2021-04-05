<?php
$heading = get_sub_field('heading');
$body = get_sub_field('body');
$link = get_sub_field('link');
$background_color = get_sub_field('background_color');
?>

<section class="section section-cta-block" style="background-color: <?php echo $background_color; ?>">
	<div class="section__inner section__inner--inset">
		<div class="rich-text rich-text--large">
			<h2 class="heading-3"><?php echo $heading; ?></h2>
			<?php if ($body) echo $body; ?>
		</div>
		<?php
		if ($link) {
			$link['class_name'] = 'button button--tertiary section-cta-block__link';
			set_query_var('link', $link);
			get_template_part('template-parts/utilities/link');
		}
		?>
	</div>
</section>
