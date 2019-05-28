<?php
if ( ! function_exists( 'photo_magic_set_global' ) ) :
/**
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_set_global() {
    $GLOBALS['photo_magic_customizer_all_values'] = photo_magic_get_all_options(1);
}
endif;
add_action( 'photo_magic_action_before_head', 'photo_magic_set_global', 0 );

if ( ! function_exists( 'photo_magic_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_doctype() {
    ?>
    <!DOCTYPE html><html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'photo_magic_action_before_head', 'photo_magic_doctype', 10 );

if ( ! function_exists( 'photo_magic_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_before_wp_head() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
}
endif;
add_action( 'photo_magic_action_before_wp_head', 'photo_magic_before_wp_head', 10 );

if( ! function_exists( 'photo_magic_default_layout' ) ) :
    /**
     * photo-magic default layout function
     *
     * @since  photo-magic 0.1.0
     *
     * @param int
     * @return string
     */
    function photo_magic_default_layout( $post_id = null ){

        global $photo_magic_customizer_all_values,$post;
        $photo_magic_default_layout = $photo_magic_customizer_all_values['photo-magic-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $photo_magic_default_layout_meta = get_post_meta( $post_id, 'photo-magic-default-layout', true );

        if( false != $photo_magic_default_layout_meta ) {
            $photo_magic_default_layout = $photo_magic_default_layout_meta;
        }
        return $photo_magic_default_layout;
    }
endif;

if ( ! function_exists( 'photo_magic_body_class' ) ) :
/**
 * add body class
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_body_class( $photo_magic_body_classes ) {
    $photo_magic_default_layout = photo_magic_default_layout();
    if( !empty( $photo_magic_default_layout ) ){
        if( 'left-sidebar' == $photo_magic_default_layout ){
            $photo_magic_body_classes[] = 'evision-left-sidebar';
        }
        elseif( 'right-sidebar' == $photo_magic_default_layout ){
            $photo_magic_body_classes[] = 'evision-right-sidebar';
        }
        elseif( 'both-sidebar' == $photo_magic_default_layout ){
            $photo_magic_body_classes[] = 'evision-both-sidebar';
        }
        elseif( 'no-sidebar' == $photo_magic_default_layout ){
            $photo_magic_body_classes[] = 'evision-no-sidebar';
        }
        else{
            $photo_magic_body_classes[] = 'evision-right-sidebar';
        }
    }
    else{
        $photo_magic_body_classes[] = 'evision-right-sidebar';
    }
    return $photo_magic_body_classes;
}
endif;
add_action( 'body_class', 'photo_magic_body_class', 10, 1);

if ( ! function_exists( 'photo_magic_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_before_page_start() {
    /*intro loader*/
}
endif;
add_action( 'photo_magic_action_before', 'photo_magic_before_page_start', 10 );

if ( ! function_exists( 'photo_magic_page_start' ) ) :
/**
 * page start
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_page_start() {
?>
    <div id="page" class="hfeed site">
<?php
}
endif;
add_action( 'photo_magic_action_before', 'photo_magic_page_start', 15 );

if ( ! function_exists( 'photo_magic_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'photo-magic' ); ?></a>
<?php
}
endif;
add_action( 'photo_magic_action_before_header', 'photo_magic_skip_to_content', 10 );

if ( ! function_exists( 'photo_magic_header' ) ) :
/**
 * Main header
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_header() {
/*header goes here  */
global $photo_magic_customizer_all_values;
$photo_magic_slider_off = 'no-slider';
?>
<header id="masthead" class="wrapper wrap-head site-header" role="banner">
    <div class="wrapper wrapper-site-identity <?php if ($photo_magic_customizer_all_values['photo-magic-feature-slider-enable'] != 1)
{
    echo esc_attr( $photo_magic_slider_off );
} ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="site-branding">
                        <?php photo_magic_the_custom_logo(); ?>
                        <?php
                        if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                        endif;

                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                        <?php
                        endif; ?>
                    </div><!-- .site-branding -->
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="nav-holder">
                        <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                        <div id="site-header-menu" class="site-header-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <button id="menu-toggle-close" class="menu-toggle" aria-controls="primary-menu"><i class="fa fa-close fa-2x"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="primary-menu">
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'menu_id'        => 'primary-menu',
                                                'menu_class'     => 'primary-menu',
                                            ) );
                                        ?>
                                        </nav><!-- #site-navigation -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- site-header-menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
endif;
add_action( 'photo_magic_action_header', 'photo_magic_header', 10 );


if( ! function_exists( 'photo_magic_main_slider_setion' ) ) :
/**
 * Main slider
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
    function photo_magic_main_slider_setion(){
        if (  is_front_page() && !is_home() ) {
        global $photo_magic_customizer_all_values;
            do_action('photo_magic_action_main_slider');
        }
        else {
            
        }
    }
endif;
add_action( 'photo_magic_action_on_header', 'photo_magic_main_slider_setion', 10 );

if ( ! function_exists( 'photo_magic_end_of_header' ) ) :
/**
 * Main Slider
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_end_of_header() { ?>
    </header><!-- #masthead -->
<?php }
endif;
add_action( 'photo_magic_action_header_close', 'photo_magic_end_of_header', 10 );


if ( ! function_exists( 'photo_magic_content_start' ) ) :
/**
 * Main Slider
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_content_start() { ?>
    <div id="content" class="wrapper site-content">
<?php }
endif;
add_action( 'photo_magic_action_after', 'photo_magic_content_start', 10 );


if( ! function_exists( 'photo_magic_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
    function photo_magic_add_breadcrumb(){
        global $photo_magic_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $photo_magic_customizer_all_values['photo-magic-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb"><div class="container">';
         photo_magic_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'photo_magic_action_after_header', 'photo_magic_add_breadcrumb', 10 );


