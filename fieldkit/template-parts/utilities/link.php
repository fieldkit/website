<?php
if ($link) :
	$class_name = $link['class_name'];
	$tag = isset($link['tag']) ? $link['tag'] : 'a';
	$title = $link['title'];
	$url = $link['url'];
?>
	<<?php echo $tag; ?>
		<?php if ($class_name) : ?>
		class="<?php echo $class_name; ?>"
		<?php endif; ?>
		<?php if (isset($link['download'])) : ?>
		download
		<?php endif; ?>
		<?php if ($url) : ?>
		href="<?php echo esc_url($url); ?>"
		<?php endif; ?>
		<?php if (isset($link['target'])) : ?>
		target="<?php echo $link['target']; ?>"
		<?php endif; ?>><?php echo $title; ?></<?php echo $tag; ?>>
<?php endif; ?>