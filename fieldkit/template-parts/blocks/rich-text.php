<?php
$rich_text = get_sub_field('rich_text');
$block_id = get_sub_field('block_id');
?>
<section class="section section-rich-text">
	<div class="section__inner">
		<div id="<?php echo $block_id; ?>"></div>
		<div class="rich-text"><?php echo $rich_text; ?></div>
	</div>
</section>
