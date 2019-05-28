<?php
/*The template for displaying Archive pages*/
global $wdwt_front;
get_header();
$grab_image = $wdwt_front->get_param('grab_image');
$blog_style = $wdwt_front->blog_style(); ?>
  <div class="right_container">
    <div class="container">
      <?php if (is_active_sidebar('sidebar-1')) { ?>
        <aside id="sidebar1">
          <div class="sidebar-container">
            <?php dynamic_sidebar('sidebar-1'); ?>
            <div class="clear"></div>
          </div>
        </aside>
      <?php } ?>

      <div id="content" class="blog archive-page">

        <?php if (have_posts()) : ?>
          <?php $post = $posts[0]; ?>

          <?php if (is_category()) { ?>
            <h2
              class="styledHeading"><?php _e('Archive For The ', WDWT_LANG); ?>&ldquo;<?php single_cat_title(); ?>&rdquo; <?php _e('Category', WDWT_LANG); ?></h2>
          <?php } elseif (is_tag()) { ?>
            <h2
              class="styledHeading"><?php _e('Posts Tagged ', WDWT_LANG); ?>&ldquo;<?php single_tag_title(); ?>&rdquo;</h2>
          <?php } elseif (is_day()) { ?>
            <h2
              class="styledHeading"><?php _e('Archive For ', WDWT_LANG); ?><?php the_time(get_option('date_format')); ?></h2>
          <?php } elseif (is_month()) { ?>
            <h2
              class="styledHeading"><?php _e('Archive For ', WDWT_LANG); ?><?php the_time(get_option('date_format')); ?></h2>
          <?php } elseif (is_year()) { ?>
            <h2
              class="styledHeading"><?php _e('Archive For ', WDWT_LANG); ?><?php the_time(get_option('date_format')); ?></h2>
          <?php } elseif (is_author()) { ?>
            <h2 class="styledHeading"><?php _e('Author Archive', WDWT_LANG); ?></h2>
          <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h2 class="styledHeading"><?php _e('Blog Archives', WDWT_LANG); ?></h2>
          <?php } ?>

          <?php while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
              <div class="post">
                <?php
                if (has_post_thumbnail() || (sauron_frontend_functions::post_image_url() && $blog_style && $grab_image)) { ?>
                  <div class="img_container fixed size360x250 archive_thumb">
                    <?php echo sauron_frontend_functions::fixed_thumbnail(360, 250, $grab_image); ?>
                  </div>
                <?php } ?>
                <div class="cont">
                  <h3 class="archive-header"><a href="<?php the_permalink(); ?>" rel="bookmark"
                                                title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                  <?php
                  if ($wdwt_front->blog_style()) {
                    the_excerpt();
                  } else {
                    the_content();
                  } ?>
                </div>
              </div>
              <?php
              if ($wdwt_front->get_param('date_enable')) { ?>
                <div class="entry-meta">
                  <?php sauron_frontend_functions::posted_on_single(); ?>
                  <?php sauron_frontend_functions::entry_meta(); ?>
                </div>
              <?php } ?>
            </div>

          <?php endwhile; ?>
          <div class="page-navigation">
            <?php posts_nav_link(" ", '&larr; Previous', 'Next &rarr;'); ?>
          </div>
        <?php else : ?>

          <h3 class="archive-header"><?php _e('Not Found', WDWT_LANG); ?></h3>
          <p><?php _e('There are not posts belonging to this category or tag. Try searching below:', WDWT_LANG); ?></p>
          <div id="search-block-category"><?php get_search_form(); ?></div>

        <?php endif; ?>

        <?php
        wp_reset_query();
        if (comments_open()) { ?>
          <div class="comments-template">
            <?php comments_template(); ?>
          </div>
          <?php
        } ?>
      </div>
      <?php
      if (is_active_sidebar('sidebar-2')) { ?>
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