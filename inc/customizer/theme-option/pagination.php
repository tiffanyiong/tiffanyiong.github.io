<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-pagination-options'] = 'numeric';

$photo_magic_sections['photo-magic-pagination-options'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Pagination Options', 'photo-magic' ),
        'panel'          => 'photo-magic-theme-options',
    );

$photo_magic_settings_controls['photo-magic-pagination-options'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-pagination-options'],
        ),
        'control' => array(
            'label'                 =>  __( 'Pagination Options', 'photo-magic' ),
            'section'               => 'photo-magic-pagination-options',
            'type'                  => 'select',
            'choices'               => array(
                'default' => __( 'default', 'photo-magic' ),
                'numeric' => __( 'numeric', 'photo-magic' )
            ),
            'priority'              => 20,
            'description'           => '',
            'active_callback'       => ''
        )
    );
