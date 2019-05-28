<?php

/* include  fornt end framework class */
require_once('WDWT_front_params_output.php');

class sauron_front extends WDWT_frontend
{

/**
   * print ordering styles
   *
   */

  public function order()
  {
  ?>
  <style>
    #content_front_page{
      -webkit-order:<?php echo intval($this->get_param('content_posts_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('content_posts_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('content_posts_sec_order', array(), 0)); ?>;
    }
    #image_list_top0{
      -webkit-order:<?php echo intval($this->get_param('home_middle_description_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('home_middle_description_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('home_middle_description_sec_order', array(), 0)); ?>;
    }

    #image_list_top1{
      -webkit-order:<?php echo intval($this->get_param('blog_posts_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('blog_posts_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('blog_posts_sec_order', array(), 0)); ?>;
    }

    #image_list_top2{
      -webkit-order:<?php echo intval($this->get_param('gallery_posts_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('gallery_posts_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('gallery_posts_sec_order', array(), 0)); ?>;
    }

    #image_list_top3{
      -webkit-order:<?php echo intval($this->get_param('review_posts_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('review_posts_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('review_posts_sec_order', array(), 0)); ?>;
    }
    
    #image_list_top5{
      -webkit-order:<?php echo intval($this->get_param('pinned_post_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('pinned_post_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('pinned_post_sec_order', array(), 0)); ?>;
    }

    #image_list_top6{
      -webkit-order:<?php echo intval($this->get_param('social_links_sec_order', array(), 0)); ?>;
      -ms-order:<?php echo intval($this->get_param('social_links_sec_order', array(), 0)); ?>;
      order:<?php echo intval($this->get_param('social_links_sec_order', array(), 0)); ?>;
    }

  </style>
  <?php
  }



  /**
   * print Layout styles
   *
   */

  public function layout()
  {
    global $post;

    if (isset($post) && is_singular()) {
      /*get all the meta of the current theme for the post*/
      $meta = get_post_meta($post->ID, WDWT_META, true);
    } else {
      $meta = array();
    }

    $default_layout = $this->get_param('default_layout', $meta);
    $full_width = $this->get_param('full_width', $meta);
    $content_area_percent = $this->get_param('content_area_percent', $meta);
    $main_column = $this->get_param('main_column', $meta);
    $pwa_width = $this->get_param('pwa_width', $meta);

    if ($full_width) {
      $content_area_percent = '99';
    }
    if ($full_width) { ?>
      <script>var sauron_full_width = 1;
      </script>
      <?php
    } else { ?>
      <script> var sauron_full_width = 0;
      </script>
      <?php
    }
    switch ($default_layout) {
      case 1: ?>
        <style type="text/css">
          #sidebar1, #sidebar2 {
            display: none;
          }

          .container {
            width: <?php echo $content_area_percent; ?>%;
          }
        </style>
        <?php
        break;

      case 2: ?>
        <style type="text/css">
          #sidebar2 {
            display: none;
          }

          #sidebar1 {
            display: block;
            float: right;
          }

          .blog, #content {
            display: block;
            float: left;
          }

          .container {
            width: <?php echo $content_area_percent; ?>%;
          }

          .blog, #content {
            width: <?php echo $main_column; ?>%;
          }

          #sidebar1 {
            width: <?php echo (99  - $main_column); ?>%;
          }
        </style>
        <?php
        break;

      case 3: ?>
        <style type="text/css">
          #sidebar2 {
            display: none;
          }

          #sidebar1 {
            margin-right: 1%;
            display: block;
            float: left;
          }

          .blog, #content {
            display: block;
            float: left;
          }

          .container {
            width: <?php echo $content_area_percent; ?>%;
          }

          .blog, #content {
            width: <?php echo $main_column ; ?>%;
          }

          #sidebar1 {
            width: <?php echo (99 -  $main_column); ?>%;
          }

          #top-page .blog, #top-page #blog {
            left: <?php echo  (100 -  $main_column) ; ?>%;
          }
        </style>
        <?php
        break;

      case 4: ?>
        <style type="text/css">
          #sidebar1, #sidebar2 {
            display: block;
            float: right;
          }

          #blog, .blog, #content {
            display: block;
            float: left;
          }

          .container {
            width: <?php echo $content_area_percent; ?>%;
          }

          .blog, #content {
            width: <?php echo $main_column ; ?>%;
          }

          #sidebar1 {
            width: <?php echo $pwa_width ; ?>%;
          }

          #sidebar2 {
            width: <?php echo (100  - $pwa_width - $main_column); ?>%;
          }
        </style>
        <?php
        break;

      case 5: ?>
        <style type="text/css">
          #sidebar1, #sidebar2 {
            display: block;
            float: left;
          }

          #blog, .blog, #content {
            display: block;
            float: right;
          }

          .container {
            width: <?php echo $content_area_percent; ?>%;
          }

          .blog, #content {
            width: <?php echo $main_column ; ?>%;
          }

          #sidebar1 {
            width: <?php echo $pwa_width ; ?>%;
          }

          #sidebar2 {
            width: <?php echo (100 - $pwa_width - $main_column); ?>%;
          }
        </style>
        <?php
        break;

      case 6: ?>
        <style type="text/css">
          #sidebar2 {
            display: block;
            float: right;
          }

          #sidebar1 {
            display: block;
            float: left;
          }

          .blog, #content {
            display: block;
            float: left;
          }

          .container {
            width: <?php echo $content_area_percent; ?>%;
          }

          .blog,
          #content {
            width: <?php echo $main_column ; ?>%;
          }

          #sidebar1 {
            width: <?php echo $pwa_width ; ?>%;
          }

          #sidebar2 {
            width: <?php echo (100  - $pwa_width - $main_column); ?>%;
          }

          #top-page .blog, #top-page #blog {
            left: <?php echo $pwa_width ; ?>%;
          }
        </style>
        <?php
        break;
    }
  }


  /**
   *    FRONT END COLOR CONTROL
   */

  public function color_control()
  {


    $color_scheme = $this->get_param('[colors_active][active]');

    $menu_elem_back_color = $this->get_param('[colors_active][colors][menu_elem_back_color][value]', array(), '#FFFFFF');
    $button_bg_color = $this->get_param('[colors_active][colors][button_bg_color][value]', array(), "#a8b8c5");
    $button_text_color = $this->get_param('[colors_active][colors][button_text_color][value]', array(), "#FFFFFF");
    $caption_bg_color = $this->get_param('[colors_active][colors][caption_bg_color][value]', array(), "#FFFFFF");

    $featured_post_bg_color = $this->get_param('[colors_active][colors][featured_post_bg_color][value]', array(), "#F9F9F9");
    $text_headers_color = $this->get_param('[colors_active][colors][text_headers_color][value]', array(), "#000000");
    $primary_text_color = $this->get_param('[colors_active][colors][primary_text_color][value]', array(), "#000000");
    $footer_text_color = $this->get_param('[colors_active][colors][footer_text_color][value]', array(), "#ffffff");

    $primary_links_color = $this->get_param('[colors_active][colors][primary_links_color][value]', array(), "#545454");
    $primary_links_hover_color = $this->get_param('[colors_active][colors][primary_links_hover_color][value]', array(), "#415975");
    $menu_links_color = $this->get_param('[colors_active][colors][menu_links_color][value]', array(), "#373737");
    $menu_links_hover_color = $this->get_param('[colors_active][colors][menu_links_hover_color][value]', array(), "#000000");

    $menu_color = $this->get_param('[colors_active][colors][menu_color][value]', array(), "#FFFFFF"); //sic! hover
    $selected_menu_color = $this->get_param('[colors_active][colors][selected_menu_color][value]', array(), "#FFFFFF");
    $logo_text_color = $this->get_param('[colors_active][colors][logo_text_color][value]', array(), "#7994a7");
    $input_text_color = $this->get_param('[colors_active][colors][input_text_color][value]', array(), "#000000");

    $borders_color = $this->get_param('[colors_active][colors][borders_color][value]', array(), "#a8b8c5");
    $sideb_background_color = $this->get_param('[colors_active][colors][sideb_background_color][value]', array(), "#FFFFFF");
    $footer_sideb_background_color = $this->get_param('[colors_active][colors][footer_sideb_background_color][value]', array(), "#FFFFFF");
    $footer_back_color = $this->get_param('[colors_active][colors][footer_back_color][value]', array(), "#171717");

    $third_footer_sidebar = $this->get_param('[colors_active][colors][third_footer_sidebar][value]', array(), "#7994a7");
    $meta_info_color = $this->get_param('[colors_active][colors][meta_info_color][value]', array(), "#8F8F8F");
    $third_footer_sidebar_color = $this->get_param('[colors_active][colors][third_footer_sidebar_color][value]', array(), "#e5e5e5");
    $horizontal_tabs = $this->get_param('[colors_active][colors][horizontal_tabs][value]', array(), "#F9F9F9");
    $category_tabs = $this->get_param('[colors_active][colors][category_tabs][value]', array(), "#FFFFFF");
    ?>
    <style type="text/css">
      h1, h2, h3, h4, h5, h6, h1 > a, h2 > a, h3 > a, h4 > a, h5 > a, h6 > a, h1 > a:link, h2 > a:link, h3 > a:link, h4 > a:link, h5 > a:link, h6 > a:link, h1 > a:hover, h2 > a:hover, h3 > a:hover, h4 > a:hover, h5 > a:hover, h6 > a:hover, h1 > a:visited, h2 > a:visited, h3 > a:visited, h4 > a:visited, h5 > a:visited, h6 > a:visited {
        color: <?php echo $text_headers_color; ?>;
      }

      .post_inform a,
      .post_inform p,
      .post_inform a:hover {
        color: # <?php echo get_background_color(); ?> !important;
      }

      #image_list_top0,
      #image_list_top4 {
        background: <?php echo $featured_post_bg_color; ?>;
      }

      #image_list_top1 {
        background: <?php echo $horizontal_tabs; ?>;
      }

      #image_list_top3 {
        background: <?php echo $category_tabs; ?>;
      }

      #back h3 a {
        color: <?php echo '#'.$this->invert($this->ligther($menu_elem_back_color, 10)); ?> !important;
      }

      .footer-sidbar.third *:not(h1):not(h2):not(h3):not(h4):not(input) {
        color: <?php echo $third_footer_sidebar_color;?>;
      }

      .entry-meta *, .entry-meta-cat * {
        color: <?php echo $meta_info_color;?> !important;
      }

      a:link.site-title-a, a:hover.site-title-a, a:visited.site-title-a, a.site-title-a, #logo h1 {
        color: <?php echo $logo_text_color;?>;
      }

      ul#top-nav-list li.backLava, .lavalamp-object {
        border-bottom: 4px solid <?php echo $borders_color;?> !important;
      }

      .top-nav-list > ul > li ul, .top-nav-list > li ul {
        border-top: 4px solid <?php echo $borders_color;?>;;
      }

      #menu-button-block {
        border: 1px solid <?php echo $borders_color; ?>;
        border-bottom: 3px solid <?php echo $borders_color; ?> !important;
      }

      #sidebar1, #sidebar2 {
        background-color: <?php echo $sideb_background_color; ?>;
      }

      #commentform #submit, .reply, #reply-title small, .button-color, .page-navigation a, .next_link, .prev_link, .nav-back a, .nav-prev a {
        color: <?php echo $button_text_color;?> !important;
        background-color: <?php echo $button_bg_color; ?>;
        cursor: pointer;
      }

      .button-color:hover a {
        color: <?php echo '#'.$this->ligther($button_text_color,90);?> !important;
      }

      .button-color a {
        color: <?php echo $button_text_color;?> !important;
      }

      .button-color .contact_send {
        color: <?php echo $button_bg_color;?> !important;
        font-weight: bold !important;
        background-color: #fff;
        border: 2px solid;
        padding: 4px 20px;
      }

      .button_hover:after {
        background: <?php echo '#'.$this->darker($button_bg_color,80); ?>;
      }

      .footer-sidbar.third {
        background-color: <?php echo $third_footer_sidebar; ?>;
      }

      .footer-sidebar {
        background-color: <?php echo $footer_sideb_background_color; ?>;
      }

      .arrow-down {
        border-bottom: 20px solid <?php echo $third_footer_sidebar; ?>;
      }

      .reply a, #reply-title small a:link {
        color: <?php echo $button_text_color;?> !important;
      }

      #back, #footer-bottom {
        background: <?php echo $footer_back_color; ?>;
      }

      #header-block {
        background-color: <?php echo $menu_color; ?>;
      }

      #header {
        color: <?php echo $text_headers_color; ?>;
        background: <?php echo $menu_elem_back_color; ?>;
        z-index: 101;
      }

      body, .logged-in-as a:link, .logged-in-as a:visited, .date {
        color: <?php echo $primary_text_color; ?>;
      }

      input, textarea, .home_contact {
        color: <?php echo $input_text_color; ?>;
      }

      ::-webkit-input-placeholder {
        color: <?php echo $input_text_color; ?> !important;
      }

      :-ms-input-placeholder { /* IE 10+ */
        color: <?php echo $input_text_color; ?> !important;
      }

      ::-moz-placeholder {
        color: <?php echo $input_text_color; ?> !important;
      }

      #footer-bottom {
        color: <?php echo $footer_text_color; ?>;
      }

      a:link, a:visited {
        text-decoration: none;
        color: <?php echo $primary_links_color; ?>;
      }

      .responsive_menu, .top-nav-list .current-menu-item, .top-nav-list .open, .top-nav-list li.current-menu-item, .top-nav-list li.current_page_item {
        color: <?php echo $menu_links_hover_color; ?> !important;
        background-color: <?php echo  $this->hex_to_rgba($selected_menu_color,0.4); ?>;
      }

      a:hover,
      .active a {
        color: <?php echo $primary_links_hover_color; ?> !important;
      }

      #menu-button-block {
        background-color: <?php echo $menu_elem_back_color; ?>;
      }

      .blog.bage-news .news-post {
        border-bottom: 1px solid <?php echo $menu_elem_back_color; ?>;
      }

      .top-nav-list li.current-menu-item:before, .top-nav-list li:before {
        background-color: <?php echo $this->hex_to_rgba($menu_color,0.6); ?>;
      }

      .top-nav-list li:hover {
        background-color: <?php echo $this->hex_to_rgba($menu_color,0.6); ?>;
      }

      .top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover, .top-nav-list li a:hover {
        color: <?php echo $menu_links_hover_color; ?> !important;
      }

      .top-nav-list li.current-menu-item a, .top-nav-list li.current_page_item a {
        color: <?php echo $menu_links_hover_color; ?> !important;
      }

      .top-nav-list > ul > li ul, .top-nav-list > li ul {
        background-color: <?php echo $menu_elem_back_color; ?> !important;
      }

      .back_div {
        background: <?php echo $this->hex_to_rgba($caption_bg_color,0.7); ?>;
      }

      #gmap_canvas {
        border: 15px solid <?php echo $button_bg_color; ?>;
      }

      #wd-categories-tabs ul.content > li ul li div.thumbnail-block, .round {
        border: 3px solid <?php echo $logo_text_color; ?>;
      }

      #social_icons .fa {
        color: <?php echo $logo_text_color; ?>;
      }

      .round:hover {
        border: 15px solid <?php echo $logo_text_color; ?>;
      }

      #about_us #wd-horizontal-tabs .tabs li .div_image,
      .gallery_post_info,
      .radius {
        background: <?php echo $button_bg_color; ?>;
      }

      .button-color,
      .service_postt {
        background: <?php echo $button_bg_color; ?> !important;
        color: <?php echo $button_text_color; ?>;
        z-index: 1;
      }

      #contact_us input[type="text"], #contact_us textarea {
        background-color: <?php echo $third_footer_sidebar; ?> !important;
      }

      .top-nav-list > ul > li a, .top-nav-list > li a, .top-nav-list > ul > li ul > li a, #top-nav div ul li a, #top-nav > div > ul > li a:link, #top-nav > div > div > ul > li a {
        color: <?php echo $menu_links_color ?>;
      }

      .top-nav-list > li:hover > a, .top-nav-list > li ul > li > a:hover,
      {
        color: <?php echo $menu_links_hover_color ?>;
        background-color: <?php echo $this->hex_to_rgba($menu_color,0.4); ?> !important;
      }

      .top-nav-list > li.current-menu-item, .top-nav-list > li.current_page_item,
      .top-nav-list > li.current-menu-ancestor, .top-nav-list > li.current-menu-parent, .top-nav-list > li.current_page_parent, .top-nav-list > li.current_page_ancestor {
        color: <?php echo $menu_links_hover_color ?>;
        background-color: <?php echo $this->hex_to_rgba($selected_menu_color,0.4); ?> !important;

      }

      .Form_main_div .bar:before, .Form_main_div .bar:after {
        background: #5264AE; /* contac us page inputs active under line color*/
      }

      .da-thumbs div article {
        background-color: <?php echo $this->hex_to_rgba($caption_bg_color,0.3); ?>;

      }

      @media only screen and (min-width: 768px) and (max-width: 1024px) {
        .round {
          border: 5px solid <?php echo $logo_text_color; ?>;
        }
      }

      @media only screen and (max-width: 767px) {
        .top-nav-list li.current-menu-item > a,
        .top-nav-list li.current-menu-item > a:visited {
          color: <?php echo $menu_links_hover_color; ?> !important;
          background-color: <?php echo  $this->hex_to_rgba($selected_menu_color,0.4); ?>;
        }

        .top-nav-list > li:hover > a, .top-nav-list > li > a:hover, .top-nav-list > li > a:focus, .top-nav-list > li > a:active {
          color: <?php echo $menu_links_hover_color; ?> !important;
        }

        #top-nav > li > a, #top-nav > li > a:link, #top-nav > li > a:visited {
          color: <?php echo $menu_links_color; ?>;
        }

        .round {
          border: 5px solid <?php echo $logo_text_color; ?>;
        }

        .top-nav-list li ul li > a, .top-nav-list li ul li > a:link, .top-nav-list li ul li > a:visited {
          color: <?php echo $menu_links_color ?> !important;
        }

        .top-nav-list li.current-menu-item, .top-nav-list li.current_page_item {
          color: <?php echo $menu_links_hover_color ?>;
          background-color: <?php echo $this->hex_to_rgba($selected_menu_color,0.4); ?> !important;
        }

        .top-nav-list li ul li:hover > a, .top-nav-list li ul li > a:hover, .top-nav-list li ul li > a:focus, .top-nav-list li ul li > a:active {
          color: <?php echo $menu_links_hover_color; ?> !important;
          background-color: <?php echo $menu_color; ?> !important;
        }

        .top-nav-list li.has-sub > a, .top-nav-list li.has-sub > a:link, .top-nav-list li.has-sub > a:visited {
          background: <?php echo $menu_elem_back_color; ?> !important;
        }

        .top-nav-list li.has-sub:hover > a, .top-nav-list li.has-sub > a:hover, .top-nav-list li.has-sub > a:focus, .top-nav-list li.has-sub > a:active {
          background: <?php echo $menu_elem_back_color; ?> !important;
        }

        .top-nav-list li ul li.has-sub > a, .top-nav-list li ul li.has-sub > a:link, .top-nav-list li ul li.has-sub > a:visited {
          background: <?php echo $menu_elem_back_color; ?> !important;
        }

        .top-nav-list li ul li.has-sub:hover > a, .top-nav-list li ul li.has-sub > a:hover, .top-nav-list li ul li.has-sub > a:focus, .top-nav-list li ul li.has-sub > a:active {
          background: <?php echo '#'.$this->ligther($menu_elem_back_color,15); ?> !important;
        }

        .top-nav-list li.current-menu-ancestor > a:hover, .top-nav-list li.current-menu-item > a:focus, .top-nav-list li.current-menu-item > a:active {
          color: <?php echo $menu_links_color ?> !important;
          background-color: <?php echo $menu_elem_back_color; ?> !important;
        }

        .top-nav-list li.current-menu-parent > a, .top-nav-list li.current-menu-parent > a:link, .top-nav-list li.current-menu-parent > a:visited,
        .top-nav-list li.current-menu-parent > a:hover, .top-nav-list li.current-menu-parent > a:focus, .top-nav-list li.current-menu-parent > a:active,
        .top-nav-list li.has-sub.current-menu-item > a, .top-nav-list li.has-sub.current-menu-item > a:link, .top-nav-list li.has-sub.current-menu-item > a:visited,
        .top-nav-list li.has-sub.current-menu-ancestor > a:hover, .top-nav-list li.has-sub.current-menu-item > a:focus, .top-nav-list li.has-sub.current-menu-item > a:active,
        .top-nav-list li.current-menu-ancestor > a, .top-nav-list li.current-menu-ancestor > a:link, .top-nav-list li.current-menu-ancestor > a:visited,
        .top-nav-list li.current-menu-ancestor > a:hover, .top-nav-list li.current-menu-ancestor > a:focus, .top-nav-list li.current-menu-ancestor > a:active {
          color: <?php echo $menu_links_color ?> !important;
          background: <?php echo $menu_elem_back_color; ?> !important;
        }
      }
    </style>
    <?php
  }

  /**
   * Display logo image or text
   */

  public function logo()
  {
    $logo_type = $this->get_param('logo_type');
    $logo_img = esc_url(trim($this->get_param('logo_img')));
    $logo_text = esc_attr($this->get_param('logo_text'));


    if ($logo_type == 'image'):
      ?>
      <a id="logo" href="<?php echo esc_url(home_url('/')); ?>"
         title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <img id="site-title" src="<?php echo $logo_img; ?>" alt="logo">
      </a>
      <?php
    elseif ($logo_type == 'text'):
      ?>
      <a id="logo" href="<?php echo esc_url(home_url('/')); ?>"
         title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <h1><?php echo $logo_text; ?></h1>
      </a>
      <?php
    endif;
  }


  /*
  *
  * return true or false
  */

  public function blog_style()
  {

    global $post;
    if (isset($post)) {
      /*get all the meta of the current theme for the post*/
      $meta = get_post_meta($post->ID, WDWT_META, true);
    } else {
      $meta = array();
    }
    $blog_style = $this->get_param('blog_style', $meta);

    return $blog_style;
  }


} /*end of class*/




