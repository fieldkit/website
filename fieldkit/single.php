<?php get_header(); ?>
<main class="site-main">
	<article>
		<?php
		$featured_post = get_the_ID();
		$title = get_the_title($featured_post);
		$author_id = get_post_field('post_author', $featured_post);
		$author = get_the_author_meta('display_name', $author_id);
		$date = get_the_date('', $featured_post);
		$image = [
			'ID' => get_post_thumbnail_id($featured_post)
		];
		?>
		<header class="section section-post-header">
			<div class="section__inner">
				<h1 class="heading-3"><?php echo $title; ?></h1>
				<div class="section-post-header__date"><?php echo $date; ?> | <?php echo $author; ?></div>
			</div>
		</header>

		<section class="section section-post-main">
			<div class="section__inner">
				<div class="section-post-main__featured-image">
					<?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
				</div>
				<div class="rich-text"><?php the_content(); ?></div>
			</div>
		</section>

		<aside class="section section-post-footer">
			<div class="section__inner">
				<div class="social-share-menu-container">
					<div class="heading-5 social-share-menu-heading"><?php echo __('Share this Post'); ?></div>
					<ul class="social-share-menu">
						<li class="social-share-menu-item">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" title="<?php echo __('Facebook', 'fieldkit'); ?>">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10 18" enable-background="new 0 0 10 18" xml:space="preserve">
									<path fill="#FFFFFF" d="M6.1,17.9V9.7h2.7l0.4-3.2H6.1v-2C6.1,3.6,6.3,3,7.6,3l1.7,0V0.1C9,0.1,8,0,6.9,0C4.4,0,2.8,1.5,2.8,4.2v2.3H0v3.2h2.7v8.2H6.1z" />
								</svg>
							</a>
						</li>
						<li class="social-share-menu-item">
							<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" title="<?php echo __('X', 'fieldkit'); ?>">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 18 15" enable-background="new 0 0 18 15" xml:space="preserve">
									<path fill="#FFFFFF" d="M18,1.7c-0.7,0.3-1.4,0.5-2.1,0.6c0.8-0.5,1.4-1.2,1.6-2C16.8,0.7,16,1,15.2,1.2C14.5,0.5,13.5,0,12.5,0c-2,0-3.7,1.7-3.7,3.7c0,0.3,0,0.6,0.1,0.8C5.8,4.4,3.1,2.9,1.3,0.7C0.9,1.2,0.8,1.9,0.8,2.5c0,1.3,0.7,2.4,1.6,3.1c-0.6,0-1.2-0.2-1.7-0.5c0,0,0,0,0,0c0,1.8,1.3,3.3,3,3.6C3.4,8.9,3,8.9,2.7,8.9c-0.2,0-0.5,0-0.7-0.1c0.5,1.5,1.8,2.5,3.5,2.6c-1.3,1-2.9,1.6-4.6,1.6C0.6,13,0.3,13,0,13c1.6,1.1,3.6,1.7,5.7,1.7c6.8,0,10.5-5.6,10.5-10.5c0-0.2,0-0.3,0-0.5C16.9,3.1,17.5,2.5,18,1.7z" />
								</svg>
							</a>
						</li>
						<li class="social-share-menu-item">
							<a href="https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" title="<?php echo __('X', 'fieldkit'); ?>">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 19 18" enable-background="new 0 0 19 18" xml:space="preserve">
									<path fill="#FFFFFF" d="M3.9,2c0,1.1-0.9,2-1.9,2S0,3,0,2C0,0.9,0.9,0,2,0S3.9,0.9,3.9,2z M3.9,5.5H0V18h3.9V5.5z M10.2,5.5H6.3V18h3.9v-6.6c0-3.7,4.7-4,4.7,0V18h3.9v-7.9c0-6.2-7-5.9-8.6-2.9V5.5z" />
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</aside>
	</article>
</main>
<?php get_footer(); ?>