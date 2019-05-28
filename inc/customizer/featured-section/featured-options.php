<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-home-featured-enable']        = 1;
$photo_magic_customizer_defaults['photo-magic-home-featured-title']         = __('Featured Image','photo-magic');
$photo_magic_customizer_defaults['photo-magic-home-featured-selection']     = 'from-category';
$photo_magic_customizer_defaults['photo-magic-home-featured-number']        = 3;
$photo_magic_customizer_defaults['photo-magic-home-featured-single-words']  = 30;
$photo_magic_customizer_defaults['photo-magic-home-featured-button-enable'] = 1;
$photo_magic_customizer_defaults['photo-magic-home-featured-button-text']   = __('Browse more','photo-magic');
$photo_magic_customizer_defaults['photo-magic-home-featured-button-link']   = '#';

/*featuredoptions*/
$photo_magic_sections['photo-magic-home-featured-options'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Featured Options', 'photo-magic' ),
        'panel'          => 'photo-magic-home-featured',
    );

$photo_magic_settings_controls['photo-magic-home-featured-enable'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Featured', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-home-featured-title'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'text',
            'priority'              => 15,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-home-featured-number'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number of Featured/s', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'photo-magic' ),
                2 => __( '2', 'photo-magic' ),
                3 => __( '3', 'photo-magic' ),
                4 => __( '4', 'photo-magic' ),
            ),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-home-featured-selection'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-selection']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Feature Post type', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'select',
            'choices'      => array(
                'from-category' => __( 'From-Category', 'photo-magic' ),
                'from-page'     => __( 'From-Page', 'photo-magic' ),
            ),
            'priority'              => 23,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-home-featured-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words in Single Column Content', 'photo-magic' ),
            'description'           =>  __( 'If you do not select from -Custom', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'number',
            'priority'              => 25,
            'active_callback'       => ''
        )
    );




$photo_magic_settings_controls['photo-magic-home-featured-button-enable'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-button-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Button', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'checkbox',
            'priority'              => 35,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-home-featured-button-link'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-featured-button-link']
        ),
        'control' => array(
            'label'                 =>  __( 'Browse All Button Link', 'photo-magic' ),
            'section'               => 'photo-magic-home-featured-options',
            'type'                  => 'url',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );