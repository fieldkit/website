<form action="<?php echo esc_url(home_url('/')); ?>" class="search-form" method="get" novalidate role="search">
	<div class="search-form__input-container">
		<input
			class="search-form__input"
			name="s"
			placeholder="<?php echo __('Search'); ?>"
			required
			type="search"
			value="<?php echo get_search_query(); ?>"
		/>
		<button aria-label="<?php echo __('Search'); ?>" class="search-form__submit" type="submit"></button>
	</div>
</form>
