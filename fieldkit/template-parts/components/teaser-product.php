<?php
global $product;
if($product->get_catalog_visibility() !== 'hidden'):
?>
<li class="teaser-item">
<div class="teaser teaser-product">
    <a class="teaser-product__link" href="<?php echo get_permalink(); ?>">
        <div class="teaser-product__image">
			<?php if(get_post_thumbnail_id()): ?>
			<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
			<?php else:?>
				<img src="<?php echo wc_placeholder_img_src(); ?>"/>
			<?php endif; ?>
        </div>
        <h3 class="heading-5 teaser-product__title"><?php the_title(); ?></h3>
        <div class="body teaser-product__excerpt"><?php the_excerpt(); ?></div>

		<?php if ($product->is_type('simple')) :
		$price = implode(get_post_meta($product->id, '_regular_price'));
		if($price > 0){
			$formatted_price = '$'. number_format($price, 2, '.', '');
		}else{
			$formatted_price = 'Coming soon/pre-order';
		}
		?>
		<div class="body teaser-product__price"><?php echo $formatted_price; ?></div>

		<?php elseif($product->is_type('variable') ):
		$variations = $product->get_available_variations();
		$prices = [];
		foreach ($variations as $key => $value){
			$prices[] = $value['display_regular_price'];
		}
		if(min($prices) == max($prices)){
			$formatted_price = '$' . number_format(min($prices), 2, '.', '');
		}else{
			$formatted_price ='From $' . number_format(min($prices), 2, '.', '')
			.' to $' .  number_format(max($prices), 2, '.', '');

		}
		?>
		<div class="body teaser-product__price"><?php echo $formatted_price; ?></div>

		<?php endif; ?>
    </a>
</div>
</li>
<?php endif; ?>
