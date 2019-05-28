<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-fs-single-words'] = 30;
$photo_magic_customizer_defaults['photo-magic-fs-slider-mode'] = 'fadeout';
$photo_magic_customizer_defaults['photo-magic-fs-slider-time'] = 2;
$photo_magic_customizer_defaults['photo-magic-fs-slider-pause-time'] = 7;
$photo_magic_customizer_defaults['photo-magic-fs-enable-arrow'] = 0;
$photo_magic_customizer_defaults['photo-magic-fs-enable-pager'] = 1;
$photo_magic_customizer_defaults['photo-magic-fs-enable-autoplay'] = 1;
$photo_magic_customizer_defaults['photo-magic-fs-enable-title'] = 1;
$photo_magic_customizer_defaults['photo-magic-fs-enable-caption'] = 1;

/*fs options*/
$photo_magic_sections['photo-magic-fs-slider-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Slider Property', 'photo-magic' ),
        'panel'          => 'photo-magic-feature-slider',
    );

$photo_magic_settings_controls['photo-magic-fs-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-fs-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Single Slider- Number Of Words', 'photo-magic' ),
            'description'           =>  __( 'If you do not select from -Custom', 'photo-magic' ),
            'section'               => 'photo-magic-fs-slider-options',
            'type'                  => 'number',
            'priority'              => 5,
            'active_callback'       => '',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
        )
    );

$photo_magic_settings_controls['photo-magic-fs-slider-mode'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-fs-slider-mode']
        ),
        'control' => array(
            'label'                 =>  __( 'Slider Mode', 'photo-magic' ),
            'section'               => 'photo-magic-fs-slider-options',
            'type'                  => 'select',
            'choices'               => array(
                'scrollHorz' => __( 'Default', 'photo-magic' ),
                'fade' => __( 'Fade', 'photo-magic' ),
                'fadeout' => __( 'Fade-Out', 'photo-magic' )
            ),
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-fs-enable-arrow'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-fs-enable-arrow']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Arrow', 'photo-magic' ),
            'section'               => 'photo-magic-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-fs-enable-pager'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-fs-enable-pager']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Pager', 'photo-magic' ),
            'section'               => 'photo-magic-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 55,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-fs-enable-title'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-fs-enable-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Title', 'photo-magic' ),
            'section'               => 'photo-magic-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-fs-enable-caption'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-fs-enable-caption']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Caption', 'photo-magic' ),
            'section'               => 'photo-magic-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 80,
            'active_callback'       => ''
        )
    );
