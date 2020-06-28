<?php
if ($link) :
	$class_name = $link['class_name'];
	$tag = $link['tag'] ? $link['tag'] : 'a';
	$target = $link['target'];
	$title = $link['title'];
	$url = $link['url'];
?>
	<<?php echo $tag; ?>
		<?php if ($class_name) : ?>
			class="<?php echo $class_name; ?>"
		<?php endif; ?>
		<?php if ($link['download']) : ?>
			download
		<?php endif; ?>
		<?php if ($url) : ?>
			href="<?php echo esc_url($url); ?>"
		<?php endif; ?>
		<?php if ($target) : ?>
			target="<?php echo $target; ?>"
		<?php endif; ?>
	><?php echo $title; ?></<?php echo $tag; ?>>
<?php endif; ?>
