<?php 
global $post;
if (!function_exists('photo_magic_single_page_title')) :
    function photo_magic_single_page_title() { ?>
			<div class="wrapper page-inner-title">
            	<div class = "thumb-overlay">
					<div class="container">
					    <div class="row">
					        <div class="col-md-12 col-sm-12 col-xs-12">
								<header class="entry-header">
									<?php if (is_singular()){ ?>
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									<?php if (! is_page() ){?>
										<header class="entry-header">
											<div class="entry-meta entry-inner">
												<?php photo_magic_posted_on(); ?>
											</div><!-- .entry-meta -->
										</header><!-- .entry-header -->
									<?php } }
									elseif (is_404()) { ?>
										<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'photo-magic' ); ?></h1>
									<?php }
									elseif (is_archive()) {
										the_archive_title( '<h1 class="entry-title">', '</h1>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									}
									elseif (is_search()) { ?>
										<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'photo-magic' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
									<?php }
									else{ ?>
											<h1 class="entry-title"><?php echo (esc_html__( 'Latest Blog', 'photo-magic' )); ?></h1>
									<?php }
									?>
								</header><!-- .entry-header -->
					        </div>
					    </div>
					</div>
				</div>
			</div>

		<?php 
		/**
		 * photo_magic_action_after_title hook
		 * @since photo-magic 0.1.0
		 *
		 * @hooked null
		 */
		do_action( 'photo_magic_action_after_title' );
	}
endif;
add_action( 'photo-magic-page-inner-title', 'photo_magic_single_page_title', 15 );