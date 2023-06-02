<?php
$header = get_field('header', 'option');
?>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-header__logo"><?php the_custom_logo(); ?></div>
		<div class="site-header__controls">
			<div class="site-header__control">
				<button type="button" class="action-toggle-navigation site-header__control site-navigation-toggle">
					<?php echo fieldkit_get_icon('menu'); ?>
					<?php echo fieldkit_get_icon('close'); ?>
				</button>
				<nav class="site-navigation">
					<button type="button" class="action-toggle-navigation site-navigation-close"></button>
					<div class="site-language-switcher">
						<button type="button" class="action-toggle-language-switcher">
							<div class="icon-globe">
								<?php echo fieldkit_get_icon('icon-globe'); ?>
							</div>
							<p>Language</p>
							<div class="site-language-switcher__arrow-down">
								<?php echo fieldkit_get_icon('icon-arrow-down'); ?>
							</div>
							<div class="site-language-switcher__arrow-up">
								<?php echo fieldkit_get_icon('icon-arrow-up'); ?>
							</div>
						</button>

						<?php
						$languages = icl_get_languages();

						// Get the current language
						$current_language = ICL_LANGUAGE_CODE;

						// Generate language switcher links
						$language_switcher = '<ul class="site-language-switcher-menu">';
						foreach ($languages as $language) {
							if ($language['language_code'] === $current_language) {
								// Display the current language
								$language_switcher .= '<li class="current-language">';
								$language_switcher .= esc_html($language['native_name']);
								$language_switcher .= '</li>';
							} else {
								// Display other language switcher links
								$language_switcher .= '<li>';
								$language_switcher .= '<a href="' . esc_url($language['url']) . '">' . esc_html($language['native_name']) . '</a>';
								$language_switcher .= '</li>';
							}
						}
						$language_switcher .= '</ul>';

						// Output the language switcher
						echo $language_switcher;
						?>
					</div>
					<?php
					if (has_nav_menu('header')) {
						wp_nav_menu(array('theme_location' => 'header'));
					}
					?>
					<div class="nav-button">
						<?php
						if (has_nav_menu('account') && !is_user_logged_in()) {
							wp_nav_menu(array('theme_location' => 'account'));
						}
						?>
						<?php if (is_user_logged_in()) : ?>
							<ul>
								<li> <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('My Account', ''); ?>"><?php _e('My Account', ''); ?></a></li>
								<li><a href="<?php echo wp_logout_url(get_permalink(wc_get_page_id('myaccount'))); ?>">Logout</a></li>
							</ul>
						<?php endif; ?>
					</div>
				</nav>

			</div>

			<div class="site-header__control side-nav site-account">
				<button type="button" class="action-toggle-account site-search-toggle">
					<?php echo fieldkit_get_icon('user'); ?>
				</button>
				<?php
				if (has_nav_menu('account') && !is_user_logged_in()) {
					wp_nav_menu(array('theme_location' => 'account'));
				}
				?>



				<?php if (is_user_logged_in()) : ?>
					<ul class="my-account-menu">
						<li>
							<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('My Account', ''); ?>"><?php _e('My Account', ''); ?></a>
						</li>
						<li>
							<a href="<?php echo wp_logout_url(); ?>">Logout</a>
						</li>
					</ul>
				<?php endif; ?>
			</div>


			<div class="site-header__control site-search">
				<button type="button" class="action-toggle-search site-search-toggle">
					<?php echo fieldkit_get_icon('search'); ?>
				</button>
				<?php get_search_form(); ?>
			</div>
			<div class="site-header__control site-cart">
				<a href="/cart">
					<?php echo fieldkit_get_icon('cart'); ?>
				</a>
			</div>
			<div class="site-header__control site-language">
				<button type="button" class="action-toggle-language">
					<?php echo fieldkit_get_icon('icon-globe'); ?>
					<div class="site-language__arrow-down">
						<?php echo fieldkit_get_icon('icon-arrow-down'); ?>
					</div>
					<div class="site-language__arrow-up">
						<?php echo fieldkit_get_icon('icon-arrow-up'); ?>
					</div>
				</button>
				<?php
				$languages = icl_get_languages();

				// Get the current language
				$current_language = ICL_LANGUAGE_CODE;

				// Generate language switcher links
				$language_switcher = '<ul class="language-switcher">';
				foreach ($languages as $language) {
					if ($language['language_code'] === $current_language) {
						// Display the current language
						$language_switcher .= '<li class="current-language">';
						$language_switcher .= esc_html($language['native_name']);
						$language_switcher .= '</li>';
					} else {
						// Display other language switcher links
						$language_switcher .= '<li>';
						$language_switcher .= '<a href="' . esc_url($language['url']) . '">' . esc_html($language['native_name']) . '</a>';
						$language_switcher .= '</li>';
					}
				}
				$language_switcher .= '</ul>';

				// Output the language switcher
				echo $language_switcher;
				?>
			</div>
		</div>
	</div>
</header>
