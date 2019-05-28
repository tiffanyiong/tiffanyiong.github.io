<?php
if ( ! function_exists( 'photo_magic_posts_navigation' ) ) :

    /**
     * Posts navigation options
     *
     * @since  photo magic 1.0.0
     *
     * @param null
     * @return int
     */
    function photo_magic_posts_navigation() {
        global $photo_magic_customizer_all_values;
        $photo_magic_pagination_options = $photo_magic_customizer_all_values['photo-magic-pagination-options'];

        switch ( $photo_magic_pagination_options ) {
            case 'default':
                the_posts_navigation();
            break;

            case 'numeric':
                if ( function_exists( 'wp_pagenavi' ) ) {
                    wp_pagenavi();
                } else {
                    the_posts_pagination();
                }
            break;

            default:
            break;
        }

    }
endif;
add_action( 'photo_magic_action_posts_navigation', 'photo_magic_posts_navigation' );