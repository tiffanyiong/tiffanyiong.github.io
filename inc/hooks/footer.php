<?php
if ( ! function_exists( 'photo_magic_footer_start' ) ) :
    /**
     * Footer content
     *
     * @since Photo Magic 0.1.0
     *
     * @param null
     * @return false | void
     *
     */
    function photo_magic_footer_start() { ?>
        </div><!-- #content -->
        <footer class="wrapper wrap-footer">
            <!-- wrap top footer -->
            <?php
            if ( has_nav_menu( 'social' ) ) { ?>                
                <section class="wrapper wrap-top-footer">
                <div class="container">
                    <div class="social-widget evision-social-section social-icon-only top-tooltip">
                        <?php
                            wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span>',
                                'link_after'=>'</span>' , 'menu_id' => 'primary-menu','fallback_cb' => false, ) );
                        ?>
                    </div>
                </div>  
                </section>
            <?php } ?>
   <?php  }
endif;
add_action( 'photo_magic_action_after_content', 'photo_magic_footer_start', 10 );

if ( ! function_exists( 'photo_magic_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since Photo Magic 0.1.0
     *
     * @param null
     * @return false | void
     *
     */
    function photo_magic_before_footer() {
        global $photo_magic_customizer_all_values;
        $photo_magic_footer_widgets_number = $photo_magic_customizer_all_values['photo-magic-footer-sidebar-number'];
        if( $photo_magic_footer_widgets_number <= 0 ){
            return false;
        }
        if( !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) && !is_active_sidebar( 'footer-col-four' )){
            return false;
        }
        if( 1 == $photo_magic_footer_widgets_number ){
                $col = 'col-md-12';
            }
        elseif( 2 == $photo_magic_footer_widgets_number ){
            $col = 'col-md-6';
        }
        elseif( 3 == $photo_magic_footer_widgets_number ){
            $col = 'col-md-4';
        }
        elseif( 4 == $photo_magic_footer_widgets_number ){
            $col = 'col-md-3';
        }
        else{
            $col = 'col-md-3';
        }
        ?>
        <!-- *****************************************
             Footer before section
    ****************************************** -->
    <section class="wrapper footer-widget">
		<div class="container">
			<div class="row">
                <?php if( is_active_sidebar( 'footer-col-one' ) && $photo_magic_footer_widgets_number > 0 ) : ?>
                    <div class="col-xs-12 col-sm-6 <?php echo esc_attr( $col );?>">
                        <?php dynamic_sidebar( 'footer-col-one' ); ?>
                    </div>
                <?php endif; ?>
                <?php if( is_active_sidebar( 'footer-col-two' ) && $photo_magic_footer_widgets_number > 1 ) : ?>
                    <div class="col-xs-12 col-sm-6 <?php echo esc_attr( $col );?>">
                        <?php dynamic_sidebar( 'footer-col-two' ); ?>
                    </div>
                <?php endif; ?>
                <?php if( is_active_sidebar( 'footer-col-three' ) && $photo_magic_footer_widgets_number > 2 ) : ?>
                    <div class="col-xs-12 col-sm-6 <?php echo esc_attr( $col );?>">
                        <?php dynamic_sidebar( 'footer-col-three' ); ?>
                    </div>
                <?php endif; ?>
                <?php if( is_active_sidebar( 'footer-col-four' ) && $photo_magic_footer_widgets_number > 3 ) : ?>
                    <div class="col-xs-12 col-sm-6 <?php echo esc_attr( $col );?>">
                        <?php dynamic_sidebar( 'footer-col-four' ); ?>
                    </div>
                <?php endif; ?>
			</div>
			</div>
		</div>
	</section>
        <!-- *****************************************
                 Footer before section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'photo_magic_action_before_footer', 'photo_magic_before_footer', 10 );

if ( ! function_exists( 'photo_magic_footer' ) ) :
    /**
     * Footer content
     *
     * @since Photo Magic 0.1.0
     *
     * @param null
     * @return null
     *
     */
    function photo_magic_footer() {
        global $photo_magic_customizer_all_values;
        ?>
            <!-- footer site info -->
            <section id="colophon" class="wrapper site-footer" role="contentinfo">
                <div class="container site-info">
                    <?php
                    if(isset($photo_magic_customizer_all_values['photo-magic-copyright-text'])){
                        echo wp_kses_post( $photo_magic_customizer_all_values['photo-magic-copyright-text'] );
                    }
                    ?>
                    <?php
                     if( 1 == $photo_magic_customizer_all_values['photo-magic-enable-theme-name']){
                        ?>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'photo-magic' ),  __('Photo Magic','photo-magic'), '<a href="http://evisionthemes.com/" target = "_blank" rel="designer">eVisionThemes </a>' ); ?>
                    <?php
                    }
                    ?>
                </div><!-- .site-info -->
            </section><!-- #colophon -->
        </footer>
        <!-- *****************************************
                 Footer section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'photo_magic_action_footer', 'photo_magic_footer', 10 );

if ( ! function_exists( 'photo_magic_page_end' ) ) :
    /**
     * Page end
     *
     * @since Photo Magic 0.1.0
     *
     * @param null
     * @return null
     *
     */
    function photo_magic_page_end() {
        global $photo_magic_customizer_all_values;
        if( isset( $photo_magic_customizer_all_values['photo-magic-enable-back-to-top'] )  && 1 == $photo_magic_customizer_all_values['photo-magic-enable-back-to-top']) {
        ?>
            <a id="gotop" class="evision-back-to-top" href="#page"><i class="fa fa-angle-up"></i></a>
        <?php
        }
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'photo_magic_action_after_footer', 'photo_magic_page_end', 10 );