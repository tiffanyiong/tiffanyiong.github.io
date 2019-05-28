<?php

class WDWT_general_settings_page_class{
  
  public $options;

  function __construct(){
  
    $this->options = array( 
      'fix_menu' => array(
        'name' => 'fix_menu', 
        'title' =>  __( 'Fixed menu', WDWT_LANG ), 
        'type' => 'checkbox', 
        'description' => __( 'Check the box to fix menu.', WDWT_LANG ), 
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => true,
        'customizer' => array()          
      ),
      'custom_css_enable' => array( 
        'name' => 'custom_css_enable', 
        'title' => __( 'Custom CSS', WDWT_LANG ), 
        'type' => 'checkbox_open', 
        'description' => __( 'Custom CSS will change the visual style of the website. The CSS code provided here can be applied to any page or post.', WDWT_LANG ), 
        'show' => array('custom_css_text'),
        'hide' => array(),
        'section' => 'general_main', 
        'tab' => 'general', 
        'default' => false,
        'customizer' => array()
      ), 
      'custom_css_text' => array( 
        'name' => 'custom_css_text', 
        'title' => '', 
        'type' => 'textarea', 
        'sanitize_type' => 'css', 
        'description' => __( 'Provide the custom CSS code below.', WDWT_LANG ), 
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => '',
        'customizer' => array()      
      ),
    
    'logo_type' => array(
        "name" => "logo_type", 
        "title" => "Logo type", 
        'type' => 'radio_open', 
        "description" => "", 
        'valid_options' => array(
              'none' => __('None', WDWT_LANG),
              'image' => __('Image', WDWT_LANG),
              'text' => __('Text', WDWT_LANG),
        ),
        'show' => array('image'=>'logo_img', 'text' => 'logo_text'),
        'hide' => array(),
        'section' => 'general_main', 
        'tab' => 'general', 
        'default' => 'image',
        'customizer' => array()  
      ),
      'logo_img' => array(
        'name' => 'logo_img', 
        'title' => __( 'Logo', WDWT_LANG ), 
        "sanitize_type" => "esc_url_raw",
        'type' => 'upload_single', 
        'description' => __( 'Upload custom logo image.', WDWT_LANG ), 
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => WDWT_IMG.'logo.png',
        'customizer' => array()           
      ),
      'logo_text' => array( 
        "name" => "logo_text", 
        "title" => "Logo Text", 
        'type' => 'textarea', 
        "sanitize_type" => "sanitize_text_field", 
        "description" => __( "Provide with a custom text ",WDWT_LANG ),
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => '',
        'customizer' => array()  
      ),

      'show_desc' => array(
        'name' => 'show_desc',
        'title' =>  __( 'Show tagline/description', WDWT_LANG ),
        'type' => 'checkbox',
        'description' => __( 'Check the box to show site description.', WDWT_LANG ),
        'section' => 'general_main',
        'tab' => 'general',
        'default' => false,
        'customizer' => array()
      ),
      'blog_style' => array(
        'name' => 'blog_style', 
        'title' =>  __( 'Blog Style post format', WDWT_LANG ), 
        'type' => 'checkbox', 
        'description' => __( 'Check the box to have short previews for the homepage/index posts.', WDWT_LANG ), 
        'section' => 'general_main', 
        'tab' => 'general', 
        'default' => true,
        'customizer' => array()           
      ), 
      'grab_image' => array(
        'name' => 'grab_image', 
        'title' =>  __( 'Grab the first post image', WDWT_LANG ), 
        'type' => 'checkbox', 
        'description' => __( 'Enable this option if you want to use the images that are already in your post to create a thumbnail without using custom fields. In this case thumbnail images will be generated automatically using the first image of the post. Note that the image needs to be hosted on your own server.', WDWT_LANG ), 
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => false,
        'customizer' => array()          
      ),  
      
      'date_enable' => array(
        "name" => "date_enable", 
        "title" => "Display post meta information", 
        'type' => 'checkbox',
        "description" => __("Choose whether to display the post meta information such as date, author and etc.", WDWT_LANG),
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => true,
        'customizer' => array()         
      ),
      'footer_text_enable' => array(
        "name" => "footer_text_enable",
        "title" => __("Information in the Footer", WDWT_LANG),
        'type' => 'checkbox_open',
        "description" => __("Check the box to display custom HTML for the footer.", WDWT_LANG),
        'section' => 'general_main',
        'show' => array('footer_text'),
        'hide' => array(),
        'tab' => 'general',
        'default' => true,
        'customizer' => array()
      ),
      'footer_text' => array(
        "name" => "footer_text",
        "title" => '',
        'type' => 'textarea',
        "sanitize_type" => "sanitize_footer_html_field",
        'width' => '450',
        'height' => '200',
        "description" => __("HTML code to be inserted in the footer of your web site.", WDWT_LANG),
        'section' => 'general_main',
        'tab' => 'general',
        'default' => 'WordPress Themes by <a href="'.WDWT_HOMEPAGE.'" target="_blank" title="Web-Dorado">Web-Dorado</a>',
        'customizer' => array()
      ),
      
    );


    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {

      $this->options['favicon_enable'] = array( 
        'name' => 'favicon_enable', 
        'title' => __( 'Show Favicon', WDWT_LANG ), 
        'type' => 'checkbox_open', 
        'description' => '', 
        'section' => 'general_main', 
        'show' => array('favicon_img'),
        'hide' => array(),
        'tab' => 'general', 
        'default' => false,
        'customizer' => array()         
      );
      $this->options['favicon_img'] = array(     
        'name' => 'favicon_img', 
        'title' => '', 
        'type' => 'upload_single', 
        "sanitize_type" => "esc_url_raw", 
        'description' => __( 'Click on the Upload Image button to upload the favicon image.', WDWT_LANG ), 
        'section' => 'general_main',  
        'tab' => 'general', 
        'default' => '',
        'customizer' => array()   
      );
      

    }
    
    
  }

  
  
  

}