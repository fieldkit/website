<?php /* Template Name: Sensor Specifications */ ?>
<?php get_header(); ?>
<main class="site-main">
	<article>
		<?php
		$content = get_field('content');
		if (have_rows('blocks')) :
			while (have_rows('blocks')) : the_row();
				$row_layout = get_row_layout();
				$row_layout = str_replace('_', '-', $row_layout);
				get_template_part('template-parts/blocks/' . $row_layout);
			endwhile;
		endif;
		?>
	</article>
</main>
<?php get_footer(); ?>
