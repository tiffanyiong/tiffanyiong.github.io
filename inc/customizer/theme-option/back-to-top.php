<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-enable-back-to-top'] = 1;

$photo_magic_sections['photo-magic-back-to-top-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Back To Top Options', 'photo-magic' ),
        'panel'          => 'photo-magic-theme-options'
    );

$photo_magic_settings_controls['photo-magic-enable-back-to-top'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-enable-back-to-top'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Back To Top', 'photo-magic' ),
            'section'               => 'photo-magic-back-to-top-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );