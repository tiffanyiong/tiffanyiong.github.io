<?php
/**
 * Repeated value handling overrite
 * @param  array $reset_options
 * @return void
 *
 * @since photo-magic 1.0.2
 */
if ( ! function_exists( 'evision_customizer_get_repeated_all_value' ) ) :
    function evision_customizer_get_repeated_all_value ( $repeated, $repeated_saved_values_name ) {

        $evision_customizer_get_all_values = evision_customizer_get_all_values( );
        $get_repeated_all_value = array();
        for ( $i = 1; $i <= $repeated; $i++ ){
            foreach( $repeated_saved_values_name as $evision_repeated_saved_value_name ){
                if( isset($evision_customizer_get_all_values[$evision_repeated_saved_value_name.'_'.$i]) ){
                    $get_repeated_all_value[$i][$evision_repeated_saved_value_name] = $evision_customizer_get_all_values[$evision_repeated_saved_value_name.'_'.$i];
                }
            }
        }
        return $get_repeated_all_value;
    }
endif;