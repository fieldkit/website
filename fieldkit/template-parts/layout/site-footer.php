<?php
$dark_logo_id = get_theme_mod('dark_logo');
$social = get_field('social', 'option');
$facebook = $social['facebook'];
$instagram = $social['instagram'];
$twitter = $social['twitter'];
$github = $social['github'];
$youtube = $social['youtube'];
$download_app = get_field('download_app', 'option');
$app_store = $download_app['app_store'];
$google_play = $download_app['google_play'];
?>
<footer class="site-footer">
	<?php if(is_product_category() || is_shop()) : ?>
	<button class="scroll-to-top" aria-label="scroll to top"></button>
	<?php endif; ?>
	<div class="site-footer__newsletter">
			<?php get_template_part('template-parts/components/mailchimp'); ?>
		</div>
	<div class="site-footer__inner">

		<div class="site-footer__left">
			<div class="site-footer__social">
				<?php if ($twitter || $instagram || $facebook || $github) :?>
				<h2 class="body site-footer__social-heading">Connect with Us</h2>
				<div class="site-footer__social-icons">
					<?php if ($twitter) : ?><a href="<?php echo $twitter; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('twitter'); ?></a><?php endif; ?>
					<?php if ($instagram) : ?><a href="<?php echo $instagram; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('instagram'); ?></a><?php endif; ?>
					<?php if ($facebook) : ?><a href="<?php echo $facebook; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('facebook'); ?></a><?php endif; ?>
					<?php if ($github) : ?><a href="<?php echo $github; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('github'); ?></a><?php endif; ?>
					<?php if ($youtube) : ?><a href="<?php echo $youtube; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('youtube'); ?></a><?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if ($app_store || $google_play) :?>
				<h2 class="body site-footer__social-heading">Download the App</h2>
				<div class="site-footer__download-app">
					<?php if ($app_store) : ?><a href="<?php echo $app_store; ?>" class="app-icon" target="_blank"><?php echo fieldkit_get_icon('app_store'); ?></a><?php endif; ?>
					<?php if ($google_play) : ?><a href="<?php echo $google_play; ?>" class="app-icon" target="_blank"><?php echo fieldkit_get_icon('google_play'); ?></a><?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="site-footer__right">
			<div class="site-footer__right-column">
				<h2 class="body site-footer__right-title">
					<?php echo wp_get_nav_menu_name('footer-support'); ?>
				</h2>
				<?php
				if (has_nav_menu('footer-support')) wp_nav_menu(array('theme_location' => 'footer-support'));
				?>
			</div>
			<div class="site-footer__right-column">
				<h2 class="body site-footer__right-title">
					<?php echo wp_get_nav_menu_name('footer-legal'); ?>
				</h2>
				<?php
				if (has_nav_menu('footer-legal')) wp_nav_menu(array('theme_location' => 'footer-legal'));
				?>
			</div>
			<div class="site-footer__right-column">
				<h2 class="body site-footer__right-title">
					<?php echo wp_get_nav_menu_name('footer-other'); ?>
				</h2>
				<?php
				if (has_nav_menu('footer-other')) wp_nav_menu(array('theme_location' => 'footer-other'));
				?>
			</div>
		</div>
	</div>
</footer>
