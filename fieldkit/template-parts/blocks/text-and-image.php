<?php
	$header = $text_and_image['header'];
	$heading = $text_and_image['heading'];
	$body = $text_and_image['body'];
	$image = $text_and_image['image'];
	$background_image = $text_and_image['background_image'];
?>

<section class="section section-text-and-image">
   <div class="section__inner">
      <h1 class="section-text-and-image__heading"><?php echo $header;?></h1>
	  <div class="section-text-and-image__content">
         <div class="section-text-and-image__text">
            <div class="rich-text">
			   <h2 class="heading-3"><?php echo $heading; ?></h2>
			   <p class="heading-4">
				   <?php echo $body; ?>
			   </p>
            </div>
         </div>
         <div class="section-home-text-and-image__image">
            <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
         </div>
      </div>
   </div>

   <div class="section-text-and-image__background">
		<?php echo wp_get_attachment_image($background_image['ID'], 'full'); ?>
	</div>
</section>
