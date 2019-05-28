<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function photo_magic_widgets_init() {
	register_sidebar( array(
		'name'          =>  esc_html__( 'Sidebar', 'photo-magic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    $photo_magic_get_all_options = photo_magic_get_all_options(1);
    $photo_magic_footer_widgets_number = $photo_magic_get_all_options['photo-magic-footer-sidebar-number'];

    if( $photo_magic_footer_widgets_number > 0 ){
        register_sidebar(array(
            'name' => __('Footer Column One', 'photo-magic'),
            'id' => 'footer-col-one',
            'description' => __('Displays items on footer section.','photo-magic'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        if( $photo_magic_footer_widgets_number > 1 ){
            register_sidebar(array(
                'name' => __('Footer Column Two', 'photo-magic'),
                'id' => 'footer-col-two',
                'description' => __('Displays items on footer section.','photo-magic'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
        if( $photo_magic_footer_widgets_number > 2 ){
            register_sidebar(array(
                'name' => __('Footer Column Three', 'photo-magic'),
                'id' => 'footer-col-three',
                'description' => __('Displays items on footer section.','photo-magic'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
        if( $photo_magic_footer_widgets_number > 3 ){
            register_sidebar(array(
                'name' => __('Footer Column Four', 'photo-magic'),
                'id' => 'footer-col-four',
                'description' => __('Displays items on footer section.','photo-magic'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
    }
}
add_action( 'widgets_init', 'photo_magic_widgets_init' );

