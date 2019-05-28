<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Photo Magic
 */
global $photo_magic_customizer_all_values;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php photo_magic_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header>

	<div class="entry-content">
		<?php
		$photo_magic_archive_layout = $photo_magic_customizer_all_values['photo-magic-archive-layout'];
		$photo_magic_archive_image_align = $photo_magic_customizer_all_values['photo-magic-archive-image-align'];
		if( 'excerpt-only' == $photo_magic_archive_layout ){
			the_excerpt();
		}
		elseif( 'full-post' == $photo_magic_archive_layout ){
			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'photo-magic' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}
		elseif( 'thumbnail-and-full-post' == $photo_magic_archive_layout ){
			if( 'left' == $photo_magic_archive_image_align ){
				echo "<div class='image-left'>";
				the_post_thumbnail('medium');
			}
			elseif( 'right' == $photo_magic_archive_image_align ){
				echo "<div class='image-right'>";
				the_post_thumbnail('medium');
			}
			else{
				echo "<div class='image-full'>";
				the_post_thumbnail('full');
			}
			echo "</div>";/*div end*/
			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'photo-magic' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}
		else{
			if( 'left' == $photo_magic_archive_image_align ){
				echo "<div class='image-left'>";
				the_post_thumbnail('medium');
			}
			elseif( 'right' == $photo_magic_archive_image_align ){
				echo "<div class='image-right'>";
				the_post_thumbnail('medium');
			}
			else{
				echo "<div class='image-full'>";
				the_post_thumbnail('full');
			}
			echo "</div>";/*div end*/
			the_excerpt();
		}
		?>
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
