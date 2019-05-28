<?php
if( ! function_exists( 'photo_magic_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  photo-magic 0.1.0
     *
     * @param null
     * @return int
     */
    function photo_magic_excerpt_length( $length ){
        global $photo_magic_customizer_all_values;
        $excerpt_length = $photo_magic_customizer_all_values['photo-magic-excerpt-length'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return esc_attr( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'photo_magic_excerpt_length', 999 );