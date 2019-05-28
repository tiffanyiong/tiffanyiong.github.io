<?php global $wdwt_front; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php wp_reset_query(); // reset query for comment and other ?>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="height=device-height,width=device-width"/>
  <meta name="viewport" content="initial-scale=1.0"/>
  <meta name="HandheldFriendly" content="true"/>
  <link rel="profile" href="http://gmpg.org/xfn/11"/>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
  <?php
  wp_head(); // wordpress standart scripts, meta, etc..
  ?>
</head>
<body <?php body_class(); ?>>
<?php

$fixed_menu = $wdwt_front->get_param('fix_menu');
$show_desc = $wdwt_front->get_param('show_desc');
if ($fixed_menu) {
  ?>
  <script>var wdwt_fixed_menu = 1;</script>
<?php }
else { ?>
  <script>var wdwt_fixed_menu = 0;</script>
  <?php
}
$header_image = get_header_image();
if (!empty($header_image)) {
  ?>
  <div class="container">
    <a class="custom-header-a" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo header_image(); ?>" class="custom-header">
    </a>
  </div>
  <?php
}
?>
<div id="header">
  <div class="container">
    <div id="logo_desc">
      <?php $wdwt_front->logo(); ?>
      <?php if ($show_desc) { ?>
        <h2 id="site_desc"><?php echo get_bloginfo('description', 'display'); ?></h2>
      <?php } ?>
    </div>

    <div class="phone-menu-block">
      <div id="top-nav">
        <?php
        $sauron_show_home = true;
        if (has_nav_menu('primary-menu')) {
          $sauron_show_home = false;
        }
        $wdwt_menu = wp_nav_menu(array(
          'show_home' => $sauron_show_home,/*ttt!!! here was false*/
          'theme_location' => 'primary-menu',
          'container' => false,
          'container_class' => '',
          'container_id' => '',
          'menu_class' => 'top-nav-list',
          'menu_id' => '',
          'echo' => false,
          'fallback_cb' => 'wp_page_menu',
          'before' => '',
          'after' => '',
          'link_before' => '',
          'link_after' => '',
          'items_wrap' => '<ul id="top-nav-list" class=" %2$s">%3$s</ul>',
          'depth' => 0,
          'walker' => ''
        ));
        echo $wdwt_menu; ?>
      </div>
    </div>
    <div id="search-block">
      <?php get_search_form(); ?>
    </div>
    <div class="clear"></div>
  </div>
</div>