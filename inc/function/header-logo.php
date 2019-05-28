<?php
if ( ! function_exists( 'photo_magic_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Photo Magic 0.1.0
 */
function photo_magic_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;