<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
// $photo_magic_customizer_defaults['photo-magic-default-banner-image'] = '';
$photo_magic_customizer_defaults['photo-magic-default-layout'] = 'right-sidebar';
$photo_magic_customizer_defaults['photo-magic-single-post-image-align'] = 'full';
$photo_magic_customizer_defaults['photo-magic-excerpt-length'] = '50';
$photo_magic_customizer_defaults['photo-magic-archive-layout'] = 'thumbnail-and-excerpt';
$photo_magic_customizer_defaults['photo-magic-archive-image-align'] = 'full';

$photo_magic_sections['photo-magic-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Layout Options', 'photo-magic' ),
        'panel'          => 'photo-magic-theme-options',
    );

/*layout-options option responsive lodader start*/
/*creating setting control for photo-magic-layout-options start*/
// $photo_magic_settings_controls['photo-magic-default-banner-image'] =
//     array(
//         'setting' =>     array(
//             'default'              => $photo_magic_customizer_defaults['photo-magic-default-banner-image'],
//         ),
//         'control' => array(
//             'label'                 =>  __( 'Default Banner Image', 'photo-magic' ),
//             'description'           =>  __( 'Please note that if you remove this image default banner image will appear', 'photo-magic' ),
//             'section'               => 'photo-magic-layout-options',
//             'type'                  => 'image',
//             'priority'              => 20,
//         )
//     );

$photo_magic_settings_controls['photo-magic-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-default-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Layout', 'photo-magic' ),
            'description'           =>  __( 'Please note that this section can be overridden for individual page/posts', 'photo-magic' ),
            'section'               => 'photo-magic-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'photo-magic' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'photo-magic' ),
                'no-sidebar' => __( 'No Sidebar', 'photo-magic' )
            ),
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

    $photo_magic_settings_controls['photo-magic-excerpt-length'] =
        array(
            'setting' =>     array(
                'default'              => $photo_magic_customizer_defaults['photo-magic-excerpt-length'],
            ),
            'control' => array(
                'label'                 =>  __( 'Excerpt Length (in words)', 'photo-magic' ),
                'section'               => 'photo-magic-layout-options',
                'type'                  => 'number',
                'priority'              => 40,
            )
        );

        $photo_magic_settings_controls['photo-magic-archive-layout'] =
            array(
                'setting' =>     array(
                    'default'              => $photo_magic_customizer_defaults['photo-magic-archive-layout'],
                ),
                'control' => array(
                    'label'                 =>  __( 'Archive Layout', 'photo-magic' ),
                    'section'               => 'photo-magic-layout-options',
                    'type'                  => 'select',
                    'choices'               => array(
                        'thumbnail-and-excerpt' => __( 'Thumbnail and Excerpt', 'photo-magic' ),
                        'full-post' => __( 'Full Post', 'photo-magic' ),
                    ),
                    'priority'              => 55,
                )
            );