<?php
get_header();
global $wdwt_front,
			 $post;
$grab_image= $wdwt_front->get_param('grab_image');
$blog_style= $wdwt_front->blog_style();

?>
<div class="right_container">
	<div class="container">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<aside id="sidebar1">
				<div class="sidebar-container">
					<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
					<div class="clear"></div>
				</div>
			</aside>
		<?php }  ?>
		<div id="content" class="blog search-page">
			<div class="single-post">
				<h2>
					<?php echo __('Search',WDWT_LANG); ?>
				</h2>
			</div>
			<?php  get_search_form(); ?>

			<?php  if( have_posts() ) {  while( have_posts()){  the_post(); ?>
				<div class="search-result">
					<h3>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<?php
					if(has_post_thumbnail() || (sauron_frontend_functions::post_image_url() && $blog_style && $grab_image)){ ?>
						<div class="img_container fixed searched size180x150">
							<?php echo sauron_frontend_functions::fixed_thumbnail(180, 150, $grab_image); ?>
						</div>
					<?php } ?>
					<div class="entry">
						<?php the_content(); ?>
					</div>
				</div>
			<?php } ?>
				<div class="page-navigation">
					<?php posts_nav_link(" "); ?>
				</div>
			<?php }else {?>
				<div class="search-no-result">
					<?php echo __("Nothing was found. Please try another keyword.", WDWT_LANG);  ?>
				</div>
			<?php } ?>
			<div class="clear"></div><?php

			wp_reset_query();
			?>
		</div>
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<aside id="sidebar2">
				<div class="sidebar-container">
					<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
					<div class="clear"></div>
				</div>
			</aside>
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>
<?php
get_footer(); ?>
