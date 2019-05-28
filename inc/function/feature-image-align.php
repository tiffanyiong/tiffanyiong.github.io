<?php
if( ! function_exists( 'photo_magic_single_post_image_align' ) ) :
    /**
     * photo-magic default layout function
     *
     * @since  photo-magic 0.1.0
     *
     * @param int
     * @return string
     */
    function photo_magic_single_post_image_align( $post_id = null ){
        global $photo_magic_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $photo_magic_single_post_image_align = $photo_magic_customizer_all_values['photo-magic-single-post-image-align'];
        $photo_magic_single_post_image_align_meta = get_post_meta( $post_id, 'photo-magic-single-post-image-align', true );

        if( false != $photo_magic_single_post_image_align_meta ) {
            $photo_magic_single_post_image_align = $photo_magic_single_post_image_align_meta;
        }
        return $photo_magic_single_post_image_align;
    }
endif;