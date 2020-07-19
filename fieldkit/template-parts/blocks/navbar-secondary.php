<section class="section section-navbar--secondary">
<div class="section__inner">
<ul class="menu-navbar--secondary">
<?php
foreach($category as $cat){
	printf(
		__( '<li class="menu-item"> <a class="menu-link" href="%1$s"> %2$s </a> </li>' , 'all' ),
		esc_html(get_category_link($cat->term_id)),
		esc_html($cat->name)
	);
}
?>
</ul>
</div>
</section>
