<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-enable-breadcrumb'] = 1;

$photo_magic_sections['photo-magic-breadcrumb-options'] =
    array(
        'priority'       => 50,
        'title'          => __( 'Breadcrumb Options', 'photo-magic' ),
        'panel'          => 'photo-magic-theme-options',
    );

$photo_magic_settings_controls['photo-magic-enable-breadcrumb'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-enable-breadcrumb'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Breadcrumb', 'photo-magic' ),
            'section'               => 'photo-magic-breadcrumb-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );