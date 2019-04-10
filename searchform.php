
<div class="search-wrapper">
	<form action="<?php echo esc_url( home_url('/') ); ?>" method="get">
    		<input class="search-textbox"  type="text" name="s" placeholder="<?php esc_attr_e( 'Search'); ?>" tabindex="1" value="<?php echo get_search_query(); ?>" required/>
			<button type="submit" for="s"><i class="fas fa-search"></i></button>
	</form>
</div>