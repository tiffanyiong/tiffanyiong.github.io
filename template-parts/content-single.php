<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package photo-magic
 */

?>
	<div class="entry-content">
		<?php
		$photo_magic_single_post_image_align = photo_magic_single_post_image_align(get_the_ID());
		if( 'no-image' != $photo_magic_single_post_image_align ){
			if( 'left' == $photo_magic_single_post_image_align ){
				echo "<div class='image-left'>";
				the_post_thumbnail('medium');
			}
			elseif( 'right' == $photo_magic_single_post_image_align ){
				echo "<div class='image-right'>";
				the_post_thumbnail('medium');
			}
			else{
				echo "<div class='image-full'>";
				the_post_thumbnail('full');
			}
			echo "</div>";/*div end*/
		}
		?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'photo-magic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php photo_magic_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

