<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
<main class="site-main">
	<?php
	$blog_featured_post = get_field('blog_featured_post');
	// $heading = $blog_featured_post['heading'];
	?>
	<header class="section section-blog-featured-post"></header>

	<?php
	$blog_post_feed = get_field('blog_post_feed');
	// $heading = $blog_post_feed['heading'];
	?>
	<section class="section section-blog-post-feed">
		<div></div>
		<div>
			<button>Load More</button>
		</div>
	</section>
</main>
<?php get_footer(); ?>
