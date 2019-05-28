<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-custom-css'] = '';
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
    $photo_magic_sections['photo-magic-custom-css'] =
        array(
            'priority'       => 120,
            'title'          => __( 'Custom CSS', 'photo-magic' ),
            'panel'          => 'photo-magic-theme-options'
        );

    $photo_magic_settings_controls['photo-magic-custom-css'] =
        array(
            'setting' =>     array(
                'default'              => $photo_magic_customizer_defaults['photo-magic-custom-css'],
            ),
            'control' => array(
                'label'                 =>  __( 'Custom CSS', 'photo-magic' ),
                'section'               => 'photo-magic-custom-css',
                'type'                  => 'textarea_css',
                'priority'              => 40,
            )
        );
}