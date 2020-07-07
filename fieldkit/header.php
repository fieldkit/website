<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta content="width=device-width,initial-scale=1,viewport-fit=cover" name="viewport" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div class="site-container">
			<?php get_template_part('template-parts/layout/site-header'); ?>
