<section class="section section-navbar--secondary" id='product-listing'>
<div class="section__inner">
<ul class="menu-navbar--secondary">
<?php

if (has_nav_menu('product-feed-navigation')) wp_nav_menu(array('theme_location' => 'product-feed-navigation'));

?>
</ul>
</div>
</section>
