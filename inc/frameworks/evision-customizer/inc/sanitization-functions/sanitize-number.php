<?php
if ( ! function_exists( 'evision_customizer_sanitize_number' ) ) :
    /**
     * Function to sanitize number
     *
     * @access public
     * @since 1.1
     *
     * @param $input
     * @param $setting
     * @return int || float || numeric value
     *
     */
    function evision_customizer_sanitize_number ( $input, $setting ) {
        $sanitized_text = sanitize_text_field( $input );

        // If the input is an number, return it; otherwise, return the default
        return ( is_numeric( $sanitized_text ) ? $sanitized_text : $setting->default );
    }
endif;