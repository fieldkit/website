<?php
$social = get_field('social', 'option');
$facebook = $social['facebook'];
$instagram = $social['instagram'];
$twitter = $social['twitter'];
?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<div class="social-button-container">
			<a href="<?php echo $twitter; ?>" class="icon-button"></a>
			<a href="<?php echo $facebook; ?>" class="icon-button"></a>
			<a href="<?php echo $instagram; ?>" class="icon-button"></a>
		</div>
		<?php
		if (has_nav_menu('legal')) {
			wp_nav_menu(array('theme_location' => 'legal'));
		}
		?>
	</div>
</footer>
