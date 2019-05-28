<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-featured-slider-category'] = 0;

/*page selection*/
$photo_magic_sections['photo-magic-feature-slider-post'] = array(
    'priority'       => 35,
    'title'          => __( 'Select From Post', 'photo-magic' ),
    'description'    => __( 'This option only work when you have selected "Posst" in "Settings Options".', 'photo-magic' ),
    'panel'          => 'photo-magic-feature-slider',
);

/*creating setting control for photo-magic-feature-slider-page start*/
$photo_magic_settings_controls['photo-magic-featured-slider-category'] = array(

        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-featured-slider-category'],
        ),
        'control' => array(
            'label'                 =>  __( 'Select Post For Slide', 'photo-magic' ),
            'section'               => 'photo-magic-feature-slider-post',
            'type'                  => 'category_dropdown',
            'priority'              => 10,
            'description'           => ''
        ),
    'photo-magic-feature-slider-pages-divider' => array(
        'control' => array(
            'section'               => 'photo-magic-feature-slider-post',
            'type'                  => 'message',
            'priority'              => 10,
            'description'           => '<br /><hr />'
        )
    )
);

