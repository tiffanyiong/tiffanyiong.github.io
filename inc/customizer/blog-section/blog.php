<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-blog-enable']             = 1;
$photo_magic_customizer_defaults['photo-magic-blog-title']              = __('LATEST NEWS','photo-magic');
$photo_magic_customizer_defaults['photo-magic-blog-number']             = 3;
$photo_magic_customizer_defaults['photo-magic-blog-excerpt-number']     = 10;
$photo_magic_customizer_defaults['photo-magic-blog-enable-button']      = 1;
$photo_magic_customizer_defaults['photo-magic-blog-button-text']        = __('Browse more','photo-magic');
$photo_magic_customizer_defaults['photo-magic-home-blog-button-link']   = '#';
$photo_magic_customizer_defaults['photo-magic-blog-category']           = 0;

/*aboutoptions*/
$photo_magic_sections['photo-magic-blog-options'] =
    array(
        'priority'       => 230,
        'title'          => __( 'Home Blog Options', 'photo-magic' ),
    );

$photo_magic_settings_controls['photo-magic-blog-enable'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-blog-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Blog', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-blog-title'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-blog-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'text',
            'priority'              => 15,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-blog-number'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-blog-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Blog/s', 'photo-magic' ),
            'description'           =>  __( 'Remember that featured post will not be counted', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'photo-magic' ),
                2 => __( '2', 'photo-magic' ),
                3 => __( '3', 'photo-magic' )
            ),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );

/*String in max to be appear as description on menu*/
$photo_magic_settings_controls['photo-magic-blog-excerpt-number'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-blog-excerpt-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words For Blog Post', 'photo-magic' ),
            'description'           =>  __( 'Give number of words you wish to be appear on home page blog post', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'number',
            'priority'              => 50,
            'active_callback'       => '',
            'input_attrs' => array( 'min' => 1, 'max' => 200),

        )
    );

$photo_magic_settings_controls['photo-magic-blog-enable-button'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-blog-enable-button']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Button', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'checkbox',
            'priority'              => 52,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-home-blog-button-link'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-home-blog-button-link']
        ),
        'control' => array(
            'label'                 =>  __( 'Enter URL to redirect', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'text',
            'priority'              => 53,
            'active_callback'       => ''
        )
    );

/*creating setting control for photo-magic-fs-Category start*/
$photo_magic_settings_controls['photo-magic-blog-category'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-blog-category']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Category For Blog', 'photo-magic' ),
            'description'           =>  __( 'Blog will only displayed from this category', 'photo-magic' ),
            'section'               => 'photo-magic-blog-options',
            'type'                  => 'category_dropdown',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );
