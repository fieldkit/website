<?php
$footer = get_field('footer', 'option');
$copyright = $footer['copyright'];
$social = get_field('social', 'option');
$facebook = $social['facebook'];
$instagram = $social['instagram'];
$twitter = $social['twitter'];
?>
<footer class="site-footer">
	<button class="scroll-to-top"><?php echo schwarzmanscholars_get_icon('arrow-up'); ?></button>
	<?php get_template_part('template-parts/components/footer-call-to-action'); ?>
	<?php get_template_part('template-parts/sections/pre-footer'); ?>
	<div class="site-footer__main">
		<div class="site-footer__top">
			<div class="site-footer__top-inner">
				<div class="site-footer__logo"><?php the_custom_logo(); ?></div>
				<div class="menu-footer-container">
				<?php
				if (has_nav_menu('footer')):
					$main_menu_items = wp_get_nav_menu_items('footer');

				?>
					<ul>
					<?php
					$counter = ceil(count($main_menu_items)/2);
					for ($i = 0; $i < $counter; $i++) :
						$menu_item = $main_menu_items[$i];
						if ($menu_item->menu_item_parent == 0) :
							$child_menu_items = array();
							foreach ($main_menu_items as $sub_menu_item) {
								if ($sub_menu_item->menu_item_parent == $menu_item->ID) {
									array_push($child_menu_items, $sub_menu_item);
								}
							}
							?>
						<li
						class="menu-item<?php if (count($child_menu_items) > 0) echo ' menu-item-has-children'; ?>">
						<a
						href="<?php echo $menu_item->url; ?>"
						<?php if ($menu_item->target) : ?>
							target="<?php echo esc_attr($menu_item->target); ?>"
						<?php endif; ?>
						><?php echo $menu_item->title; ?></a>

							</li>
						<?php
							endif;
						endfor;
						?>
					</ul>

					<ul>
					<?php
					$counter = ceil(count($main_menu_items)/2);
					for ($i = $counter; $i < count($main_menu_items); $i++) :
						$menu_item = $main_menu_items[$i];
						if ($menu_item->menu_item_parent == 0) :
							$child_menu_items = array();
							foreach ($main_menu_items as $sub_menu_item) {
								if ($sub_menu_item->menu_item_parent == $menu_item->ID) {
									array_push($child_menu_items, $sub_menu_item);
								}
							}
							?>
						<li
						class="menu-item<?php if (count($child_menu_items) > 0) echo ' menu-item-has-children'; ?>">
						<a
						href="<?php echo $menu_item->url; ?>"
						<?php if ($menu_item->target) : ?>
							target="<?php echo esc_attr($menu_item->target); ?>"
						<?php endif; ?>
						><?php echo $menu_item->title; ?></a>

							</li>
						<?php
							endif;
						endfor;
						?>
					</ul>
					<?php endif; ?>
					</div>

					<div class="menu-contact-container">
					<h4 class="heading-4">Get Program Updates</h4>
					<form novalidate>
						<div class="footer-input-group">
							<!-- <input type="email" class="footer-control" placeholder="email address" /> -->
							<button class="button button--footer action-launch-subscribe-modal"
							data-subscribe-title="Stay Connected"
							data-subscribe-text="To receive occasional updates with news about the Schwarzman Scholars application process, curriculum, building and other program developments, please join our mailing list."
							type="button">Subscribe</button>
						</div>
					</form>
					<div class="social-button-container">
						<a href="<?php echo $twitter; ?>" class="icon-button"><?php echo schwarzmanscholars_get_icon('twitter'); ?></a>
						<a href="<?php echo $facebook; ?>" class="icon-button"><?php echo schwarzmanscholars_get_icon('facebook'); ?></a>
						<a href="<?php echo $instagram; ?>" class="icon-button"><?php echo schwarzmanscholars_get_icon('instagram'); ?></a>
					</div>
				</div>

			</div>
		</div>
		<div class="site-footer__legal">
			<div class="site-footer__legal-inner">
				<div class="site-footer__copyright"><?php echo sprintf($copyright, date('Y')); ?></div>
				<?php
				if (has_nav_menu('legal')) {
					wp_nav_menu(array('theme_location' => 'legal'));
				}
				?>
			</div>
		</div>
	</div>
</footer>

<div class="subscribe-modal" aria-modal="true" role="dialog">
	<div class="subscribe-modal__inner">
		<button class="close action-close"></button>
		<div class="subscribe-modal__content">
			<div class="subscribe-modal__content-inner"></div>

			<div class="subscribe-modal-form theme-light">
						<div class="gravity-forms gravity-forms--default">
							<?php gravity_form('Mailing List', false, false, false, '', true); ?>
						</div>
						<p class="heading-7 text-and-login__note">* indicates required field.</p>
					</div>
			</div>
		</div>
	</div>
</div>
