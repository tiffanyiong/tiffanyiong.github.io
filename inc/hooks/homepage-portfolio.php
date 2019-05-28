<?php

if ( ! function_exists( 'photo_magic_portfolio' ) ) :
    /**
     * Portfolio Section
     *
     * @since Photo Magic 0.1.0
     *
     * @param null
     * @return null
     *
     */
    function photo_magic_portfolio() {

        global $photo_magic_customizer_all_values;

        $photo_magic_home_portfolio_title = $photo_magic_customizer_all_values['photo-magic-home-portfolio-title'];
        $photo_magic_home_portfolio_number = $photo_magic_customizer_all_values['photo-magic-home-portfolio-number'];
        $repeated_category = array('photo-magic-home-portfolio-category-ids');
        if( 1 != $photo_magic_customizer_all_values['photo-magic-home-portfolio-enable'] ){
            return null;
        }
        ?>
        <section id="wrap-portfolio" class="wrapper wrapper-portfolio wrap-altbg">
            <div class="container overhidden">
                <div class="row">
                    <div class="col-md-12">
                        <header class="title-section evision-animate slideInDown">
                            <h2><?php echo wp_kses_post( $photo_magic_home_portfolio_title );?></h2>
                            <span class="title-divider"></span>
                        </header>
                    </div>
                </div>
            </div>
        
            <div class="container overhidden">
                <div class="row">
                    <?php
                        $photo_magic_portfolio_category = evision_customizer_get_repeated_all_value(6 , $repeated_category);
                        $photo_magic_portfolio_cat_posts_ids=array();
                        foreach( $photo_magic_portfolio_category as $photo_magic_portfolio_cat_post ) {
                            if( 0 != $photo_magic_portfolio_cat_post['photo-magic-home-portfolio-category-ids'] ){
                                $photo_magic_portfolio_cat_posts_ids[] = $photo_magic_portfolio_cat_post['photo-magic-home-portfolio-category-ids'];
                            }
                        }
                        $photo_magic_home_portfolio_args = array();
                        if( !empty( $photo_magic_portfolio_cat_posts_ids) ){
                            $photo_magic_home_portfolio_args = array(
                                'post_type' => 'post',
                                'cat' => $photo_magic_portfolio_cat_posts_ids,
                                'ignore_sticky_posts' => true,
                                'posts_per_page' => absint( $photo_magic_home_portfolio_number ),
                            );
                        } ?>
                        <div id="filters" class="button-group"> 
                            <button class="button button-outline is-checked" data-filter="*"><?php echo __( 'show all', 'photo-magic' ) ?></button>
                            <?php for ($j=0; $j < count($photo_magic_portfolio_cat_posts_ids) ; $j++) {
                                $photo_magic_category = get_cat_name( $photo_magic_portfolio_cat_posts_ids[$j]);
                                $photo_magic_category_id = get_cat_id($photo_magic_category);
                                if (!empty($photo_magic_category)) { ?>
                                    <button class="button button-outline" data-filter=".<?php echo esc_html('cat-'.$photo_magic_category_id)?>"><?php echo esc_attr( $photo_magic_category)?></button>
                            <?php }     
                            } ?>
                        </div>
                        <?php if (!empty ($photo_magic_portfolio_cat_posts_ids)){ ?>
                            <div id='port-gallery' class="grid">
                                <?php 
                                $photo_magic_home_portfolio_post_query = new WP_Query($photo_magic_home_portfolio_args);
                                if ($photo_magic_home_portfolio_post_query->have_posts()) :
                                    $data_delay = 0;
                                    while ($photo_magic_home_portfolio_post_query->have_posts()) : $photo_magic_home_portfolio_post_query->the_post();
                                        $photo_magic_cat_id = array();
                                        if(has_post_thumbnail()){
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                            $url = $thumb['0'];
                                        }
                                        else{
                                            $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                                        }
                                        $data_wow_delay = 'data-wow-delay='.$data_delay.'s';
                                        ?> 
                                        <?php 
                                        $photo_magic_categories = get_the_category();
                                        foreach ($photo_magic_categories as $photo_magic_cat) {
                                            $photo_magic_cat_id[] = $photo_magic_cat->term_id;
                                        }
                                        $cat_ids = implode(' cat-',$photo_magic_cat_id);
                                        ?>
                                        <div class="element-item <?php echo ('cat-'.esc_attr($cat_ids)); ?> " data-category="transition">
                                            <div class="radius-thumb-holder">
                                                <figure>  
                                                    <img src="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                </figure>
                                                <div class="radius-thumb-hover">
                                                    <h3 class="radius-thumb-title">
                                                        <a href="<?php the_permalink();?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <a class="popup-open" href="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                    <?php endif; wp_reset_postdata(); 
                                ?>
                            </div>
                        <?php } else {
                        $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                         ?>
                            <div id='port-gallery' class="grid">
                                <div class="element-item" data-category="transition">
                                    <div class="radius-thumb-holder">
                                        <figure>  
                                            <img src="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                        </figure>
                                        <div class="radius-thumb-hover">
                                            <h3 class="radius-thumb-title">
                                                <a href="#">
                                                    <?php echo esc_html__( 'Item title', 'photo-magic' ); ?>
                                                </a>
                                            </h3>
                                            <a class="popup-open" href="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>   
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'photo_magic_action_front_page', 'photo_magic_portfolio', 20 );