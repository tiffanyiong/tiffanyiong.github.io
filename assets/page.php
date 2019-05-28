<?php
get_header();
global $wdwt_front,
			 $post;
$sauron_meta_data = get_post_meta($post->ID, WDWT_META, TRUE);
$show_featured_image = $wdwt_front->get_param('show_featured_image', $sauron_meta_data, false);
?>
	<div class="container">
		<?php
		if (is_active_sidebar('sidebar-1')) { ?>
			<aside id="sidebar1">
				<div class="sidebar-container clear-div">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</aside>
		<?php } ?>

		<div id="content" class="blog">
			<?php
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="single-post">
					<h1 class="page-header"><?php the_title(); ?></h1>
					<?php if (has_post_thumbnail() && $show_featured_image) { ?>
						<div class="post-thumbnail-div">
							<div class="img_container fixed size250x180">
								<?php echo sauron_frontend_functions::fixed_thumbnail(250, 180, false); ?>
							</div>
						</div>
					<?php } ?>
					<div class="entry"><?php the_content(); ?></div>
				</div>
			<?php endwhile; ?>
				<div class="navigation">
					<?php wp_link_pages(); ?>
				</div>
			<?php endif; ?>
			<div class="clear"></div>
			<?php
			if (comments_open()) { ?>
				<div class="comments-template">
					<?php echo comments_template(); ?>
				</div>
			<?php } ?>
		</div>
		<?php
		if (is_active_sidebar('sidebar-2')) { ?>
			<aside id="sidebar2">
				<div class="sidebar-container clear-div">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>

			</aside>
		<?php } ?>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>