<?php
/**
 * photo-magic Custom Metabox
 *
 * @package photo-magic
 */
$photo_magic_post_types = array(
    'post',
    'page'
);

add_action('add_meta_boxes', 'photo_magic_add_layout_metabox');
function photo_magic_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option('page_on_front');
    if( $post->ID == $frontpage_id ){
        return;
    }

    global $photo_magic_post_types;
    foreach ( $photo_magic_post_types as $post_type ) {
        add_meta_box(
            'photo_magic_layout_options', // $id
            __( 'Layout options', 'photo-magic' ), // $title
            'photo_magic_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* photo-magic sidebar layout */
$photo_magic_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
    )
);
/* photo-magic featured layout */
$photo_magic_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => __( 'Full', 'photo-magic' )
    ),
);

function photo_magic_layout_options_callback() {

    global $post , $photo_magic_default_layout_options, $photo_magic_single_post_image_align_options;
    $photo_magic_customizer_saved_values = photo_magic_get_all_options(1);

    /*photo-magic-single-post-image-align*/
    $photo_magic_single_post_image_align = $photo_magic_customizer_saved_values['photo-magic-single-post-image-align'];

    /*photo-magic default layout*/
    $photo_magic_single_sidebar_layout = $photo_magic_customizer_saved_values['photo-magic-default-layout'];

    wp_nonce_field( basename( __FILE__ ), 'photo_magic_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php _e( 'Choose Sidebar Template', 'photo-magic' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $photo_magic_single_sidebar_layout_meta = get_post_meta( $post->ID, 'photo-magic-default-layout', true );
                if( false != $photo_magic_single_sidebar_layout_meta ){
                   $photo_magic_single_sidebar_layout = $photo_magic_single_sidebar_layout_meta;
                }
                foreach ($photo_magic_default_layout_options as $field) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="photo-magic-default-layout"
                               value="<?php echo esc_attr( $field['value'] ); ?>"
                            <?php checked( $field['value'], $photo_magic_single_sidebar_layout ); ?>/>
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'photo-magic' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php _e( 'here', 'photo-magic' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php _e( 'Featured Image Alignment', 'photo-magic' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $photo_magic_single_post_image_align_meta = get_post_meta( $post->ID, 'photo-magic-single-post-image-align', true );
                if( false != $photo_magic_single_post_image_align_meta ){
                    $photo_magic_single_post_image_align = $photo_magic_single_post_image_align_meta;
                }
                foreach ($photo_magic_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="photo-magic-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $photo_magic_single_post_image_align ); ?>/>
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function photo_magic_save_sidebar_layout( $post_id ) {
    global $post;
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'photo_magic_layout_options_nonce' ] ) || !wp_verify_nonce( $_POST[ 'photo_magic_layout_options_nonce' ], basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['photo-magic-default-layout'])){
        $old = get_post_meta( $post_id, 'photo-magic-default-layout', true);
        $new = sanitize_text_field($_POST['photo-magic-default-layout']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'photo-magic-default-layout', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'photo-magic-default-layout', $old);
        }
    }

    /*image align*/
    if(isset($_POST['photo-magic-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'photo-magic-single-post-image-align', true);
        $new = sanitize_text_field($_POST['photo-magic-single-post-image-align']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'photo-magic-single-post-image-align', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'photo-magic-single-post-image-align', $old);
        }
    }
}
add_action('save_post', 'photo_magic_save_sidebar_layout');
