<?php

class sauron__categ_square extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('description' => __('Displays Categories Posts', WDWT_LANG));
    $control_ops = array('width' => '', 'height' => '');
    parent::__construct(false, $name = __('Sauron Categories Posts', WDWT_LANG), $widget_ops, $control_ops);
  }

  /* Displays the Widget in the front-end */
  function widget($args, $instance)
  {
    extract($args);
    global $wdwt_front;
    $title = esc_html($instance['title']);
    $categ_id = empty($instance['categ_id']) ? '' : $instance['categ_id'];
    $post_count = empty($instance['post_count']) ? '' : $instance['post_count'];
    $select_view = empty($instance['select_view']) ? '0' : $instance['select_view'];

    echo $before_widget;
    if ($title)
      echo $before_title . $title . $after_title; ?>

    <style>
      .cat_widg {
        left: 25px;
        position: relative;
        top: -22px;
      }

      .widget_sauron__categ_square div:last-child div {
        border-bottom: none !important;
      }

      .cat_widg_cont {
        padding: 7px 10px 0px 0px;
        display: inline-block;
      }

      .cat_widg_cont h3 {
        margin-top: 0;
        line-height: 20px;
        margin-bottom: 5px !important;
        display: inline-block;
        padding: 7px 15px 7px 15px;
        border: 1px solid #292929;
      }

      .cat_widg_cont > div:last-child {
        border-bottom: 0px !important
      }

      .cat_widg_cont.only_text:before {
        width: 0;
        height: 0;
        border-top: solid transparent;
        border-bottom: solid transparent;
        border-width: 5px;
        content: "\27A1";
        margin-right: 5px;
        font-style: normal;
        font-weight: 100;
        font-size: 18px;
      }

      .cat_widg_cont h3 a {
        font-size: 20px !important;
      }

      .widget-title {
        margin-bottom: 0;
      }
    </style>
    <?php
    $wp_query = null;
    if (empty($categ_id))
      $cat_query = '';
    else
      $cat_query = $categ_id . ",";

    $wp_query = new WP_Query('posts_per_page=' . ($post_count) . '&cat=' . $cat_query . '&order=DESC');
    if ($select_view == 1) {
      if (have_posts()):
        while ($wp_query->have_posts()) : $wp_query->the_post();
          ?>
          <div class="cat_widg_cont only_text">
            <div class="cat_widg">
              <?php echo substr(strip_tags(get_the_excerpt()), 0, 50) . "..."; ?>
              &nbsp;&nbsp;&nbsp;<a class="read_more" href="<?php echo get_permalink(); ?>"><?php echo __('More info', WDWT_LANG); ?></a>
            </div>
            <div style="clear:both;"></div>
          </div>

        <?php endwhile;
      endif;
    } else {
      if (have_posts()):
        while ($wp_query->have_posts()) : $wp_query->the_post();
          ?>
          <div class="cat_widg_cont">
            <h3>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div style="clear:both;"></div>
          </div>

        <?php endwhile;
      endif;
    }

    wp_reset_postdata();

    echo $after_widget;

  }

  /*Saves the settings. */
  function update($new_instance, $old_instance)
  {

    $instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['categ_id'] = wp_filter_post_kses(addslashes($new_instance['categ_id']));
    $instance['post_count'] = wp_filter_post_kses(addslashes($new_instance['post_count']));
    $instance['select_view'] = $new_instance['select_view'];
    return $instance;

  }

  /*Creates the form for the widget in the back-end. */
  function form($instance)
  {
    //Defaults
    $instance = wp_parse_args((array)$instance, array('title' => 'Categories Posts', 'categ_id' => '0', 'post_count' => '3', 'select_view' => '0'));
    $title = esc_attr($instance['title']);
    $categ_id = esc_attr($instance['categ_id']);
    $post_count = esc_attr($instance['post_count']);
    $select_view = $instance['select_view']; ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Title:", WDWT_LANG); ?></label><input
        class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>


    <p><label
        for="<?php echo $this->get_field_id('categ_id'); ?>"><?php echo __("Select Category:", WDWT_LANG); ?></label>
      <select name="<?php echo $this->get_field_name('categ_id'); ?>" id="<?php echo $this->get_field_id('categ_id') ?>"
              style="font-size:12px" class="inputbox">
        <option value="0"><?php echo __("Select Category:", WDWT_LANG); ?></option>
        <?php $categories = get_categories();
        foreach ($categories as $categorie) {
          ?>
          <option
            value="<?php echo $categorie->term_id ?>" <?php if ($instance['categ_id'] == $categorie->term_id) echo 'selected="selected"'; ?>><?php echo $categorie->name ?></option>
          <?php
        }
        ?>
      </select></p>
    <p><label for="<?php echo $this->get_field_id('select_view'); ?>"></label>
      <input type="radio" name="<?php echo $this->get_field_name('select_view'); ?>"
             value="0" <?php if ($select_view == 0 || $select_view == "") echo 'checked="checked"'; ?>><?php echo __("Title", WDWT_LANG); ?>
      <input type="radio" name="<?php echo $this->get_field_name('select_view'); ?>"
             value="1" <?php if ($select_view == 1 || $select_view == "") echo 'checked="checked"'; ?>><?php echo __("Desciption", WDWT_LANG); ?>
    </p>
    <p><label
        for="<?php echo $this->get_field_id('post_count'); ?>"><?php echo __("Number of Posts:", WDWT_LANG); ?></label><input
        id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>"
        type="text" value="<?php echo $post_count; ?>" size="6"/></p>
    <?php
  }
}// end sauron__categ_square class
add_action('widgets_init', 'sauron_widget_categories');
function sauron_widget_categories(){
  return register_widget("sauron__categ_square");
}