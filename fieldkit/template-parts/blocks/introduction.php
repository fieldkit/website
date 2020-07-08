<!-- <header class="section section-introduction-header">
	<div class="section__inner">
		<h2 class="heading-2">Sensor Specifications</h2>
		<p class="body">A couple of sentences of a description of what the sensor is and how it operates within the broader FieldKit Ecosystem</p>
	</div>
</header>
<section class="section section-introduction-content">
	<div class="section__inner">
		<div class="section-introduction-content__image">
			<img src="https://via.placeholder.com/1440x960" alt="">
		</div>
		<div class="section-introduction-content__text">
			<p class="body">Basic Tech Specs can be included here on the web page. This information can serve as a clear indication that the sensors are of scientific quality. We do not want to hide the expert quality of these sensors.</p>
		</div>
	</div>
</section> -->
<?php
    if( have_rows('content') ):
    while ( have_rows('content') ) : the_row();
    if( get_row_layout() == 'introduction' ):
?>

	<h2 class="heading-2"><?php get_sub_field('header_heading'); ?></h2>
	<p class="body"><?php get_sub_field('header_body'); ?></p>

<?php endif; endwhile; endif; ?>


