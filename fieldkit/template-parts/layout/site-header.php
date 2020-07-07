<?php
$header = get_field('header', 'option');
?>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-header__logo"><?php the_custom_logo(); ?></div>
		<div class="site-header__controls">
			<button type="button" class="action-toggle-navigation site-header__control site-navigation-toggle"></button>
			<button type="button" class="action-toggle-search site-header__control site-search-toggle"></button>
			<a href="/cart" class="action-toggle-search site-header__control site-cart"></a>
		</div>
		<div class="site-search"><?php get_search_form(); ?></div>
		<nav class="site-navigation">
			<button type="button" class="action-toggle-search site-search-close"></button>
			<?php
			if (has_nav_menu('header')) {
				wp_nav_menu(array('theme_location' => 'header'));
			}
			?>
		</nav>
	</div>
</header>
