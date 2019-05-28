<?php
/*define theme global constants*/

/*framework prefix is wdwt*/  
define("WDWT_TITLE", "Sauron");
define("WDWT_SLUG", "sauron");
define("WDWT_VAR", "sauron");
/*translation text domain*/
define("WDWT_LANG", "sauron");
define("WDWT_META", "_".WDWT_SLUG."_meta");
define("WDWT_OPT", WDWT_VAR."_options");
define("WDWT_VERSION", wp_get_theme(WDWT_SLUG)->get( 'Version' ) );

define("WDWT_LOGO_SHOW", true);
define("WDWT_HOMEPAGE", "https://web-dorado.com");
/*directories*/  
define("WDWT_DIR", get_template_directory());
/*URLs*/
define("WDWT_URL", get_template_directory_uri());
define("WDWT_IMG", WDWT_URL.'/images/');
define("WDWT_IMG_INC", WDWT_URL.'/inc/images/');

load_theme_textdomain(WDWT_LANG, WDWT_DIR.'/languages' );

/*include admin, options and frontend classes*/
require_once('inc/index.php');

if(!is_admin()){
  add_action('init','wdwt_front_init');  
}
/* head*/
add_action('wp_head','wdwt_include_head');
/*  Frontend scripts and styles */
add_action('wp_enqueue_scripts','wdwt_scripts_front');  


/* sidebars*/
add_action('widgets_init', 'wdwt_widgets_init');
/* change body class*/
add_filter('body_class', 'wdwt_multisite_body_classes');
/* add_theme_support , textdomain etc */
add_action('after_setup_theme', 'wdwt_setup_elements');


add_action('wp_ajax_wdwt_live_search', 'wdwt_live_search_posts');
add_action('wp_ajax_nopriv_wdwt_live_search', 'wdwt_live_search_posts');

add_action('wp_ajax_wdwt_front_gallery_posts_section', 'wdwt_front_pages');
add_action('wp_ajax_nopriv_wdwt_front_gallery_posts_section', 'wdwt_front_pages');
add_action('wp_ajax_wdwt_front_blog_posts_section', 'wdwt_front_pages');
add_action('wp_ajax_nopriv_wdwt_front_blog_posts_section', 'wdwt_front_pages');
add_action('wp_ajax_wdwt_front_portfolio_posts_section', 'wdwt_front_pages');
add_action('wp_ajax_nopriv_wdwt_front_portfolio_posts_section', 'wdwt_front_pages');


/*lightbox*/
add_action('wp_ajax_wdwt_lightbox', 'wdwt_lightbox');
add_action('wp_ajax_nopriv_wdwt_lightbox', 'wdwt_lightbox');

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', array(WDWT_VAR.'_frontend_functions', 'wdwt_wrapper_start'), 10);
add_action('woocommerce_after_main_content', array(WDWT_VAR.'_frontend_functions', 'wdwt_wrapper_end'), 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


/*functions are below*/
function wdwt_front_init(){
   global $wdwt_options,
    $wdwt_front;
  
  global $wp_customize;
  if ( !isset( $wp_customize ) ) {
    $wdwt_front =  new Sauron_front($wdwt_options);  
  }

  /* excerpt more */
  add_filter('excerpt_more', array(WDWT_VAR.'_frontend_functions', 'excerpt_more'));
  /*   remove more in posts and pages   */
  add_filter('the_content_more_link', array(WDWT_VAR.'_frontend_functions', 'remove_more_jump_link'));

  
}

function wdwt_include_head(){
  global $wdwt_front;
    
  
  $wdwt_front->layout();
  $wdwt_front->order();
  $wdwt_front->typography();
  $wdwt_front->color_control();
  $wdwt_front->favicon_img(); 
  $wdwt_front->custom_css();
 
}


function wdwt_scripts_front(){
  global $wdwt_front;

	wp_enqueue_script('wdwt_custom_js', WDWT_URL.'/inc/js/javascript.js', array('jquery'), WDWT_VERSION);
	wp_enqueue_script('jquery-effects-transfer');
	wp_enqueue_script('jquery-scrollTo',WDWT_URL.'/inc/js/jquery.scrollTo-min.js', array('jquery'), WDWT_VERSION);
   
  wp_enqueue_script('wdwt_response', WDWT_URL.'/inc/js/responsive.js', array('jquery', 'wdwt_custom_js'), WDWT_VERSION);
	wp_enqueue_style( WDWT_SLUG.'-style', get_stylesheet_uri(), array(), WDWT_VERSION );
	
	wp_localize_script( 'wdwt_custom_js', 'sauron_site_url', trailingslashit(home_url()) );
	wp_localize_script( 'wdwt_custom_js', 'sauron_is_front', is_front_page() ? '1' : '0' );
	wp_localize_script( 'wdwt_custom_js', 'sauron_admin_ajax', admin_url('admin-ajax.php') );
	
	wp_enqueue_script('wdwt_hover_effect',WDWT_URL.'/inc/js/jquery-hover-effect.js', array('jquery'), WDWT_VERSION);
	wp_enqueue_script( 'comment-reply' );
	
	wp_enqueue_script('jquery-lavalamp',WDWT_URL.'/inc/js/jquery.lavalamp.min.js', array('jquery'), WDWT_VERSION);
  wp_enqueue_script('jquery-animateNumber', WDWT_URL.'/inc/js/jquery.animateNumber.min.js', array('jquery'), WDWT_VERSION); 
   
  // Styles/Scripts for popup.
  wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0');
  wp_enqueue_script('jquery-mobile', WDWT_URL . '/inc/js/jquery.mobile.min.js', array(), WDWT_VERSION);
  $lbox_disable = $wdwt_front->get_param('lbox_disable');

  if(!$lbox_disable){
    wp_enqueue_script('jquery-mCustomScrollbar', WDWT_URL . '/inc/js/jquery.mCustomScrollbar.concat.min.js', array(), WDWT_VERSION);
    wp_enqueue_style('jquery-mCustomScrollbar', WDWT_URL . '/inc/css/jquery.mCustomScrollbar.css', array(), WDWT_VERSION);
    wp_enqueue_script('jquery-fullscreen', WDWT_URL . '/inc/js/jquery.fullscreen-0.4.1.js', array(), WDWT_VERSION);

    wp_enqueue_script('wdwt_lightbox_loader', WDWT_URL.'/inc/js/lightbox.js', array(), WDWT_VERSION);
    wp_localize_script( 'wdwt_lightbox_loader', 'admin_ajax_url', admin_url('admin-ajax.php') );  
  }
   
 
}



function wdwt_live_search_posts(){

  /* reset from user to site locale*/
  if(function_exists('switch_to_locale')){
    switch_to_locale( get_locale() );
  }

  global $wdwt_options;
  global $wdwt_front;
  require_once('inc/front/front_params_output.php');
  $wdwt_front = new sauron_front($wdwt_options);
  require_once('inc/front/front_functions.php');
  sauron_frontend_functions::live_posts_search();
  die();
}





function wdwt_front_pages(){

  /* reset from user to site locale*/
  if(function_exists('switch_to_locale')){
    switch_to_locale( get_locale() );
  }

	global $wdwt_options;
	global $wdwt_front;
  require_once('inc/front/front_params_output.php');
  $wdwt_front = new sauron_front($wdwt_options);

  /* excerpt more */
  add_filter('excerpt_more', array(WDWT_VAR.'_frontend_functions', 'excerpt_more'));
  /*   remove more in posts and pages   */
  add_filter('the_content_more_link', array(WDWT_VAR.'_frontend_functions', 'remove_more_jump_link'));

	$action = $_REQUEST['action'];
	$paged = isset($_REQUEST['paged']) ? intval($_REQUEST['paged']) : 0;

	if($action == "wdwt_front_gallery_posts_section"){
		require_once('inc/front/front_functions.php');
		sauron_frontend_functions::gallery_posts_section($paged);
	}	
	if($action == "wdwt_front_blog_posts_section"){
		require_once('inc/front/front_functions.php');
		sauron_frontend_functions::blog_posts_section($paged);
	}
  if($action == "wdwt_front_portfolio_posts_section"){
    require_once('inc/front/front_functions.php');
    sauron_frontend_functions::portfolio_posts($paged);
  }

	die();

}



function wdwt_widgets_init(){

    // Area 1, located at the top of the sidebar.

    register_sidebar(array(
            'name' => __('Primary Widget Area', WDWT_LANG),
            'id' => 'sidebar-1',
            'description' => __('The primary widget area', WDWT_LANG),
            'before_widget' => '<div id="%1$s" class="widget-sidebar sidebar-1 %2$s">',
            'after_widget' => '</div> ',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

    register_sidebar(array(
            'name' => __('Secondary Widget Area', WDWT_LANG),
            'id' => 'sidebar-2',
            'description' => __('The secondary widget area', WDWT_LANG),
            'before_widget' => '<div id="%1$s" class="widget-sidebar sidebar-2 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
	
	//first  footer widget area
	
	register_sidebar(array(

            'name' => __('Post Footer Left Widget Area', WDWT_LANG),
            'id' => 'first-footer-widget-area',
            'description' => __('The secondary widget area', WDWT_LANG),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
	
	// second footer widget area
	
	register_sidebar(array(
            'name' => __('Post Footer Right Widget Area', WDWT_LANG),
            'id' => 'second-footer-widget-area',
            'description' => __('The secondary widget area', WDWT_LANG),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
	
	// third footer widget area
	register_sidebar(array(
            'name' => __('Primary Footer Widget Area', WDWT_LANG),
            'id' => 'footer-widget-area',
            'description' => __('The secondary widget area', WDWT_LANG),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
  
}


function wdwt_multisite_body_classes($classes){
  foreach($classes as $key=>$class)
  {
    if($class=='blog')
    $classes[$key]='blog_body';
  }
  return $classes;
  
}

	/*************************************/
	/* CALL FUNCTIONS AFTER THEME SETUP  */
	/*************************************/

function wdwt_setup_elements(){

  
	// add custom header in admin menu
	add_theme_support( 'custom-header', array(
	    'default-text-color'  => '220e10',
		'default-image'       => '',
		'header-text'         => false,
    'height'                 => 240,
    'width'                  => 1024,
		//'wp-head-callback'    => 'expert_header_style',
		
	) );
	
	// add custom background in admin menu
  
	$theme_defaults = array(
		'default-color'          => 'fff',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support('custom-background', $theme_defaults );
	
  /*ttt!!! there is a problem here*/
  
  if(!get_theme_mod('background_color',false))
		set_theme_mod('background_color','ffffff')	;
  
	// For Post thumbnail
	add_theme_support('post-thumbnails');
  set_post_thumbnail_size(150, 150);
	add_image_size( 'sauron-thumbs', 370,310, true );
	
	// requerid  features
	add_theme_support('automatic-feed-links');
	
	/// include language
	//load_theme_textdomain(WDWT_LANG, WDWT_DIR.'/languages' );
	
	// registr menu,
    register_nav_menu('primary-menu', 'Primary Menu');
	
	// for editor styles
	add_editor_style();

	if ( ! isset( $content_width ) ) {
		$content_width = 1024;
	}

  add_theme_support( 'title-tag' );

  /*WooCommerce support*/
  add_theme_support( 'woocommerce' );
}





function wdwt_lightbox (){

  /* reset from user to site locale*/
  if(function_exists('switch_to_locale')){
    switch_to_locale( get_locale() );
  }

  $action = $_POST['action'];
  if($action == "wdwt_lightbox"){
    require_once('inc/front/WDWT_lightbox.php');
    $lightbox = new WDWT_Lightbox();
    $lightbox->view();
  }
  die();
}



?>