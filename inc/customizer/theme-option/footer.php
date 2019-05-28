<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-footer-sidebar-number'] = 2;
$photo_magic_customizer_defaults['photo-magic-copyright-text'] = __('Copyright &copy; eVisionThemes','photo-magic');
$photo_magic_customizer_defaults['photo-magic-enable-theme-name'] = 1;

$photo_magic_sections['photo-magic-footer-options'] =
    array(
        'priority'       => 15,
        'title'          => __( 'Footer Options', 'photo-magic' ),
        'panel'          => 'photo-magic-theme-options'
    );

$photo_magic_settings_controls['photo-magic-footer-sidebar-number'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-footer-sidebar-number'],
        ),
        'control' => array(
            'label'                 =>  __( 'Number of Sidebars In Footer Area', 'photo-magic' ),
            'section'               => 'photo-magic-footer-options',
            'type'                  => 'select',
            'choices'               => array(
                0 => __( 'Disable footer sidebar area', 'photo-magic' ),
                1 => __( '1', 'photo-magic' ),
                2 => __( '2', 'photo-magic' )
            ),
            'priority'              => 15,
            'description'           => '',
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-copyright-text'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-copyright-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Copyright Text', 'photo-magic' ),
            'section'               => 'photo-magic-footer-options',
            'type'                  => 'text_html',
            'priority'              => 20,
        )
    );
