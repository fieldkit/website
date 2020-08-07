<?php

	$body = $product_feed_text_and_image['body'];
	$image = $product_feed_text_and_image['image'];
?>

<section class="section section-product-feed-text-and-image">
   <div class="section__inner section__inner--inset">
	  <div class="section-product-feed-text-and-image__content">
         <div class="section-product-feed-text-and-image__text">
            <div class="rich-text">
				   <?php echo $body; ?>
            </div>
         </div>
         <div class="section-product-feed-text-and-image__image">
            <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
         </div>
      </div>
   </div>
</section>
