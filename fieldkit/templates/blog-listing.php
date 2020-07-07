<?php /* Template Name: Blog Listing */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$blog_listing_header = get_field('blog_listing_header');
	$heading = $blog_listing_header['heading'];
	?>
	<header class="section section-blog-listing-header">
		<div class="section__inner">
			<h1 class="heading-1 section-blog-listing-header__heading"><?php echo $heading; ?></h1>
		</div>
	</header>

	<?php
	$blog_listing_featured_post = get_field('blog_listing_featured_post');
	$featured_post = $blog_listing_featured_post['post_object'];
	$image = [
		'ID' => get_post_thumbnail_id($featured_post->ID)
	];
	$title = get_the_title($featured_post->ID);
	$author = get_the_author_meta('user_nicename', $featured_post->post_author);
	$date = get_the_date('', $featured_post->ID);
	$excerpt = get_the_excerpt($featured_post->ID);
	$link = [
		title => 'Read More',
		url => get_permalink($featured_post->ID),
	];
	?>
	<section class="section section-blog-listing-featured-post">
		<div class="section__inner">
			<div class="section-blog-listing-featured-post__teaser">
				<div class="section-blog-listing-featured-post__teaser-text">
					<h2 class="heading-3 section-blog-listing-featured-post__teaser-title"><?php echo $title; ?></h2>
					<div class="section-blog-listing-featured-post__teaser-date"><?php echo $date; ?> | <?php echo $author; ?></div>
					<div class="section-blog-listing-featured-post__teaser-excerpt"><?php echo $excerpt; ?></div>
					<?php
					if ($link) {
						$link['class_name'] = 'button button--primary section-blog-listing-featured-post__teaser-link';
						set_query_var('link', $link);
						get_template_part('template-parts/utilities/link');
					}
					?>
				</div>
				<div class="section-blog-listing-featured-post__teaser-image">
					<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
				</div>
			</div>
		</div>
	</section>

	<?php
	$latest_posts = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => -1,
	));
	?>
	<section class="section section-blog-post-feed">
		<div class="section__inner">
			<div class="section-blog-post-feed__header">
				<h2 class="heading-3"><?php echo __('Recent Posts'); ?></h2>
			</header>
			<div class="section-blog-post-feed__feed">
				<ul class="section-blog-post-feed__list">
					<?php
					while ($latest_posts->have_posts()) :
						$latest_posts->the_post();
						$image = [
							'ID' => get_post_thumbnail_id()
						];
						$title = get_the_title();
						$date = get_the_date();
						$permalink = get_permalink();
					?>
						<li class="section-blog-post-feed__item load-more__item">
							<div>
								<div class="post-teaser">
									<a href="<?php echo $permalink; ?>">
										<div class="post-teaser__image">
											<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
										</div>
										<h2 class="heading-4 post-teaser__title"><?php echo $title; ?></h2>
										<div class="post-teaser__date"><?php echo $date; ?></div>
									</a>
								</div>
							</div>
						</li>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
				<?php if ($latest_posts->found_posts > 3) : ?>
					<div class="section-blog-post-feed__load-more">
						<button class="button button--tertiary action-load-more">Load More Posts</button>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
