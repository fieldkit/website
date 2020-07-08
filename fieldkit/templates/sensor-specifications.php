<?php /* Template Name: Sensor Specifications */ ?>
<?php get_header(); ?>
<main class="site-main">
	<article>
		<?php
		$content = get_field('content');
		if (have_rows('content')) :
			while (have_rows('content')) : the_row();
				$row_layout = get_row_layout();
				$row_layout = str_replace('_', '-', $row_layout);
				get_template_part('template-parts/blocks/' . $row_layout);
			endwhile;
		endif;
		?>

		<section class="section section-table-feed">
			<div class="section__inner">
				<div class="section-table-feed__header">
					<h2 class="heading-2">Silver/silver chlorideelectrode</h2>
				</div>
				<table class="section-table-feed__feed">
					<tr>
						<td>Reads</td>
						<td>test</td>
					</tr>
					<tr>
						<td>Range</td>
						<td>test</td>
					</tr>
					<tr>
						<td>Accuracy</td>
						<td>test</td>
					</tr>
					<tr>
						<td>Connector</td>
						<td>test</td>
					</tr>
				</table>
			</div>
		</section>
		<section class="section section-rich-text">
			<div class="section__inner">
				<div class="rich-text">
					<h2>Overview of Sensor and Use in FieldKit</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sodales ut etiam sit amet. Sollicitudin nibh sit amet commodo nulla facilisi nullam. Egestas dui id ornare arcu odio ut. Lectus quam id leo in. Quis enim lobortis scelerisque fermentum dui faucibus in. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Maecenas pharetra convallis posuere morbi leo urna molestie. Diam sollicitudin tempor id eu nisl nunc mi. Vitae sapien pellentesque habitant morbi tristique. Scelerisque purus semper eget duis at tellus at urna condimentum. Cursus turpis massa tincidunt dui ut.</p>
					<h2>Facts and Technical Specifications</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sodales ut etiam sit amet. Sollicitudin nibh sit amet commodo nulla facilisi nullam. Egestas dui id ornare arcu odio ut. Lectus quam id leo in. Quis enim lobortis scelerisque fermentum dui faucibus in. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Maecenas pharetra convallis posuere morbi leo urna molestie. Diam sollicitudin tempor id eu nisl nunc mi. Vitae sapien pellentesque habitant morbi tristique. Scelerisque purus semper eget duis at tellus at urna condimentum. Cursus turpis massa tincidunt dui ut.</p>
					<h3>Overview</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sodales ut etiam sit amet. Sollicitudin nibh sit amet commodo nulla facilisi nullam. Egestas dui id ornare arcu odio ut. Lectus quam id leo in. Quis enim lobortis scelerisque fermentum dui faucibus in. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Maecenas pharetra convallis posuere morbi leo urna molestie. Diam sollicitudin tempor id eu nisl nunc mi. Vitae sapien pellentesque habitant morbi tristique. Scelerisque purus semper eget duis at tellus at urna condimentum. Cursus turpis massa tincidunt dui ut.</p>
					<h3>Specification</h3>
				</div>
			</div>
		</section>
		<section class="section section-table-feed">
			<div class="section__inner">
				<div class="section-table-feed__header">
					<h2 class="heading-2">Silver/silver chlorideelectrode</h2>
				</div>
				<table class="section-table-feed__feed">
					<tr>
						<td>Reads</td>
						<td>pH</td>
					</tr>
					<tr>
						<td>Range</td>
						<td>0-14</td>
					</tr>
					<tr>
						<td>Accuracy</td>
						<td>+/- 0.002</td>
					</tr>
					<tr>
						<td>Connector</td>
						<td>Male BNC</td>
					</tr>
				</table>
			</div>
		</section>
		<section class="section section-rich-text">
			<div class="section__inner">
				<div class="rich-text">
					<h2>Warnings</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sodales ut etiam sit amet. Sollicitudin nibh sit amet commodo nulla facilisi nullam. Egestas dui id ornare arcu odio ut. Lectus quam id leo in. Quis enim lobortis scelerisque fermentum dui faucibus in. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Maecenas pharetra convallis posuere morbi leo urna molestie. Diam sollicitudin tempor id eu nisl nunc mi. Vitae sapien pellentesque habitant morbi tristique. Scelerisque purus semper eget duis at tellus at urna condimentum. Cursus turpis massa tincidunt dui ut.</p>
					<h2>Safety Instructions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae proin sagittis nisl rhoncus mattis rhoncus. Sodales ut etiam sit amet. Sollicitudin nibh sit amet commodo nulla facilisi nullam. Egestas dui id ornare arcu odio ut. Lectus quam id leo in. Quis enim lobortis scelerisque fermentum dui faucibus in. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Maecenas pharetra convallis posuere morbi leo urna molestie. Diam sollicitudin tempor id eu nisl nunc mi. Vitae sapien pellentesque habitant morbi tristique. Scelerisque purus semper eget duis at tellus at urna condimentum. Cursus turpis massa tincidunt dui ut.</p>
				</div>
			</div>
		</section>
		<section class="section section-header">
			<div class="section__inner">
				<h2 class="heading-2">Design Files and Datasheets</h2>
				<p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut purus ligula, commodo quis mauris in, lacinia ultricies risus.</p>
				<div class="section-header__links">
					<div class="section-header__links-item">
						<a href="#" class="button button--primary">Download Code Files</a>
					</div>
					<div class="section-header__links-item">
						<a href="#" class="button button--primary">Go to GitHub</a>
					</div>
					<div class="section-header__links-item">
						<a href="#" class="button button--primary">View Details</a>
					</div>
					<div class="section-header__links-item">
						<a href="#" class="button button--primary">Learn More</a>
					</div>
				</div>
			</div>
		</section>
		<section class="section section-image">
			<div class="section__inner">
				<div class="section-image__header">
					<h2 class="heading-2">Schematics</h2>
				</div>
				<div class="section-image__body">
					<p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut purus ligula, commodo quis mauris in, lacinia ultricies risus.</p>
				</div>
				<div class="section-image__image">
					<img src="https://via.placeholder.com/1440x960" alt="">
				</div>
			</div>
		</section>
		<section class="section section-image">
			<div class="section__inner">
				<div class="section-image__header">
					<h2 class="heading-2">Fabrication Print</h2>
				</div>
				<div class="section-image__body">
					<p class="body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut purus ligula, commodo quis mauris in, lacinia ultricies risus.</p>
				</div>
				<div class="section-image__image">
					<img src="https://via.placeholder.com/1440x960" alt="">
				</div>
			</div>
		</section>
	</article>
</main>
<?php get_footer(); ?>
