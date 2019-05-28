<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package eVision themes
 * @subpackage Photo Magic
 * @since Photo Magic 0.1.0
 */

/**
 * photo_magic_action_after_content hook
 * @since Photo Magic 0.1.0
 *
 * @hooked null
 */
do_action( 'photo_magic_action_after_content' );

/**
 * photo_magic_action_before_footer hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_before_footer - 10
 */
do_action( 'photo_magic_action_before_footer' );

/**
 * photo_magic_action_footer hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_footer - 10
 */
do_action( 'photo_magic_action_footer' );

/**
 * photo_magic_action_after_footer hook
 * @since Photo Magic 0.1.0
 *
 * @hooked null
 */
do_action( 'photo_magic_action_after_footer' );

/**
 * photo_magic_action_after_footer hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_page_end - 10
 */
do_action( 'photo_magic_action_after_footer' );
?>
<?php wp_footer(); ?>
</body>
</html>
