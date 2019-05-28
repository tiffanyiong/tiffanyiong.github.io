<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Photo Magic
 */

get_header(); 
if(  1 == $photo_magic_customizer_all_values['photo-magic-slider-enable-blog'] ){
	do_action('photo_magic_action_main_slider');
}
else{
    do_action('photo-magic-page-inner-title');

}

?>
<section class="wrapper">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				/**
				 * photo_magic_action_posts_navigation hook
				 *
				 * @hooked: photo_magic_posts_navigation - 10
				 *
				 * @since  photo-magic 0.1.0
				 */
				do_action( 'photo_magic_action_posts_navigation' );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
			get_sidebar();
		?>
	</div>
</section>
<?php
get_footer();