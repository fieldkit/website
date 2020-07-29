<?php
$rich_text = get_sub_field('rich_text');
$block_id = get_sub_field('block_id');
?>
<?php if ($block_id) : ?>
	<div class="anchor-point" id="<?php echo $block_id; ?>"></div>
<?php endif; ?>
<section class="section section-rich-text">
	<div class="section__inner">
		<div class="rich-text"><?php echo $rich_text; ?></div>
	</div>
</section>
