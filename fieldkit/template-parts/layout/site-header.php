<?php
$header = get_field('header', 'option');
?>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-header__logo"><?php the_custom_logo(); ?></div>
		<div class="site-header__controls">
			<div class="site-header__control">
				<button type="button" class="action-toggle-navigation site-header__control site-navigation-toggle"></button>
				<nav class="site-navigation">
					<button type="button" class="action-toggle-navigation site-navigation-close"></button>
					<?php
					if (has_nav_menu('header')) {
						wp_nav_menu(array('theme_location' => 'header'));
					}
					?>
				</nav>
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
		</div>
	</div>
</header>
