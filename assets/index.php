<?php

get_header();
$grab_image= $wdwt_front->get_param('grab_image');
$blog_style= $wdwt_front->blog_style();
// get them header part 
?>
	<div class="right_container">
		<div class="container">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
				<aside id="sidebar1" >
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
						<div class="clear"></div>
					</div>
				</aside>
			<?php endif; ?>
			<div id="content_front_page">
				<div id="content" class="blog" ><?php
					if(have_posts()) {
						while (have_posts()) {
							the_post();
							?>
							<div class="blog-post home-post">
								<a class="title_href" href="<?php echo get_permalink() ?>">
									<h1 class="page-header"><?php the_title(); ?></h1>
								</a>
								<?php
								if($wdwt_front->get_param('date_enable')){ ?>
									<div class="home-post-date">
										<?php echo sauron_frontend_functions::posted_on();?>
									</div>
									<?php
								}
								if(has_post_thumbnail() || (sauron_frontend_functions::post_image_url() && $blog_style && $grab_image)){ ?>
									<div class="img_container fixed size360x250">
										<?php echo sauron_frontend_functions::fixed_thumbnail(360,250, $grab_image); ?>
									</div>
								<?php }
								if($blog_style){
									the_excerpt();
								}
								else {
									the_content(__('More',WDWT_LANG));
								}
								?>
								<div class="clear"></div>

							</div>
							<?php
						}
						if( $wp_query->max_num_pages > 2 ){ ?>
							<div class="page-navigation">
								<?php posts_nav_link(" ", '&larr; Previous','Next &rarr;'); ?>
							</div>
						<?php }

					} ?>
					<div class="clear"></div>
					<?php
					wp_reset_query(); ?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<aside id="sidebar2">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
						<div class="clear"></div>
					</div>
				</aside>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>