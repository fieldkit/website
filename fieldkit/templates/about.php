<?php /* Template Name: About */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$about_hero = get_field('about_hero');
	// $heading = $about_hero['heading'];
	?>
	<header class="section section-about-hero">
		<div class="section__inner"></div>
	</header>

	<?php
	$about_text_and_image = get_field('about_text_and_image');
	// $heading = $about_text_and_image['heading'];
	?>
	<section class="section section-about-text-and-image-grid">
		<div class="section__inner"></div>
	</section>

	<?php
	$about_values = get_field('about_values');
	// $heading = $about_values['heading'];
	?>
	<section class="section section-about-values">
		<div class="section__inner section__inner--inset"></div>
	</section>
</main>
<?php get_footer(); ?>
