<?php
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

$photo_magic_customizer_defaults['photo-magic-home-portfolio-category'] = 0;

/*options*/
$photo_magic_sections['photo-magic-home-portfolio-category-select'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Select Category', 'photo-magic' ),
        'panel'          => 'photo-magic-home-portfolio-panel',
    );
    
$photo_magic_repeated_settings_controls['photo-magic-home-portfolio-category'] =
    array(
        'repeated' => 2,
        'photo-magic-home-portfolio-category-ids' => array(
            'setting' =>     array(
                'default'              => $photo_magic_customizer_defaults['photo-magic-home-portfolio-category'],

            ),
            'control' => array(
                'label'                 =>  __( 'Select Category For Portfolio %s', 'photo-magic' ),
                'description'           =>  __( 'Portfolio will only displayed from this category', 'photo-magic' ),
                'section'               => 'photo-magic-home-portfolio-category-select',
                'type'                  => 'category_dropdown',
                'priority'              => 60,
                'active_callback'       => ''
            )
        ),
        'photo-magic-home-portfolio-category-divider' => array(
            'control' => array(
                'section'               => 'photo-magic-home-portfolio-category-select',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );