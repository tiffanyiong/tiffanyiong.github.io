<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WDWT_themes_support_class{

/* System Information for Support */
/* Copyright: (c) 2015 Nicolas GUILLAUME (nikeo), Nice, France */
/* License: GNU General Public License v2.0 or later */
/* License URI: http://www.gnu.org/licenses/gpl-2.0.html */

  function view(){
    
    ?>
    <div id="wdwt_theme_support" class="no_option_content">
        <div class="clear"></div>
    	<h3><?php _e('System Information', WDWT_LANG); ?></h3>
    	<h4><?php _e('Please include the following information when requesting support', WDWT_LANG); ?></h4>
    <textarea readonly="readonly" onclick="this.focus();this.select()" title="<?php _e( 'To copy the system info, click below then press Ctrl + C (PC) or Cmd + C (Mac).', WDWT_LANG ); ?>" style="width: 800px;min-height: 800px; font-family: monospace; background: 0 0;white-space: pre;overflow: auto;display:block;margin-left: 0 !important;">   
    # SITE_URL:                 <?php echo site_url() . "\n"; ?>
    # HOME_URL:                 <?php echo home_url() . "\n"; ?>
    # IS MULTISITE :            <?php echo is_multisite() ? 'Yes' . "\n" : 'No' . "\n" ?>

    # THEME VERSION :           <?php echo WDWT_VERSION . "\n"; ?>
    # WP VERSION :              <?php echo get_bloginfo( 'version' ) . "\n"; ?>
    # PERMALINK STRUCTURE :     <?php echo get_option( 'permalink_structure' ) . "\n"; ?>

    # ACTIVE PLUGINS :
    <?php
    $plugins = get_plugins();
    $active_plugins = get_option( 'active_plugins', array() );

    foreach ( $plugins as $plugin_path => $plugin ) {
      // show only active ones
      if ( ! in_array( $plugin_path, $active_plugins ) )
        continue;

      echo $plugin['Name'] . ': ' . $plugin['Version'] ."\n";
    }

    if ( is_multisite() ) :
    ?>
    #  NETWORK ACTIVE PLUGINS:
    <?php
    $plugins = wp_get_active_network_plugins();
    $active_plugins = get_site_option( 'active_sitewide_plugins', array() );

    foreach ( $plugins as $plugin_path ) {
      $plugin_base = plugin_basename( $plugin_path );

      // If the plugin isn't active, don't show it.
      if ( ! array_key_exists( $plugin_base, $active_plugins ) )
        continue;

      $plugin = get_plugin_data( $plugin_path );

      echo $plugin['Name'] . ' :' . $plugin['Version'] ."\n";
    }

    endif;
    global $wpdb;
    ?>

    PHP Version:              <?php echo PHP_VERSION . "\n"; ?>
    MySQL Version:            <?php echo @mysqli_get_server_info() . "\n"; ?>
    Web Server Info:          <?php echo $_SERVER['SERVER_SOFTWARE'] . "\n"; ?>

    WordPress Memory Limit:   <?php echo WP_MEMORY_LIMIT."B"; ?><?php echo "\n"; ?>
    PHP Safe Mode:            <?php echo ini_get( 'safe_mode' ) ? "Yes" : "No\n"; ?>
    PHP Memory Limit:         <?php echo ini_get( 'memory_limit' ) . "\n"; ?>
    PHP Upload Max Size:      <?php echo ini_get( 'upload_max_filesize' ) . "\n"; ?>
    PHP Post Max Size:        <?php echo ini_get( 'post_max_size' ) . "\n"; ?>
    PHP Upload Max Filesize:  <?php echo ini_get( 'upload_max_filesize' ) . "\n"; ?>
    PHP Time Limit:           <?php echo ini_get( 'max_execution_time' ) . "\n"; ?>
    PHP Max Input Vars:       <?php echo ini_get( 'max_input_vars' ) . "\n"; ?>
    PHP Arg Separator:        <?php echo ini_get( 'arg_separator.output' ) . "\n"; ?>
    PHP Allow URL File Open:  <?php echo ini_get( 'allow_url_fopen' ) ? "Yes" : "No\n"; ?>

    WP_DEBUG:                 <?php echo defined( 'WP_DEBUG' ) ? WP_DEBUG ? 'Enabled' . "\n" : 'Disabled' . "\n" : 'Not set' . "\n" ?>

    Show On Front:            <?php echo get_option( 'show_on_front' ) . "\n" ?>
    Page On Front:            <?php $id = get_option( 'page_on_front' ); echo get_the_title( $id ) . ' (#' . $id . ')' . "\n" ?>
    Page For Posts:           <?php $id = get_option( 'page_for_posts' ); echo get_the_title( $id ) . ' (#' . $id . ')' . "\n" ?>
    
    </textarea>
    </div>
  <?php
  }
} ?>