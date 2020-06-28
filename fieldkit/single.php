<?php get_header(); ?>
<main class="site-main">
	<?php
	$post_header = get_field('post_header');
	// $heading = $blog_featured_post['heading'];
	?>
	<header class="section section-post-header"></header>

	<?php
	$post_main = get_field('post_main');
	// $heading = $post_main['heading'];
	?>
	<section class="section section-post-main">
		<div></div>
		<div>
			<button>Load More</button>
		</div>
	</section>

	<?php
	$post_footer = get_field('post_footer');
	// $heading = $post_footer['heading'];
	?>
	<aside class="section section-post-footer"></aside>
</main>
<?php get_footer(); ?>
