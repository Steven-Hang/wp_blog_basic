
<div class="search-wrapper">
	<form method="get" action="<?php echo esc_url( home_url('/') ); ?>">
		<input type="text" name="s" size="40" class="search-textbox" placeholder="<?php esc_attr_e( 'Search...', 'zenlife' ); ?>" tabindex="1" value="<?php echo get_search_query(); ?>" required />
		<button type="submit" ><i class="fas fa-search"></i></button>
	</form>
</div>