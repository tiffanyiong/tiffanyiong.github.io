<?php 
require_once ('WDWT_updater.php');

class sauron_updater extends WDWT_updater{
	/*first version with settings API*/
	protected $version_set_api = '1.0.50';  
	protected $theme_mods_name = 'theme_mods_sauron';
	protected $old_meta_name = 'sauron_meta_date'; 

	protected function get_old_colors( $val, $param_name, $args=array()){
		$this->options['color_scheme']['active']=0;
		$this->options['color_scheme']['themes']=array(
			array("name" => "theme_1", "title" => "Cool Gray",),
			array("name" => "theme_2", "title" => "Moonstone Blue",),
			array("name" => "theme_3", "title" => "Cherry Blossom Pink",),
			array("name" => "theme_4", "title" => "Red",),
		);
		$this->options['color_scheme']['colors'][0][$param_name]=  array(
			'value' => $val,
			'default' => $args['default']
		);	
		/*new colors for lightbox*/
		$this->options['color_scheme']['colors'][0]['lightbox_bg_color'] = array('value' => "#000000",'default' =>"#000000");
		$this->options['color_scheme']['colors'][0]['lightbox_ctrl_cont_bg_color'] = array('value' => "#CCCCCC",'default' =>"#CCCCCC");
		$this->options['color_scheme']['colors'][0]['lightbox_title_color'] = array('value' => "#000000",'default' =>"#000000");
		$this->options['color_scheme']['colors'][0]['lightbox_ctrl_btn_color'] = array('value' => "#000000",'default' =>"#000000");
		$this->options['color_scheme']['colors'][0]['lightbox_close_rl_btn_hover_color'] = array('value' => "#7994a7",'default' =>"#7994a7");

		/*-- blue --*/
		$this->options['color_scheme']['colors'][1]=array(
			'menu_elem_back_color' => array('value' => "#ffffff",'default' =>"#ffffff"),
			"button_bg_color" => array('value' => "#A5CAD0",'default' =>"#A5CAD0"),
			"button_text_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"caption_bg_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			
			"featured_post_bg_color" => array('value' => "#F9F9F9",'default' =>"#F9F9F9"),
			"text_headers_color" => array('value' => "#000000",'default' =>"#000000"),				
			"primary_text_color" => array('value' => "#000000",'default' =>"#000000"),
			"footer_text_color" => array('value' => "#ffffff",'default' =>"#ffffff"),			
			
			"primary_links_color" => array('value' => "#545454",'default' =>"#545454"),			
			"primary_links_hover_color" => array('value' => "#0c4754",'default' =>"#0c4754"),			
			"menu_links_color" => array('value' => "#373737",'default' =>"#373737"),
			"menu_links_hover_color" => array('value' => "#000000",'default' =>"#000000"),					
			
			"menu_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),
			"selected_menu_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"logo_text_color" => array('value' => "#5F8A91",'default' =>"#5F8A91"),			
			"input_text_color" => array('value' => "#000000",'default' =>"#000000"),			
			
			"borders_color" => array('value' => "#A5CAD0",'default' =>"#A5CAD0"),
			"sideb_background_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"footer_sideb_background_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),
			"footer_back_color" => array('value' => "#171717",'default' =>"#171717"),			
			
			"third_footer_sidebar" => array('value' => "#257d91",'default' =>"#257d91"),			
			"meta_info_color" => array('value' => "#8F8F8F",'default' =>"#8F8F8F"),
			"third_footer_sidebar_color" => array('value' => "#e5e5e5",'default' =>"#e5e5e5"),
			"horizontal_tabs" => array('value' => "#A5CAD0",'default' =>"#A5CAD0"),
			
			"category_tabs" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			
			'lightbox_bg_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_ctrl_cont_bg_color' => array('value' => "#CCCCCC",'default' =>"#CCCCCC"),
			'lightbox_title_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_ctrl_btn_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_close_rl_btn_hover_color' =>array('value' => "#5F8A91",'default' =>"#5F8A91"),
		);
		/*-- gray --*/
		$this->options['color_scheme']['colors'][2]=array(
			'menu_elem_back_color' => array('value' => "#ffffff",'default' =>"#ffffff"),
			"button_bg_color" => array('value' => "#F3C6CD",'default' =>"#F3C6CD"),
			"button_text_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"caption_bg_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			
			"featured_post_bg_color" => array('value' => "#ffffff",'default' =>"#ffffff"),
			"text_headers_color" => array('value' => "#000000",'default' =>"#000000"),				
			"primary_text_color" => array('value' => "#000000",'default' =>"#000000"),
			"footer_text_color" => array('value' => "#ffffff",'default' =>"#ffffff"),			
			
			"primary_links_color" => array('value' => "#545454",'default' =>"#545454"),			
			"primary_links_hover_color" => array('value' => "#8e203e",'default' =>"#8e203e"),			
			"menu_links_color" => array('value' => "#373737",'default' =>"#373737"),
			"menu_links_hover_color" => array('value' => "#000000",'default' =>"#000000"),					
			
			"menu_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),
			"selected_menu_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"logo_text_color" => array('value' => "#D5919E",'default' =>"#D5919E"),			
			"input_text_color" => array('value' => "#000000",'default' =>"#000000"),			
			
			"borders_color" => array('value' => "#F3C6CD",'default' =>"#F3C6CD"),
			"sideb_background_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"footer_sideb_background_color" => array('value' => "#ffffff",'default' =>"#ffffff"),
			"footer_back_color" => array('value' => "#171717",'default' =>"#171717"),			
			
			"third_footer_sidebar" => array('value' => "#D5919E",'default' =>"#D5919E"),			
			"meta_info_color" => array('value' => "#8f8f8f",'default' =>"#8f8f8f"),
			"third_footer_sidebar_color" => array('value' => "#e5e5e5",'default' =>"#e5e5e5"),
			"horizontal_tabs" => array('value' => "#F3C6CD",'default' =>"#F3C6CD"),
			
			"category_tabs" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			
			'lightbox_bg_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_ctrl_cont_bg_color' => array('value' => "#CCCCCC",'default' =>"#CCCCCC"),
			'lightbox_title_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_ctrl_btn_color' => array('value' => "#ffffff",'default' =>"#ffffff"),
			'lightbox_close_rl_btn_hover_color' =>array('value' => "#D5919E",'default' =>"#D5919E"),
		);
		/*-- red blue --*/
		$this->options['color_scheme']['colors'][3]=array(
			'menu_elem_back_color' => array('value' => "#ffffff",'default' =>"#ffffff"),
			"button_bg_color" => array('value' => "#BEC2A7",'default' =>"#BEC2A7"),
			"button_text_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"caption_bg_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			
			"featured_post_bg_color" => array('value' => "#ffffff",'default' =>"#ffffff"),
			"text_headers_color" => array('value' => "#000000",'default' =>"#000000"),				
			"primary_text_color" => array('value' => "#000000",'default' =>"#000000"),
			"footer_text_color" => array('value' => "#ffffff",'default' =>"#ffffff"),			
			
			"primary_links_color" => array('value' => "#545454",'default' =>"#545454"),			
			"primary_links_hover_color" => array('value' => "#3a4709",'default' =>"#3a4709"),			
			"menu_links_color" => array('value' => "#373737",'default' =>"#373737"),
			"menu_links_hover_color" => array('value' => "#000000",'default' =>"#000000"),					
			
			"menu_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),
			"selected_menu_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"logo_text_color" => array('value' => "#838860",'default' =>"#838860"),			
			"input_text_color" => array('value' => "#000000",'default' =>"#000000"),			
			
			"borders_color" => array('value' => "#BEC2A7",'default' =>"#BEC2A7"),
			"sideb_background_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			"footer_sideb_background_color" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),
			"footer_back_color" => array('value' => "#171717",'default' =>"#171717"),			
			
			"third_footer_sidebar" => array('value' => "#838860",'default' =>"#838860"),			
			"meta_info_color" => array('value' => "#8f8f8f",'default' =>"#8f8f8f"),
			"third_footer_sidebar_color" => array('value' => "#e5e5e5",'default' =>"#e5e5e5"),
			"horizontal_tabs" => array('value' => "#BEC2A7",'default' =>"#BEC2A7"),
			
			"category_tabs" => array('value' => "#FFFFFF",'default' =>"#FFFFFF"),			
			
			'lightbox_bg_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_ctrl_cont_bg_color' => array('value' => "#CCCCCC",'default' =>"#CCCCCC"),
			'lightbox_title_color' => array('value' => "#000000",'default' =>"#000000"),
			'lightbox_ctrl_btn_color' => array('value' => "#ffffff",'default' =>"#ffffff"),
			'lightbox_close_rl_btn_hover_color' =>array('value' => "#838860",'default' =>"#838860"),
		);
		
    
		$this->options['colors_active']['select_theme'] ='color_scheme';
		$this->options['colors_active']['active'] ='0';
		$this->options['colors_active']['colors'][$param_name] = array(
			'value' => $val,
			'default' => $args['default'],
		);  
	}
	/**
		* rules for converting old param to new
		*
		* keep order from old to new
		* 
		* 
		* start from $version_set_api
		* @param types: get_param_with_old_name, get_old_colors, checkbox_to_select, option_change, widget name change, slider
	*/
	protected $rules = array(
	'1.0.50' => array(
		/*Layout*/
		array('old'=> "gs_default_layout", 'new'=>'default_layout' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "gs_full_width", 'new'=>'full_width' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "gs_content_area", 'new'=>'content_area' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "gs_main_column", 'new'=>'main_column' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "gs_pwa_width", 'new'=>'pwa_width' , 'type'=>'get_param_with_old_name' ),	
		array('old'=> "address", 'new'=>'addrval', 'type'=>'get_param_with_old_name' ),
		/*SEO*/
		array('old'=> "seo_seo_home_title", 'new'=>'seo_home_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_home_description", 'new'=>'seo_home_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_home_keywords", 'new'=>'seo_home_keywords' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "seo_seo_home_titletext", 'new'=>'seo_home_titletext' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_home_descriptiontext", 'new'=>'seo_home_descriptiontext' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_home_keywordstext", 'new'=>'seo_home_keywordstext' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "seo_seo_home_type", 'new'=>'seo_home_type' , 'type'=>'select_to_select_array' ),
		array('old'=> "seo_seo_home_separate", 'new'=>'seo_home_separate' , 'type'=>'get_param_with_old_name' ), 		
		array('old'=> "seo_seo_single_title", 'new'=>'seo_single_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_single_description", 'new'=>'seo_single_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_single_keywords", 'new'=>'seo_single_keywords' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "seo_seo_single_type", 'new'=>'seo_single_type' , 'type'=>'select_to_select_array' ), 
		array('old'=> "seo_seo_single_separate", 'new'=>'seo_single_separate' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_index_description", 'new'=>'seo_index_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "seo_seo_index_type", 'new'=>'seo_index_type' , 'type'=>'select_to_select_array' ),
		array('old'=> "seo_seo_index_separate", 'new'=>'seo_index_separate' , 'type'=>'get_param_with_old_name' ),
		/*General*/
		array('old'=> "_fixed_menu", 'new'=>'fix_menu' , 'type'=>'get_param_with_old_name' ), 
		/*??--*/
		array('old'=> "_logo_img", 'new'=>'logo_img' , 'type'=>'get_param_with_old_name' ), 
		/*--??*/
		array('old'=> "_custom_css_enable", 'new'=>'custom_css_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_custom_css_text", 'new'=>'custom_css_text' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_favicon_enable", 'new'=>'favicon_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_favicon_img", 'new'=>'favicon_img' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "_blog_style", 'new'=>'blog_style' , 'type'=>'get_param_with_old_name' ), 		
		array('old'=> "_grab_image", 'new'=>'grab_image' , 'type'=>'get_param_with_old_name' ), 		
		array('old'=> "_date_enable", 'new'=>'date_enable' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "_footer_text_enable", 'new'=>'footer_text_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_footer_text", 'new'=>'footer_text' , 'type'=>'get_param_with_old_name' ),
		/*Integration*/
		array('old'=> "int_integration_bottom_adsense_type", 'new'=>'ads_type' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "gs_default_layout", 'new'=>'default_layout' , 'type'=>'get_param_with_old_name' ),
		
		array('old'=> "int_integrate_header_enable", 'new'=>'integrate_header_enable' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "int_integrate_body_enable", 'new'=>'integrate_body_enable' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "int_integrate_singletop_enable", 'new'=>'integrate_singletop_enable' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "int_integrate_singlebottom_enable", 'new'=>'integrate_singlebottom_enable' , 'type'=>'get_param_with_old_name' ),		
		array('old'=> "int_integration_head", 'new'=>'integration_head' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_body", 'new'=>'integration_body' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_single_top", 'new'=>'integration_single_top' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_single_bottom", 'new'=>'integration_single_bottom' , 'type'=>'get_param_with_old_name' ),
		/*??--*/
		array('old'=> "int_integration_head_adsense_hide", 'new'=>'int_integration_head_adsense_type' , 'type'=>'checkbox_add_to_radio', 'args' => array('value' => 'none','option_type'=>'mods') ),
		array('old'=> "int_integration_head_adsense_type", 'new'=>'integration_head_adsense_type' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_head_adsense", 'new'=>'integration_head_adsense' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_head_advertisment_picture", 'new'=>'integration_head_advertisment_picture' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_head_advertisment_url", 'new'=>'integration_head_advertisment_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_head_advertisment_title", 'new'=>'integration_head_advertisment_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_head_advertisment_alt", 'new'=>'integration_head_advertisment_alt' , 'type'=>'get_param_with_old_name' ),
		//array('old'=> "int_integration_bottom_adsense_hide", 'new'=>'int_integration_bottom_adsense_type' , 'type'=>'checkbox_add_to_radio', 'args' => array('value' => 'none','option_type'=>'mods') ),/* rename in rules 1.1.0 */
		array('old'=> "int_integration_bottom_adsense", 'new'=>'integration_bottom_adsense' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_bottom_advertisment_picture", 'new'=>'integration_bottom_advertisment_picture' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_bottom_advertisment_url", 'new'=>'integration_bottom_advertisment_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_bottom_advertisment_title", 'new'=>'integration_bottom_advertisment_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "int_integration_bottom_advertisment_alt", 'new'=>'integration_bottom_advertisment_alt' , 'type'=>'get_param_with_old_name' ),
		/*--??*/
		/*HomePage*/
		array('old'=> "_hide_content_posts", 'new'=>'content_posts_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_content_post_count", 'new'=>'content_post_count' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_content_post_categories", 'new'=>'content_post_categories' , 'type'=>'get_old_posts_cats' ),		
		array('old'=> "_hide_about_us", 'new'=>'home_middle_description_post_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_home_abaut_us_post", 'new'=>'home_middle_description_post' , 'type'=>'select_to_select_array', 'args'=>array() ),
		array('old'=> "_contact_us_text", 'new'=>'contact_us_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_hide_horizontal_tab_posts", 'new'=>'blog_posts_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_horizontal_tab_categories_name", 'new'=>'blog_posts_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_horizontal_tab_categories_desc", 'new'=>'blog_posts_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_horizontal_tab_categories", 'new'=>'blog_posts_categories' , 'type'=>'get_old_posts_cats' ),	
		
		array('old'=> "_hide_gallery_tab", 'new'=>'gallery_posts_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_gallery_tab_title", 'new'=>'gallery_posts_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_gallery_tab_description", 'new'=>'gallery_posts_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_gallery_tab_categories", 'new'=>'gallery_posts_categories' , 'type'=>'get_old_posts_cats' ),
		
		array('old'=> "_hide_cat_tabs", 'new'=>'review_posts_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_cat_tabs_cat_name", 'new'=>'review_posts_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_cat_tabs_cat_description", 'new'=>'review_posts_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_content_categories", 'new'=>'review_posts_categories' , 'type'=>'get_old_posts_cats' ),
		
		array('old'=> "_hide_diagrams", 'new'=>'home_middle_diagrams_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_home_diagram_page", 'new'=>'home_middle_diagrams' , 'type'=>'select_to_select_array', 'args'=>array() ),

		array('old'=> "_follow_text", 'new'=>'follow_title' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_follow_desc", 'new'=>'follow_description' , 'type'=>'get_param_with_old_name' ),

		array('old'=> "_hide_newsletter", 'new'=>'pinned_post_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_newsletter_bg", 'new'=>'pinned_bg_img' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_home_newsletter", 'new'=>'pinned_posts' , 'type'=>'select_to_select_array', 'args'=>array() ),
		
		array('old'=> "_hide_contact_us", 'new'=>'contact_us_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_contact_us_bg", 'new'=>'contact_us_bg' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_contact_us_description", 'new'=>'contact_us_description' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_contact_us_name", 'new'=>'contact_us_name' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_contact_us_address", 'new'=>'contact_us_address' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_contact_us_mail", 'new'=>'contact_us_mail' , 'type'=>'get_param_with_old_name' ),

		
		array('old'=> "_show_twitter_icon", 'new'=>'twitter_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_twitter_url", 'new'=>'twitter_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_show_facebook_icon", 'new'=>'facebook_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_facebook_url", 'new'=>'facebook_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_show_rss_icon", 'new'=>'rss_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_rss_url", 'new'=>'rss_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_show_youtube_icon", 'new'=>'youtube_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_youtube_url", 'new'=>'youtube_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_show_google_icon", 'new'=>'google_icon_show' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_google_url", 'new'=>'google_url' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_show_instagram_icon", 'new'=>'instagram_enable' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_instagram_url", 'new'=>'instagram_url' , 'type'=>'get_param_with_old_name' ),		
		
		array('old'=> "_show_linkin_icon", 'new'=>'linkedin_icon_show' , 'type'=>'get_param_with_old_name' ),
		array('old'=> "_linkin_url", 'new'=>'linkedin_url' , 'type'=>'get_param_with_old_name' ),
		/* Typography */
		array('old'=> "ty_type_headers_font", 'new'=>'text_headers_font' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_headers_kern", 'new'=>'text_headers_kern' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_headers_transform", 'new'=>'text_headers_transform' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_headers_variant", 'new'=>'text_headers_variant' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_headers_weight", 'new'=>'text_headers_weight' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_headers_style", 'new'=>'text_headers_style' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_primary_font", 'new'=>'text_primary_font' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_primary_kern", 'new'=>'text_primary_kern' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_primary_transform", 'new'=>'text_primary_transform' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_primary_variant", 'new'=>'text_primary_variant' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_primary_weight", 'new'=>'text_primary_weight' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_primary_style", 'new'=>'text_primary_style' , 'type'=>'select_to_select_array'),
		//array('old'=> "ty_type_secondary_font", 'new'=>'text_secondary_font' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_secondary_kern", 'new'=>'text_secondary_kern' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_secondary_transform", 'new'=>'text_secondary_transform' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_secondary_variant", 'new'=>'text_secondary_variant' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_secondary_weight", 'new'=>'text_secondary_weight' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_secondary_style", 'new'=>'text_secondary_style' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_inputs_font", 'new'=>'text_inputs_font' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_inputs_kern", 'new'=>'text_inputs_kern' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_inputs_transform", 'new'=>'text_inputs_transform' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_inputs_variant", 'new'=>'text_inputs_variant' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_inputs_weight", 'new'=>'text_inputs_weight' , 'type'=>'select_to_select_array'),
		array('old'=> "ty_type_inputs_style", 'new'=>'text_inputs_style' , 'type'=>'select_to_select_array'),
		/*Color_control*/
		array('old'=> "cc_logo_text_color", 'new'=>'logo_text_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#0A7ED5")),
		array('old'=> "cc_header_back_color", 'new'=>'header_back_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_menu_elem_back_color", 'new'=>'menu_elem_back_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_menu_links_color", 'new'=>'menu_links_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#686565")),
		array('old'=> "cc_menu_links_hover_color", 'new'=>'menu_links_hover_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#0A7ED5")),		
		array('old'=> "cc_selected_menu_item", 'new'=>'selected_menu_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_category_tabs", 'new'=>'category_tabs' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_third_footer_sidebar", 'new'=>'third_footer_sidebar' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#171717")),
		array('old'=> "cc_meta_info_color", 'new'=>'meta_info_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#8F8F8F")),
		array('old'=> "cc_third_footer_sidebar_color", 'new'=>'third_footer_sidebar_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#e5e5e5")),
		array('old'=> "cc_hover_menu_item", 'new'=>'menu_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_horizontal_tabs", 'new'=>'horizontal_tabs' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#F9F9F9")),
		array('old'=> "cc_button_text_color", 'new'=>'button_text_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_button_background_color", 'new'=>'button_bg_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#7DC112")),
		array('old'=> "cc_top_posts_color", 'new'=>'top_posts_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#F8F8F8")),
		array('old'=> "cc_text_headers_color", 'new'=>'text_headers_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#0A7ED5")),
		array('old'=> "cc_primary_text_color", 'new'=>'primary_text_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#000000")),
		array('old'=> "cc_primary_links_color", 'new'=>'primary_links_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#000000")),
		array('old'=> "cc_primary_links_hover_color", 'new'=>'primary_links_hover_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#0A7ED5")),
		array('old'=> "cc_cat_tab_back_color", 'new'=>'cat_tab_back_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#0A7ED5")),
		array('old'=> "cc_featured_posts_color", 'new'=>'featured_post_bg_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#F9F9F9")),
		array('old'=> "cc_content_post_back", 'new'=>'content_post_back' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_sideb_background_color", 'new'=>'sideb_background_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_footer_title_color", 'new'=>'footer_title_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#000000")),
		array('old'=> "cc_footer_sideb_background_color", 'new'=>'footer_sideb_background_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#F3F3F4")),
		array('old'=> "cc_second_footer_sideb_background_color", 'new'=>'second_footer_sideb_background_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_footer_text_color", 'new'=>'footer_text_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#000000")),
		array('old'=> "cc_footer_back_color", 'new'=>'footer_back_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF")),
		array('old'=> "cc_date_color", 'new'=>'date_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#B2B0B0")),
		array('old'=> "cc_buttons_color", 'new'=>'buttons_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#0A7ED5")),
		array('old'=> "lightbox_bg_color", 'new'=>'lightbox_bg_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#000000",'new_param'=>true)),
    array('old'=> "lightbox_ctrl_cont_bg_color", 'new'=>'lightbox_ctrl_cont_bg_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#000000",'new_param'=>true)),
    array('old'=> "lightbox_title_color", 'new'=>'lightbox_title_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF",'new_param'=>true)),
    array('old'=> "lightbox_ctrl_btn_color", 'new'=>'lightbox_ctrl_btn_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#FFFFFF",'new_param'=>true)),
    array('old'=> "lightbox_close_rl_btn_hover_color", 'new'=>'lightbox_close_rl_btn_hover_color' , 'type'=>'get_old_colors', 'args'=>array('default'=>"#7DC112",'new_param'=>true)),
		
		)
	);
	
	  /**
  *  meta content should not be changed
  * only name
  *
  */
  protected $rules_meta = array(
       '1.0.50' => array(
       array('old'=> "layout", 'new'=>'default_layout' ),
       array('old'=> "content_width", 'new'=>'content_area' ),
       array('old'=> "main_col_width", 'new'=>'main_column' ),
       array('old'=> "pr_widget_area_width", 'new'=>'pwa_width' ),
       array('old'=> "fullwidthpage", 'new'=>'full_width' ),
       array('old'=> "blogstyle", 'new'=>'blog_style' ),
       array('old'=> "address", 'new'=>'addrval' ),
       array('old'=> "categories", 'new'=>'categories', 'type'=>'get_old_posts_cats_meta' ),
	   array('old'=> "hide_percent", 'new'=>'hide_percent' ),
	   array('old'=> "percent_title", 'new'=>'diagram_test_title', 'type'=>'json_to_string_meta' ),
       array('old'=> "percent_percent", 'new'=>'diagram_test_percent', 'type'=>'json_to_string_meta' ),
	   array('old'=> "percent_width", 'new'=>'percent_width' ),
	   array('old'=> "percent_height", 'new'=>'percent_height' ),
       array('old'=> "percent_header_color", 'new'=>'percent_header_color', 'type'=>'get_new_color_value' ),
       array('old'=> "percent_background_color", 'new'=>'percent_background_color', 'type'=>'get_new_color_value' ),
       array('old'=> "percent_completed_color", 'new'=>'percent_completed_color', 'type'=>'get_new_color_value' ),
       array('old'=> "percent_to_do_color", 'new'=>'percent_to_do_color', 'type'=>'get_new_color_value' ),
       array('old'=> "percent_text_color", 'new'=>'percent_text_color', 'type'=>'get_new_color_value' ),
	   array('old'=> "percent_time", 'new'=>'percent_time' ),
	   array('old'=> "topic_service", 'new'=>'topic_service' ),
	   array('old'=> "company_name", 'new'=>'topic_company' ),
       array('old'=> "company_info", 'new'=>'desc_company' ),
	   array('old'=> "company_categories", 'new'=>'company_categories', 'type'=>'get_old_posts_cats_meta' ),
       array('old'=> "topic_blog", 'new'=>'topic_blog' ),
       array('old'=> "single_post_text", 'new'=>'single_post_text' ),
       array('old'=> "category_tabs_mst_pop", 'new'=>'category_tabs_mst_pop', 'type'=>'get_old_posts_cats_meta' ),
       array('old'=> "_single_post_soe_title", 'new'=>'seo_single_title', 'external' => true ),
       array('old'=> "_single_post_soe_description", 'new'=>'seo_single_description', 'external' => true ),
       array('old'=> "_single_post_soe_keywords", 'new'=>'seo_single_keywords', 'external' => true ),
	   
       ),
  );


/**
 *  widget content should not be changed
 * only name
 *
 */
  protected $rules_widget = array(
   '1.0.50' => array(
      array('old'=> "web_buis_percent", 'new'=>'sauron_percent' ),
      array('old'=> "sauron_categ", 'new'=>'sauron__categimages' ),
      array('old'=> "sauron_categss", 'new'=>'sauron__categ_square' ),
      array('old'=> "sauron_adv", 'new'=>'sauron_adv' ),
	  	array('old'=> "sauron_adsens", 'new'=>'sauron_adsens' ),
      array('old'=> "spider_random_post", 'new'=>'sauron_random_post' ),
      ),
  );
}

