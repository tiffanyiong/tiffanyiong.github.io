<?php
if( ! function_exists( 'photo_magic_wp_head' ) ) :
    /**
     * photo-magic wp_head hook
     *
     * @since  photo-magic 0.1.0
     */
    function photo_magic_wp_head(){
        global $photo_magic_customizer_all_values;
        global $photo_magic_google_fonts;
        $photo_magic_background_color = get_background_color();
        $photo_magic_footer_background_color = $photo_magic_customizer_all_values['photo-magic-footer-background-color'];
        $photo_magic_bredcrumb_background_color = $photo_magic_customizer_all_values['photo-magic-bredcrumb-background-color'];
        $photo_magic_site_identity_color_option = $photo_magic_customizer_all_values['photo-magic-site-identity-color'];
        $photo_magic_menu_color = $photo_magic_customizer_all_values['photo-magic-menu-color'];
        $photo_magic_primary_color = $photo_magic_customizer_all_values['photo-magic-primary-color'];
        $photo_magic_primary_hover_color = $photo_magic_customizer_all_values['photo-magic-primary-hover-color'];
        $photo_magic_banner_text_color = $photo_magic_customizer_all_values['photo-magic-banner-text-color'];
        $photo_magic_title_color = $photo_magic_customizer_all_values['photo-magic-title-color'];
        $photo_magic_body_text_color = $photo_magic_customizer_all_values['photo-magic-body-text-color'];
        $photo_magic_link_color = $photo_magic_customizer_all_values['photo-magic-link-color'];
        $photo_magic_button_backgorund_color = $photo_magic_customizer_all_values['photo-magic-button-backgorund-color'];
        $photo_magic_button_text_color = $photo_magic_customizer_all_values['photo-magic-button-text-color'];
       

       /*font settings*/
       $photo_magic_font_family_Primary = $photo_magic_google_fonts[$photo_magic_customizer_all_values['photo-magic-font-family-Primary']];
       $photo_magic_font_family_site_identity = $photo_magic_google_fonts[$photo_magic_customizer_all_values['photo-magic-font-family-site-identity']];
       $photo_magic_font_family_heading = $photo_magic_google_fonts[$photo_magic_customizer_all_values['photo-magic-font-family-heading']];
       $photo_magic_font_family_title = $photo_magic_google_fonts[$photo_magic_customizer_all_values['photo-magic-font-family-title']];
       
		/*inner banner image*/
        // $photo_magic_banner_image = $photo_magic_customizer_all_values['photo-magic-default-banner-image'];
        $photo_magic_banner_image = get_header_image();
        ?>
        <style type="text/css">
        /*=====COLOR OPTION=====*/

        /*Color*/
        /*----------------------------------*/
	        <?php 
        	/*background color*/
	        if( !empty($photo_magic_background_color) ){
	        ?>
	          html,body {
	            background-color: #<?php echo esc_html( $photo_magic_background_color );?>;
	          }
	        <?php
	        }
	        
	        /*photo-magic footer background color*/
	        if( !empty($photo_magic_footer_background_color) ){
	        ?>  
	            .wrap-footer {
	              background-color: <?php echo esc_html( $photo_magic_footer_background_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic breadcrumb background color*/
	        if( !empty($photo_magic_bredcrumb_background_color) ){
	        ?>  
	           	.wrap-breadcrumb {
	              background-color: <?php echo esc_html( $photo_magic_bredcrumb_background_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic site identity color option*/
	        if( !empty($photo_magic_site_identity_color_option) ){
	        ?>  
	            .site-header .wrapper-site-identity .site-title a,
            	.site-header .wrapper-site-identity .site-description {
	              color: <?php echo esc_html( $photo_magic_site_identity_color_option );?>;
	            }

	        <?php
	        }

	        /*photo-magic menu color*/
	        if( !empty($photo_magic_menu_color) ){
	        ?>  
	            @media screen and (min-width: 1200px){
		           .main-navigation ul li > a,
		           .main-navigation ul li > a:visited {
	                	color: <?php echo esc_html( $photo_magic_menu_color );?>;
	               }
	            }

	        <?php
	        }

	        /*photo-magic primary color*/
	        if( !empty($photo_magic_primary_color) ){
	        ?>  
		        .widget_calendar tbody a,
		        .widget_calendar tbody a:visited,
		        .evision-back-to-top, .evision-back-to-top:focus,
		        .evision-back-to-top:visited,
		        .widget .search-form .search-submit,
		        .widget .search-form .search-submit:focus,
		        .widget .search-form .search-submit:hover,
		        .wrapper-portfolio .da-thumbs li a div.content, .wrapper-portfolio .da-thumbs li a:visited div.content,
		        .wrapper-slider #slide-pager span.cycle-pager-active,
		        .wrapper-slider #slide-pager span:hover,
		        .radius-thumb-holder,
		        .radius-thumb-holder:before,
		        .radius-thumb-holder:hover:before,
		        .radius-thumb-holder:focus:before,
		        .radius-thumb-holder:active:before,
		        .wrapper-feature-portfolio .da-thumbs li a div.content,
		        .wrapper-feature-portfolio .da-thumbs li a:visited div.content {
		           background-color: <?php echo esc_html( $photo_magic_primary_color );?>;
		        }

	            .widget .widgettitle,
	            .widget .widget-title,
	            .wrapper-about{
	              border-color: <?php echo esc_html( $photo_magic_primary_color );?>;
	            }

	            .alt-title span, 
	            .alt-title .page-links a, 
	            .page-links .alt-title a{
	            	color: <?php echo esc_html( $photo_magic_primary_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic primary hover color*/
	        if( !empty($photo_magic_primary_hover_color) ){
	        ?>  
	            a:hover,
	            a:focus,
	            a:active,
	            h1 a:hover,
	            h1 a:focus,
	            h1 a:active,
	            h2 a:hover,
	            h2 a:focus,
	            h2 a:active,
	            h3 a:hover,
	            h3 a:focus,
	            h3 a:active,
	            h4 a:hover,
	            h4 a:focus,
	            h4 a:active,
	            h5 a:hover,
	            h5 a:focus,
	            h5 a:active,
	            h6 a:hover,
	            h6 a:focus,
	            h6 a:active,
	            .site-header .wrapper-site-identity .site-title a:hover,
	            .site-header .wrapper-site-identity .site-title a:focus,
	            .site-header .wrapper-site-identity .site-title a:active,
	            .contact-widget ul li a:hover,
	            .contact-widget ul li a:focus,
	            .contact-widget ul li a:active,
	            .contact-widget ul li a:hover i,
	            .contact-widget ul li a:focus i,
	            .contact-widget ul li a:active i,
	            .site-title a:hover,
	            .site-title a:focus,
	            .site-title a:active,
	            .wrapper-slider .slide-item .banner-title a:hover, 
	            .wrapper-slider .slide-item .banner-title a:focus, 
	            .wrapper-slider .slide-item .banner-title a:active, 
	            .wrapper-slider .slide-item .banner-title a:visited:hover,
	            .wrapper-slider .slide-item .banner-title a:visited:focus, 
	            .wrapper-slider .slide-item .banner-title a:visited:active,
	            .banner-title.alt-title span:hover,
	            .banner-title.alt-title span:focus,
	            .banner-title.alt-title span:active,
	            .banner-title.alt-title .page-links a:hover,
	            .banner-title.alt-title .page-links a:focus,
	            .banner-title.alt-title .page-links a:active,
	            .page-links .alt-title a:hover,
	            .page-links .alt-title a:focus,
	            .page-links .alt-title a:active,
	            .posted-on a:hover,
	            .posted-on a:focus,
	            .posted-on a:active,
	            .cat-links a:hover,
	            .cat-links a:focus,
	            .cat-links a:active,
	            .tags-links a:hover,
	            .tags-links a:focus,
	            .tags-links a:active,
	            .author a:hover,
	            .author a:focus,
	            .author a:active,
	            .comments-link a:hover,
	            .comments-link a:focus,
	            .comments-link a,
	            .edit-link a:hover,
	            .edit-link a:focus,
	            .edit-link a:active,
	            .nav-links .nav-previous a:hover,
	            .nav-links .nav-previous a:focus,
	            .nav-links .nav-previous a:active,
	            .nav-links .nav-next a:hover,
	            .nav-links .nav-next a:focus,
	            .nav-links .nav-next a:active,
	            .search-form .search-submit:hover,
	            .search-form .search-submit:focus,
	            .search-form .search-submit:active,
	            .widget li a:hover,
	            .widget li a:focus,
	            .widget li a:active,
	            .site-footer .site-info a:hover,
	            .site-footer .site-info a:focus,
	            .site-footer .site-info a:active{
	                color: <?php echo esc_html( $photo_magic_primary_hover_color );?>;
	              }

	              @media screen and (min-width: 1200px){
	                  .main-navigation a:hover, 
	                  .main-navigation a:focus, 
	                  .main-navigation a:active,
	                  .main-navigation a:visited:hover,
	                  .main-navigation a:visited:focus,
	                  .main-navigation a:visited:active,
	                  .main-navigation ul li a:hover,
	                  .main-navigation ul li a:focus,
	                  .main-navigation ul li a:active {
	                    color: <?php echo esc_html( $photo_magic_primary_hover_color );?>;
	                }
	              }

	              .wrapper-slider .controls #slide-prev i:hover, 
	              .wrapper-slider .controls #slide-prev i:focus, 
	              .wrapper-slider .controls #slide-prev i:active, 
	              .wrapper-slider .controls #slide-prev i:visited:hover, 
	              .wrapper-slider .controls #slide-prev i:visited:focus, 
	              .wrapper-slider .controls #slide-prev i:visited:active, 
	              .wrapper-slider .controls #slide-next i:hover, 
	              .wrapper-slider .controls #slide-next i:focus, 
	              .wrapper-slider .controls #slide-next i:active, 
	              .wrapper-slider .controls #slide-next i:visited:hover, 
	              .wrapper-slider .controls #slide-next i:visited:focus, 
	              .wrapper-slider .controls #slide-next i:visited:active
	              .wrapper-slider .slide-pager span:hover,
	              .widget_calendar tbody a:hover,
	              .widget_calendar tbody a:focus,
	              .widget_calendar tbody a:active,
	              .evision-back-to-top:hover,
	              .evision-back-to-top:focus,
	              .evision-back-to-top:active{
	                background-color:<?php echo esc_html( $photo_magic_primary_hover_color );?>;
	              }

	              .nav-links .nav-previous a:hover,
	              .nav-links .nav-previous a:focus,
	              .nav-links .nav-previous a:active,
	              .nav-links .nav-next a:hover,
	              .nav-links .nav-next a:focus,
	              .nav-links .nav-next a:active,
	              .comment-list .reply a:hover,
	              .comment-list .reply a:focus,
	              .comment-list .reply a:active{
	               border-color: <?php echo esc_html( $photo_magic_primary_hover_color );?>;
	              
	             }

	        <?php
	        }

	        /*photo-magic banner text color*/
	        if( !empty($photo_magic_banner_text_color) ){
	        ?>  
	            .wrapper-slider .slide-item .banner-title a,
	            .wrapper-slider .slide-item,
	            .page-inner-title .taxonomy-description,
	            .page-inner-title .entry-header .entry-title,
	            .wrap-breadcrumb,
	            .wrap-breadcrumb a,
	            .page-inner-title,
	            .page-inner-title .page-title,
	            .main-navigation ul ul a,
	            .main-navigation ul ul a:visited,
	            .bannerbg h2,
	            .wrapper-services .thumb-holder a i, 
	            .wrapper-services .thumb-holder a i:visited,
	            .bannerbg .content-area .content-text,
	            .bannerbg .content-area h2 a {
	               color: <?php echo esc_html( $photo_magic_banner_text_color );?>;
	            }

	            @media screen and (max-width: 1199px){
	            .main-navigation ul li a,
	            .main-navigation ul li a:visited {
	                color: <?php echo esc_html( $photo_magic_banner_text_color );?>;
	                }
	            }

	        <?php
	        }

	        /*photo-magic title color*/
	        if( !empty($photo_magic_title_color) ){
	        ?>  
	            h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title a,
	            .widget .widgettitle, .widget .widget-title{
	               color: <?php echo esc_html( $photo_magic_title_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic body text color*/
	        if( !empty($photo_magic_body_text_color) ){
	        ?>  
	            body, button, input, select, textarea {
	              color: <?php echo esc_html( $photo_magic_body_text_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic link color*/
	        if( !empty($photo_magic_link_color) ){
	        ?>  

	            .contact-widget ul li a,
	            .contact-widget ul li a i,
	            .posted-on a,
	            .cat-links a,
	            .tags-links a,
	            .author a,
	            .comments-link a,
	            .edit-link a,
	            .nav-links .nav-previous a,
	            .nav-links .nav-next a,
	            .search-form .search-submit,
	            .contact-widget ul li a:active,
	            .contact-widget ul li a:active i,
	            .posted-on a:active,
	            .cat-links a:active,
	            .tags-links a:active,
	            .author a:active,
	            .comments-link a:active,
	            .edit-link a:active,
	            .nav-links .nav-previous a:active,
	            .nav-links .nav-next a:active,
	            .search-form .search-submit:active,
	            .widget li a:active{
	            	color: <?php echo esc_html( $photo_magic_link_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic button backgorund color*/
	        if( !empty($photo_magic_button_backgorund_color) ){
	        ?>  

	            .button,
	            button,
	            html input[type="button"],
	            input[type="button"],
	            input[type="reset"],
	            input[type="submit"],
	            .button:visited,
	            button:visited,
	            html input[type="button"]:visited,
	            input[type="button"]:visited,
	            input[type="reset"]:visited,
	            input[type="submit"]:visited,
	            .search-form .search-submit,
	            .search-form .search-submit:visited,
	            .button:hover,
	            input[type="button"]:hover,
	            input[type="reset"]:hover,
	            input[type="submit"]:hover,
	            button:focus
	            input[type="button"]:focus,
	            input[type="reset"]:focus,
	            input[type="submit"]:focus,
	            button:active,
	            input[type="button"]:active,
	            input[type="reset"]:active,
	            input[type="submit"]:active,
	            .site-header .header-btn .button:hover{
	               background-color: <?php echo esc_html( $photo_magic_button_backgorund_color );?>;
	            }

	        <?php
	        }

	        /*photo-magic button text color*/
	        if( !empty($photo_magic_button_text_color) ){
	        ?>  
	            .button, button, html input[type="button"], input[type="button"], input[type="reset"], input[type="submit"], .button:visited, button:visited, html input[type="button"]:visited, input[type="button"]:visited, input[type="reset"]:visited, input[type="submit"]:visited  {
	              		color: <?php echo esc_html( $photo_magic_button_text_color );?>;
	            }

	        <?php
	        }

	        /*end of color options*/

	        /*=====FONT FAMILY OPTION=====*/
	        /*----------------------------------*/
	        /*photo-magic font family Primary*/
	        if( !empty($photo_magic_font_family_Primary) ){
	        ?> 
	            body,
                button,
                input,
                select,
                textarea,
                pre,
                code,
                kbd,
                tt,
                samp,
                var,
                .form-allowed-tags code,
                .wrapper-slider .slide-item .slider-title a {
	             	font-family: "<?php echo esc_html( $photo_magic_font_family_Primary ); ?>";
	            }
	        <?php
	        } 

	        /*photo-magic font family site identity*/
	        if( !empty($photo_magic_font_family_site_identity) ){
	        ?> 
	            .site-header .wrapper-site-identity .site-title a,
	            .site-header .wrapper-site-identity .site-description {
	             	font-family: "<?php echo esc_html( $photo_magic_font_family_site_identity ); ?>";
	            }
	        <?php
	        } 

	        /*photo-magic font family heading*/
	        if( !empty($photo_magic_font_family_heading) ){
	        ?> 
	            h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
	             	font-family: "<?php echo esc_html( $photo_magic_font_family_heading ); ?>";
	            }
	        <?php
	        } 

	        /*photo-magic font family section title*/
	        if( !empty($photo_magic_font_family_title) ){
	        ?> 
	            .title-section h2 {
	             	font-family: "<?php echo esc_html( $photo_magic_font_family_title ); ?>";
	            }
	        <?php
	        } 

	        /* Banner Image */
	        if( !empty( $photo_magic_banner_image ) ){
	        ?>
	        	.page-inner-title {
	         		background-image: url(<?php echo esc_url($photo_magic_banner_image);?>);
	        	}
	        <?php
	        }
	        // Bail if not WP 4.7.
	        if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	          $photo_magic_custom_css = $photo_magic_customizer_all_values['photo-magic-custom-css']; 
	          $photo_magic_custom_css_output = ''; 
	          if ( ! empty( $photo_magic_custom_css ) ) { 
	              $photo_magic_custom_css_output .= esc_textarea( $photo_magic_custom_css ) ; 
	          } 
	         echo $photo_magic_custom_css_output;/*escaping done above*/ 
	        } else {
	          $photo_magic_custom_css = $photo_magic_customizer_all_values['photo-magic-custom-css'];
	          // Bail if there is no Custom CSS.
	            if (!empty($photo_magic_custom_css)) {
	              $core_css = wp_get_custom_css();
	              $return = wp_update_custom_css_post( $core_css . $photo_magic_custom_css );
	              if ( ! is_wp_error( $return ) ) {
	                // Remove from theme.
	               $options = esc_textarea($photo_magic_customizer_all_values['photo-magic-custom-css']);
	                echo $options;
	              }
	            }
	          $photo_magic_custom_css = '';
	        }
	        ?>
        </style>
    <?php
    }
endif;
add_action( 'wp_head', 'photo_magic_wp_head' );