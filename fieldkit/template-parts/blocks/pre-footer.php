<?php
$body = $pre_footer['body'];
$link = $pre_footer['link'];
$image = $pre_footer['image'];
?>
<?php if ($body) : ?>
<header class="section section-pre-footer">
	<div class="section__inner section__inner--inset">
	<div class="section-pre-footer__text">

		<div class="rich-text rich-text--large">
			<?php echo $body; ?>
		</div>
		<?php if ($link) : ?>
			<div class="section-pre-footer__links">

					<div class="section-pre-footer__links-item">
						<?php
						$link['class_name'] = 'button button--primary';
						set_query_var('link', $link);
						get_template_part('template-parts/utilities/link');
						?>
					</div>
			</div>
		<?php endif; ?>
	</div>
			<div class="section-pre-footer__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
	</div>
</header>
<?php endif; ?>
