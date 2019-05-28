<?php

/* include  fornt end framework class */
require_once('WDWT_front_functions.php');

class sauron_frontend_functions extends WDWT_frontend_functions
{


  public static function home_featured_post()
  {


    global $wdwt_front;

    $featured_post_id = $wdwt_front->get_param('home_middle_description_post');
    $featured_post_id = isset($featured_post_id[0]) ? $featured_post_id[0] : '';
    $featured_post_id = apply_filters('wpml_object_id', $featured_post_id, 'post');

    $home_middle_description_post_enable = $wdwt_front->get_param('home_middle_description_post_enable');
    $blog_style = $wdwt_front->blog_style();

    $featured_post = get_post($featured_post_id);


    if ($featured_post == NULL) {
      $featured_post = get_posts();
      $featured_post = $featured_post[0];
    }

    if ($home_middle_description_post_enable && $featured_post) { ?>
      <div class="clear"></div>
      <div id="right_middle" class="container">
        <div id="middle">
          <a href="<?php echo get_permalink($featured_post->ID); ?>">
            <h2 style="font-weight: 700;">
              <?php echo $featured_post->post_title; ?>
            </h2>
          </a>
          <div class="sauron_divider">
            <span class="div_left"></span>
    <span class="div_middle">
      <i class="fa fa-stop"></i>
    </span>
            <span class="div_right"></span>
          </div>
          <?php
          if ($blog_style)
            echo self::the_excerpt_max_charlength(1000, $featured_post->post_content);
          else
            echo do_shortcode($featured_post->post_content);
          ?>
          <div class="clear"></div>
        </div>
        <?php ?>
      </div>
    <?php }

  }


  public static function portfolio_posts($paged = 1)
  {
    global $wdwt_front;
    $fixed_menu = $wdwt_front->get_param('fix_menu');
    $lbox_width = $wdwt_front->get_param('lbox_image_width');
    $lbox_height = $wdwt_front->get_param('lbox_image_height');
    $content_post_size_ratio = $wdwt_front->get_param('content_post_size_ratio', array(), 0.75);
    $content_post_size_ratio = (floatval($content_post_size_ratio) >= 0.5 && floatval($content_post_size_ratio) <= 2) ? $content_post_size_ratio : 0.75;
    $content_post_margin = $wdwt_front->get_param('content_post_margin', array(), 0.75);

    $choose_posts_pages = $wdwt_front->get_param('content_posts_pages_choose', array(), 'posts');
    $content_post_order = $wdwt_front->get_param('content_post_order', array(), array('DESC'));
    $content_post_orderby = $wdwt_front->get_param('content_post_orderby', array(), array('date'));
    $content_post_order = $content_post_order[0];
    $content_post_orderby = $content_post_orderby[0];
    $lbox_disable = $wdwt_front->get_param('lbox_disable');
    $content_post_turn_on_animation = $wdwt_front->get_param('content_post_turn_on_animation', array(), true);
    ?>
    <style>
      .image_list_bottom.portfolio_list {
        margin: <?php echo $content_post_margin; ?>px;
      }

      .image_list_bottom.portfolio_list .image_list_item {
        padding-bottom: <?php echo $content_post_size_ratio*100; ?>%;
      }

      .image_list_bottom {
        width: calc(33.33% - <?php echo 2* $content_post_margin; ?>px);
      }

      @media only screen and (min-width: 768px) and (max-width: 1024px) {
        .image_list_bottom {
          width: calc(33.33% - <?php echo 2* $content_post_margin; ?>px);
        }
      }

      @media only screen and (max-width: 767px) {
        .image_list_bottom {
          width: calc(100% - <?php echo 2* $content_post_margin; ?>px);
        }
      }

    </style>
    <script>
      jQuery(document).ready(function ()
      {

        jQuery(".da-thumbs li img").addClass('animate');

        jQuery(".image_list_bottom.portfolio_list .image_list_item").each(function ()
        {
          jQuery(this).hover(
            function ()
            {
              if (!jQuery("body").hasClass("phone") && !jQuery("body").hasClass("tablet")) {
                jQuery(this).find(".da-slideFromBottom").removeClass("da-slideFromBottom").addClass("da-slideTop");
              }


            },
            function ()
            {
              if (!jQuery("body").hasClass("phone") && !jQuery("body").hasClass("tablet")) {
                jQuery(this).find(".da-slideTop").removeClass("da-slideTop").addClass("da-slideFromBottom");
              }
            }
          );
        });



        <?php if($fixed_menu == "on"){ ?>
        jQuery('.image_grid').css('margin-top', jQuery('.top-nav-list').height() + 50);
        <?php } ?>



      });


    </script>
    <?php

    $content_posts_enable = $wdwt_front->get_param('content_posts_enable');

    //$sticky_posts_count = count(get_option( 'sticky_posts' ));
    $content_post_count = $wdwt_front->get_param('content_post_count');
    $cat_checked = 0;
    $post_count = 0;


    if ($content_posts_enable): ?>


      <div id="list" style="overflow: hidden">
        <div id="image_list_top" class="image_list_top portfolio_list da-thumbs">
          <?php
          /*show specific posts/pages*/
          if ($choose_posts_pages == 'pages') {
            $content_pages_list = $wdwt_front->get_param('content_pages_list', array(), array(''));
            $content_pages_list2 = array();
            /*WPML*/
            foreach ($content_pages_list as $page_id) {
              $page_id_trans = apply_filters('wpml_object_id', $page_id, 'page');
              if (!is_null($page_id_trans)) {
                array_push($content_pages_list2, $page_id_trans);
              }

            }

//apply_filters( 'wpml_object_id', $featured_post_id, 'post' );
            $args = array(
              'posts_per_page' => $content_post_count,
              'post_type' => 'page',
              'post__in' => $content_pages_list2,
              'paged' => $paged,
              'order' => $content_post_order,
              'orderby' => $content_post_orderby,
            );
          } else {

            if ($wdwt_front->get_param('content_post_categories') == "") {//backward compat
              $content_post_categories = array();
            } else
              $content_post_categories = $wdwt_front->get_param('content_post_categories', array(), array());

            $content_post_categories = (isset($content_post_categories[0]) && empty($content_post_categories[0])) ? array() : $content_post_categories;

            $args = array(
              'posts_per_page' => $content_post_count,
              'paged' => $paged,
              'order' => $content_post_order,
              'orderby' => $content_post_orderby,
              'tax_query' => array(
                'relation' => 'OR',
                array(
                  'taxonomy' => 'product_cat',
                  'field' => 'term_id',
                  'terms' => $content_post_categories,
                  'operator' => empty($content_post_categories) ? 'EXISTS' : 'IN',
                ),
                array(
                  'taxonomy' => 'category',
                  'field' => 'term_id',
                  'terms' => $content_post_categories,
                  'operator' => empty($content_post_categories) ? 'EXISTS' : 'IN',
                ),
              ),
            );
          }
          $wp_query = new WP_Query($args);


          $i = 1;
          if ($content_posts_enable):

          if ($wp_query->have_posts()):
          while ($wp_query->have_posts() && $i <= $content_post_count):
          $wp_query->the_post();
          $post_count++;
          $tumb_id = get_post_thumbnail_id(get_the_ID());
          $thumb_url = wp_get_attachment_image_src($tumb_id, 'full');
          if ($thumb_url) {
            $thumb_url = $thumb_url[0];
          } else {
            $thumb_url = self::catch_that_image();
            $thumb_url = $thumb_url['src'];
          }

          $background_image = $thumb_url;
          list($image_thumb_width, $image_thumb_height) = getimagesize($background_image);

          ?>

        </div>
        <div class="image_list_bottom portfolio_list da-thumbs">
          <?php
          if (($image_thumb_width > 220) && ($image_thumb_height > 150)){ ?>
          <div class="image_list_item <?php echo $content_post_turn_on_animation ? " animate zoom-in" : ""; ?>"
               style="background: url(<?php echo $background_image; ?>) no-repeat center !important; background-size:cover !important; ">
            <?php }
            else { ?>
            <div class="image_list_item <?php echo $content_post_turn_on_animation ? " animate zoom-in" : ""; ?>"
                 style="background: url(<?php echo $background_image; ?>) no-repeat center !important;">
              <?php } ?>
              <article class="da-animate da-slideFromBottom" style="display: block;">
                <h4 rel="content-post-<?php echo $i; ?>-title"><?php
                  self::the_title_max_charlength(40);
                  /*the_title();*/
                  ?></h4>
                <?php
                if (!$lbox_disable && $thumb_url != "" && strpos($thumb_url, 'default.png') == false) { ?>
                  <span class="zoom">
                <a href="<?php echo $thumb_url; ?>" class=" "
                   onclick="wdwt_lbox.init(this, 'wdwt-lightbox', <?php echo intval($lbox_width); ?> , <?php echo intval($lbox_height); ?>); return false;"
                   rel="wdwt-lightbox" id="content-post-<?php echo $i; ?>"><i class="fa fa-search-plus" ></i></a>
              </span>
                  <?php
                }
                ?>
                <span class="link_post">
                <a href="<?php echo get_permalink() ?>"><i class="fa fa-link"></i>
                </a>
            </span>
              </article>
            </div>
            <?php
            $i++;
            endwhile;
            endif; /*the loop*/
            endif; ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <?php if ($content_posts_enable) { ?>
          <div class="section_pagination">
            <?php if ($paged > 1) { ?>
              <span class="portfolio_posts_section_pagination prev_section button-color"
                    id="portfolio_posts_section_left"
                    onclick="wdwt_front_ajax_pagination(<?php echo $paged - 1; ?>, 'portfolio_posts_section', '#portfolio_posts');"><i
                  class="fa fa-chevron-left"></i> <?php echo __("Previous", WDWT_LANG); ?></span>
              <?php
            }
            if ($paged < $wp_query->max_num_pages) { ?>
              <span class="portfolio_posts_section_pagination next_section button-color"
                    id="portfolio_posts_section_right"
                    onclick="wdwt_front_ajax_pagination(<?php echo $paged + 1; ?>, 'portfolio_posts_section', '#portfolio_posts');"><?php echo __("Next", WDWT_LANG); ?>
                <i class="fa fa-chevron-right"></i></span>
            <?php } ?>
          </div>
          <div class="clear"></div>
        <?php } ?>
      </div>
      <?php
    endif;

    wp_reset_query();

  }


  public static function blog_posts_section($paged = null)
  {

    if (!isset($paged)) {
      global $paged;
    }
    if ($paged === 0) {
      $paged = 1;
    }

    global $wdwt_front, $wp_query, $post;

    $blog_posts_enable = $wdwt_front->get_param('blog_posts_enable');
    $blog_posts_title = $wdwt_front->get_param('blog_posts_title');
    $blog_posts_description = $wdwt_front->get_param('blog_posts_description');


    $blog_posts_categories = $wdwt_front->get_param('blog_posts_categories', array(), array());
    $blog_posts_categories = (isset($blog_posts_categories[0]) && empty($blog_posts_categories [0])) ? array() : $blog_posts_categories;

    $blog_style = $wdwt_front->blog_style();
    $date_enable = $wdwt_front->get_param('date_enable', array(), true);
    $grab_image = $wdwt_front->get_param('grab_image', array(), false);
    $count = get_option('posts_per_page', 4);


    $args = array('posts_per_page' => $count,
      'paged' => $paged,
      'order' => 'DESC',
      'orderby' => 'date',
      'tax_query' => array(
        'relation' => 'OR',
        array(
          'taxonomy' => 'product_cat',
          'field' => 'term_id',
          'terms' => $blog_posts_categories,
          'operator' => empty($blog_posts_categories) ? 'EXISTS' : 'IN',
        ),
        array(
          'taxonomy' => 'category',
          'field' => 'term_id',
          'terms' => $blog_posts_categories,
          'operator' => empty($blog_posts_categories) ? 'EXISTS' : 'IN',
        ),
      ),


    );

    $wp_query = new WP_Query($args);


    if ($blog_posts_enable) { ?>

      <div id="horizontal_tabs" class="container">
        <h2 style="text-align: center; font-weight: 700;"><?php echo $blog_posts_title; ?></h2>
        <p class="top-desc"><?php echo $blog_posts_description; ?> </p>
        <div id="wd-horizontal-tabs" class="container">
          <div id="tabs_div">
            <ul class="tabs">
              <?php
              $i = 1;
              while ($wp_query->have_posts() && $i <= $count) : $wp_query->the_post(); ?>
                <li id="horizontal-tab-<?php echo $post->ID; ?>">
                  <?php


                  $tumb_id = get_post_thumbnail_id(get_the_ID());
                  $thumb_url = wp_get_attachment_image_src($tumb_id, 'full');
                  if ($thumb_url) {
                    $thumb_url = $thumb_url[0];
                  } else {
                    $thumb_url = self::catch_that_image();
                    $thumb_url = $thumb_url['src'];
                  }
                  $background_image = $thumb_url;

                  ?>

                  <div class="radius animate"
                       style="background: url(<?php echo $background_image; ?>) no-repeat center; background-size:cover; "></div>

                  <div class="post_info">
                    <h4><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h4>
                    <?php if ($date_enable) { ?>
                      <span class="date"><i><?php echo get_the_date(); ?></i></span>
                    <?php } ?>
                  </div>
                </li>
                <?php
                $i++;
              endwhile; ?>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
        <div class="section_pagination">
          <?php if ($paged > 1) { ?>
            <span class="gallery_posts_section_pagination prev_section" id="gallery_posts_section_left"
                  onclick="wdwt_front_ajax_pagination(<?php echo $paged - 1; ?>, 'blog_posts_section', '#image_list_top1');"><i
                class="fa fa-chevron-circle-left"></i></span>
            <?php
          }
          if ($paged < $wp_query->max_num_pages) { ?>
            <span class="gallery_posts_section_pagination next_section" id="gallery_posts_section_right"
                  onclick="wdwt_front_ajax_pagination(<?php echo $paged + 1; ?>, 'blog_posts_section', '#image_list_top1');"><i
                class="fa fa-chevron-circle-right"></i></span>
          <?php } ?>
        </div>
      </div>
      <?php

    }
    wp_reset_query();

  }

  public static function live_posts_search()
  {
    global $wdwt_front,
           $wp_query,
           $post;

    $s = $_POST["s"];
    $count = 4;
    $date_enable = $wdwt_front->get_param('date_enable');
    $grab_image = $wdwt_front->get_param('grab_image');
    $wp_query = new WP_Query('posts_per_page=' . $count . '&s=' . $s . '&order=DESC');
    
    if (!empty($wp_query->posts)) {
      while ($wp_query->have_posts()) : $wp_query->the_post();

        $date = new DateTime($post->post_date);
        $date_result = get_the_date();

        $tumb_id = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_image_src($tumb_id, 'full');

        if ($thumb_url) {
          $thumb_url = $thumb_url[0];
        } else {
          $thumb_url = self::catch_that_image();
          $thumb_url = $thumb_url['src'];
        }
        $background_image = $thumb_url;


        ?>
        <li>
          <?php if (has_post_thumbnail() || $grab_image) { ?>
            <div class="img_div">
              <img src="<?php echo $background_image; ?>"/>
            </div>
          <?php } ?>
          <div class="desc_div">
            <a href='<?php echo get_permalink(); ?>' target='_blank'><span><?php the_title(); ?></span></a>
            <?php if ($date_enable) { ?>
              <p class="post-meta">
                      <span class="post-meta-author"><i
                          class="fa fa-user"></i> <?php echo get_the_author(); ?></span></br>
                <span class="tie-date"><i class="fa fa-clock-o"></i><?php echo $date_result; ?></span>
              </p>
            <?php } ?>
          </div>
        </li>
      <?php endwhile; ?>
      <li class="live-search_more"><a href='<?php echo get_option("home", get_site_url()) . '?s=' . $s; ?>'>View All
          Results</a></li>
    <?php } else { ?>
      <li class="live-search_more"><a href='<?php echo get_option("home", get_site_url()) . '?s=' . $s; ?>'>Nothing
          was found.</a></li>
    <?php }
  }

  public static function gallery_posts_section($paged = 1)
  {
    global $wdwt_front;

    $gallery_posts_enable = $wdwt_front->get_param('gallery_posts_enable');
    $gallery_posts_title = $wdwt_front->get_param('gallery_posts_title');
    $gallery_posts_description = $wdwt_front->get_param('gallery_posts_description');


    $gallery_posts_categories = $wdwt_front->get_param('gallery_posts_categories', array(), array());
    $gallery_posts_categories = (isset($gallery_posts_categories[0]) && empty($gallery_posts_categories[0])) ? array() : $gallery_posts_categories;

    $count = $wdwt_front->get_param('gallery_posts_count', array(), 3);

    $args = array(
      'posts_per_page' => $count,
      'paged' => $paged,
      'order' => 'DESC',
      'orderby' => 'date',
      'tax_query' => array(
        'relation' => 'OR',
        array(
          'taxonomy' => 'product_cat',
          'field' => 'term_id',
          'terms' => $gallery_posts_categories,
          'operator' => empty($gallery_posts_categories) ? 'EXISTS' : 'IN',
        ),
        array(
          'taxonomy' => 'category',
          'field' => 'term_id',
          'terms' => $gallery_posts_categories,
          'operator' => empty($gallery_posts_categories) ? 'EXISTS' : 'IN',
        ),
      ),

    );

    $wp_query = new WP_Query($args);


    if ($gallery_posts_enable) { ?>

      <div id="gallery_tabs">
        <div id="wd-gallery-tabs" class="gallery_posts_section">
          <h2 style="text-align: center; font-weight: 700;"><?php echo $gallery_posts_title; ?></h2>
          <p class="top-desc"><?php echo $gallery_posts_description; ?></p>
          <div class="cont_gallery_tab" id="gallery_tab">
            <ul class="content">
              <?php
              if ($wp_query->have_posts()):
                $i = 1;
                while ($wp_query->have_posts() && $i <= $count) : $wp_query->the_post();
                  $post_id = get_the_ID();
                  $tumb_id = get_post_thumbnail_id($post_id);
                  $thumb_url = wp_get_attachment_image_src($tumb_id, 'full');

                  if ($thumb_url) {
                    $thumb_url = $thumb_url[0];
                  } else {
                    $thumb_url = self::catch_that_image();
                    $thumb_url = $thumb_url['src'];
                  }
                  $background_image = $thumb_url;
                  list($image_thumb_width, $image_thumb_height) = getimagesize($background_image);

                  if (($image_thumb_width > 220) && ($image_thumb_height > 150)) { ?>
                    <li class="gallery-tabs-content animate" id="gallery-tabs-content-<?php echo $post_id; ?>" style="background: url(<?php echo $background_image; ?>) no-repeat center !important; background-size:cover !important; ">
                  <?php } else { ?>
                    <li class="gallery-tabs-content animate" id="gallery-tabs-content-<?php echo $post_id; ?>" style="background: url(<?php echo $background_image; ?>) no-repeat center !important;">
                  <?php } ?>

                  <ul class="gallery_post_info">
                    <li class="post_inform">
                      <h4>
                        <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
                      </h4>
                      <p><?php echo self::the_excerpt_max_charlength(70, get_the_excerpt()); ?></p>
                    </li>
                    <li class="post_go">
                      <div onclick="location.href='<?php echo get_permalink() ?>'"><a
                          href="<?php echo get_permalink() ?>" class="round_go">GO!</a></div>
                    </li>
                  </ul>

                  </li>
                  <?php $i++; endwhile; endif; ?>
              <div class="clear"></div>
            </ul>
            <div class="section_pagination">
              <?php if ($paged > 1) { ?>
                <span class="gallery_posts_section_pagination prev_section" id="gallery_posts_section_left"
                      onclick="wdwt_front_ajax_pagination(<?php echo $paged - 1; ?>, 'gallery_posts_section', '#image_list_top2');"><i
                    class="fa fa-chevron-circle-left"></i></span>
                <?php
              }
              if ($paged < $wp_query->max_num_pages) { ?>
                <span class="gallery_posts_section_pagination next_section" id="gallery_posts_section_right"
                      onclick="wdwt_front_ajax_pagination(<?php echo $paged + 1; ?>, 'gallery_posts_section', '#image_list_top2');"><i
                    class="fa fa-chevron-circle-right"></i></span>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php

    }
    wp_reset_query();

  }

  public static function review_posts_section()
  {
    global $wdwt_front;

    $review_posts_enable = $wdwt_front->get_param('review_posts_enable');

    $review_posts_carousel = ($wdwt_front->get_param('review_posts_carousel', array(), false)) ? "1" : "0";
    $review_posts_time_interval = $wdwt_front->get_param('review_posts_time_interval', array(), "5");
    $review_posts_stop_hover = ($wdwt_front->get_param('review_posts_stop_hover', array(), true)) ? "1" : "0";
    $review_posts_title = $wdwt_front->get_param('review_posts_title');
    $review_posts_description = $wdwt_front->get_param('review_posts_description');

    $review_posts_categories = $wdwt_front->get_param('review_posts_categories', array(), array());
    $review_posts_categories = (isset($review_posts_categories[0]) && empty($review_posts_categories[0])) ? array() : $review_posts_categories;
    $date_enable = $wdwt_front->get_param('date_enable');


    $args = array(
      'paged' => '1',
      'order' => 'DESC',
      'orderby' => 'date',
      'tax_query' => array(
        'relation' => 'OR',
        array(
          'taxonomy' => 'product_cat',
          'field' => 'term_id',
          'terms' => $review_posts_categories,
          'operator' => empty($review_posts_categories) ? 'EXISTS' : 'IN',
        ),
        array(
          'taxonomy' => 'category',
          'field' => 'term_id',
          'terms' => $review_posts_categories,
          'operator' => empty($review_posts_categories) ? 'EXISTS' : 'IN',
        ),
      ),
    );

    $wp_query = new WP_Query($args);


    if ($review_posts_enable) {
      if ($wp_query->have_posts()):?>
        <div id="wd-categories-tabs" class="content-inner-block container"
             data-carousel="<?php echo $review_posts_carousel; ?>"
             data-interval="<?php echo esc_attr($review_posts_time_interval); ?>"
             data-stop_animation="<?php echo $review_posts_stop_hover; ?>">
          <h2 style="text-align: center; font-weight: 700;"><?php echo $review_posts_title; ?></h2>
          <p class="top-desc"><?php echo $review_posts_description; ?></p>
          <div class="cont_vat_tab">
            <ul class="content">
              <?php
              $counter = 0;
              while ($wp_query->have_posts()) :
                $wp_query->the_post();
                ?>

                <li
                  id="categories-tabs-content-<?php echo $counter; ?>" <?php if ($counter == 0) echo 'class="active"'; ?>>
                  <ul>
                    <?php

                    $tumb_id = get_post_thumbnail_id(get_the_ID());
                    $thumb_url = wp_get_attachment_image_src($tumb_id, 'full');
                    if ($thumb_url) {
                      $thumb_url = $thumb_url[0];
                    } else {
                      $thumb_url = self::catch_that_image();
                      $thumb_url = $thumb_url['src'];
                    }
                    $background_image = $thumb_url;

                    ?>
                    <li>
                      <div class="thumbnail-block" style="background-image:url(<?php echo $background_image; ?>); ">
                        <a class="image-block" href="<?php echo get_permalink(); ?>">
                        </a>
                      </div>
                      <div class="text">
                        <p><?php echo self::the_excerpt_max_charlength(250, get_the_content()); ?></p>
                        <h4 class="post_title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <?php if ($date_enable) { ?>
                          <span class="date"><?php echo get_the_time(get_option('date_format')); ?></span>
                        <?php } ?>
                      </div>
                    </li>

                  </ul>
                </li>
                <?php
                $counter++;
              endwhile;

              ?>
              <div class="clear"></div>
            </ul>
          </div>
          <ul class="tabs">
            <?php
            $counter = 0;
            $wp_query->rewind_posts();

            while ($wp_query->have_posts()) :
              $wp_query->the_post();
              ?>
              <li <?php if ($counter == 0) echo 'class="active"'; ?>><a href="#<?php echo $counter; ?>">
                  &#9679;</span></a></li>
              <?php

              $counter++;
            endwhile;

            ?>
          </ul>
        </div>
        <?php
      endif;
    }
    wp_reset_postdata();
  }

  public static function remove_more_jump_link($link)
  {
    $offset = strpos($link, '#more-');
    if ($offset) {
      $end = strpos($link, '"', $offset);
    }
    if ($end) {
      $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
  }

  public static function diagram_page_section()
  {
    global $wdwt_front;

    $home_middle_diagrams_id = $wdwt_front->get_param('home_middle_diagrams', array(), array(''));
    $home_middle_diagrams_id = apply_filters('wpml_object_id', $home_middle_diagrams_id[0], 'page');


    $home_middle_diagrams_enable = $wdwt_front->get_param('home_middle_diagrams_enable');
    $blog_style = $wdwt_front->blog_style();
    if ($home_middle_diagrams_id) {
      $featured_diagrams = get_post($home_middle_diagrams_id);
    }


    $sauron_meta_data = get_post_meta($home_middle_diagrams_id, WDWT_META, true);
    $show_diagram_page = true;
    if (!isset($featured_diagrams) || $featured_diagrams == NULL) {
      $show_diagram_page = false;
    }

    if ($sauron_meta_data != "" && !empty($sauron_meta_data) && $show_diagram_page) {
      $diagram_control = (isset($sauron_meta_data["diagram_control"]) ? $sauron_meta_data["diagram_control"] : 'horizontal');
      $percent_width = (isset($sauron_meta_data["percent_width"]) ? $sauron_meta_data["percent_width"] : '400');
      $percent_height = (isset($sauron_meta_data["percent_height"]) ? $sauron_meta_data["percent_height"] : '37');
      $hide_percent = (isset($sauron_meta_data["hide_percent"]) ? $sauron_meta_data["hide_percent"] : 'true');
      $diagram_test_title = (isset($sauron_meta_data["diagram_test_title"]) ? $sauron_meta_data["diagram_test_title"] : '');
      $diagram_test_percent = (isset($sauron_meta_data["diagram_test_percent"]) ? $sauron_meta_data["diagram_test_percent"] : '');

      $percent_header_color = (isset($sauron_meta_data["percent_header_color"]) ? $sauron_meta_data["percent_header_color"] : '#000000');
      $percent_background_color = (isset($sauron_meta_data["percent_background_color"]) ? $sauron_meta_data["percent_background_color"] : '#ffffff');
      $percent_completed_color = (isset($sauron_meta_data["percent_completed_color"]) ? $sauron_meta_data["percent_completed_color"] : '#878787');
      $percent_to_do_color = (isset($sauron_meta_data["percent_to_do_color"]) ? $sauron_meta_data["percent_to_do_color"] : '#c8c8c8');
      $percent_text_color = (isset($sauron_meta_data["percent_text_color"]) ? $sauron_meta_data["percent_text_color"] : '#000000');
      $percent_time = (isset($sauron_meta_data["percent_time"]) ? $sauron_meta_data["percent_time"] : '1000');

      $percent_title = explode('||wd||', $diagram_test_title);
      $percent = explode('||wd||', $diagram_test_percent);
      if ($home_middle_diagrams_enable) { ?>
        <div id="right_middle_diagram">
          <div class="container">
            <ul id="diagrams">
              <li style="width: 40%; margin: 0px 25px;">
                <h2><a
                    href="<?php echo get_permalink($featured_diagrams->ID); ?>"><?php echo $featured_diagrams->post_title; ?></a>
                </h2>
                <div id="single_text">
                  <p>
                    <?php

                    echo $featured_diagrams->post_content;
                    ?>
                  </p>
                </div>
              </li>
              <li>
                <?php for ($i = 0; $i <= count($percent_title) - 1; $i++) { ?>
                  <p style="margin: 0; text-align: left;"><?php echo $percent_title[$i]; ?></p>
                  <div id="percent<?php echo $i; ?>">
                    <?php if ($percent[$i] < 80) { ?>
                      <div id="fill<?php echo $i; ?>"
                           style="width: 0px; height: 100%; background:<?php echo $percent_completed_color; ?>; position: relative; overflow: visible !important; float: left;">
                        <div class="arrow-left" style="right: -3px;"></div>
                      </div>
                      <div id="match<?php echo $i; ?>" style="float: left">
                        <b id="target<?php echo $i; ?>" class="percent_number">0%</b>
                      </div>
                    <?php } else {
                      ?>
                      <div id="fill<?php echo $i; ?>"
                           style="width: 0px; height: 100%; background:<?php echo $percent_completed_color; ?>; position: relative; overflow: visible !important;">
                        <div class="arrow-left"></div>
                        <div id="match<?php echo $i; ?>">
                          <b id="target<?php echo $i; ?>" class="percent_number">0%</b>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <style>
                    @media only screen and (max-width: 640px) {
                      .percent {
                        margin: 0 auto;
                        width: 100% !important;
                      }
                    }

                    #percent<?php echo $i; ?> {
                      width: <?php echo $percent_width/4; ?>%;
                      height: <?php echo $percent_height; ?>px;
                      background: <?php echo $percent_to_do_color; ?>;
                      -webkit-box-shadow: inset 0 17px 10px -22px rgba(0, 0, 0, 0.8);
                      -moz-box-shadow: inset 0 20px 20px -20px rgba(0, 0, 0, 0.8);
                      box-shadow: inset 0 17px 10px -22px rgba(0, 0, 0, 0.8);
                      margin: 5px 0px 21px 0px;
                    }

                    #target<?php echo $i; ?> {
                      font-size: 20px;
                      color: <?php echo $percent_text_color; ?> !important;
                      float: right;
                      margin: 0;
                      position: absolute;
                      top: 50%;
                      left: 90%;
                      transform: translate(-64%, -50%);
                      width: 80px;
                      text-align: left;
                    }

                    #match<?php echo $i; ?> {
                      background: #EFEFEF;
                      float: right;
                      width: 80px;
                      height: 113%;
                      position: relative;
                      top: -3px;
                      border-radius: 3px;
                      box-shadow: 0px 0px 10px -3px rgba(0, 0, 0, 0.8);
                    }

                    #web_buis_percent-<?php echo $i; ?> h3 {
                      margin: 0 !important;
                    }

                    .arrow-left {
                      width: 0px;
                      height: 0px;
                      border-top: 10px solid transparent;
                      border-bottom: 10px solid transparent;
                      border-right: 10px solid #EFEFEF;
                      position: absolute;
                      right: 77px;
                      top: 8px;
                      z-index: 1;
                    }
                  </style>
                  <script>
                    var sauron_front_percent_yesim<?php echo $i; ?> = false;
                    jQuery(window).scroll(function ()
                    {
                      var sauron_front_percent_height = jQuery(window).scrollTop();
                      var sauron_front_percent_height_canvas = jQuery('#percent<?php echo $i; ?>').offset().top - 650;
                      if (sauron_front_percent_height > sauron_front_percent_height_canvas) {
                        if (!sauron_front_percent_yesim<?php echo $i; ?>) {
                          sauron_front_percent_yesim<?php echo $i; ?>= true;
                          jQuery("#fill<?php echo $i; ?>").animate({
                            width: <?php echo $percent[$i]; ?>+'%',
                          }, <?php echo $percent_time; ?>);

                          var sauron_front_percent_decimal_places = 1;
                          var sauron_front_percent_decimal_factor = sauron_front_percent_decimal_places === 0 ? 1 : sauron_front_percent_decimal_places * 10;
                          jQuery('#target<?php echo $i; ?>').animateNumber(
                            {
                              number: <?php echo $percent[$i]; ?> * sauron_front_percent_decimal_factor,
                            color
                        :
                          '<?php echo $percent_text_color[$i]; ?>',
                            numberStep
                        :
                          function (now, tween)
                          {
                            var floored_number = Math.floor(now) / sauron_front_percent_decimal_factor,
                              target = jQuery(tween.elem);
                            if (sauron_front_percent_decimal_places > 0) {
                              floored_number = floored_number;
                            }
                            target.text(floored_number + '%');
                          }
                        },
                          <?php echo $percent_time; ?>
                        )
                        }
                      }
                    });
                  </script>
                <?php } ?>
              </li>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
      <?php }
    }
  }

  public static function pinned_posts_section()
  {
    global $wdwt_front;
    $pinned_posts = $wdwt_front->get_param('pinned_posts');
    $pinned_posts_id = apply_filters('wpml_object_id', $pinned_posts[0], 'post');

    $pinned_posts_enable = $wdwt_front->get_param('pinned_post_enable');
    $pinned_bg_img = $wdwt_front->get_param('pinned_bg_img');
    $blog_style = $wdwt_front->blog_style();

    $featured_post = get_post($pinned_posts_id);
    if ($featured_post == NULL) {
      $featured_post = get_posts();
      $featured_post = $featured_post[0];
    }


    if ($pinned_posts_enable && $featured_post) { ?>
      <div class="clear"></div>
      <div id="pinned_post" style="background-image: url(<?php echo $pinned_bg_img; ?>);">
        <?php /*echo get_the_post_thumbnail( $featured_post->ID,array(260,220)); */
        ?>
        <div id="right_middle_pinned">
          <a href="<?php echo get_permalink($featured_post->ID); ?>">
            <h2 style="text-align: center; font-weight: 700;">
              <?php echo $featured_post->post_title; ?>
            </h2>
          </a>
          <?php
          if ($blog_style)
            echo self::the_excerpt_max_charlength(500, $featured_post->post_content);
          else
            echo do_shortcode($featured_post->post_content);
          ?>
          <div class="clear"></div>
        </div>
        <?php ?>
      </div>
    <?php }

  }

  public static function social_icons_section()
  {
    global $wdwt_front;
    $twitter_icon_show = $wdwt_front->get_param('twitter_icon_show');
    $twitter_url = $wdwt_front->get_param('twitter_url');
    $linkedin_icon_show = $wdwt_front->get_param('linkedin_icon_show');
    $linkedin_url = $wdwt_front->get_param('linkedin_url');
    $facebook_icon_show = $wdwt_front->get_param('facebook_icon_show');
    $facebook_url = $wdwt_front->get_param('facebook_url');
    $google_icon_show = $wdwt_front->get_param('google_icon_show');
    $google_url = $wdwt_front->get_param('google_url');
    $instagram_icon_show = $wdwt_front->get_param('instagram_icon_show');
    $instagram_url = $wdwt_front->get_param('instagram_url');

    $pinterest_icon_show = $wdwt_front->get_param('pinterest_icon_show');
    $pinterest_url = $wdwt_front->get_param('pinterest_url');
    $youtube_icon_show = $wdwt_front->get_param('youtube_icon_show');
    $youtube_url = $wdwt_front->get_param('youtube_url');
    $tumblr_icon_show = $wdwt_front->get_param('tumblr_icon_show');
    $tumblr_url = $wdwt_front->get_param('tumblr_url');
    $rss_icon_show = $wdwt_front->get_param('rss_icon_show');
    $rss_url = $wdwt_front->get_param('rss_url');


    $follow_title = $wdwt_front->get_param('follow_title');
    $follow_description = $wdwt_front->get_param('follow_description');
    if (($facebook_icon_show == 'on' && $facebook_url != "") || ($google_icon_show == 'on' && $google_url != "") || ($linkedin_icon_show == 'on' && $linkedin_url != "") || ($twitter_icon_show == 'on' && $twitter_url != "") || ($instagram_icon_show == 'on' && $instagram_url != "") || ($pinterest_icon_show == 'on' && $pinterest_url != "") || ($youtube_icon_show == 'on' && $youtube_url != "") || ($tumblr_icon_show == 'on' && $tumblr_url != "") || ($rss_icon_show == 'on' && $rss_url != "")) {
      ?>
      <div id="social_icons" class="container">
        <h2
          style="text-align: center; font-weight: 700;padding: 57px 0 0 0; margin: 0;"><?php echo $follow_title; ?></h2>
        <i style="text-align: center; display: block; padding-bottom: 40px;"><?php echo $follow_description; ?></i>
        <div class="social animate" <?php if ($twitter_icon_show == '' || $twitter_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($twitter_url)) {
            echo esc_url($twitter_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Twitter" class="round">
            <div class="social-efect"><i class="fa fa-twitter"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($facebook_icon_show == '' || $facebook_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($facebook_url)) {
            echo esc_url($facebook_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Facebook" class="round">
            <div class="social-efect"><i class="fa fa-facebook"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($linkedin_icon_show == '' || $linkedin_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($linkedin_url)) {
            echo esc_url($linkedin_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="LinkedIn" class="round">
            <div class="social-efect"><i class="fa fa-linkedin"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($google_icon_show == '' || $google_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($google_url)) {
            echo esc_url($google_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Google Plus" class="round">
            <div class="social-efect"><i class="fa fa-google-plus"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($instagram_icon_show == '' || $instagram_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($instagram_url)) {
            echo esc_url($instagram_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Instagram" class="round">
            <div class="social-efect"><i class="fa fa-instagram"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($pinterest_icon_show == '' || $pinterest_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($pinterest_url)) {
            echo esc_url($pinterest_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Pinterest" class="round">
            <div class="social-efect"><i class="fa fa-pinterest"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($youtube_icon_show == '' || $youtube_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($youtube_url)) {
            echo esc_url($youtube_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Youtube" class="round">
            <div class="social-efect"><i class="fa fa-youtube"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($tumblr_icon_show == '' || $tumblr_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($tumblr_url)) {
            echo esc_url($tumblr_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="Tumblr" class="round">
            <div class="social-efect"><i class="fa fa-tumblr"></i></div>
          </a>
        </div>
        <div class="social animate" <?php if ($rss_icon_show == '' || $rss_url == "") {
          echo "style=\"display:none;\"";
        } ?>>
          <a href="<?php if (trim($rss_url)) {
            echo esc_url($rss_url);
          } else {
            echo "javascript:;";
          } ?>" target="_blank" title="RSS" class="round">
            <div class="social-efect"><i class="fa fa-rss"></i></div>
          </a>
        </div>
        <?php do_action('sauron_more_social_links'); ?>
        <div class="clear"></div>
      </div>

      <?php
    }
  }


  public static function content_for_home()
  {

    global $wdwt_front,
           $wp_query,
           $paged;
    $date_enable = $wdwt_front->get_param('date_enable');
    $grab_image = $wdwt_front->get_param('grab_image');
    $blog_style = $wdwt_front->blog_style();


    if (have_posts()) :
      while (have_posts()) :
        the_post();
        /*ttt!!!*/
        /*var_dump(get_the_ID());*/

        ?>
        <div class="blog-post home-post">
          <div class="post">
            <?php if (has_post_thumbnail() || (sauron_frontend_functions::post_image_url() && $blog_style && $grab_image)) { ?>
              <div class="img_container fixed size360x250">
                <?php echo sauron_frontend_functions::fixed_thumbnail(360, 250, $grab_image); ?>
              </div>
            <?php } ?>
            <div class="cont">
              <a class="title_href" href="<?php echo get_permalink() ?>">
                <h3><?php self::the_title_max_charlength(40); ?></h3>
              </a>

              <?php if ($blog_style) {
                the_excerpt();
              } else {
                the_content(__('More', WDWT_LANG));
              }
              ?>
            </div>
          </div>
          <?php if ($date_enable) { ?>
            <div class="home-post-date entry-meta">
              <?php echo self::posted_on(); ?>
              <?php echo self::entry_meta(); ?>
            </div>
          <?php } ?>
        </div>
        <?php
      endwhile;
      if ($wp_query->max_num_pages > 2) { ?>
        <div class="page-navigation">
          <?php posts_nav_link(" ", '&larr; Previous', 'Next &rarr;'); ?>
        </div>
        <?php
      }
    endif;

    ?>
    <div class="clear"></div>
    <?php
    wp_reset_query();
    ?>
    <?php
  }

  public static function entry_meta()
  {
    $categories_list = get_the_category_list(', ');
    if ($categories_list) {
      echo '<span class="categories-links"><span class="sep category"><i class="fa fa-th-large" aria-hidden="true" style="    transform: rotate(45deg); font-size: 15px;"></i></span> ' . $categories_list . '</span>';
    }
    $tag_list = get_the_tag_list('', ' , ');
    if ($tag_list) {
      echo '<span class="tags-links"><span class="sep tag"><i class="fa fa-tag" aria-hidden="true"></i></span>' . $tag_list . '</span>';
    }
  }


}