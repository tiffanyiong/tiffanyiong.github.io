<?php
/**
 * evision themes Theme Customizer
 *
 * @package eVision themes
 * @subpackage Photo Magic
 * @since Photo Magic 0.1.0
 */
/*Define Url for including css and js*/
if ( !defined( 'EVISION_CUSTOMIZER_URL' ) ) {
    define( 'EVISION_CUSTOMIZER_URL', trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/evision-customizer/' );
}
/*Define path for including php files*/
if ( !defined( 'EVISION_CUSTOMIZER_PATH' ) ) {
    define( 'EVISION_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'inc/frameworks/evision-customizer/' );
}

/*define constant for evision customizer name*/
if(!defined('EVISION_CUSTOMIZER_NAME')){
    define( 'EVISION_CUSTOMIZER_NAME', 'photo_magic_options' );
}

/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since photo-magic 1.0
 */
if ( ! function_exists( 'photo_magic_reset_options' ) ) :
    function photo_magic_reset_options( $reset_options ) {
        set_theme_mod( EVISION_CUSTOMIZER_NAME, $reset_options );
    }
endif;

/**
 * Customizer framework added.
 */
require get_template_directory() . '/inc/frameworks/evision-customizer/evision-customizer.php';
global $photo_magic_panels;
global $photo_magic_sections;
global $photo_magic_settings_controls;
global $photo_magic_repeated_settings_controls;
global $photo_magic_customizer_defaults;

/******************************************
Modify Site Color Options
 *******************************************/
require get_template_directory().'/inc/customizer/color/color-section.php';

/******************************************
Modify Site Font Options
 *******************************************/
require get_template_directory().'/inc/customizer/font/font-section.php';

/******************************************
Modify Slider Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/main-slider-section/panel.php';

/******************************************
Modify featured Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/featured-section/panel.php';

/******************************************
Modify featured Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/home-portfolio/home-portfolio-panel.php';

/******************************************
Modify Blog Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/blog-section/blog.php';

/******************************************
Modify Theme Option Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/theme-option/option-panel.php';



/*Resetting all Values*/
/**
 * Reset color settings to default
 *
 * @since business-click 1.0.0
 */
global $photo_magic_customizer_defaults;
$photo_magic_customizer_defaults['photo-magic-customizer-reset-settings'] = '';
if ( ! function_exists( 'photo_magic_customizer_reset' ) ) :
    function photo_magic_customizer_reset( ) {
        global $photo_magic_customizer_saved_values;
        $photo_magic_customizer_saved_values = photo_magic_get_all_options();
        if ( $photo_magic_customizer_saved_values['photo-magic-customizer-reset-settings'] == 1 ) {
            global $photo_magic_customizer_defaults;
            /*getting fields*/
            $photo_magic_customizer_defaults['photo-magic-customizer-reset-settings'] = '';
            /*resetting fields*/
            photo_magic_reset_options( $photo_magic_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','photo_magic_customizer_reset' );




add_action( 'customize_save_after','photo_magic_customizer_reset' );

$photo_magic_sections['photo-magic-customizer-reset'] =
    array(
        'priority'       => 999,
        'title'          => __( 'Reset All Options', 'photo-magic' )
    );
$photo_magic_settings_controls['photo-magic-customizer-reset-settings'] =
    array(
        'setting' =>     array(
            'default'              => $photo_magic_customizer_defaults['photo-magic-customizer-reset-settings'],
            'sanitize_callback'    => 'evision_customizer_sanitize_checkbox',
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  __( 'Reset All Options', 'photo-magic' ),
            'description'           =>  __( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects. ', 'photo-magic' ),
            'section'               => 'photo-magic-customizer-reset',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/******************************************
Aranging header image
 *******************************************/

$photo_magic_sections['custom_css'] =
    array(
        'title'          => __( 'Additional CSS', 'photo-magic' ),
        'priority'       => 400,
    );

$photo_magic_customizer_args = array(
    'panels'            => $photo_magic_panels, /*always use key panels */
    'sections'          => $photo_magic_sections,/*always use key sections*/
    'settings_controls' => $photo_magic_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $photo_magic_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function photo_magic_add_panels_sections_settings() {
    global $photo_magic_customizer_args;
    return $photo_magic_customizer_args;
}
add_filter( 'evision_customizer_panels_sections_settings', 'photo_magic_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function photo_magic_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'photo_magic_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function photo_magic_customize_preview_js() {
    wp_enqueue_script( 'photo_magic_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'photo_magic_customize_preview_js' );


/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since photo-magic 1.0
 */
if ( ! function_exists( 'photo_magic_get_all_options' ) ) :
    function photo_magic_get_all_options( $merge_default = 0 ) {
        $photo_magic_customizer_saved_values = evision_customizer_get_all_values( EVISION_CUSTOMIZER_NAME );
        if( 1 == $merge_default ){
            global $photo_magic_customizer_defaults;
            if(is_array( $photo_magic_customizer_saved_values )){
                $photo_magic_customizer_saved_values = array_merge($photo_magic_customizer_defaults, $photo_magic_customizer_saved_values );
            }
            else{
                $photo_magic_customizer_saved_values = $photo_magic_customizer_defaults;
            }
        }
        return $photo_magic_customizer_saved_values;
    }
endif;
