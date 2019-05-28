<?php


class WDWT_homepage_page_class
{


  public $options;

  function __construct()
  {

    include_once(ABSPATH . 'wp-admin/includes/plugin.php');

    add_filter("wdwt_admin_setting_output_opt_content_post_categories", array("WDWT_homepage_page_class", "add_woo_categories"));
    add_filter("wdwt_admin_setting_output_opt_blog_posts_categories", array("WDWT_homepage_page_class", "add_woo_categories"));
    add_filter("wdwt_admin_setting_output_opt_gallery_posts_categories", array("WDWT_homepage_page_class", "add_woo_categories"));
    add_filter("wdwt_admin_setting_output_opt_review_posts_categories", array("WDWT_homepage_page_class", "add_woo_categories"));


    add_filter("wdwt_admin_setting_output_opt_home_middle_description_post", array("WDWT_homepage_page_class", "add_woo_posts"));
    add_filter("wdwt_admin_setting_output_opt_pinned_posts", array("WDWT_homepage_page_class", "add_woo_posts"));


    $this->options = array(
      /* ------ content posts ------ */
      "content_posts_enable" => array(
        "name" => "content_posts_enable",
        "title" => __("Show Portfolio Posts", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array('content_posts_sec_order', 'content_post_turn_on_animation', 'content_post_categories', 'content_post_count','content_posts_pages_choose', 'content_post_order', 'content_post_orderby', 'content_post_size_ratio', 'content_post_margin'),
        'hide' => array(),
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),

      'content_posts_sec_order' => array(
        "name" => "content_posts_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'default' => '1',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      "content_post_turn_on_animation" => array(
        "name" => "content_post_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      "content_post_order" => array(
        "name" => "content_post_order",
        "title" => "",
        'type' => 'select',
        "sanitize_type" => "sanitize_text_field",
        "valid_options" => array('asc' => __("Ascending", WDWT_LANG), 'desc' => __("Descending", WDWT_LANG)),
        "description" => __("Order of posts", WDWT_LANG),
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'default' => array('desc'),
        'customizer' => array()
      ),
      "content_post_orderby" => array(
        "name" => "content_post_orderby",
        "title" => "",
        'type' => 'select',
        "sanitize_type" => "sanitize_text_field",
        "valid_options" => array('date' => __("Date", WDWT_LANG), 'name' => __("Name", WDWT_LANG)),
        "description" => __("Order by", WDWT_LANG),
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'default' => array('date'),
        'customizer' => array()
      ),

      'content_post_count' => array(
        "name" => "content_post_count",
        "title" => "",
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Portfolio posts count", WDWT_LANG),
        'default' => '6',
        'step' => '1',
        'min' => '1',
        'max' => '99',
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      "content_post_categories" => array(
        "name" => "content_post_categories",
        "title" => "",
        'type' => 'select',
        'multiple' => "true",
        "valid_options" => $this->get_categories(),
        "description" => __("Filter only these categories.", WDWT_LANG),
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'default' => array(''),
        'customizer' => array()
      ),
      "content_post_size_ratio" => array(
        "name" => "content_post_size_ratio",
        "title" => "",
        'type' => 'number',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Thumbs size ratio. Height over width. Write number between 0.5 and 2.", WDWT_LANG),
        'default' => '0.75',
        'step' => '0.01',
        'min' => '0.5',
        'max' => '2.0',
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      "content_post_margin" => array(
        "name" => "content_post_margin",
        "title" => "",
        'type' => 'number',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Margin of thumbs in Portfolio section.", WDWT_LANG),
        'default' => '10',
        'unit_symbol' => 'px',
        'step' => '1',
        'min' => '0',
        'max' => '200',
        'section' => 'portfolio_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),

      /* ------ featured post ------  */
      "home_middle_description_post_enable" => array(
        "name" => "home_middle_description_post_enable",
        "title" => __("Show featured post", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => '',
        'show' => array("home_middle_description_sec_order", "home_middle_description_turn_on_animation", "home_middle_description_post"),
        'hide' => array(),
        'section' => 'featured_post',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),

    'home_middle_description_sec_order' => array(
        "name" => "home_middle_description_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'featured_post',
        'tab' => 'homepage',
        'default' => '2',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      "home_middle_description_turn_on_animation" => array(
        "name" => "home_middle_description_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'featured_post',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      "home_middle_description_post" => array(
        "name" => "home_middle_description_post",
        "title" => "",
        'type' => 'select',
        "valid_options" => $this->get_posts(),
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Select the single post", WDWT_LANG),
        'section' => 'featured_post',
        'tab' => 'homepage',
        'default' => array(''),
        'customizer' => array()
      ),
      /* ------ blog posts ------  */
      'blog_posts_enable' => array(
        "name" => "blog_posts_enable",
        "title" => __("Show blog posts", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array("blog_posts_sec_order", "blog_posts_turn_on_animation", 'title' => 'blog_posts_title', 'description' => 'blog_posts_description', 'category' => 'blog_posts_categories'),
        'hide' => array(),
        'section' => 'blog_posts',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
    'blog_posts_sec_order' => array(
        "name" => "blog_posts_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'blog_posts',
        'tab' => 'homepage',
        'default' => '3',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      "blog_posts_turn_on_animation" => array(
        "name" => "blog_posts_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'blog_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      'blog_posts_title' => array(
        "name" => "blog_posts_title",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Blog posts section title", WDWT_LANG),
        'section' => 'blog_posts',
        'tab' => 'homepage',
        'default' => 'Blog title',
        'customizer' => array()
      ),
      'blog_posts_description' => array(
        "name" => "blog_posts_description",
        "title" => "",
        'type' => 'textarea',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Blog posts section title", WDWT_LANG),
        'section' => 'blog_posts',
        'tab' => 'homepage',
        'default' => 'Awesome blog description',
        'customizer' => array()
      ),
      "blog_posts_categories" => array(
        "name" => "blog_posts_categories",
        "title" => "",
        'type' => 'select',
        'multiple' => "true",
        "valid_options" => $this->get_categories(),
        "description" => __("Filter only these categories.", WDWT_LANG),
        'section' => 'blog_posts',
        'tab' => 'homepage',
        'default' => array(''),
        'customizer' => array()
      ),
      /* ------ gallery posts ------ */
      'gallery_posts_enable' => array(
        "name" => "gallery_posts_enable",
        "title" => __("Show Gallery Posts", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array('gallery_posts_count', "gallery_posts_sec_order", "gallery_posts_turn_on_animation", 'title' => 'gallery_posts_title', 'description' => 'gallery_posts_description', 'category' => 'gallery_posts_categories'),
        'hide' => array(),
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
     'gallery_posts_sec_order' => array(
        "name" => "gallery_posts_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'default' => '4',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      "gallery_posts_turn_on_animation" => array(
        "name" => "gallery_posts_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      'gallery_posts_title' => array(
        "name" => "gallery_posts_title",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Gallery posts section title", WDWT_LANG),
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'default' => 'Gallery posts',
        'customizer' => array()
      ),
      'gallery_posts_description' => array(
        "name" => "gallery_posts_description",
        "title" => "",
        'type' => 'textarea',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Gallery posts section description", WDWT_LANG),
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'default' => 'Sauron comes with 5 default color themes. They can be customized with the desired background colors and images, allowing you to have a unique color scheme and design on your business website.',
        'customizer' => array()
      ),
      'gallery_posts_count' => array(
        "name" => "gallery_posts_count",
        "title" => "",
        'type' => 'number',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Gallery posts count", WDWT_LANG),
        'default' => '3',
        'step' => '1',
        'min' => '1',
        'max' => '99',
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      "gallery_posts_categories" => array(
        "name" => "gallery_posts_categories",
        "title" => "",
        'type' => 'select',
        'multiple' => "true",
        "valid_options" => $this->get_categories(),
        "description" => __("Filter only these categories.", WDWT_LANG),
        'section' => 'gallery_posts',
        'tab' => 'homepage',
        'default' => array(''),
        'customizer' => array()
      ),
      /* ------ review posts ------ */
      'review_posts_enable' => array(
        "name" => "review_posts_enable",
        "title" => __("Show Review Posts", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array('review_posts_sec_order', 'review_posts_turn_on_animation', 'review_posts_carousel', 'review_posts_time_interval', 'review_posts_stop_hover', 'title' => 'review_posts_title', 'description' => 'review_posts_description', 'category' => 'review_posts_categories'),
        'hide' => array(),
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),

      'review_posts_sec_order' => array(
        "name" => "review_posts_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => '5',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      "review_posts_turn_on_animation" => array(
        "name" => "review_posts_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'review_posts',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      'review_posts_carousel' => array(
        "name" => "review_posts_carousel",
        "title" => "",
        'type' => 'checkbox_open',
        'show' => array('review_posts_time_interval', 'review_posts_stop_hover'),
        'hide' => array(),
        "description" => __("Enable Autoplay", WDWT_LANG),
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => false,
        'customizer' => array()
      ),
      'review_posts_time_interval' => array(
        "name" => "review_posts_time_interval",
        "title" => __("Time Interval", WDWT_LANG),
        'type' => 'number',
        "description" => "",
        "sanitize_type" => "sanitize_text_field",
        'section' => 'review_posts',
        'tab' => 'homepage',
        'unit_symbol' => 'sec.',
        'min' => 1.5,
        'step' => 0.1,
        'default' => 5,
        'customizer' => array()
      ),
      'review_posts_stop_hover' => array(
        "name" => "review_posts_stop_hover",
        "title" => __("Stop Animation while Hovering", WDWT_LANG),
        'type' => 'checkbox',
        "description" => "",
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
      'review_posts_title' => array(
        "name" => "review_posts_title",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Review posts section title", WDWT_LANG),
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => 'Review posts',
        'customizer' => array()
      ),
      'review_posts_description' => array(
        "name" => "review_posts_description",
        "title" => "",
        'type' => 'textarea',
        "sanitize_type" => "sanitize_html_field",
        "description" => __("Review posts section description.", WDWT_LANG),
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => '',
        'customizer' => array()
      ),
      "review_posts_categories" => array(
        "name" => "review_posts_categories",
        "title" => "",
        'type' => 'select',
        'multiple' => "true",
        "valid_options" => $this->get_categories(),
        "description" => __("Filter only these categories.", WDWT_LANG),
        'section' => 'review_posts',
        'tab' => 'homepage',
        'default' => array(''),
        'customizer' => array()
      ),

      /* ------ pinned post ------ */
      'pinned_post_enable' => array(
        "name" => "pinned_post_enable",
        "title" => __("Show Pinned Post", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array("pinned_post_sec_order", "pinned_post_turn_on_animation", 'bg_image' => 'pinned_bg_img', 'post' => 'pinned_posts'),
        'hide' => array(),
        'section' => 'pinned_post',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),

    'pinned_post_sec_order' => array(
        "name" => "pinned_post_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'pinned_post',
        'tab' => 'homepage',
        'default' => '7',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      "pinned_post_turn_on_animation" => array(
        "name" => "pinned_post_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'pinned_post',
        'tab' => 'homepage',
        'customizer' => array()
      ),
      'pinned_bg_img' => array(
        'name' => 'pinned_bg_img',
        'title' => "",
        'type' => 'upload_single',
        "sanitize_type" => "sanitize_text_field",
        'valid_options' => '',
        'description' => __("Pinned Background Image. Upload custom image, select from media library or leave empty.", WDWT_LANG),
        'section' => 'pinned_post',
        'tab' => 'homepage',
        'default' => get_template_directory_uri() . "/images/newsletter_bg.jpg",
        'customizer' => array()
      ),
      "pinned_posts" => array(
        "name" => "pinned_posts",
        "title" => "",
        'type' => 'select',
        "valid_options" => $this->get_posts(),
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Select single post", WDWT_LANG),
        'section' => 'pinned_post',
        'tab' => 'homepage',
        'default' => array(''),
        'customizer' => array()
      ),
      "social_links_turn_on_animation" => array(
        "name" => "social_links_turn_on_animation",
        "title" => "",
        'type' => 'checkbox',
        "description" => __("Enable animation", WDWT_LANG),
        'default' => true,
        'section' => 'general_links',
        'tab' => 'homepage',
        'customizer' => array()
      ),

    'social_links_sec_order' => array(
        "name" => "social_links_sec_order",
        "title" => '',
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => __("Set the order number of this section. Homepage structure will be built based on this ordering.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '8',
        'min' => '1',
        'max' => '9',
        'customizer' => array()
      ),

      'follow_title' => array(
        "name" => "follow_title",
        "title" => __("Follow us section title", WDWT_LANG),
        'type' => 'text',
        "sanitize_type" => "sanitize_html_field",
        "description" => "",
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => 'Follow us',
        'customizer' => array()
      ),
      'follow_description' => array(
        "name" => "follow_description",
        "title" => __("Follow us section description", WDWT_LANG),
        'type' => 'textarea',
        "sanitize_type" => "sanitize_html_field",
        "description" => "",
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => 'Written in accordance with WordPress code standards, the theme has a high loading speed and ensures the security of your website.',
        'customizer' => array()
      ),

      'twitter_icon_show' => array(
        "name" => "twitter_icon_show",
        "title" => __("Show Twitter Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array('twitter_url'),
        'hide' => array(),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
      'twitter_url' => array(
        "name" => "twitter_url",
        "title" => '',
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your Twitter Profile URL below.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'linkedin_icon_show' => array(
        "name" => "linkedin_icon_show",
        "title" => __("Show LinkedIn Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array('linkedin_url'),
        'hide' => array(),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
      'linkedin_url' => array(
        "name" => "linkedin_url",
        "title" => '',
        'type' => 'text',
        'input_size' => '60',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your LinkedIn URL below.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'facebook_icon_show' => array(
        "name" => "facebook_icon_show",
        "title" => __("Show Facebook Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'show' => array('facebook_url'),
        'hide' => array(),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
      'facebook_url' => array(
        "name" => "facebook_url",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your Facebook Profile URL.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'google_icon_show' => array(
        "name" => "google_icon_show",
        "title" => __("Show Google+ Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'section' => 'general_links',
        'show' => array('google_url'),
        'hide' => array(),
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
      'google_url' => array(
        "name" => "google_url",
        "title" => "",
        'type' => 'text',
        "description" => __("Enter your Google+ Profile URL.", WDWT_LANG),
        "sanitize_type" => "esc_url_raw",
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'instagram_icon_show' => array(
        "name" => "instagram_icon_show",
        "title" => __("Show Instagram Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'section' => 'general_links',
        'show' => array('instagram_url'),
        'hide' => array(),
        'tab' => 'homepage',
        'default' => true,
        'customizer' => array()
      ),
      'instagram_url' => array(
        "name" => "instagram_url",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your Instagram Profile URL.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'pinterest_icon_show' => array(
        "name" => "pinterest_icon_show",
        "title" => __("Show Pinterest Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'section' => 'general_links',
        'show' => array('pinterest_url'),
        'hide' => array(),
        'tab' => 'homepage',
        'default' => false,
        'customizer' => array()
      ),
      'pinterest_url' => array(
        "name" => "pinterest_url",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your Pinterest Profile URL.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'youtube_icon_show' => array(
        "name" => "youtube_icon_show",
        "title" => __("Show Youtube Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'section' => 'general_links',
        'show' => array('youtube_url'),
        'hide' => array(),
        'tab' => 'homepage',
        'default' => false,
        'customizer' => array()
      ),
      'youtube_url' => array(
        "name" => "youtube_url",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your Youtube Profile URL.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'tumblr_icon_show' => array(
        "name" => "tumblr_icon_show",
        "title" => __("Show Tumblr Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'section' => 'general_links',
        'show' => array('tumblr_url'),
        'hide' => array(),
        'tab' => 'homepage',
        'default' => false,
        'customizer' => array()
      ),
      'tumblr_url' => array(
        "name" => "tumblr_url",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your Tumblr Profile URL.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),
      'rss_icon_show' => array(
        "name" => "rss_icon_show",
        "title" => __("Show RSS Icon", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => "",
        'section' => 'general_links',
        'show' => array('rss_url'),
        'hide' => array(),
        'tab' => 'homepage',
        'default' => false,
        'customizer' => array()
      ),
      'rss_url' => array(
        "name" => "rss_url",
        "title" => "",
        'type' => 'text',
        "sanitize_type" => "esc_url_raw",
        "description" => __("Enter your RSS feed URL.", WDWT_LANG),
        'section' => 'general_links',
        'tab' => 'homepage',
        'default' => '#',
        'customizer' => array()
      ),


    );

    if (is_plugin_active('slider-wd/slider-wd.php')) {
      $this->options['show_slider_wd'] = array(
        "name" => "show_slider_wd",
        "title" => __("Show Slider WD in header", WDWT_LANG),
        'type' => 'checkbox_open',
        'show' => array('slider_wd_id'),
        'hide' => array(),
        "sanitize_type" => "",
        "description" => __("Show Slider WD", WDWT_LANG),
        'section' => 'homepage_slider',
        'tab' => 'homepage',
        'default' => false,
        'customizer' => array()
      );
      $this->options['slider_wd_id'] = array(
        "name" => "slider_wd_id",
        "title" => __("Enter Slider WD id", WDWT_LANG),
        'type' => 'number',
        "sanitize_type" => "sanitize_text_field",
        "description" => "",
        'section' => 'homepage_slider',
        'tab' => 'homepage',
        'default' => "1",
        'customizer' => array()
      );
    }

  }

  private function get_posts()
  {
    $args = array(
      'posts_per_page' => 3000,
      'orderby' => 'post_date',
      'order' => 'DESC',
      'post_type' => 'post',
      'post_status' => 'publish',
    );

    $posts_array_custom = array();
    $posts_array = get_posts($args);

    foreach ($posts_array as $post) {
      $key = $post->ID;
      $posts_array_custom[$key] = $post->post_title;
    }
    if (empty($posts_array_custom)) {
      $posts_array_custom = array('');
    }
    return $posts_array_custom;
  }


  private function get_diagram_pages()
  {
    $args = array(
      'posts_per_page' => 3000,
      'orderby' => 'post_date',
      'order' => 'DESC',
      'post_type' => 'page',
      'post_status' => 'publish',
      'meta_value' => 'page-diagram.php'
    );

    $pages_array_custom = array();
    $pages_array = get_pages($args);

    foreach ($pages_array as $page) {
      $key = $page->ID;
      $pages_array_custom[$key] = $page->post_title;
    }
    if (empty($pages_array_custom)) {
      $pages_array_custom = array('');
    }
    return $pages_array_custom;
  }


  private function get_categories()
  {
    $args = array(
      'hide_empty' => 0,
      'orderby' => 'name',
      'order' => 'ASC',
    );

    $categories_array_custom = array();
    $categories_array = get_categories($args);

    foreach ($categories_array as $category) {
      $categories_array_custom[$category->term_id] = $category->name;
    }
    if (empty($categories_array_custom)) {
      $categories_array_custom = array('');
    }
    return $categories_array_custom;
  }

  private function get_pages()
  {
    $args = array(
      'posts_per_page' => 3000,
      'hierarchical' => 0,
    );

    $pages_array_custom = array();
    $pages_array = get_pages($args);

    foreach ($pages_array as $page) {
      $key = $page->ID;
      $pages_array_custom[$key] = $page->post_title;
    }
    if (empty($pages_array_custom)) {
      $pages_array_custom = array('');
    }
    return $pages_array_custom;
  }

  public static function add_woo_posts($posts_array)
  {
    if (is_plugin_active('woocommerce/woocommerce.php')) {

      $args = array(
        'posts_per_page' => 3000,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'product',
        'post_status' => 'publish',
      );

      $woo_posts_array = get_posts($args);
      $woo_posts = array();
      foreach ($woo_posts_array as $woo_post) {
        $woo_posts[$woo_post->ID] = $woo_post->post_title;
      }
      $posts_array["valid_options"] = $posts_array["valid_options"] + $woo_posts;

    }
    return $posts_array;
  }

  public static function add_woo_categories($categories_array)
  {
    if (is_plugin_active('woocommerce/woocommerce.php')) {

      $args = array(
        'taxonomy' => 'product_cat',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'hide_empty' => 0
      );
      $woo_cat_array = get_categories($args);
      $woo_categories = array();
      foreach ($woo_cat_array as $woo_cat) {
        $woo_categories[$woo_cat->term_id] = $woo_cat->name;
      }
      $categories_array["valid_options"] = $categories_array["valid_options"] + $woo_categories;
    }
    return $categories_array;
  }

}
 