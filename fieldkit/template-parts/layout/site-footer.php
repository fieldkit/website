<?php
$dark_logo_id = get_theme_mod('dark_logo');
$social = get_field('social', 'option');
$facebook = $social['facebook'];
$instagram = $social['instagram'];
$twitter = $social['twitter'];
$github = $social['github'];
?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<div class="site-footer__left">
			<?php if ($dark_logo_id) : ?>
				<div class="site-footer__logo">
					<a href="<?php echo home_url('/'); ?>">
						<?php echo wp_get_attachment_image($dark_logo_id, 'full'); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="site-footer__social">
				<?php if ($twitter) : ?><a href="<?php echo $twitter; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('twitter'); ?></a><?php endif; ?>
				<?php if ($instagram) : ?><a href="<?php echo $instagram; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('instagram'); ?></a><?php endif; ?>
				<?php if ($facebook) : ?><a href="<?php echo $facebook; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('facebook'); ?></a><?php endif; ?>
				<?php if ($github) : ?><a href="<?php echo $github; ?>" class="icon-button" target="_blank"><?php echo fieldkit_get_icon('github'); ?></a><?php endif; ?>
			</div>
			<?php get_template_part('template-parts/components/mailchimp'); ?>
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
