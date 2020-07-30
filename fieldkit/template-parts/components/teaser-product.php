<div class="teaser teaser-product">
    <a class="teaser-product__link" href="<?php echo get_permalink(); ?>">
        <div class="teaser-product__image">
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
        </div>
        <h3 class="heading-5 teaser-product__title"><?php the_title(); ?></h3>
        <div class="body teaser-product__excerpt"><?php the_excerpt(); ?></div>
    </a>
</div>
