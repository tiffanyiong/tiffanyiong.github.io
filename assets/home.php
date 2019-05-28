<?php
get_header();

global $wdwt_front;
$show_slider_wd = $wdwt_front->get_param('show_slider_wd', array(), false);
$slider_wd_id = $wdwt_front->get_param('slider_wd_id');

$content_post_turn_on_animation = $wdwt_front->get_param('content_post_turn_on_animation', array(), true);
$home_middle_description_turn_on_animation = $wdwt_front->get_param('home_middle_description_turn_on_animation', array(), true);
$blog_posts_turn_on_animation = $wdwt_front->get_param('blog_posts_turn_on_animation', array(), true);
$gallery_posts_turn_on_animation = $wdwt_front->get_param('gallery_posts_turn_on_animation', array(), true);
$review_posts_turn_on_animation = $wdwt_front->get_param('review_posts_turn_on_animation', array(), true);
$home_middle_diagrams_turn_on_animation = $wdwt_front->get_param('home_middle_diagrams_turn_on_animation', array(), true);
$pinned_post_turn_on_animation = $wdwt_front->get_param('pinned_post_turn_on_animation', array(), true);
$social_links_turn_on_animation = $wdwt_front->get_param('social_links_turn_on_animation', array(), true);
$contact_us_turn_on_animation = $wdwt_front->get_param('contact_us_turn_on_animation', array(), true);

?>
<div class="right_container">

  <div class="container">
    <?php
    if ('posts' == get_option('show_on_front') && is_plugin_active('slider-wd/slider-wd.php') && $show_slider_wd && function_exists("wd_slider")) {
      wd_slider($slider_wd_id);
    }
    if (is_active_sidebar('sidebar-1') && !is_home()) { ?>
      <aside id="sidebar1">
        <div class="sidebar-container">
          <?php dynamic_sidebar('sidebar-1'); ?>
          <div class="clear"></div>
        </div>
      </aside>
    <?php } ?>

    <?php
    if ('posts' == get_option('show_on_front')) {

      ?>
      <script>
        var sauron_one_page = true;
      </script>
      <div id="content_front_page" data-animation="<?php echo $content_post_turn_on_animation ? 0 : 1; ?>">
        <div class="main" id="portfolio_posts"> <?php sauron_frontend_functions::portfolio_posts(); ?></div>
        <div id="image_list_top0" class="image_list_top portfolio_list "
             data-animation="<?php echo $home_middle_description_turn_on_animation ? 0 : 1; ?>"><?php sauron_frontend_functions::home_featured_post(); ?></div>
        <div id="image_list_top1" class="image_list_top portfolio_list "
             data-animation="<?php echo $blog_posts_turn_on_animation ? 0 : 1; ?>"><?php sauron_frontend_functions::blog_posts_section(); ?></div>
        <div id="image_list_top2" class="image_list_top portfolio_list "
             data-animation="<?php echo $gallery_posts_turn_on_animation ? 0 : 1; ?>"><?php sauron_frontend_functions::gallery_posts_section(); ?></div>
        <div id="image_list_top3" class="image_list_top portfolio_list "
             data-animation="<?php echo $review_posts_turn_on_animation ? 0 : 1; ?>"><?php sauron_frontend_functions::review_posts_section(); ?></div>
        <div id="image_list_top5" class="image_list_top portfolio_list "
             data-animation="<?php echo $pinned_post_turn_on_animation ? 0 : 1; ?>"><?php sauron_frontend_functions::pinned_posts_section(); ?></div>
        <div id="image_list_top6" class="image_list_top portfolio_list "
             data-animation="<?php echo $social_links_turn_on_animation ? 0 : 1; ?>"><?php sauron_frontend_functions::social_icons_section(); ?></div>
        <?php
        wp_reset_query(); ?>
        <div class="clear"></div>
      </div>
    <?php
    }

    elseif ('page' == get_option('show_on_front')){

    ?>

      <div id="blog">
        <?php sauron_frontend_functions::content_for_home(); ?>
      </div>
      <div class="clear"></div>

      <?php
    }

    if (is_active_sidebar('sidebar-2') && !is_home()) { ?>
      <aside id="sidebar2">
        <div class="sidebar-container">
          <?php dynamic_sidebar('sidebar-2'); ?>
          <div class="clear"></div>
        </div>
      </aside>
    <?php } ?>
  </div>
</div>
<?php get_footer(); ?>
