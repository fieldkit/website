<?php /* Template Name: Product Guide */ ?>
<?php get_header(); ?>
<main class="site-main">
	<article class="section section-product-guide">
		<div class="section__inner">
			<div class="section-product-guide-container">
				<aside>
					<?php
					if (has_nav_menu('product-guide-sidebar')) {
						wp_nav_menu(array('theme_location' => 'product-guide-sidebar'));
					}
					?>
				</aside>
				<div class="section-product-guide__content">
					<header>
						<h1 class="heading-1">Product Guide</h1>
					</header>
					<div>
						<?php
						$content = get_field('content');
						var_dump(have_rows('blocks'));
						if (have_rows('blocks')) :
							while (have_rows('blocks')) : the_row();
								$row_layout = get_row_layout();
								$row_layout = str_replace('_', '-', $row_layout);
								get_template_part('template-parts/blocks/' . $row_layout);
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
