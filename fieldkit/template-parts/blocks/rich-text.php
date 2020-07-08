
<?php
$content = get_field('content');

foreach ($content as $item) :
	$rich_text = $item['rich_text'];
?>
<?php echo $rich_text; ?>
<?php endforeach; ?>
