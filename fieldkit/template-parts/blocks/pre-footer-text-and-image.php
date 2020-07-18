<?php
$heading = $pre_footer['heading'];
$body = $pre_footer['body'];
$links = $pre_footer['header_links'];
?>
<header class="section section-pre_footer_text_and_image">
	<div class="section__inner">
		<div class="rich-text">
			<h2 class="heading-2"><?php echo $heading; ?></h2>
			<?php echo $body; ?>
		</div>
		<?php if ($links) : ?>
			<div class="section-header__links">
				<?php
				foreach ($links as $link_item) :
					$link = $link_item['link'];
				?>
					<div class="section-header__links-item">
						<?php
						$link['class_name'] = 'button button--primary';
						set_query_var('link', $link);
						get_template_part('template-parts/utilities/link');
						?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</header>
