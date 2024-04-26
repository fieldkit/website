<?php /* Template Name: Sensor Specifications */ ?>
<?php get_header(); ?>
<main class="site-main">
	<article>
		<?php
		 $post_id = get_the_ID();
		 if (have_rows('content', $post_id)) :
			while (have_rows('content', $post_id)) : the_row();
				$row_layout = get_row_layout();
				$row_layout = str_replace('_', '-', $row_layout);
				include(locate_template('template-parts/blocks/' . $row_layout . '.php', false, false));
			endwhile;
		endif;
		?>
	</article>
</main>
<?php get_footer(); ?>
