<?php /* Template Name: Search */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	if (have_posts()) : ?>
		<section class="section search-results">
			<div class="section__inner">
				<header class="search-results__header">
					<?php get_search_form(); ?>
					<h4 class="heading-4 search-results__heading"><?php echo sprintf(__('Search Results for <span>"%s"</span>'), get_search_query()) ?></h4>
				</header>
				<div class="search-results__main">
					<?php
					$post_types = array('product', 'post', 'page');
					$occurrences = [];
					while (have_posts()) {
						the_post();
						$post_type = get_post_type();
						if (!isset($occurrences[$post_type])) {
							$occurrences[$post_type] = 0;
						}
						$occurrences[$post_type] += 1;
					}
					rewind_posts();
					foreach ($post_types as $current_post_type) :
						if (!$occurrences[$current_post_type]) continue;
						$current_post_type_object = get_post_type_object($current_post_type);
						$label = $current_post_type === 'post'
							? __('Blog Posts')
							: $current_post_type_object->label;
					?>
						<div class="search-results__group">
							<h2 class="heading-3 search-results__group-label"><?php echo $label; ?></h2>
							<ul class="search-results__teaser-list teaser-list teaser-list--<?php echo $current_post_type; ?>">
								<?php
								while (have_posts()) :
									the_post();
									if (get_post_type() !== $current_post_type) continue;
								?>
									<li class="teaser-item">
										<?php get_template_part('template-parts/components/teaser', get_post_type()); ?>
									</li>
								<?php
								endwhile;
								rewind_posts();
								?>
							</ul>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php else : ?>
		<section class="section search-no-results">
			<div class="section__inner">
				<header class="search-no-results__header">
					<?php get_search_form(); ?>
				</header>
				<div class="section__main search-no-results__main">
					<h1 class="heading-1 search-no-results__heading"><?php echo sprintf(__('No Results for <span>"%s"</span>'), get_search_query()) ?></h1>
				</div>
			</div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
