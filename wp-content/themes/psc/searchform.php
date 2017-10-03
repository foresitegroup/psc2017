<form role="search" method="get" class="form-search" action="<?php echo home_url('/'); ?>">
  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-query" placeholder="Search">
  <button type="submit" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>