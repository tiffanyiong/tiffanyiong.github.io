function wdwt_shorter_body(down)
{
  if (WDWT_PG_page_settings.width == 'phone' || WDWT_PG_page_settings.width == 'tablet') {
    jQuery('#footer').css('top', '');
    return;
  }
  /*move footer to the bottom if content height is small*/
  if (jQuery('#wpadminbar').length) {
    wpadmin_h = jQuery('#wpadminbar').height();
  }
  else {
    wpadmin_h = 0;
  }

  shorter_body = jQuery(window).height() - jQuery('body').height() - wpadmin_h;
  if (typeof down != 'undefined') {
    shorter_body = down;
  }

  if (shorter_body > 0) {
    //jQuery('#footer').css('position', 'fixed');
    // jQuery('#footer').css('bottom', 0);
    // jQuery('#footer').css('right', 0);
    // jQuery('#footer').css('left', 0);
    // jQuery('#footer').css('margin', '0 auto');
    jQuery('#footer').css('top', shorter_body);
  }


}


function showResult(str, inputelement, theme_url)
{
  /*only our search with in header*/
  if (!jQuery(inputelement).next().hasClass('livesearch_sauron')) {
    return;
  }
  if (str.length == 0) {
    jQuery(".livesearch_sauron").find('#live_search').html('');
    jQuery(".livesearch_sauron").css('border', '0px');
    return;
  }
  var data_send = {};
  data_send.action = 'wdwt_live_search';
  data_send.s = str;

  //document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
  jQuery.post(sauron_admin_ajax, data_send, function (data)
  {


    if (jQuery(inputelement).hasClass('focused')) {
      jQuery("#live_search").show();
    }
    jQuery("#live_search").html(data);
  }).success(function (jqXHR, textStatus, errorThrown)
  {
  });


}

var sauron_active_menu = '';
//wdwt_sticky_timeout = false;
jQuery(document).ready(function ()
{

  if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
    jQuery('#pinned_post').css('background-attachment', 'scroll');  // iosfix
  }
  jQuery('.gallery-tabs-content').on('click', function ()
  {
    //do nothing, hack for info to appear on ios
  });
  jQuery('#header #livesearch').addClass('livesearch_sauron').prepend('<ul id="live_search"></ul>');


  jQuery('#search-block .ast-search .search-input').on('focus', function ()
  {
    jQuery(this).addClass('focused');

  });
  jQuery('#search-block .ast-search .search-input').on('blur', function ()
  {
    jQuery(this).removeClass('focused');

    if (jQuery(this).next().hasClass('livesearch_sauron')) {
      if (jQuery(".livesearch_sauron").children().length) {
        jQuery(".livesearch_sauron").children().fadeOut(300);
      }

    }


  });


  if (jQuery(window).width() < 1040 && jQuery(window).width() > 768) {
    var margin_top_menu = jQuery("#header").outerHeight() + 16;
  }
  else {
    var margin_top_menu = jQuery("#header").outerHeight();
  }


  if (jQuery('#header').hasClass('sticky_menu')) {
    jQuery('.right_container').css('margin-top', margin_top_menu);
    jQuery('#header').css('padding-top', 0);
  }

  jQuery('.prev_page').parent().addClass('prev_link');
  jQuery('.next_page').parent().addClass('next_link');

  sticky_menu();

  jQuery('#go-to-top').click(function ()
  {
    jQuery("html, body").animate({scrollTop: 0}, 600);
    return false;
  });

  function sticky_menu()
  {
    // if(wdwt_sticky_timeout){
    // 	return;
    // }

    scroll_threshold = 0;
    if (jQuery('#wpadminbar').length) {
      if (jQuery('#wpadminbar').css('position') == 'fixed') {
        wpadmin_h = jQuery('#wpadminbar').height();
      }
      else { //adminbar has absolute positioning on mobile < 600px width
        wpadmin_h = 0;
      }

    }
    else {
      wpadmin_h = 0;
    }
    // no stickymenu if menu is open in phone and scroll triggered
    if (matchMedia('only screen and (max-width : 767px)').matches && jQuery('#top-nav').hasClass('open')) {
      return;
    }


    if (matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches || matchMedia('only screen and (max-width : 767px)').matches) {
      scroll_threshold = 100 + wpadmin_h;
    }

    if (jQuery(window).scrollTop() > scroll_threshold && wdwt_fixed_menu == "1") {

      var shorter_body = jQuery("body").height() - jQuery(window).height();

      var header_old_h = jQuery("#header").height();

      jQuery("#header .container, #header").addClass('sticky_menu');
      jQuery('#header.sticky_menu').css({'top': wpadmin_h});
      if (matchMedia('only screen and (max-width : 767px)').matches) {
        jQuery('.sticky_menu #menu-button-block').css({'top': wpadmin_h});
      }
      var shorter_body_2 = jQuery("body").height() - jQuery(window).height();


      if ((shorter_body_2 < shorter_body) && shorter_body > -1 * header_old_h) {

        var header_new_h = jQuery("#header").height();
        wdwt_shorter_body(shorter_body - shorter_body_2 /*+ wpadmin_h - header_new_h*/ + 4);
      }

    }
    else {
      jQuery('#header.sticky_menu').css({'top': ''});
      if (matchMedia('only screen and (max-width : 767px)').matches) {
        jQuery('.sticky_menu #menu-button-block').css({'top': ''});
      }
      jQuery("#header .container, #header").removeClass('sticky_menu');
      wdwt_shorter_body();
    }

    // wdwt_sticky_timeout = true;
    // setTimeout(function(){ wdwt_sticky_timeout = false; }, 100);
    //wdwt_shorter_body();
  }

  jQuery("#header .phone-menu-block").on("click", "#menu-button-block", function ()
  {
    if (jQuery("#top-nav").hasClass("open")) {
      jQuery("#header #top-nav").slideUp("fast");
      jQuery("#top-nav").removeClass("open");

      if (matchMedia('only screen and (max-width : 767px)').matches) {
        sticky_menu();
      }

    }
    else {
      jQuery("#header #top-nav").slideDown("slow");

      if (jQuery('#wpadminbar').length) {
        var wpadmin_h = jQuery('#wpadminbar').height();
      }
      if (matchMedia('only screen and (max-width : 767px)').matches) {
        jQuery("body #header.sticky_menu").css('top', wpadmin_h);
        jQuery("body #header.sticky_menu #menu-button-block").css('top', wpadmin_h);
      }
      jQuery("#top-nav").addClass("open");
    }
  });

  if (!wdwt_is_ios()) {
    jQuery('#top-nav-list,.top-nav-list >ul').lavalamp({
      easing: 'easeOutBack',
      activeObj: '.current_page_item, .current-menu-item, .current-menu-parent, .current_page_parent'
    });
  }

  jQuery('#top-nav li:has(> ul)').addClass('haschild');

  jQuery("#top-nav > ul  li.haschild,#top-nav > div > ul  li.haschild").hover(
    function ()
    {
      if (matchMedia('only screen and (max-width : 767px)').matches || matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches) {
        return false;
      }
      loc_this = this;
      jQuery(loc_this).css("z-index", "6");

      jQuery(loc_this).children("ul").stop().slideDown(300);
    }, function ()
    {
      if (matchMedia('only screen and (max-width : 767px)').matches || matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches) {
        return false;
      }
      loc_this = this;
      /*passing over lavalamp*/
      jQuery(loc_this).children("ul").stop().slideUp(300);
      setTimeout(function ()
      {
        jQuery(loc_this).css("z-index", "5");
      }, 1000);
    }
  );


   /*Add arrow to parent menu item*/
  jQuery("#top-nav > ul  li:has(> ul),#top-nav > div > ul  li:has(> ul)").each(function () {
    if ( !jQuery(this).find(".open_sub_arrow").length && jQuery(this).find("ul").length) {
      jQuery(this).find(">a").append('<span class="open_sub_arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>');
    }
  });

  jQuery("#top-nav > ul  li.haschild > a .open_sub_arrow,#top-nav > div > ul  li.haschild > a .open_sub_arrow").click(function ()
  {
    if(matchMedia('only screen and (max-width : 1024px)').matches) {
      if(jQuery(this).parent().parent().hasClass("open")) {
        jQuery(this).parent().parent().parent().find(".haschild ul").slideUp(100);
        jQuery(this).parent().parent().removeClass("open");
        return false;
      }
      jQuery(this).parent().parent().parent().find(".haschild ul").slideUp(100);
      jQuery(this).parent().parent().parent().find(".haschild").removeClass("open");
      jQuery(this).parent().next("ul").slideDown("fast");
      jQuery(this).parent().parent().addClass("open");
      return false;
    }
  });

  var cat_tab_is_animated = 0;
  setTimeout(function ()
  {
    //jQuery('.cont_vat_tab .content').css('height',jQuery("#categories-tabs-content-0").height());
  }, 500);

  jQuery("#image_list_top3 ul.tabs li a").click(function ()
  {
    sauron_review_posts(jQuery(this));
    return false;
  }).stop();

  if (jQuery("#wd-categories-tabs").length && jQuery("#wd-categories-tabs").data('carousel') === 1) {

    sauron_play_review_animation();

    var stopAnimation = jQuery("#wd-categories-tabs").data('stop_animation');


    if (stopAnimation === 1) {
      jQuery("#wd-categories-tabs").hover(function ()
        {
          clearInterval(wdwt_playInterval);
        },
        function ()
        {
          sauron_play_review_animation();
        });
    }


  }
  function sauron_play_review_animation()
  {
    var index = 0;
    var review_count = jQuery("#image_list_top3 ul.tabs li a").length;

    var interval = jQuery("#wd-categories-tabs").data('interval') * 1000;

    wdwt_playInterval = setInterval(function ()
    {
      index = jQuery("#image_list_top3 ul.tabs li.active").index() + 1;
      if (index > review_count - 1)
        index = 0;

      sauron_review_posts(jQuery("#image_list_top3 ul.tabs li a").eq(index));
    }, interval);


  }

  function sauron_review_posts(el)
  {
    jQuery('#image_list_top3 ul.content > li ul li div.thumbnail-block').removeClass('slide-in-left');
    if (el.parent().hasClass("active")) {
      return false;
    }
    if (cat_tab_is_animated) return false;
    cat_tab_is_animated = 1;
    jQuery("#image_list_top3 ul.content > li:first-child").css("display", "none");
    jQuery("#image_list_top3 ul.tabs li").removeClass("active");
    var id = el.attr("href").replace("#", "");
    jQuery('.content').css('height', jQuery("#categories-tabs-content-" + id).height());
    var width_of_catigory_tab_li = jQuery("#image_list_top3 ul.content > li.active").eq(0).width();
    el.parent().addClass("active");
    if (jQuery("#image_list_top3 ul.content > li.active").eq(0).index() > jQuery("#categories-tabs-content-" + id).index()) {
      jQuery("#image_list_top3 ul.content > li.active").animate({'left': width_of_catigory_tab_li + "px"}, {
        duration: 500, complete: function ()
        {
          jQuery(this).removeClass("active");
          jQuery(this).css("display", "none").css("left", "0px");
          cat_tab_is_animated = 0;
        }
      });
      jQuery("#categories-tabs-content-" + id).attr('style', 'left:-' + width_of_catigory_tab_li + 'px').show().animate({'left': '0px'}, {
        duration: 500,
        complete: function ()
        {
          jQuery(this).addClass("active")
        }
      });
    }
    else {
      jQuery("#image_list_top3 ul.content > li.active").animate({'left': "-" + width_of_catigory_tab_li + "px"}, {
        duration: 500, complete: function ()
        {
          jQuery(this).removeClass("active");
          jQuery(this).css("display", "none").css("left", "0px");
          cat_tab_is_animated = 0;
        }
      });
      jQuery("#categories-tabs-content-" + id).attr('style', 'left:' + width_of_catigory_tab_li + 'px').show().animate({'left': '0px'}, {
        duration: 500, complete: function ()
        {
          jQuery(this).addClass("active");
        }
      });
    }
    return false;
  }

  call_once0 = 0;
  call_once1 = 0;
  call_once2 = 0;
  call_once3 = 0;
  call_once4 = 0;
  call_once5 = 0;
  call_once6 = 0;
  call_once7 = 0;
  array_of_elements = {
    'features_post': '#image_list_top0',
    'categories_posts': '#image_list_top1',
    'gallery_posts': '#image_list_top2',
    'dynamic_posts': '#image_list_top3',
    'diagrams': '#image_list_top4',
    'pinned_post': '#image_list_top5',
    'social_links': '#image_list_top6',
    'contact_us': '#image_list_top7'
  };

  if (wdwt_fixed_menu == 1)
    var fixed_menu_height = jQuery('header').height();
  else var fixed_menu_height = 0;

  if (jQuery('body').width() < 1024 && jQuery('body').width() > 768) {
    fixed_menu_height = fixed_menu_height + 1000;
  }


  jQuery(window).scroll(function ()
  {////tttt
    sticky_menu();
    var height = jQuery(window).scrollTop();
    if (height > 400) {
      jQuery('#go-to-top').css('display', 'inline');
    }
    else {
      jQuery('#go-to-top').css('display', 'none');
    }
    if (typeof sauron_one_page != 'undefined') {
      wdwt_element_animations();
      sauron_scroll_to_custom();
    }
  });


  /*---- MENU_SCROLLING -----*/
  active_menu_item = '';
  activ_element = '';
  activ_key = '';

  /*goto item when url is pasted with hash*/
  if (sauron_is_front == '1' && window.location.hash) {
    var target = '';
    for (element in array_of_elements) {
      if (element == window.location.hash.substring(1)) {
        target = array_of_elements[element];
      }
    }
    wdwt_go_to(target);
  }
  if (typeof(localStorage) != 'undefined') {
    active_scroll_item = localStorage.getItem("activ_scroling_item");
  }


  if (active_scroll_item) {
    wdwt_go_to(active_scroll_item);
    if (typeof(localStorage) != 'undefined') {
      localStorage.setItem("activ_scroling_item", '');
    }
  }


  jQuery('#top-nav a[href]').each(function ()
  {
    if (jQuery(this).attr('href').indexOf("#") != -1) {
      jQuery(this).click(function ()
      {
        menu_href = jQuery(this).attr('href');
        hash = menu_href.split('#')[1];
        /*front page , no customizer*/
        if (typeof wp.customize === 'undefined' && typeof sauron_one_page != 'undefined') {

          loc_this = this;
          jQuery.each(array_of_elements, function (index, value)
          {
            if (jQuery(loc_this).attr('href').indexOf(index) >= 0) {

              wdwt_go_to(value);
            }
          });

          if (!(hash in array_of_elements)) {
            wdwt_go_to("#" + hash);
          }

        }
        /*front page , customizer*/
        else
          if (typeof wp.customize !== 'undefined' && typeof sauron_one_page != 'undefined') {
            loc_this = this;
            jQuery.each(array_of_elements, function (index, value)
            {
              if (jQuery(loc_this).attr('href').indexOf(index) >= 0) {

                wdwt_go_to(value);
              }
            });

            if (!(hash in array_of_elements)) {
              wdwt_go_to("#" + hash);
            }
          }
          /*not front page*/
          else {
            loc_this = this;
            if (!(hash in array_of_elements)) {
              activ_key = hash;
              activ_element = "#" + hash;
            }
            else {
              jQuery.each(array_of_elements, function (index, value)
              {
                if (jQuery(loc_this).attr('href').indexOf(index) >= 0) {
                  activ_key = index;
                  activ_element = value;
                }
              });
            }
            if (typeof(localStorage) != 'undefined') {
              localStorage.setItem("activ_scroling_item", activ_element);
            }
            window.location = sauron_site_url;

          }

        return false;
      });
    }
  });


  var MyArray = ["features_post", "categories_posts", "gallery_posts", "dynamic_posts", "diagrams", "pinned_post", "contact_us"];
  for (var i = 0; i < MyArray.length; i++) {
    jQuery('a[href$="' + MyArray[i] + '"]').click(function ()
    {
      jQuery('a[href$="' + MyArray[i] + '"]').parent().addClass('active_menu');
      jQuery('#top-nav').removeClass("open").css("display", "none");
      var active_menu = jQuery('a[href$="' + MyArray[i] + '"]').parent().attr('id');
      if (active_menu != sauron_active_menu) {
        if (!wdwt_is_ios()) {
          jQuery(".lavalamp-object").remove();
          jQuery('#top-nav-list,.top-nav-list >ul').lavalamp({
            easing: 'easeOutBack',
            activeObj: active_menu,
          });
        }

        sauron_active_menu = active_menu;
      }
    });

  }
  wdwt_element_animations();
  sauron_scroll_to_custom();

});//endof doc ready

function wdwt_front_ajax_pagination(page, action, container, args)
{
  var data_send = {};

  if (typeof args != 'undefined') {
    for (var prop in args) {
      data_send[prop] = args[prop];
    }
  }

  data_send.action = 'wdwt_front_' + action;
  data_send.paged = page;


  jQuery.post(sauron_admin_ajax, data_send, function (data)
  {

    if (action == "portfolio_posts_section") {
      wdwt_go_to('content_front_page');
    }
    jQuery(container).html(data);
  }).success(function (jqXHR, textStatus, errorThrown)
  {
    jQuery(container).addClass("ajaxed");
  });
}


/**
 * @param value : id of element to scroll to
 */
function wdwt_go_to(value, tuned)
{

  if (value == '#') {
    jQuery("html, body").animate({scrollTop: 0}, 600);
    return;
  }
  var element_offset = jQuery(value).offset();

  if (typeof element_offset != 'undefined') {
    y = element_offset.top;
  }
  else {
    y = 0;
  }
  y1 = jQuery('#header.sticky_menu').length ? 0 : jQuery('#header').height();
  if (jQuery('#wpadminbar').length == 1) {
    if (jQuery(window).width() < 768) {
      y2 = 0;
    } else {
      y2 = jQuery('#wpadminbar').height();
    }

  }
  else {
    y2 = 0;
  }
  jQuery(window).scrollTo(value, 1000,
    {
      'offset': {'top': -y2 - y1},
      onAfter: function ()
      {

        if (typeof tuned != 'undefined') {
          //fine tuning iteration happened
          return;
        }

        wdwt_go_to(value, 'fine_tuned');

      }
    }
  );
}


function doSetTimeout(element, i, effect, find_element, interval, callback)
{


  setTimeout(function ()
  {
    if (find_element != "")
      jQuery(element).eq(i).find(find_element).addClass(effect);
    else
      jQuery(element).eq(i).addClass(effect);
    if (typeof callback != 'undefined') {
      callback(i);
    }
  }, interval);

}


function wdwt_is_ios()
{
  if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
    return true;
  }
  else {
    return false;
  }
}

function sauron_scroll_to_custom()
{

  var sauron_section_y = [],
    key = 0,
    height = jQuery(window).scrollTop() + 10;
  if (jQuery('#header').hasClass('sticky_menu')) {
    height += jQuery('#header').height();
  }
  if (jQuery('#wpadminbar').length) {
    height += jQuery('#wpadminbar').height();
  }
  var sections = {
    'features_post': '#image_list_top0',
    'categories_posts': '#image_list_top1',
    'gallery_posts': '#image_list_top2',
    'dynamic_posts': '#image_list_top3',
    'diagrams': '#image_list_top4',
    'pinned_post': '#image_list_top5',
    'social_links': '#image_list_top6',
    'contact_us': '#image_list_top7'
  };

  jQuery('#top-nav a[href]').each(function ()
  {
    if (jQuery(this).attr('href').indexOf("#") != -1) {
      menu_href = jQuery(this).attr('href');

      /*if homepage url + #+id*/
      var hash = menu_href.split('#')[1];
      var base_url = menu_href.split('#')[0];
      if ((base_url == sauron_site_url) || (base_url == sauron_site_url + "/") || (base_url == sauron_site_url + "?")) {
        if (!(hash in sections)) {
          /*make list of all scrollto sections*/
          sections[hash] = "#" + hash;
        }
      }

    }
  });

  jQuery.each(sections, function (index, value)
  {
    if (jQuery(value).length)
      sauron_section_y[key] = jQuery(value).offset().top;
    else
      sauron_section_y[key] = 0;
    if (height >= sauron_section_y[key] && height < sauron_section_y[key] + jQuery(value).height()) {
      jQuery('a[href$="' + index + '"]').parent().addClass('active_menu');
      var active_menu = jQuery('a[href$="' + index + '"]').parent().attr('id');
      if (active_menu != sauron_active_menu) {
        if (!wdwt_is_ios()) {
          jQuery(".lavalamp-object").remove();
          jQuery('#top-nav-list,.top-nav-list >ul').lavalamp({
            easing: 'easeOutBack',
            activeObj: "#" + active_menu,
          });
        }
        sauron_active_menu = active_menu;
      }
    }
    else {
      jQuery('a[href$="' + index + '"]').parent().removeClass('active_menu')
    }
    key++;
  });
}

function wdwt_element_animations()
{
  var height_canvas = [],
    key = 0,
    height = jQuery(window).scrollTop() + 10;
  if (jQuery('#header').hasClass('sticky_menu')) {
    height += jQuery('#header').height();
  }
  if (jQuery('#wpadminbar').length) {
    height += jQuery('#wpadminbar').height();
  }
  /*static list of sections here*/
  jQuery.each(array_of_elements, function (index, value)
  {
    height_canvas[key] = (jQuery(value).length) ? jQuery(value).offset().top - jQuery(window).height() : 0;
    key++;
  });

  if (!jQuery("#image_list_top0").data("animation")) {
    if (height > height_canvas[0] + jQuery(window).height() / 4) {
      if (call_once0 == 0) {
        call_once0++;
        jQuery("#image_list_top0").animate({
          opacity: '1',
        }, 800, function ()
        {
          // Animation complete.
        });
      }
    }
  }

  if (!jQuery("#image_list_top1").data("animation")) {
    if (height > height_canvas[1] + jQuery(window).height() / 4) {
      if (call_once1 == 0) {
        call_once1++;
        var x = 100;
        for (var i = 0; i < jQuery('#wd-horizontal-tabs .tabs li').length; ++i) {
          doSetTimeout('#wd-horizontal-tabs .tabs li', i, 'slide-in-right', ".radius", x, function (i)
          { // callback
            jQuery('#wd-horizontal-tabs .tabs li').eq(i).find(".post_info, .radius.animate").addClass('opaque');
          });
          x += 200;
        }
        setTimeout(function ()
        {
          jQuery("#horizontal_tabs h2, #horizontal_tabs .top-desc").animate({
            opacity: '1',
          }, 800, function ()
          {
            // Animation complete.
          });
        }, 500);
      }
    }
  }
  if (!jQuery("#image_list_top2").data("animation")) {
    if (height > height_canvas[2] + jQuery(window).height() / 4) {
      if (call_once2 == 0) {
        call_once2++;
        var x = 100;
        for (var i = 0; i < jQuery(".gallery-tabs-content").length; ++i) {
          doSetTimeout(".gallery-tabs-content", i, 'bounce-in-up', '', x);
          x += 300;
        }
      }
    }
  }
  if (!jQuery("#image_list_top3").data("animation")) {
    if (height > height_canvas[3] + jQuery(window).height() / 4) {
      if (call_once3 == 0) {
        call_once3++;
        jQuery("#wd-categories-tabs ul.content > li ul li div.thumbnail-block").addClass('animate slide-in-left');
        jQuery("#wd-categories-tabs").animate({
          opacity: '1',
        }, 100, function ()
        {
          // Animation complete.
        });
      }
    }
  }
  if (!jQuery("#image_list_top4").data("animation")) {
    if (height > height_canvas[4] + jQuery(window).height() / 4) {
      if (call_once4 == 0) {
        call_once4++;
        jQuery("#image_list_top4").animate({
          opacity: '1',
        }, 1000, function ()
        {
          // Animation complete.
        });
      }
    }
  }
  if (!jQuery("#image_list_top5").data("animation")) {
    if (height > height_canvas[5] + jQuery(window).height() / 4) {
      if (call_once5 == 0) {
        call_once5++;
        jQuery("#image_list_top5").animate({
          opacity: '1',
        }, 1000, function ()
        {
          // Animation complete.
        });
      }
    }
  }
  if (!jQuery("#image_list_top6").data("animation")) {
    if (height > height_canvas[6] + jQuery(window).height() / 4) {
      if (call_once6 == 0) {
        call_once6++;
        jQuery(".social").addClass('animate');
        var x = 100;
        for (var i = 0; i < jQuery(".social").length; ++i) {
          doSetTimeout(".social", i, 'bounce-in-up', '', x);
          x += 200;
        }
      }
    }
  }
  if (!jQuery("#image_list_top7").data("animation")) {
    if (height > height_canvas[7] + jQuery(window).height() / 4) {
      if (call_once7 == 0) {
        call_once7++;
        jQuery("#contact .textarea_contact").addClass('slide-in-right');
        jQuery("#contact .first_lis").addClass('slide-in-left');
        jQuery("#contact #contact_us").animate({
          opacity: '1',
        }, 1000, function ()
        {
          // Animation complete.
        });
      }
    }
  }
}