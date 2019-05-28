<?php
/**
 * evision themes init file
 *
 * @package eVision themes
 * @subpackage Photo Magic
 * @since Photo Magic 0.1.0
 */

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer/customizer.php';

/**
* Additional functions.
*/
require get_template_directory() . '/inc/function/header-logo.php';

require get_template_directory() . '/inc/function/words-count.php';

require get_template_directory() . '/inc/function/inner-head.php';

require get_template_directory() . '/inc/function/feature-image-align.php';

require get_template_directory() . '/inc/sidebar-widget-init.php';

/**
 * Init hooks.
 */
require get_template_directory() . '/inc/hooks/excerpt.php';

require get_template_directory() . '/inc/hooks/post-navigation.php';

require get_template_directory() . '/inc/hooks/header.php';

require get_template_directory() . '/inc/hooks/footer.php';

require get_template_directory() . '/inc/hooks/homepage-slider.php';

require get_template_directory() . '/inc/hooks/homepage-portfolio.php';

require get_template_directory() . '/inc/hooks/homepage-featured.php';

require get_template_directory() . '/inc/hooks/homepage-blog.php';

require get_template_directory().'/inc/hooks/wp-head.php';



/**
*layout meta
*/
require get_template_directory().'/inc/post-meta/layout-meta.php';