<?php
global $wdwt_options;


/// include Layout page class
require_once('page_layout.php');
/// include General Settings page class
require_once('page_general_settings.php');
/// include Home page class
require_once('page_homepage.php');
/// include Typography page class
require_once('page_typography.php');

/// include Slider page class

//require_once( 'page_slider.php' );

require_once('page_lightbox.php');

///include licensing page
require_once('licensing.php');

/// include Theme support page class
require_once('WDWT_support_information.php');

$wdwt_layout_page = new WDWT_layout_page_class();
$wdwt_general_settings_page = new WDWT_general_settings_page_class();
$wdwt_homepage_page = new WDWT_homepage_page_class();
$wdwt_typography_page = new WDWT_typography_page_class();
$wdwt_themes_support_page = new WDWT_themes_support_class();
//$wdwt_slider_page = new WDWT_slider_page_class();
$wdwt_lightbox_page = new WDWT_lightbox_page_class();
$wdwt_licensing_page = new WDWT_licensing_page_class();


/* option parameter example
'seo_home_title' => array( 
        'name' => 'seo_home_title', 
        'title' => 'Custom Title', 
        'type' => 'checkbox_open', 
        'section' => 'seo_home', 
        'tab' => 'seo', 
        'default' => ''
        'description' => 'Check the box to use a custom title for the website. By default it takes the combination of the website name and its description.', 
        'valid_options' => array("key" => "value"), 
        'sanitize_type' => '',
        'show' => array("key" => "value") for select_open and radio btn group, and array("value","value") for checkbox
        'hide' => array("key" => "value") for select_open and radio btn group, and array("value","value") for checkbox
        'input_size' = > 'char number' ,
        'width' => "",
        'height' => '', //for textarea
        'id' => '' only for buttons, and text_preview  and other elements without name!
        'modified_by' => array("name" => "css_attr") 'selects' modifying  text_preview
        
      )

see options for colors in page_color_control.php

*/


add_filter('option_' . WDWT_OPT, 'wdwt_options_mix_defaults');

add_action('after_setup_theme', 'wdwt_options_init', 10, 2);


function wdwt_options_init()
{
  global $wdwt_options;


  $option_defaults = wdwt_get_option_defaults();
  $new_version = $option_defaults['theme_version'];
  $options = get_option(WDWT_OPT, array());

  if (isset($options['theme_version'])) {
    $old_version = $options['theme_version'];
  } else {
    $old_version = '0.0.0';
  }

  if ($new_version !== $old_version) {
    require_once('updater.php');
    $theme_update = new Sauron_updater($new_version, $old_version);
    $options = $theme_update->get_old_params();  /* old params in new format */
  }

  /*overwrite defaults with new options*/
  $wdwt_options = apply_filters('wdwt_options_init', $options);
}

function wdwt_options_mix_defaults($options)
{
  $option_defaults = wdwt_get_option_defaults();
  /*theme version is saved separately*/
  /*for the updater*/
  if (isset($option_defaults['theme_version'])) {
    unset($option_defaults['theme_version']);
  }
  $options = wp_parse_args($options, $option_defaults);
  return $options;
}


function wdwt_get_options()
{
  global $wdwt_options;
  wdwt_options_init();/*refrest options*/

  return apply_filters('wdwt_get_options', $wdwt_options);
}


function wdwt_get_option_defaults()
{
  $option_parameters = wdwt_get_option_parameters();
  $option_defaults = array();

  $option_defaults['theme_version'] = WDWT_VERSION;

  foreach ($option_parameters as $option_parameter) {
    $name = (isset($option_parameter['name']) && $option_parameter['name'] != '') ? $option_parameter['name'] : false;
    if ($name && isset($option_parameter['default']))
      $option_defaults[$name] = $option_parameter['default'];
  }
  return apply_filters('wdwt_get_option_defaults', $option_defaults);
}


function wdwt_get_option_parameters()
{
  global $wdwt_layout_page,
         $wdwt_general_settings_page,
         $wdwt_homepage_page,
         $wdwt_typography_page,
         $wdwt_lightbox_page;/*$wdwt_slider_page*/;

  global $wdwt_licensing_page;

  $options = array();

  foreach ($wdwt_layout_page->options as $kay => $x)
    $options[$kay] = $x;
  foreach ($wdwt_general_settings_page->options as $kay => $x)
    $options[$kay] = $x;

  foreach ($wdwt_homepage_page->options as $kay => $x)
    $options[$kay] = $x;

  foreach ($wdwt_typography_page->options as $kay => $x)
    $options[$kay] = $x;

  /*
  foreach($wdwt_slider_page->options  as $kay => $x)  
    $options[$kay] = $x;
  */
  foreach ($wdwt_lightbox_page->options as $kay => $x)
    $options[$kay] = $x;


  return apply_filters('wdwt_get_option_parameters', $options);
}


function wdwt_get_tabs()
{
  $tabs = array();

  $tabs['layout_editor'] = array(
    'name' => 'layout_editor',
    'title' => __('Layout Editor', WDWT_LANG),
    'sections' => array(
      'layouts' => array(
        'name' => 'layouts',
        'title' => __('Layout Editor', WDWT_LANG),
        'description' => ''
      )
    ),
    'description' => wdwt_section_descr('layout_editor')
  );

  $tabs['general'] = array(
    'name' => 'general',
    'title' => __('General', WDWT_LANG),
    'sections' => array(
      'general_main' => array(
        'name' => 'general_main',
        'title' => __('Main', WDWT_LANG),
        'description' => ''
      )
    ),
    'description' => wdwt_section_descr('general')
  );


  $tabs['homepage'] = array(
    'name' => 'homepage',
    'title' => __('Homepage', WDWT_LANG),
    'sections' => array(),
    'description' => wdwt_section_descr('homepage'),
  );
  if (is_plugin_active('slider-wd/slider-wd.php')) {
    $tabs['homepage']['sections']['homepage_slider'] = array(
      'name' => 'homepage_slider',
      'title' => __('Slider', WDWT_LANG),
      'description' => ''
    );
  }

  $tabs['homepage']['sections']['portfolio_posts'] = array(
    'name' => 'portfolio_posts',
    'title' => __('Top posts: Portfolio', WDWT_LANG),
    'description' => ''
  );
  $tabs['homepage']['sections']['featured_post'] = array(
    'name' => 'featured_post',
    'title' => __('Featured post', WDWT_LANG),
    'description' => sprintf(__('Create custom link menu item with URL %s to scroll to featured post.', WDWT_LANG), get_home_url() . '?#features_post')
  );
  $tabs['homepage']['sections']['blog_posts'] = array(
    'name' => 'blog_posts',
    'title' => __('Blog posts, main posts index ', WDWT_LANG),
    'description' => sprintf(__('This is the main loop of posts. Edit post count from WordPress settings - reading. Create custom link menu item with URL %s to scroll to blog posts.', WDWT_LANG), get_home_url() . '?#categories_posts')
  );
  $tabs['homepage']['sections']['gallery_posts'] = array(
    'name' => 'gallery_posts',
    'title' => __('Gallery posts', WDWT_LANG),
    'description' => sprintf(__('Create custom link menu item with URL %s to scroll to gallery posts. Edit number of posts fron WordPress setting - reading - "Blog pages show at most".', WDWT_LANG), get_home_url() . '?#gallery_posts')
  );
  $tabs['homepage']['sections']['review_posts'] = array(
    'name' => 'review_posts',
    'title' => __('Review posts', WDWT_LANG),
    'description' => sprintf(__('Create custom link menu item with URL %s to scroll to review posts.', WDWT_LANG), get_home_url() . '?#dynamic_posts')
  );

  $tabs['homepage']['sections']['pinned_post'] = array(
    'name' => 'pinned_post',
    'title' => __('Pinned post', WDWT_LANG),
    'description' => sprintf(__('Highlight this post using custom background. Create custom link menu item with URL %s to scroll to pinned post', WDWT_LANG), get_home_url() . '?#pinned_post')
  );
  $tabs['homepage']['sections']['general_links'] = array(
    'name' => 'general_links',
    'title' => __('Social Links', WDWT_LANG),
    'description' => sprintf(__('Create custom link menu item with URL %s to scroll to social links.', WDWT_LANG), get_home_url() . '?#social_links')
  );


  $tabs['typography'] = array(
    'name' => 'typography',
    'title' => __('Typography', WDWT_LANG),
    'description' => wdwt_section_descr('typography'),
    'sections' => array(
      'text_headers' => array(
        'name' => 'text_headers',
        'title' => __('Headings', WDWT_LANG),
        'description' => ''
      ),
      'primary_font' => array(
        'name' => 'primary_font',
        'title' => __('Primary Font', WDWT_LANG),
        'description' => ''
      ),
      'secondary_font' => array(
        'name' => 'secondary_font',
        'title' => __('Secondary Font', WDWT_LANG),
        'description' => ''
      ),
      'inputs_textareas' => array(
        'name' => 'inputs_textareas',
        'title' => __('Inputs and Text Areas', WDWT_LANG),
        'description' => ''
      )
    ),

  );

  /*
  $tabs['slider'] = array(
    'name' => 'slider',
    'title' => __( 'Slider', WDWT_LANG ),
    'description' => wdwt_section_descr(),
    'sections' => array(
      'slider_main' => array(
        'name' => 'slider_main',
        'title' => __( 'Slider - General', WDWT_LANG ),
        'description' => ''
      ),
      'slider_imgs' => array(
        'name' => 'slider_imgs',
        'title' => __( 'Slider - Images' , WDWT_LANG),
        'description' => ''
      ),
    ),
  );
  */

  $tabs['lightbox'] = array(
    'name' => 'lightbox',
    'title' => __('Lightbox', WDWT_LANG),
    'description' => wdwt_section_descr('lightbox'),
    'sections' => array(
      'lightbox' => array(
        'name' => 'lightbox',
        'title' => __('Lightbox', WDWT_LANG),
        'description' => ''
      ),
    ),
  );

  /* NO if WDWT_IS_PRO*/
  $tabs['color_control'] = array(
    'name' => 'color_control',
    'title' => __('Color Control', WDWT_LANG),
    'sections' => array(
      'color_control' => array(
        'name' => 'color_control',
        'title' => __('Color Control', WDWT_LANG),
        'description' => ''
      )
    ),
    'description' => wdwt_section_descr('color_control')
  );

  $tabs['licensing'] =
    array(
      'name' => 'licensing',
      'title' => __('Upgrade to PRO', WDWT_LANG),
      'sections' => array(
        'licensing' => array(
          'name' => 'licensing',
          'title' => __('Upgrade to PRO', WDWT_LANG),
          'description' => ''
        )
      ),
      'description' => ''
    );

  $tabs['themes_support'] = array(
    'name' => 'themes_support',
    'title' => __('Theme support', WDWT_LANG),
    'sections' => array(
      'themes_support' => array(
        'name' => 'themes_support',
        'title' => '',
        'description' => ''
      )
    ),
    'description' => ''
  );


  return apply_filters('wdwt_get_tabs', $tabs);
}
