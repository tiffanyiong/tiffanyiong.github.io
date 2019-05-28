<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*font array*/
global $photo_magic_google_fonts;
$photo_magic_google_fonts = array(
    'Archivo+Narrow:400,400italic,700' => 'Archivo Narrow',
    'Bitter:400,400italic,700' => 'Bitter',
    'Cookie' => 'Cookie',
    'Exo:400,300,400italic,600,800' => 'Exo',
    'Kreon:400,300,700' => 'Kreon',
    'Lato:400,300,400italic,900,700' => 'Lato',
    'News+Cycle:400,700' => 'News Cycle',
    'Oxygen:400,300,700' => 'Oxygen',
    'Playball' => 'Playball',
    'Ropa+Sans:400,400italic' => 'Ropa Sans',
    'Squada+One' => 'Squada One',
    'Tangerine:400,700' => 'Tangerine',
    'Ubuntu:400,400italic,500,700' => 'Ubuntu',
    'Varela+Round' => 'Varela Round',
    'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz',
);

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-font-family-Primary'] = 'Ubuntu:400,400italic,500,700';
$photo_magic_customizer_defaults['photo-magic-font-family-site-identity'] = 'Lato:400,300,400italic,900,700';
$photo_magic_customizer_defaults['photo-magic-font-family-heading'] = 'Lato:400,300,400italic,900,700';
$photo_magic_customizer_defaults['photo-magic-font-family-title'] = 'Lato:400,300,400italic,900,700';


/*section*/
$photo_magic_sections['photo-magic-family'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Font Family', 'photo-magic' ),
    );

$photo_magic_settings_controls['photo-magic-font-family-site-identity'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-font-family-site-identity'],
            
        ),
        'control' => array(
            'label'                 => __( 'Site Identity/Logo', 'photo-magic' ),
            'description'           => __( 'Site Identity font family', 'photo-magic' ),
            'section'               => 'photo-magic-family',
            'type'                  => 'select',
            'choices'               => $photo_magic_google_fonts,
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
    
$photo_magic_settings_controls['photo-magic-font-family-title'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-font-family-title'],
            
        ),
        'control' => array(
            'label'                 => __( 'Section Title', 'photo-magic' ),
            'description'           => __('section title font will be changed', 'photo-magic'),
            'section'               => 'photo-magic-family',
            'type'                  => 'select',
            'choices'               => $photo_magic_google_fonts,
            'priority'              => 20,
            'active_callback'       => ''
        )
    );