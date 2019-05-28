/**
 *
 * sauron page configuration
 *
 */
WDWT_PG_page_settings = {
	/**
	 * page width: desktop, tablet or phone
	 */
	width: 'desktop',
	desktop_size: 1024,
	tablet_size: 768

}


/**
 *
 * resize thumbs in gallery according to sizes of their containers
 *
 */

var WDWT_PG_gallery = {

	image_parent_class: 'image_list_itema',
	standart_size: 300,
	kaificent: 310 / 370,
	enable_home: 1,


};


/**
 *
 * object to rearrange page layout
 *
 */

var WDWT_PG_page_layout = {

	/*refreshes layout according to screen size*/

	refresh: function ()
	{



		//################SCREEN
		if (matchMedia('only screen and (min-width: 1025px)').matches) {
			this.desktop();
		}
		//################TABLET
		if (matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches) {
			this.tablet();
		}
		//################PHONE
		if (matchMedia('only screen and (max-width : 767px)').matches) {
			this.phone(false);
		}

	},

	/*switch page layout to desktop mode*/
	desktop: function ()
	{
		jQuery('.container').css({width: ''});
		jQuery('.container>#content').before(jQuery('.container>#sidebar1'));
		;

		if (WDWT_PG_page_settings.width == 'tablet' || WDWT_PG_page_settings.width == 'phone') {
			jQuery('.phone-menu-block').after(jQuery('#search-block'))
		}


		if (wdwt_fixed_menu == "1" && !jQuery('#header').hasClass('sticky_menu')) {
			jQuery('#header').css('padding-top', 12);
		}
		jQuery('#top-nav').show();

		wdwt_shorter_body();
		this.refresh_lavalamp();
		this.resize_iframes();
		WDWT_PG_page_settings.width = 'desktop';

	},
	/*switch page layout to tablet mode*/
	tablet: function ()
	{
		/*jQuery('#footer').append(jQuery('#footer-bottom'));*/
		/*ttt!!! there is not #footer*/
		jQuery('.container').css({width: '97%'});
		jQuery('#content, #blog').after(jQuery('#sidebar1'));

		if (WDWT_PG_page_settings.width == 'desktop') {
			jQuery('.phone-menu-block').before(jQuery('#search-block'));
		}

		if (wdwt_fixed_menu == "1" && !jQuery('#header').hasClass('sticky_menu')) {
			jQuery('#header').css('padding-top', 12);
		}
		jQuery('#top-nav').show();
		WDWT_PG_page_settings.width = 'tablet';
		jQuery('#footer').css('top', '');
		this.refresh_lavalamp();
		this.refresh_sidebar('.sidebar-container');
		this.resize_iframes();

	},
	/*switch page layout to phone mode*/
	phone: function (full)
	{
		jQuery('.container').css({width: ''});
		/*jQuery('#footer').append(jQuery('#footer-bottom'));*/
		/*ttt!!! there is not #footer*/
		if (WDWT_PG_page_settings.width != 'phone') {
			jQuery('#blog, #content').after(jQuery('#sidebar1'));
		}
		if (WDWT_PG_page_settings.width == 'desktop') {
			jQuery('.phone-menu-block').before(jQuery('#search-block'));
		}

		jQuery("#header").find("#menu-button-block").remove();
		jQuery("#header .phone-menu-block").append('<div id="menu-button-block"><a href="#">Menu</a></div>');
		jQuery('#menu-button-block').after(jQuery('#top-nav'));


		if (wdwt_fixed_menu == "1" && !jQuery('#header').hasClass('sticky_menu')) {
			jQuery('#header').css('padding-top', 12);
		}
		jQuery('#footer').css('top', '');
		this.refresh_lavalamp();
		this.refresh_sidebar('.sidebar-container');
		this.resize_iframes();
		WDWT_PG_page_settings.width = 'phone';
	},

	/*rearrange content of sidebar according to sidebar's width*/
	refresh_sidebar: function (sidebar)
	{
		jQuery(sidebar).children('.clear:not(:last-child)').remove();
		var iner_elements = jQuery(sidebar).children();
		var main_width = jQuery(sidebar).width();
		var summary_width = 0;
		for (i = 0; i < iner_elements.length; i++) {
			summary_width += jQuery(iner_elements[i]).outerWidth();
			if (summary_width >= main_width) {
				jQuery(iner_elements[i]).before('<div class="clear"></div>')
				summary_width = jQuery(iner_elements[i]).outerWidth();
			}
		}
	},
	resize_iframes: function ()
	{

		var allVideos = jQuery("iframe, object, embed");

		allVideos.each(function ()
		{

			var el = jQuery(this);
			fluidParent = el.parent();
			var newWidth = fluidParent.width();

			if (newWidth >= el.attr('data-origWidth')) {
				newWidth = el.attr('data-origWidth');
			}
			el.width(newWidth)
				.height(newWidth * el.attr('data-aspectRatio'));

		});
	},
	refresh_lavalamp: function ()
	{
		if (!wdwt_is_ios()) {
			jQuery(".lavalamp-object").remove();
			jQuery('#top-nav-list,.top-nav-list >ul').lavalamp({
				easing: 'easeOutBack',
				activeObj: '.current_page_item, .current-menu-item, .current-menu-parent, .current_page_parent',
			});
		}

	}
	,

	handle_new_elements: function (arrayOfNewElems)
	{
		jQuery(arrayOfNewElems).css('opacity', '0');
		jQuery(arrayOfNewElems).animate({opacity: 1}, 800);
		this.refresh();
		jQuery('.da-thumbs > div').hoverdir();
		jQuery('.do_nathing').click(function ()
		{
			return false;
		});


	}

}
jQuery(document).ready(function ()
{
	jQuery('.do_nathing').click(function ()
	{
		return false;
	});
//var previus_view=document.getElementById('top_posts_web').innerHTML;

	WDWT_PG_page_settings.width = 'desktop';

	/*keep iframe, video and embed aspect ratios when resizing the window*/
	var allVideos = jQuery("iframe, object, embed");

	allVideos.each(function ()
	{

		var el = jQuery(this);

		jQuery(this)
		// jQuery .data does not work on object/embed elements
			.attr('data-aspectRatio', this.height / this.width)
			.attr('data-origWidth', this.width)
			.removeAttr('height')
			.removeAttr('width');

	});


	if (matchMedia('only screen and (max-width : 767px)').matches) {
		WDWT_PG_page_layout.phone();
	}
	else
		if (matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches) {
			WDWT_PG_page_layout.tablet();
		}
		else {
			WDWT_PG_page_layout.refresh();
		}


});

//alert(jQuery(".container").width())
if (jQuery(window).width() < jQuery(".container").width())
	jQuery('body').addClass('resize');

jQuery(window).resize(function ()
{
	WDWT_PG_page_layout.refresh();
	jQuery('body').addClass('resize');
});