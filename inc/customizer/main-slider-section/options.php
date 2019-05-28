<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values feature trip options*/
$photo_magic_customizer_defaults['photo-magic-feature-slider-enable']       = 1;
$photo_magic_customizer_defaults['photo-magic-feature-slider-number']       = 3;
$photo_magic_customizer_defaults['photo-magic-feature-slider-selection']    = 'from-category';
$photo_magic_customizer_defaults['photo-magic-slider-enable-blog']          = 1;
$photo_magic_customizer_defaults['photo-magic-slider-default-image-enable'] = 1;

/*feature slider enable setting*/
$photo_magic_sections['photo-magic-feature-section-options'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Setting Options', 'photo-magic' ),
        'panel'          => 'photo-magic-feature-slider',
    );

/*Feature section enable control*/
$photo_magic_settings_controls['photo-magic-feature-slider-enable'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-feature-slider-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Feature Slider', 'photo-magic' ),
            'section'               => 'photo-magic-feature-section-options',
        	'description'    		=> __( 'Enable "Feature slider" on checked' , 'photo-magic' ),
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/*No of feature slider selection*/
$photo_magic_settings_controls['photo-magic-feature-slider-number'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-feature-slider-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Slider', 'photo-magic' ),
            'section'               => 'photo-magic-feature-section-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'photo-magic' ),
                2 => __( '2', 'photo-magic' ),
                3 => __( '3', 'photo-magic' )
            ),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );


/*feature slider Selection*/
$photo_magic_settings_controls['photo-magic-feature-slider-selection'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-feature-slider-selection']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Slider Post Type', 'photo-magic' ),
            'section'               => 'photo-magic-feature-section-options',
            'type'                  => 'select',
            'choices'     => array(
                'from-category' => __( 'From Category', 'photo-magic' ),
                'from-page'     => __( 'From Page', 'photo-magic' )
            ),
            'priority'              => 30,
            'active_callback'       => ''
        )
    );

/*for blog option */
$photo_magic_settings_controls['photo-magic-slider-default-image-enable'] = array(
    'setting' => array(
        'default'          =>  $photo_magic_customizer_defaults['photo-magic-slider-default-image-enable']  
    ),
    'control' => array(
        'label'             => esc_html__('Disable Slider Default image','photo-magic'),
        'section'           => 'photo-magic-feature-section-options',
        'type'              => 'checkbox',
        'priority'          => 40,
        'acticve_callback'  => ''

    )       
);



/*for blog option */
$photo_magic_settings_controls['photo-magic-slider-enable-blog'] = array(
    'setting' => array(
        'default'          =>  $photo_magic_customizer_defaults['photo-magic-slider-enable-blog']  
    ),
    'control' => array(
        'label'             => esc_html__('Disable Slider on Blog Archive','photo-magic'),
        'section'           => 'photo-magic-feature-section-options',
        'type'              => 'checkbox',
        'priority'          => 80,
        'acticve_callback'  => ''

    )       
);
