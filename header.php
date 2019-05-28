<?php
/**
 * The default template for displaying header
 *
 * @package eVision themes
 * @subpackage Photo Magic
 * @since Photo Magic 0.1.0
 */

/**
 * photo_magic_action_before_head hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_set_global -  0
 * @hooked photo_magic_doctype -  10
 */
do_action( 'photo_magic_action_before_head' );?>
<head>

	<?php
	/**
	 * photo_magic_action_before_wp_head hook
	 * @since Photo Magic 0.1.0
	 *
	 * @hooked photo_magic_before_wp_head -  10
	 */
	do_action( 'photo_magic_action_before_wp_head' );

	wp_head();

	/**
	 * photo_magic_action_after_wp_head hook
	 * @since Photo Magic 0.1.0
	 *
	 * @hooked null
	 */
	do_action( 'photo_magic_action_after_wp_head' );
	?>

</head>
<body <?php body_class(); ?>>

<?php
/**
 * photo_magic_action_before hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_page_start - 15
 */
do_action( 'photo_magic_action_before' );

/**
 * photo_magic_action_before_header hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_skip_to_content - 10
 */
do_action( 'photo_magic_action_before_header' );


/**
 * photo_magic_action_header hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_after_header - 10
 */
do_action( 'photo_magic_action_header' );


/**
 * photo_magic_action_main_slider hook
 * @since Photo Magic 0.1.0
 *
 * @hooked photo_magic_action_main_slider - 10
 */
do_action( 'photo_magic_action_on_header' );


/**
 * photo_magic_action_header_close hook
 * @since Photo Magic 0.1.0
 *
 * @hooked null
 */
do_action( 'photo_magic_action_header_close' );

/**
 * photo_magic_action_after_header hook
 * @since Photo Magic 0.1.0
 *
 * @hooked null
 */
do_action( 'photo_magic_action_after_header' );


/**
 * photo_magic_action_before_content hook
 * @since Photo Magic 0.1.0
 *
 * @hooked null
 */
do_action( 'photo_magic_action_before_content' );
