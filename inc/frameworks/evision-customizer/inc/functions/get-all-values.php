<?php
if ( ! function_exists( 'evision_customizer_get_all_values' ) ) :
    /**
     * Function to get all value
     *
     * @access public
     * @since 1.0.0
     *
     * @param string $evision_customizer_name
     * @return array || other values
     *
     */
    function evision_customizer_get_all_values( $evision_customizer_name_args = null ){
        if( $evision_customizer_name_args ){
            $evision_customizer_name = $evision_customizer_name_args;
        }
        elseif(defined('EVISION_CUSTOMIZER_NAME')){
            $evision_customizer_name = EVISION_CUSTOMIZER_NAME;
        }
        else{
            $evision_customizer_name = 'evision_customizer_options';
        }

        if (defined('EVISION_CUSTOMIZER_OPTION_MODE') && EVISION_CUSTOMIZER_OPTION_MODE == 1 ) {
            $customizer_values = get_option( $evision_customizer_name);
        }
        else{
            $customizer_values = get_theme_mod( $evision_customizer_name );
        }

        return $customizer_values;
    }
endif;