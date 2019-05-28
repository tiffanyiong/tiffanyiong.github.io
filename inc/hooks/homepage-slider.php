<?php
if ( ! function_exists( 'photo_magic_featured_slider_array' ) ) :
    /**
     * Featured Slider array creation
     *
     * @since photo-magic 0.1.0
     *
     * @param string $from_slider
     * @return array
     */
    function photo_magic_featured_slider_array( $from_slider ){
        global $photo_magic_customizer_all_values;
        $photo_magic_feature_slider_number = absint( $photo_magic_customizer_all_values['photo-magic-feature-slider-number'] );
        $photo_magic_feature_slider_single_words = absint( $photo_magic_customizer_all_values['photo-magic-fs-single-words'] );
        $repeated_page = array('photo-magic-feature-slider-pages-ids');
        $photo_magic_feature_slider_args = array();
        $photo_magic_feature_slider_contents_array = array();

        if ( 'from-category' ==  $from_slider ){
            $photo_magic_fs_category = $photo_magic_customizer_all_values['photo-magic-featured-slider-category'];
                $photo_magic_feature_slider_args =    array(
                    'post_type' => 'post',
                    'cat' => $photo_magic_fs_category,
                    'ignore_sticky_posts' => true
                );
        }
        else{
            $photo_magic_feature_slider_posts = evision_customizer_get_repeated_all_value(3 , $repeated_page);
            $photo_magic_feature_slider_posts_ids = array();
            if( null != $photo_magic_feature_slider_posts ) {
                foreach( $photo_magic_feature_slider_posts as $photo_magic_feature_slider_post ) {
                    if( 0 != $photo_magic_feature_slider_post['photo-magic-feature-slider-pages-ids'] ){
                        $photo_magic_feature_section_posts_ids[] = $photo_magic_feature_slider_post['photo-magic-feature-slider-pages-ids'];
                    }
                }

                if( !empty( $photo_magic_feature_section_posts_ids )){
                    $photo_magic_feature_slider_args =    array(
                        'post_type' => 'page',
                        'post__in' => $photo_magic_feature_section_posts_ids,
                        'posts_per_page' => $photo_magic_feature_slider_number,
                        'orderby' => 'post__in'
                    );
                }

            }
        }
        if( !empty( $photo_magic_feature_slider_args )){
            // the query
            $photo_magic_fature_section_post_query = new WP_Query( $photo_magic_feature_slider_args );

            if ( $photo_magic_fature_section_post_query->have_posts() ) :
                $i = 0;
                while ( $photo_magic_fature_section_post_query->have_posts() ) : $photo_magic_fature_section_post_query->the_post();
                    $url ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'photo-magic-main-slider' );
                        $url = $thumb['0'];
                    }
                    
                    $photo_magic_feature_slider_contents_array[$i]['photo-magic-fs-title'] = get_the_title();
                    if (has_excerpt()) {
                        $photo_magic_feature_slider_contents_array[$i]['photo-magic-fs-content'] = get_the_excerpt();
                    }
                    else {
                        $photo_magic_feature_slider_contents_array[$i]['photo-magic-fs-content'] = photo_magic_words_count( $photo_magic_feature_slider_single_words ,get_the_content());
                    }
                    $photo_magic_feature_slider_contents_array[$i]['photo-magic-fs-link'] = get_permalink();
                    $photo_magic_feature_slider_contents_array[$i]['photo-magic-fs-image'] = $url;
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $photo_magic_feature_slider_contents_array;
    }
endif;

if ( ! function_exists( 'photo_magic_main_slider' ) ) :
/**
 * Main Slider
 *
 * @since photo-magic 0.1.0
 *
 * @param null
 * @return null
 *
 */
function photo_magic_main_slider() {
    global $photo_magic_customizer_all_values;

    if( 1 != $photo_magic_customizer_all_values['photo-magic-feature-slider-enable'] ){
        return null;
    }
    $photo_magic_feature_slider_selection_options = $photo_magic_customizer_all_values['photo-magic-feature-slider-selection'];
    $photo_magic_slider_arrays = photo_magic_featured_slider_array( $photo_magic_feature_slider_selection_options );

    if( is_array( $photo_magic_slider_arrays )){
    $photo_magic_feature_slider_number = absint( $photo_magic_customizer_all_values['photo-magic-feature-slider-number'] );
    $photo_magic_feature_slider_mode = $photo_magic_customizer_all_values['photo-magic-fs-slider-mode'];
    $photo_magic_feature_slider_time = $photo_magic_customizer_all_values['photo-magic-fs-slider-time'];
    $photo_magic_feature_slider_pause_time = $photo_magic_customizer_all_values['photo-magic-fs-slider-pause-time'];
    $photo_magic_feature_slider_enable_control = $photo_magic_customizer_all_values['photo-magic-fs-enable-arrow'];
    $photo_magic_feature_slider_enable_pagers = $photo_magic_customizer_all_values['photo-magic-fs-enable-pager'];
    $photo_magic_feature_enable_autoplay = $photo_magic_customizer_all_values['photo-magic-fs-enable-autoplay'];
    $photo_magic_feature_enable_title = $photo_magic_customizer_all_values['photo-magic-fs-enable-title'];
    $photo_magic_feature_enable_caption = $photo_magic_customizer_all_values['photo-magic-fs-enable-caption'];

?>
<div class="wrapper wrapper-slider">
    <?php if( 1 == $photo_magic_feature_slider_enable_control){ ?>
        <div class="controls">
            <a href="#" id="slide-prev"><i class="fa fa-angle-left"></i></a> 
            <a href="#" id="slide-next"><i class="fa fa-angle-right"></i></a>
        </div>
    <?php }  ?>
        <div class="cycle-slideshow"
        data-cycle-swipe=true
        data-cycle-swipe-fx=scrollHorz
        data-cycle-fx=<?php echo esc_attr( $photo_magic_feature_slider_mode);?>
        data-cycle-speed="<?php echo (esc_attr( $photo_magic_feature_slider_time)* 1000)?>"
        data-cycle-carousel-fluid=true
        data-cycle-carousel-visible=1
        data-cycle-pause-on-hover="true"
        data-cycle-auto-height=container
        data-cycle-slides="> div"
        data-cycle-log="false"
        data-cycle-prev="#slide-prev"
        data-cycle-next="#slide-next"
        <?php if( 1 == $photo_magic_feature_slider_enable_pagers){ ?>
            data-cycle-pager="#slide-pager"
        <?php }  ?>
        <?php if( 1 != $photo_magic_feature_enable_autoplay){ ?>
            data-cycle-timeout=0
        <?php }  ?>
        <?php if(1 == $photo_magic_feature_enable_autoplay){ ?>
            data-cycle-timeout=<?php echo (esc_attr( $photo_magic_feature_slider_pause_time)* 1000)?>
        <?php }  ?>
        >
            <?php
            $i = 1;
            foreach( $photo_magic_slider_arrays as $photo_magic_slider_array ){
                if( $photo_magic_feature_slider_number < $i){
                    break;
                }
                if(empty($photo_magic_slider_array['photo-magic-fs-image'])  && 1 == $photo_magic_customizer_all_values['photo-magic-slider-default-image-enable']){

                        $photo_magic_feature_slider_image = get_template_directory_uri().'/assets/img/slider.jpg';
                }
                else{
                    $photo_magic_feature_slider_image =$photo_magic_slider_array['photo-magic-fs-image'];
                }
                ?>
                    <div class="slide-item" style="background-image: url('<?php echo esc_url( $photo_magic_feature_slider_image )?>');">
                        <div class="thumb-overlay main-slider-overlay"></div>
                        <div class="container">
                            <?php if ((1 == $photo_magic_feature_enable_title) || (1 == $photo_magic_feature_enable_caption)){?>
                                <div class="row">
                                    <div class="col-xs-10 col-sm-8 col-md-6 col-xs-offset-1 col-sm-offset-2 col-md-offset-3 banner-content">
                                        <div class="banner-content-inner">
                                            <h2 class="banner-title alt-title">
                                                <?php if( 1 == $photo_magic_feature_enable_title) { ?>
                                                <a href="<?php echo esc_url( $photo_magic_slider_array['photo-magic-fs-link'] );?>"><?php echo wp_kses_post( $photo_magic_slider_array['photo-magic-fs-title'] );?>
                                                </a>
                                                <?php } ?>
                                            </h2>
                                                <?php if( 1 == $photo_magic_feature_enable_caption){ ?>
                                                    <div class="text-content">
                                                        <?php echo wp_kses_post( $photo_magic_slider_array['photo-magic-fs-content'] ); ?>
                                                    </div>
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php
            $i++;
            }
            ?>
        </div>
    <div class="cycle-pager" id="slide-pager"></div>
    <?php if (1 == $photo_magic_customizer_all_values['photo-magic-home-portfolio-enable']) { ?>
        <div class="go-bottom">
            <a id="go-bottom" data-time="1000" href="#wrap-portfolio">
                <i class="fa fa-angle-down fa-3x"></i>
            </a>
        </div>
    <?php } ?>
</div>
<?php } 
}
endif;
add_action( 'photo_magic_action_main_slider', 'photo_magic_main_slider', 10 );