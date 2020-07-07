<div class="teaser teaser-post">
    <a class="teaser-post__link" href="<?php echo get_permalink(); ?>">
        <div class="teaser-post__image">
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
        </div>
        <h3 class="heading-5 teaser-post__title"><?php the_title(); ?></h3>
        <div class="teaser-post__date"><?php echo get_the_date(); ?></div>
    </a>
</div>
