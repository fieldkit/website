<?php /* Template Name: Product Guide */ ?>
<?php get_header(); ?>
<main class="site-main">
	<article class="section section-product-guide">
		<header class="section-product-guide__header">
			<div class="section__inner">
				<h1 class="heading-1">Product Guide</h1>
			</div>
		</header>
		<div class="section-product-guide-container">
			<div class="section__inner">
				<aside class="section-product-guide__aside">
					<?php
					if (has_nav_menu('product-guide-sidebar')) {
						wp_nav_menu(array('theme_location' => 'product-guide-sidebar'));
					}
					?>
				</aside>
				<div class="section-product-guide__content">
					<div class="section-product-guide__content-inner rich-text">
						<?php
						$content = get_field('content');
						if (have_rows('content')) :
							while (have_rows('content')) : the_row();
								$row_layout = get_row_layout();
								$row_layout = str_replace('_', '-', $row_layout);
								include(locate_template('template-parts/blocks/' . $row_layout . '.php', false, false));
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</article>
</main>
<?php get_footer(); ?>
