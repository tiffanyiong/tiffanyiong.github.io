<form class="ast-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
  <input type="text" placeholder="<?php esc_attr_e('Search...', WDWT_LANG); ?>" class="search-input" autocomplete="off"
         name="s" value="<?php echo get_search_query(); ?>"
         onkeyup="showResult(this.value, this, '<?php echo get_option("home", get_site_url()) . '/wp-admin/admin-ajax.php'; ?>' );"/>
  <div id="livesearch"></div>
  <input type="submit" value="" id="search-submit"/>
</form>