<?php
$header = get_field('header', 'option');
?>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-header__controls">
			<button type="button" class="action-toggle-navigation site-header__control site-navigation-toggle"></button>
			<button type="button" class="action-toggle-search site-header__control site-search-toggle"></button>
			<button type="button" class="action-toggle-search site-header__control site-search-close"></button>
		</div>
		<div class="site-search"><?php get_search_form(); ?></div>
		<nav class="site-navigation">
			<?php
			if (has_nav_menu('header')) {
				wp_nav_menu(array('theme_location' => 'header'));
			}
			?>
		</nav>
	</div>
</header>
