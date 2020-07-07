<?php
$header = get_field('header', 'option');
?>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-header__controls">
			<button type="button" class="action-toggle-navigation site-header__control site-navigation-toggle">
				<?php echo schwarzmanscholars_get_icon('menu', ['class' => 'site-navigation-toggle__open-icon']); ?>
				<?php echo schwarzmanscholars_get_icon('close', ['class' => 'site-navigation-toggle__close-icon']); ?>
			</button>
			<button type="button" class="action-toggle-search site-header__control site-search-toggle">
				<?php echo schwarzmanscholars_get_icon('search'); ?>
			</button>
			<button type="button" class="action-toggle-search site-header__control site-search-close">
				<?php echo schwarzmanscholars_get_icon('close'); ?>
			</button>
		</div>
		<div class="site-search"><?php get_search_form(); ?></div>
		<nav class="site-navigation">
			<?php
			if (has_nav_menu('header')) {
				wp_nav_menu(array('theme_location' => 'header'));
			}
			?>
		</nav>
		<?php
		if ($call_to_action) {
			$link = $call_to_action;
			$link['class_name'] = 'site-header__call-to-action';
			set_query_var('link', $link);
			get_template_part('template-parts/utilities/link');
		}
		?>
	</div>
</header>
