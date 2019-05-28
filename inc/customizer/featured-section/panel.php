<?php
global $photo_magic_panels;
/*creating panel for fonts-setting*/
$photo_magic_panels['photo-magic-home-featured'] =
    array(
        'title'          => __( 'Home Featured Section', 'photo-magic' ),
        'priority'       => 220
    );
/*enable featured options */
require get_template_directory().'/inc/customizer/featured-section/featured-options.php';

/*featured selection from page options */
require get_template_directory().'/inc/customizer/featured-section/from-page.php';


/*featured selection from page options */
require get_template_directory().'/inc/customizer/featured-section/from-post.php';
