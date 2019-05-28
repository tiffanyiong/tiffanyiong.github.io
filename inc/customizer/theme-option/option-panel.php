<?php
global $photo_magic_panels;
/*creating panel for theme settings*/
$photo_magic_panels['photo-magic-theme-options'] =
    array(
        'title'          => __( 'Theme Options', 'photo-magic' ),
        'priority'       => 235
    );

/*footer options */
require get_template_directory().'/inc/customizer/theme-option/footer.php';

/*layout options */
require get_template_directory().'/inc/customizer/theme-option/layout-options.php';

/*pagination options */
require get_template_directory().'/inc/customizer/theme-option/pagination.php';

/*breadcrumb options */
require get_template_directory().'/inc/customizer/theme-option/breadcrumb.php';

/*back to top options */
require get_template_directory().'/inc/customizer/theme-option/back-to-top.php';

/*custom css options */
require get_template_directory().'/inc/customizer/theme-option/custom-css.php';