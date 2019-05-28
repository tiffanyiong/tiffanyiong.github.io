<?php


class sauron_percent extends WP_Widget
{

	function __construct()
	{
		$widget_ops = array('description' => __('Displays Percent', WDWT_LANG));
		$control_ops = array('width' => 400, 'height' => 500);
		parent::__construct(false, $name = __('Sauron Percent', WDWT_LANG), $widget_ops, $control_ops);
	}

	/* Displays the Widget in the front-end */
	function widget($args, $instance)
	{
		extract($args);

		$title = $instance['title'];
		$percent_type = (isset($instance['percent_type']) ? $instance['percent_type'] : "horizontal");
		$width = $instance['width'];
		$height = $instance['height'];
		$percent = $instance['percent'];
		$completed_color = substr($instance['completed_color'], 0, 1) == "#" ? $instance['completed_color'] : "#" . $instance['completed_color'];
		$to_do_color = substr($instance['to_do_color'], 0, 1) == "#" ? $instance['to_do_color'] : "#" . $instance['to_do_color'];
		$percent_text_color = substr($instance['percent_text_color'], 0, 1) == "#" ? $instance['percent_text_color'] : "#" . $instance['percent_text_color'];
		$time = $instance['time'];

		echo $before_widget;

		if ($title) {
			echo $before_title . $title . $after_title;
		}
		$id = $this->get_field_id('title');
		preg_match_all('!\d+!', $id, $matches);
		$match = $matches[0][0];
		$rand = rand(1, 10000); // if two instances of the same widget are on the same page
		$widget_id = $match . '_' . $rand;
		?>
		<?php
		if ($percent_type == "horizontal" || is_null($percent_type)) { ?>
			<style>
				@media only screen and (max-width: 640px) {
					.percent {
						margin: 0 auto;
						width: 100% !important;
					}
				}

				#wdwt_percent<?php echo $widget_id; ?> {
					width: <?php echo esc_html($width/4); ?>%;
					height: <?php echo esc_html($height); ?>px;
					background: <?php echo esc_html($to_do_color); ?>;
					-webkit-box-shadow: inset 0 17px 10px -22px rgba(0, 0, 0, 0.8);
					-moz-box-shadow: inset 0 20px 20px -20px rgba(0, 0, 0, 0.8);
					box-shadow: inset 0 17px 10px -22px rgba(0, 0, 0, 0.8);
					margin: 5px 0px;
				}

				#wdwt_percent<?php echo $widget_id; ?> .wdwt_target {
					font-size: 20px;
					color: <?php echo esc_html($percent_text_color); ?> !important;
					float: right;
					margin: 0;
					position: absolute;
					top: 50%;
					left: 90%;
					transform: translate(-64%, -50%);
					width: 80px;
					text-align: left;
				}

				#wdwt_percent<?php echo $widget_id; ?> .wdwt_match {
					background: #EFEFEF;
					float: right;
					width: 80px;
					height: 113%;
					position: relative;
					top: -3px;
					border-radius: 3px;
					box-shadow: 0px 0px 10px -3px rgba(0, 0, 0, 0.8);
				}

				#wdwt_percent<?php echo $widget_id; ?> .wdwt_widget_fill {
					background: <?php echo esc_html($completed_color); ?>;
				}

				@media only screen and (max-width: 767px) {
					#wdwt_percent<?php echo $widget_id; ?> {
						height: <?php echo esc_html($height * 0.6); ?>px;
					}

					#wdwt_percent<?php echo $widget_id; ?> .wdwt_target {
						font-size: 12px;
						width: 40px;
						left: 80%;
					}

					#wdwt_percent<?php echo $widget_id; ?> .wdwt_match {
						width: 40px;
					}
				}

			</style>
			<div id="wdwt_percent<?php echo $widget_id; ?>">
				<div class="wdwt_widget_fill"
						 style="width: 0px; height: 100%; background: #<?php echo $completed_color; ?>; position: relative; overflow: visible !important;">
					<div class="wdwt_match">
						<div class="arrow-left"></div>
						<b class="wdwt_target percent_number">0%</b>
					</div>
				</div>
			</div>
			<script>

				var wdwt_widget_anim_done<?php echo $widget_id; ?> = 0;

				if (typeof wdwt_horizontal_widget != 'function') { // do not declare in every widget

					window.wdwt_horizontal_widget = function (widget_id, percent, duration, percent_textcolor)
					{
						if (jQuery('#wdwt_percent' + widget_id).hasClass('wdwt_done')) {
							return;
						}

						var wdwt_widget_height = jQuery(window).scrollTop();
						var wdwt_widget_height_canvas = jQuery('#wdwt_percent' + widget_id).offset().top - jQuery(window).height();
						if (wdwt_widget_height > wdwt_widget_height_canvas) {
							jQuery('#wdwt_percent' + widget_id).addClass('wdwt_done');
							jQuery('#wdwt_percent' + widget_id + " .wdwt_widget_fill").animate({
								width: percent + '%',
							}, duration);

							var wdwt_widget_decimal_places = 1;
							var wdwt_widget_decimal_factor = wdwt_widget_decimal_places === 0 ? 1 : wdwt_widget_decimal_places * 10;

							jQuery('#wdwt_percent' + widget_id + ' .wdwt_target').animateNumber(
								{
									number: percent * wdwt_widget_decimal_factor,
									color: percent_textcolor,
									numberStep: function (now, tween)
									{
										floored_number = Math.floor(now) / wdwt_widget_decimal_factor,
											target = jQuery(tween.elem);
										if (wdwt_widget_decimal_places > 0) {
											floored_number = floored_number;
										}

										target.text(floored_number + '%');
									}
								}, duration
							)
						}

					}
				}

				jQuery(document).ready(function ()
				{
					wdwt_horizontal_widget('<?php echo $widget_id; ?>', '<?php echo $percent; ?>', <?php echo $time; ?>, '<?php echo $percent_text_color; ?>');
				});

				jQuery(window).scroll(function ()
				{
					wdwt_horizontal_widget('<?php echo $widget_id; ?>', '<?php echo $percent; ?>', <?php echo $time; ?>, '<?php echo $percent_text_color; ?>');
				});
			</script>
			<?php
		}  /*endif horizontal*/
		else { ?>
			<script>

				if (typeof wdwt_round_widget != 'function') { // do not declare in every widget

					window.wdwt_round_widget = function (widget_id, canvas_id, percent, color1, color2, textcolor, radius, line_width, time)
					{


						if (jQuery('#wdwt_percent' + widget_id).hasClass('wdwt_done')) {
							return;
						}

						var wdwt_widget_height = jQuery(window).scrollTop();
						var wdwt_widget_height_canvas = jQuery('#wdwt_percent' + widget_id).offset().top - jQuery(window).height();
						if (wdwt_widget_height > wdwt_widget_height_canvas) {

							jQuery('#wdwt_percent' + widget_id).addClass('wdwt_done');


							var canvas = document.getElementById(canvas_id);
							var context = canvas.getContext('2d');
							var x = canvas.width / 2;
							var y = canvas.height / 2;
							var radius = radius;
							var i = 0;
							context.font = "20px arial";
							context.fillStyle = textcolor;
							context.fillText(0 + "%", x - 18, y);

							var sauron_round_diagram_interval = setInterval(function ()
							{

								if (i >= percent) {
									clearInterval(sauron_round_diagram_interval);
									return;
								}
								var startAngle = ((i / 50) + 1.5) * Math.PI;
								var endAngle = (((i + 1.2) / 50) + 1.5) * Math.PI;
								var counterClockwise = false;
								context.beginPath();
								context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
								context.lineWidth = line_width;
								/* line color */
								context.strokeStyle = color1;
								context.stroke();
								context.clearRect(x - 36, y - 23, 75, 25)

								context.fillText(i + 1 + "%", x - 18, y);
								i++;
							}, time);
							var startAngle = 0 * Math.PI;
							var endAngle = 2 * Math.PI;
							var counterClockwise = false;
							context.beginPath();
							context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
							context.lineWidth = line_width;
							context.strokeStyle = color2;
							context.stroke();
						}
					}
				}
			</script>
			<div id="wdwt_percent<?php echo $widget_id; ?>" class="percent" style="width: <?php echo $width + 21; ?>px;">
				<canvas id="wdwt_myCanvas<?php echo $widget_id; ?>" width="<?php echo esc_attr($width); ?>"
								height="<?php echo esc_attr($width); ?>"></canvas>
				<div width="<?php echo esc_attr($width); ?>" style="text-align: center"><?php echo $title; ?> </div>
			</div>

			<script>
				jQuery(document).ready(function ()
				{
					wdwt_round_widget('<?php echo $widget_id; ?>', 'wdwt_myCanvas<?php echo $widget_id; ?>',<?php echo $percent; ?>, '<?php echo str_replace('#', '#', $completed_color); ?>', '<?php echo str_replace('#', '#', $to_do_color); ?>', '<?php echo str_replace('#', '#', $percent_text_color); ?>',<?php echo $width / 2 - 20; ?>,<?php echo $height; ?>,<?php echo $time / 100; ?>);
				});

				jQuery(window).scroll(function ()
				{

					wdwt_round_widget('<?php echo $widget_id; ?>', 'wdwt_myCanvas<?php echo $widget_id; ?>',<?php echo $percent; ?>, '<?php echo str_replace('#', '#', $completed_color); ?>', '<?php echo str_replace('#', '#', $to_do_color); ?>', '<?php echo str_replace('#', '#', $percent_text_color); ?>',<?php echo $width / 2 - 20; ?>,<?php echo $height; ?>,<?php echo $time / 100; ?>);
				});

			</script>
		<?php }
		echo $after_widget;

	}

	/*Saves the settings. */
	function update($new_instance, $old_instance)
	{
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['percent_type'] = strip_tags($new_instance['percent_type']);
		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];
		$instance['percent'] = $new_instance['percent'];
		$instance['completed_color'] = $new_instance['completed_color'];
		$instance['to_do_color'] = $new_instance['to_do_color'];
		$instance['percent_text_color'] = $new_instance['percent_text_color'];
		$instance['time'] = $new_instance['time'];
		return $instance;

	}

	/*Creates the form for the widget in the back-end. */
	function form($instance)
	{
		//Defaults
		$defaults = array(
			'title' => '',
			'percent_type' => 'horizontal',
			'width' => '400',
			'height' => '40',
			'percent' => '75',
			'completed_color' => '878787',
			'to_do_color' => 'c8c8c8',
			'percent_text_color' => '171717',
			'time' => '1000'
		);
		$instance = wp_parse_args((array)$instance, $defaults);

		$title = esc_attr($instance['title']);
		$percent_type = esc_attr($instance['percent_type']);
		$width = esc_attr($instance['width']);
		$height = esc_attr($instance['height']);
		$percent = esc_attr($instance['percent']);
		$completed_color = $instance['completed_color'];
		$to_do_color = $instance['to_do_color'];
		$percent_text_color = $instance['percent_text_color'];
		$time = $instance['time'];

		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		?>
		<script>
			jQuery(document).ready(function ()
			{
				jQuery('.wdwt_percent_color_input').wpColorPicker();
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

			.wdwt_percent_color_input.wp-color-picker {
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
				top: 8px;
				/*position: relative;*/
				width: 35px;
				left: 5px;
				display: inline-block;
			}

			#repeat_rate_col .wp-picker-container .wp-picker-container > a {
				left: -6px;
			}

			.wd_color_input label {
				display: inline-block;
			}
		</style>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Title:", WDWT_LANG); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
						 name="<?php echo $this->get_field_name('title'); ?>" type="text"
						 value="<?php echo $instance['title']; ?>"/>
		</p>

		<p>
			<label
				for="<?php echo $this->get_field_id('percent_type'); ?>"><?php echo __("Percent Type:", WDWT_LANG); ?></label>
			<input type="radio" name="<?php echo $this->get_field_name('percent_type'); ?>"
						 value="horizontal" <?php if ($percent_type == "horizontal" || $percent_type == "") echo 'checked="checked"'; ?>><?php echo __("Horizontal", WDWT_LANG); ?>
			&nbsp;&nbsp;&nbsp;
			<input type="radio" name="<?php echo $this->get_field_name('percent_type'); ?>"
						 value="circle" <?php if ($percent_type == "circle" || $percent_type == "") echo 'checked="checked"'; ?>><?php echo __("Circle", WDWT_LANG); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php echo __("Width:", WDWT_LANG); ?></label>
			<input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>"
						 value="<?php echo $instance['width']; ?>" size="4">px</input>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php echo __("Height:", WDWT_LANG); ?></label>
			<input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>"
						 value="<?php echo $instance['height']; ?>" size="4">px</input>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('percent'); ?>"><?php echo __("Percent:", WDWT_LANG); ?></label>
			<input id="<?php echo $this->get_field_id('percent'); ?>" name="<?php echo $this->get_field_name('percent'); ?>"
						 value="<?php echo $instance['percent']; ?>" size="4">%</input>
		</p>

		<div class="wd_color_input">
			<label
				for="<?php echo $this->get_field_id('completed_color'); ?>"><?php echo __("Completed color:", WDWT_LANG); ?></label>
			<div class="color_for_this"
					 style="background-color: #<?php echo str_replace('#', '', $instance['completed_color']); ?>; left: 9px;">
				<input id="<?php echo $this->get_field_id('completed_color'); ?>"
							 class="wdwt_percent_color_input wp-color-picker" value="<?php echo $instance['completed_color']; ?>"
							 name="<?php echo $this->get_field_name('completed_color'); ?>" type="text"></input>
			</div>
		</div>
		<div class="wd_color_input">
			<label
				for="<?php echo $this->get_field_id('to_do_color'); ?>"><?php echo __("To do color:", WDWT_LANG); ?></label>
			<div class="color_for_this"
					 style="background-color: #<?php echo str_replace('#', '', $instance['to_do_color']); ?>; left: 41px;">
				<input id="<?php echo $this->get_field_id('to_do_color'); ?>" class="wdwt_percent_color_input wp-color-picker"
							 value="<?php echo $instance['to_do_color']; ?>"
							 name="<?php echo $this->get_field_name('to_do_color'); ?>"></input>
			</div>
		</div>
		<div class="wd_color_input">
			<label
				for="<?php echo $this->get_field_id('percent_text_color'); ?>"><?php echo __("Percent text color:", WDWT_LANG); ?></label>
			<div class="color_for_this"
					 style="background-color: #<?php echo str_replace('#', '', $instance['percent_text_color']); ?>">
				<input id="<?php echo $this->get_field_id('percent_text_color'); ?>"
							 class="wdwt_percent_color_input wp-color-picker" value="<?php echo $instance['percent_text_color']; ?>"
							 name="<?php echo $this->get_field_name('percent_text_color'); ?>"></input>
			</div>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id('time'); ?>"><?php echo __("Time:", WDWT_LANG); ?></label>
			<input id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>"
						 value="<?php echo $instance['time']; ?>" size="4">msec</input>
		</p>
		<?php
	}

}// end web_buis_adv class
add_action('widgets_init', 'sauron_widget_percent');
function sauron_widget_percent(){
  return register_widget("sauron_percent");
}
?>