<?php
global $photo_magic_panels;
/*creating panel for Portfolio Section setting*/
$photo_magic_panels['photo-magic-home-portfolio-panel'] =
    array(
        'title'          => __( 'Home Portfolio Section', 'photo-magic' ),
        'priority'       => 210
    );

/*Portfolio selection options */
require get_template_directory().'/inc/customizer/home-portfolio/portfolio-options.php';

/*Portfolio selection button controlls */
require get_template_directory().'/inc/customizer/home-portfolio/portfolio-category-select.php';