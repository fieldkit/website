<?php /* Template Name: Error 404 */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$error_404 = get_field('error_404');
	$image = get_field('image');
	$heading = get_field('heading');
	$subheading = get_field('subheading');
	$body = get_field('body');
	$link = get_field('link');
	?>
	<section class="section section-error-404">
		<div class="section__inner">
			<div class="section-error-404__image">
				<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
			</div>
			<div class="section-error-404__text">
				<div class="rich-text">
					<h1 class="heading-1"><?php echo $heading; ?></h1>
					<h2 class="heading-4"><?php echo $subheading; ?></h2>
					<?php echo $body; ?>
				</div>
				<?php
				if ($link) {
					$link['class_name'] = 'button button--primary section-error-404__link';
					set_query_var('link', $link);
					get_template_part('template-parts/utilities/link');
				}
				?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
