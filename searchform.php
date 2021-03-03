<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
	<input type="search" name="s" class="search-field" placeholder="Suche..." maxlength="30" value="<?php echo get_search_query(); ?>">
	<button type="submit" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>