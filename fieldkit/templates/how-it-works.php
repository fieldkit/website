<?php /* Template Name: How It Works */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$how_it_works_hero = get_field('how_it_works_hero');
	// $heading = $how_it_works_hero['heading'];
	?>
	<header class="section section-how-it-works-hero">
		<div class="section__inner"></div>
	</header>

	<?php
	$how_it_works_steps = get_field('how_it_works_steps');
	// $heading = $how_it_works_steps['heading'];
	?>
	<section class="section section-how-it-works-steps">
		<div class="section__inner"></div>
	</section>

	<?php
	$how_it_works_step_by_step = get_field('how_it_works_step_by_step');
	// $heading = $how_it_works_step_by_step['heading'];
	?>
	<section class="section section-how-it-works-step-by-step">
		<div class="section__inner"></div>
	</section>
</main>
<?php get_footer(); ?>
