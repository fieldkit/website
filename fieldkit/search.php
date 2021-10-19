<?php /* Template Name: Search */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	if (have_posts()) : ?>
		<section class="section search-results">
			<div class="section__inner">
				<header class="search-results__header">
					<?php get_search_form(); ?>
					<h1 class="heading-5 search-results__heading"><?php echo sprintf(__('Search Results for <span>"%s"</span>'), get_search_query()) ?></h1>
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
					<?php if ($occurrences[$current_post_type] > 1):?>
						<div class="search-results__group">
							<h2 class="heading-3 search-results__group-label"><?php echo $label; ?></h2>
							<ul class="search-results__teaser-list teaser-list teaser-list--<?php echo $current_post_type; ?>">
								<?php
								while (have_posts()) :
									the_post();
									if (get_post_type() !== $current_post_type) continue;
								?>
										<?php get_template_part('template-parts/components/teaser', get_post_type()); ?>
								<?php
								endwhile;
								rewind_posts();
								?>
							</ul>
						</div>

					<?php endif; ?>

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
					<h1 class="heading-5 search-no-results__heading"><?php echo sprintf(__('Search Results for <span>"%s"</span>'), get_search_query()) ?></h1>
					<div class="rich-text text-image-layout--centered">
						<h2 class="heading-2">Sorry, No Results Found </h2>
						<h4 class="heading-4">Here's a few suggestions</h4>
						<img class="img no-results-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/speech-bubbles.png" alt="">
						<ul>
							<li>Check that your search terms are spelled correctly</li>
							<li>Replace abbreviations with the whole word</li>
							<li>Try a similar but different term</li>
						</ul>
					</div>
				</div>
			</div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
