<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-home-featured-category'] = 0;

/*page selection*/
$photo_magic_sections['photo-magic-home-featured-post'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select Featured From Post', 'photo-magic' ),
        'description'    => __( 'This option will work only when you have selected "Post" in "featured selection Options".', 'photo-magic' ),
        'panel'          => 'photo-magic-home-featured',
    );

/*creating setting control for photo-magic-home-featured-page start*/
$photo_magic_settings_controls['photo-magic-home-featured-category'] =
array(
    'setting' =>     array(
        'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-category'],
    ),
    'control' => array(
        'label'                 =>  __( 'Select Post For Featured', 'photo-magic' ),
        'section'               => 'photo-magic-home-featured-post',
        'type'                  => 'category_dropdown',
        'priority'              => 10,
        'description'           => ''
    ),
    'photo-magic-home-featured-pages-divider' => array(
        'control' => array(
            'section'               => 'photo-magic-home-featured-post',
            'type'                  => 'message',
            'priority'              => 20,
            'description'           => '<br /><hr />'
        )
    )
);