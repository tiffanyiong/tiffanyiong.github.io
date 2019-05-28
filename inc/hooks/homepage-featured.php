<?php
if ( ! function_exists( 'photo_magic_home_featured_array' ) ) :
    /**
     * featured Section array creation
     *
     * @since photo-magic 0.1.0
     *
     * @param string $from_featured
     * @return array
     */
    function photo_magic_home_featured_array( $from_featured ){
        global $photo_magic_customizer_all_values;
        $photo_magic_home_featured_number = absint($photo_magic_customizer_all_values['photo-magic-home-featured-number']);
        $photo_magic_home_featured_single_words = absint($photo_magic_customizer_all_values['photo-magic-home-featured-single-words']);

        $photo_magic_home_featured_contents_array = array();

        $photo_magic_home_featured_page = array('photo-magic-home-featured-pages-ids');


        if ( 'from-category' ==  $from_featured ){
            $photo_magic_home_featured_category = $photo_magic_customizer_all_values['photo-magic-home-featured-category'];
                $photo_magic_home_featured_args =    array(
                    'post_type' => 'post',
                    'cat' => $photo_magic_home_featured_category,
                    'posts_per_page' => $photo_magic_home_featured_number
                );
        }else {
                $photo_magic_home_featured_posts = evision_customizer_get_repeated_all_value(8 , $photo_magic_home_featured_page);
                $photo_magic_home_featured_posts_ids = array();
                if( null != $photo_magic_home_featured_posts ) {
                    foreach( $photo_magic_home_featured_posts as $photo_magic_home_featured_post ) {
                        if( 0 != $photo_magic_home_featured_post['photo-magic-home-featured-pages-ids'] ){
                            $photo_magic_home_featured_posts_ids[] = $photo_magic_home_featured_post['photo-magic-home-featured-pages-ids'];
                        }
                    }
                    if( !empty( $photo_magic_home_featured_posts_ids )){
                        $photo_magic_home_featured_args =    array(
                            'post_type' => 'page',
                            'post__in' => $photo_magic_home_featured_posts_ids,
                            'posts_per_page' => $photo_magic_home_featured_number,
                            'orderby' => 'post__in'
                        );
                    }
                }
            }
        // the query
        if( !empty( $photo_magic_home_featured_args )){

            $photo_magic_home_featured_contents_array = array(); /*again empty array*/
            $photo_magic_home_featured_post_query = new WP_Query( $photo_magic_home_featured_args );
            if ( $photo_magic_home_featured_post_query->have_posts() ) :
                $i = 1;
                while ( $photo_magic_home_featured_post_query->have_posts() ) : $photo_magic_home_featured_post_query->the_post();
                    $photo_magic_home_featured_contents_array[$i]['photo-magic-home-featured-title'] = get_the_title();
                    if (has_excerpt()) {
                        $photo_magic_home_featured_contents_array[$i]['photo-magic-home-featured-content'] = get_the_excerpt();
                    }
                    else {
                        $photo_magic_home_featured_contents_array[$i]['photo-magic-home-featured-content'] = photo_magic_words_count( $photo_magic_home_featured_single_words ,get_the_content());
                    }
                    $photo_magic_home_featured_contents_array[$i]['photo-magic-home-featured-link'] = get_permalink();

                    $url ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'photo-magic-costume-medium' );
                        $url = $thumb['0'];
                    }
                    else{
                        $url = get_template_directory_uri() .'/assets/img/no-image-feature.jpg';
                    }
                    $photo_magic_home_featured_contents_array[$i]['photo-magic-home-featured-page-image'] = $url;

                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $photo_magic_home_featured_contents_array;
    }
endif;

if ( ! function_exists( 'photo_magic_home_featured' ) ) :
    /**
     * featured Section
     *
     * @since photo-magic 0.1.0
     *
     * @param null
     * @return null
     *
     */
    function photo_magic_home_featured() {
        global $photo_magic_customizer_all_values;
        if( 1 != $photo_magic_customizer_all_values['photo-magic-home-featured-enable'] ){
            return null;
        }
        $photo_magic_home_featured_selection_options = $photo_magic_customizer_all_values['photo-magic-home-featured-selection'];
        $photo_magic_featured_arrays = photo_magic_home_featured_array( $photo_magic_home_featured_selection_options );
        if( is_array( $photo_magic_featured_arrays )){
            $photo_magic_home_featured_number = absint($photo_magic_customizer_all_values['photo-magic-home-featured-number']);
            $photo_magic_home_featured_title = $photo_magic_customizer_all_values['photo-magic-home-featured-title'];
            $photo_magic_home_featured_enable_button_text = $photo_magic_customizer_all_values['photo-magic-home-featured-button-enable'];
            $photo_magic_home_featured_button_text = $photo_magic_customizer_all_values['photo-magic-home-featured-button-text'];
            $photo_magic_home_featured_button_link = $photo_magic_customizer_all_values['photo-magic-home-featured-button-link'];
            ?>
            <section class="wrapper wrapper-feature-portfolio">
                <div class="container overhidden">
                    <div class="row">
                        <div class="col-md-12">
                            <header class="title-section alt-title diff-title evision-animate slideInDown" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: slideInDown;">
                                <h2><?php echo wp_kses_post(  $photo_magic_home_featured_title); ?></h2>
                            </header>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <ul id="da-thumbs" class="row da-thumbs">
                        <?php 
                            $i = 1;
                            foreach( $photo_magic_featured_arrays as $photo_magic_featured_array ){
                                if( $photo_magic_home_featured_number < $i){
                                    break;
                                }
                            ?>
                            <li class="col-xs-6 col-sm-3 col-md-3 pad0lr">
                                <a href="<?php echo esc_url( $photo_magic_featured_array['photo-magic-home-featured-link'] );?>">
                                    <img src="<?php echo esc_url($photo_magic_featured_array['photo-magic-home-featured-page-image']); ?>" >
                                    <div class="content">
                                        <div class="content-inner">
                                                <h3><?php echo wp_kses_post($photo_magic_featured_array['photo-magic-home-featured-title']); ?></h3>
                                            <div class="par"><?php echo wp_kses_post( $photo_magic_featured_array['photo-magic-home-featured-content'] );?></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php 
                                if( $i % 4 == 0 ){
                                    echo "<div class='clear'></div>";
                                }
                                $i++;
                            } ?>
                    </ul>
                </div>
                <div class='clear'></div>
                <?php
                if( $photo_magic_home_featured_enable_button_text == 1 ){
                    ?>
                    <div class="container btn-container">
                        <div class="btn-holder">
                            <a class="button button-outline" href="<?php echo esc_url( $photo_magic_home_featured_button_link );?>">
                                <?php echo esc_html( $photo_magic_home_featured_button_text );?>
                            </a>
                        </div>
                    </div>
                    <?php
                } ?>
            </section>
            <?php
        }
    }
endif;
add_action( 'photo_magic_action_front_page', 'photo_magic_home_featured', 30 );
