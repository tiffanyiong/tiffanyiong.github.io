<?php
/**
 * The template for displaying home page.
 * @package photo-magic
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
else{
	if (($photo_magic_customizer_all_values['photo-magic-home-featured-enable'] != 1) && 
		($photo_magic_customizer_all_values['photo-magic-home-portfolio-enable'] != 1 ) && 
		($photo_magic_customizer_all_values['photo-magic-blog-enable'] != 1 ) && 
		($photo_magic_customizer_all_values['photo-magic-feature-slider-enable'] != 1 )) {
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section class="wrapper display-info">
				<div class="container">
				<?php echo sprintf(
					__( 'All Section are based on page. Enable each Section from customizer for </br> slider: Home/Front Main Slider -> Setting Options -> Enable. likewise to other sections </br> %s', 'photo-magic' ),
					'<a class="button" href="' . esc_url( admin_url( 'customize.php' ) ) . '">' . __( 'click here', 'photo-magic' ) . '</a>'
					); ?>
				</div>
			</section>
		<?php }	
	}
	else{
	/**
	 * photo_magic_action_front_page hook
	 * @since photo-magic 0.1.0
	 *
	 * @hooked photo_magic_action_front_page -  10
	 * @sub_hooked photo_magic_action_front_page -  30
	 */
    // do_action('photo_magic_action_main_slider');

	do_action( 'photo_magic_action_front_page' );	
	}
	}
get_footer();