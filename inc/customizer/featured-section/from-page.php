<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-home-featured-pages'] = 0;

/*page selection*/
$photo_magic_sections['photo-magic-home-featured-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select Featured From Page', 'photo-magic' ),
        'description'    => __( 'This option will work only when you have selected "Page" in "featured selection Options".', 'photo-magic' ),
        'panel'          => 'photo-magic-home-featured',
    );

/*creating setting control for photo-magic-home-featured-page start*/
$photo_magic_repeated_settings_controls['photo-magic-home-featured-pages'] =
    array(
        'repeated' => 8,
        'photo-magic-home-featured-pages-ids' => array(
            'setting' =>     array(
                'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Featured %s', 'photo-magic' ),
                'section'               => 'photo-magic-home-featured-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'photo-magic-home-featured-pages-divider' => array(
            'control' => array(
                'section'               => 'photo-magic-home-featured-pages',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );