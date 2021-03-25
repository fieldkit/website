<?php
$callout_type = get_sub_field('callout_type');
$callout_id = get_sub_field('callout_id');
$rich_text = get_sub_field('rich_text');
?>
<?php if ($callout_id) : ?>
	<div class="anchor-point" id="<?php echo $callout_id; ?>"></div>
<?php endif; ?>
<section class="section section-rich-text section-callout-block<?php if ($callout_type === 'Important Note') : ?> callout-important-note<?php elseif ($callout_type === 'Warning') : ?> callout-warning<?php else : ?> callout-quick-tip<?php endif; ?>">
	<div class="section__inner">
		<div class="rich-text"><?php echo $rich_text; ?></div>
	</div>
</section>
