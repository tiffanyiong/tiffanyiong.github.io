<?php
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_customizer_defaults;

/*defaults values*/
$photo_magic_customizer_defaults['photo-magic-site-identity-color'] = '#fff';
$photo_magic_customizer_defaults['photo-magic-footer-background-color'] = '#323044';
$photo_magic_customizer_defaults['photo-magic-bredcrumb-background-color'] = '#333333';
$photo_magic_customizer_defaults['photo-magic-menu-color'] = '#fff';
$photo_magic_customizer_defaults['photo-magic-primary-color'] = '#6A2D8A';
$photo_magic_customizer_defaults['photo-magic-primary-hover-color'] = '#ffa800';
$photo_magic_customizer_defaults['photo-magic-banner-text-color'] = '#fff';
$photo_magic_customizer_defaults['photo-magic-title-color'] = '#000';
$photo_magic_customizer_defaults['photo-magic-body-text-color'] = '#313131';
$photo_magic_customizer_defaults['photo-magic-link-color'] = '#ffa800';
$photo_magic_customizer_defaults['photo-magic-button-backgorund-color'] = '#ffa800';
$photo_magic_customizer_defaults['photo-magic-button-text-color'] = '#000';


$photo_magic_customizer_defaults['photo-magic-color-reset'] = '';

/**
 * Reset color settings to default
 *
 * @since photo-magic 1.0
 */
if ( ! function_exists( 'photo_magic_color_reset' ) ) :
    function photo_magic_color_reset( ) {
        
            global $photo_magic_customizer_saved_values;
           $photo_magic_customizer_saved_values = photo_magic_get_all_options();
        if ( $photo_magic_customizer_saved_values['photo-magic-color-reset'] == 1 ) {
            global $photo_magic_customizer_defaults;
            global $photo_magic_customizer_saved_values;
            /*getting fields*/

            /*setting fields */
            $photo_magic_customizer_saved_values['photo-magic-site-identity-color'] = $photo_magic_customizer_defaults['photo-magic-site-identity-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-footer-background-color'] = $photo_magic_customizer_defaults['photo-magic-footer-background-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-bredcrumb-background-color'] = $photo_magic_customizer_defaults['photo-magic-bredcrumb-background-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-menu-color'] = $photo_magic_customizer_defaults['photo-magic-menu-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-primary-color'] = $photo_magic_customizer_defaults['photo-magic-primary-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-primary-hover-color'] = $photo_magic_customizer_defaults['photo-magic-primary-hover-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-banner-text-color'] = $photo_magic_customizer_defaults['photo-magic-banner-text-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-title-color'] = $photo_magic_customizer_defaults['photo-magic-title-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-body-text-color'] = $photo_magic_customizer_defaults['photo-magic-body-text-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-link-color'] = $photo_magic_customizer_defaults['photo-magic-link-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-button-backgorund-color'] = $photo_magic_customizer_defaults['photo-magic-button-backgorund-color'] ;
            $photo_magic_customizer_saved_values['photo-magic-button-text-color'] = $photo_magic_customizer_defaults['photo-magic-button-text-color'] ;

            remove_theme_mod( 'background_color' );
            $photo_magic_customizer_saved_values['photo-magic-color-reset'] = '';
            /*resetting fields*/
            photo_magic_reset_options( $photo_magic_customizer_saved_values );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','photo_magic_color_reset' );

$photo_magic_settings_controls['photo-magic-footer-background-color'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-footer-background-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Footer Background Color', 'photo-magic' ),
            'description'           =>  __( 'change the background color of Footer', 'photo-magic' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-site-identity-color'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-site-identity-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Site Identity Color', 'photo-magic' ),
            'description'           =>  __( 'Site title and tagline color', 'photo-magic' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$photo_magic_settings_controls['photo-magic-banner-text-color'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-banner-text-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Banner Text Color', 'photo-magic' ),
            'description'           =>  __( 'Change the color of text over the banner image', 'photo-magic' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 40,
            'active_callback'       => ''
        )
    );
