<?php
/*I have added it through action so that it is flexible to the developer to adapt change*/
add_action('evision_customizer_add_setting_control','evision_customizer_add_setting_control_callback', 12, 5);

if ( ! function_exists( 'evision_customizer_add_setting_control_callback' ) ) :
    /**
     * Function to add customizer setting and controls
     *
     * @access public
     * @since 1.0.0
     *
     * @param object $evision_customizer_wp_customize
     * @param string $evision_customizer_customizer_name common name for all setting and controls
     * @param array $evision_customizer_basic_control_types
     * @param string $evision_customizer_setting_control_key
     * @param array $evision_customizer_settings_control
     * @return void
     *
     */
    function evision_customizer_add_setting_control_callback( $evision_customizer_wp_customize, $evision_customizer_customizer_name, $evision_customizer_basic_control_types, $evision_customizer_setting_control_key, $evision_customizer_settings_control ){
        $evision_customizer_wp_customize->add_setting( esc_attr( $evision_customizer_customizer_name.'['.$evision_customizer_setting_control_key.']' ), $evision_customizer_settings_control['setting']);

        $evision_customizer_control_field_type = $evision_customizer_settings_control['control']['type'];

        /*check if basic control types*/
        if ( in_array( $evision_customizer_control_field_type, $evision_customizer_basic_control_types ) ) {
            $evision_customizer_wp_customize->add_control( esc_attr( $evision_customizer_customizer_name.'['.$evision_customizer_setting_control_key.']' ), $evision_customizer_settings_control['control']);
        }
        else {
            /*Check for default WP_Customize_Custom_Control defined*/
            $evision_customizer_Explode_Customize_Custom_Control_class_name = explode('_', strtolower( $evision_customizer_control_field_type ));
            $evision_customizer_Ucfirst_Customize_Custom_Control_class_name_array = array_map('ucfirst', $evision_customizer_Explode_Customize_Custom_Control_class_name);
            $evision_customizer_Implode_Customize_Custom_Control_class_name = implode('_', $evision_customizer_Ucfirst_Customize_Custom_Control_class_name_array);

            $evision_customizer_New_Customize_Custom_Control_class_name = 'WP_Customize_'.$evision_customizer_Implode_Customize_Custom_Control_class_name.'_Control';
            $evision_customizer_customizer_class_exist = false;
            if ( class_exists( $evision_customizer_New_Customize_Custom_Control_class_name ) ) {
                $evision_customizer_customizer_class_exist = true;
            }
            else{
                $evision_customizer_New_Customize_Custom_Control_class_name = 'Evision_Customizer_'.$evision_customizer_Implode_Customize_Custom_Control_class_name.'_Control';
                if ( class_exists( $evision_customizer_New_Customize_Custom_Control_class_name ) ) {
                    $evision_customizer_customizer_class_exist = true;
                }
            }
            if($evision_customizer_customizer_class_exist){
                $evision_customizer_wp_customize->add_control(
                    new $evision_customizer_New_Customize_Custom_Control_class_name(
                        $evision_customizer_wp_customize,
                        esc_attr( $evision_customizer_customizer_name.'['.$evision_customizer_setting_control_key.']'),
                        $evision_customizer_settings_control['control']
                    )
                );
            }
            else {
                ?>

                  <script>
                    console.log('<?php echo esc_attr( $evision_customizer_New_Customize_Custom_Control_class_name ). "not found. Please create it."?>');
                </script>

            <?php
            }

        }
    }
endif;