<?php
$heading = $call_out['heading'];
$body = $call_out['body'];
$links = $call_out['links'];
?>
<header class="section section-callout">
	<div class="section__inner section__inner--inset">
		<h2 class="heading-3"><?php echo $heading; ?></h2>
		<div class="rich-text rich-text--large">
			<?php echo $body; ?>
		</div>
		<?php if ($links) : ?>
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
		<?php endif; ?>
	</div>
</header>
