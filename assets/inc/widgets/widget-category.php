<?php

class sauron__categimages extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('description' => __('Displays Categories Posts', WDWT_LANG));
		$control_ops = array('width' => '', 'height' => '');
		parent::__construct(false, $name = __('Sauron Categories Posts with images', WDWT_LANG), $widget_ops, $control_ops);
	}

	/* Displays the Widget in the front-end */
	function widget($args, $instance)
	{
		extract($args);
		global $wdwt_front;
		$title = esc_html($instance['title']);
		$description = empty($instance['description']) ? '' : esc_html($instance['description']);
		$categ_id = empty($instance['categ_id']) ? '' : $instance['categ_id'];
		$post_count = empty($instance['post_count']) ? '' : $instance['post_count'];
		$text_info = empty($instance['text_info']) ? '' : esc_html($instance['text_info']);

		echo $before_widget;

		if ($title)
			echo $before_title . $title . $after_title; ?>

		<style>
			.widget_exclusive_categ div:last-child div {
				border-bottom: none !important;
			}

			.cat_widgs_conts {
				width: 50%;
				float: left;
				position: relative;
				height: 120px;
				overflow: hidden;
			}

			#cat_gallery {
				margin-top: 15px;
			}

			.cat_widgs_conts h3 {
				font-size: 19px !important;
				margin-top: 0;
				line-height: 15px;
				margin-bottom: 8px !important;
				font-weight: 700;
			}

			.cat_widgs_conts h3 a {
				font-size: 19px !important;
			}

			.widget-title {
				margin-bottom: 0;
			}

			.cat_widgs-img {
				height: 100%;
			}

			.cat_info, .cat_widgs {
				-webkit-backface-visibility: hidden;
				-moz-backface-visibility: hidden;
				-o-backface-visibility: hidden;
				backface-visibility: hidden;
				position: absolute;
				top: 0;
				left: 0;
				height: 120px;
				width: 100%;
			}

			.cat_widgs_conts:hover .flipper {
				-webkit-transform: rotateY(180deg);
				-moz-transform: rotateY(180deg);
				-o-transform: rotateY(180deg);
				transform: rotateY(180deg);
			}

			.flipper {
				-webkit-transition: all 0.6s;
				-webkit-transform-style: preserve-3d;
				-moz-transition: all 0.6s;
				-moz-transform-style: preserve-3d;
				-o-transition: all 0.6s;
				-o-transform-style: preserve-3d;
				transition: all 0.6s;
				transform-style: preserve-3d;
				width: 100%;
				position: relative;
			}

			.cat_widgs_conts {
				-webkit-perspective: 1000;
				-moz-perspective: 1000;
				-o-perspective: 1000;
				perspective: 1000;
				position: relative;
				width: 50%;
			}

			.cat_info {
				z-index: 1000;
				position: absolute;
				padding: 15px;
				overflow: hidden;
				-webkit-transform: rotateY(180deg);
				-moz-transform: rotateY(180deg);
				-o-transform: rotateY(180deg);
				transform: rotateY(180deg);
				background: # <?php echo $text_info; ?>;
				height: 90px;
				width: calc(100% - 30px);
			}

			.cat_widgs-img img {
				width: 100%;
				height: 150px;
			}

			.image_divs {
				height: 100%;
			}

			@media only screen and (max-width: 767px) {
				.cat_widgs-img {
					width: 100%;
				}

				.cat_widgs {
					width: 100%;
				}

				.cat_widgs_conts {
					width: 100%;
				}
			}
		</style>
		<script>
			var call_oncee2 = 0;
			jQuery(window).scroll(function ()
			{
				var height = jQuery(window).scrollTop();
				var height_canvas = jQuery('.widget_sauron__categimages').offset().top - 750;
				if (0 < height_canvas) {
					if (call_oncee2 == 0) {
						call_oncee2++;
						jQuery(".cat_widgs_conts").addClass('animate');
						jQuery(".cat_widgs_conts").addClass('zoom-in');
						jQuery("#cat_gallery").animate({
							opacity: '1',
						}, 1500, function ()
						{
							// Animation complete.
						});
					}
				}
			});
			jQuery(document).ready(function ()
			{
				jQuery('.cat_widgs_conts').hover(function ()
					{
						jQuery(this).find('.cat_info').fadeIn(500);
					},
					function ()
					{
						jQuery(this).find('.cat_info').fadeOut(300);
					});

			});

		</script>
		<?php
		$wp_query = null;
		$wp_query = new WP_Query();
		if (!isset($post_count))
			$post_count = 1;

		$cat_query = $categ_id;
		$wp_query->query('posts_per_page=' . $post_count . '&cat=' . $cat_query);
		echo "<i>" . $description . "</i><br>";
		?>
		<div id="cat_gallery">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();

				$tumb_id = get_post_thumbnail_id(get_the_ID());
				$thumb_url = wp_get_attachment_image_src($tumb_id, 'full');

				if ($thumb_url) {
					$thumb_url = $thumb_url[0];
				} else {
					$thumb_url = sauron_frontend_functions::catch_that_image();
					$thumb_url = $thumb_url['src'];
				}
				$background_image = $thumb_url;
				?>

				<div class="cat_widgs_conts">
					<div class="flipper">
						<div class="cat_info">
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
							</a>
							<p>
								<?php echo sauron_frontend_functions::the_excerpt_max_charlength(100); ?>
							</p>
						</div>
						<div class="cat_widgs">
							<div class="cat_widgs-img">
								<div class="image_divs"
										 style="background: url(<?php echo $background_image; ?>) no-repeat center !important; background-size:cover !important; "></div>
							</div>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>

			<?php endwhile; ?>
			<div class="clear"></div>
		</div>
		<?php
		wp_reset_postdata();

		echo $after_widget;

	}

	/*Saves the settings. */
	function update($new_instance, $old_instance)
	{

		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['categ_id'] = wp_filter_post_kses(addslashes($new_instance['categ_id']));
		$instance['post_count'] = wp_filter_post_kses(addslashes($new_instance['post_count']));
		$instance['description'] = sanitize_text_field($new_instance['description']);
		$instance['text_info'] = sanitize_text_field($new_instance['text_info']);
		return $instance;

	}

	/*Creates the form for the widget in the back-end. */
	function form($instance)
	{
		//Defaults
		$instance = wp_parse_args((array)$instance, array('title' => 'Categories Posts', 'categ_id' => '0', 'post_count' => '3', 'description' => '', 'text_info' => '#FFFFFF'));

		$title = esc_attr($instance['title']);
		$categ_id = esc_attr($instance['categ_id']);
		$post_count = esc_attr($instance['post_count']);
		$description = esc_attr($instance['description']);
		$text_info = esc_attr($instance['text_info']);
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		?>
		<script>
			jQuery(document).ready(function ()
			{
				jQuery('.wdwt_cat_color_input').wpColorPicker();
			});
		</script>
		<style>
			.wp-color-result:focus {
				outline: none;
			}

			.wp-picker-container:has(.wp-picker-open) {
				color: red;
			}

			#wd_admin_form .calendar .wd_button {
				display: table-cell !important;
			}

			#wd_admin_form div.calendar {
				margin-left: -101px;
			}

			.paramlist_value {
				position: relative;
			}

			.wdwt_cat_color_input.wp-color-picker {
				height: 23px;
			}

			.wp-picker-holder {
				top: -11px;
				position: relative;
				z-index: 3;
			}

			.wp-color-result:after {
				width: 73px;
			}

			.paramlist_value > .wp-picker-container > a {
				left: -1px;
			}

			.wp-picker-container .wp-picker-container > a {
				left: -11px !important;
			}

			.wp-color-result {
				/*background-color: transparent !important;*/
				left: -6px !important;
			}

			.wp-color-result:hover {
				/*background-color: transparent;*/
			}

			.color_for_this {
				height: 24px;
				top: 0px;
				position: relative;
				width: 35px;
				left: 2px;
				display: inline-block;
			}

			#repeat_rate_col .wp-picker-container .wp-picker-container > a {
				left: -6px;
			}

			.wd_color_input label {
				display: inline-block;
			}

			.wp-picker-container, .wp-picker-container:active {
				position: relative;
			}
		</style>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Title:", WDWT_LANG); ?></label><input
				class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
				name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>

		<p><label for="<?php echo $this->get_field_id('description'); ?>"></label><textarea class="widefat"
																																												id="<?php echo $this->get_field_id('description'); ?>"
																																												name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>
		</p>

		<p>
			<label
				for="<?php echo $this->get_field_id('text_info'); ?>"><?php echo __("Post text information backgroung color:", WDWT_LANG); ?></label>
			<input id="<?php echo $this->get_field_id('text_info'); ?>" class="color wdwt_cat_color_input wp-color-picker"
						 value="<?php echo $instance['text_info']; ?>"
						 name="<?php echo $this->get_field_name('text_info'); ?>"></input>
		</p>

		<p><label
				for="<?php echo $this->get_field_id('categ_id'); ?>"><?php echo __("Select Category:", WDWT_LANG); ?></label>
			<select name="<?php echo $this->get_field_name('categ_id'); ?>" id="<?php echo $this->get_field_id('categ_id') ?>"
							style="font-size:12px" class="inputbox">
				<option value="0"><?php echo __("Select Category", WDWT_LANG); ?></option>
				<?php $categories = get_categories();
				$category_count = count($categories);
				for ($i = 0; $i < $category_count; $i++) {
					if (isset($categories[$i])) {
						?>
						<option
							value="<?php echo $categories[$i]->term_id ?>" <?php if ($instance['categ_id'] == $categories[$i]->term_id) echo 'selected="selected"'; ?>><?php echo $categories[$i]->name ?></option>
					<?php }
				} ?>
			</select></p>
		<p><label
				for="<?php echo $this->get_field_id('post_count'); ?>"><?php echo __("Number of Posts:", WDWT_LANG); ?></label><input
				id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>"
				type="text" value="<?php echo $post_count; ?>" size="6"/></p>
		<?php
	}
}// end sauron__categimages class
add_action('widgets_init', 'sauron_widget_category');
function sauron_widget_category(){
  return register_widget("sauron__categimages");
}

?>