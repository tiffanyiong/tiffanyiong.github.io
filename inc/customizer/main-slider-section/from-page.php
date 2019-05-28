<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-featured-slider-pages'] = 0;

/*page selection*/
$photo_magic_sections['photo-magic-feature-slider-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select From Page', 'photo-magic' ),
        'description'    => __( 'This option only work when you have selected "Page" in "Settings Options".', 'photo-magic' ),
        'panel'          => 'photo-magic-feature-slider',
    );

/*creating setting control for photo-magic-feature-slider-page start*/
$photo_magic_repeated_settings_controls['photo-magic-featured-slider-pages'] =
    array(
        'repeated' => 3,
        'photo-magic-feature-slider-pages-ids' => array(
            'setting' =>     array(
                'default'              => $photo_magic_customizer_defaults['photo-magic-featured-slider-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Slide %s', 'photo-magic' ),
                'section'               => 'photo-magic-feature-slider-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 60,
                'description'           => ''
            )
        ),
        'photo-magic-feature-slider-pages-divider' => array(
            'control' => array(
                'section'               => 'photo-magic-feature-slider-pages',
                'type'                  => 'message',
                'priority'              => 60,
                'description'           => '<br /><hr />'
            )
        )
    );

