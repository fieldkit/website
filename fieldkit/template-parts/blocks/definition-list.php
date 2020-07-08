<?php
$content = get_field('content');

foreach ($content as $item) :
	$header_heading = $item['header_heading'];
	$header_body = $item['header_body'];
	$items = $item['items'];
?>
	<h2><?php echo $header_heading; ?></h2>
	<h5>
		<?php echo strip_tags( $header_body, ''); ?>
	</h5>

	<?php
	foreach ($items as $item2) :
		$image = $item2["image"]["url"];
		$definition = $item2["definition"];
	?>
		<?php echo $definition; ?>
		<img src="<?php echo $image; ?>" />

	<?php endforeach; ?>
<?php endforeach; ?>
