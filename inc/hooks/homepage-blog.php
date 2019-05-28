<?php
if ( ! function_exists( 'photo_magic_home_blog' ) ) :
    /**
     * Blog Section
     *
     * @since photo-magic 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function photo_magic_home_blog() {
        global $photo_magic_customizer_all_values;
        $photo_magic_home_blog_title = $photo_magic_customizer_all_values['photo-magic-blog-title'];
        $photo_magic_home_blog_button_text = $photo_magic_customizer_all_values['photo-magic-blog-button-text'];
        $photo_magic_home_blog_enable_button = $photo_magic_customizer_all_values['photo-magic-blog-enable-button'];
        $photo_magic_home_blog_button_link = $photo_magic_customizer_all_values['photo-magic-home-blog-button-link'];
        $photo_magic_home_blog_single_words = absint( $photo_magic_customizer_all_values['photo-magic-blog-excerpt-number'] );
        $photo_magic_home_blog_numbers = absint( $photo_magic_customizer_all_values['photo-magic-blog-number'] );
        $photo_magic_home_blog_category = $photo_magic_customizer_all_values['photo-magic-blog-category'];
        if( 1 != $photo_magic_customizer_all_values['photo-magic-blog-enable'] ){
            return null;
        }
        ?>

        <section class="wrapper wrapper-blog">
            <div class="blog-content">
                <div class="container overhidden">
                    <div class="row">
                        <div class="col-md-12">
                            <header class="title-section evision-animate slideInDown" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: slideInDown;">
                                <h2><?php echo wp_kses_post( $photo_magic_home_blog_title );?></h2>
                            </header>
                        </div>
                    </div>
                </div>
                <!-- normal scrolling post -->
                <div class="container">
                    <div class="carousel-group">
                            <?php
                                $photo_magic_home_blog_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => absint( $photo_magic_home_blog_numbers ),
                                    'cat'           => $photo_magic_home_blog_category,
                                );

                                $photo_magic_home_about_post_query = new WP_Query($photo_magic_home_blog_args);
                                if ($photo_magic_home_about_post_query->have_posts()) :
                                    $data_delay = 0;
                                while ($photo_magic_home_about_post_query->have_posts()) : $photo_magic_home_about_post_query->the_post();
                                    if(has_post_thumbnail()){
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'photo-magic-sticky-post' );
                                        $url = $thumb['0'];
                                    }
                                    else{
                                        $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                                    } ?>
                                    <div class="carousel-item singlethumb col-xs-12 col-sm-4 col-md-4 padlr8">
                                        <div class="thumb-holder">
                                            <a href="<?php the_permalink();?>">
                                                <img src="<?php echo esc_url( $url ); ?>" alt="activities">
                                            </a>
                                        </div>
                                        <div class="content-area">
                                            <h3>
                                                <a href="<?php the_permalink();?>">
                                                    <?php  the_title(); ?>
                                                </a>
                                            </h3>
                                            <div class="content-text">
                                                <?php
                                                if ( has_excerpt() ) {
                                                    the_excerpt();
                                                } else {
                                                    $content_blog = get_the_content();
                                                    echo wp_kses_post(photo_magic_words_count( $photo_magic_home_blog_single_words, $content_blog ));
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php wp_reset_postdata(); ?>
                                <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php
                    if( $photo_magic_home_blog_enable_button == 1 ){
                        ?>
                        <div class="container btn-container">
                            <div class="btn-holder">
                                <a class="button button-outline" href="<?php echo esc_url( $photo_magic_home_blog_button_link );?>">
                                    <?php echo esc_html( $photo_magic_home_blog_button_text );?>
                                </a>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'photo_magic_action_front_page', 'photo_magic_home_blog', 40 );