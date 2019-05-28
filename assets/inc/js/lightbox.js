wdwt_lbox = {

  issauronPopUpOpened: false,

  init: function (link_obj, rel, width, height)
  {
    /*add list of images*/
    var imgs = [];
    var titles = [];
    var descrs = [];
    var links = jQuery("a[rel='" + rel + "']");
    var cur = 0;
    links.each(function (index)
    {

      if (link_obj === links.get(index)) {
        cur = index;
      }
      var id = jQuery(this).prop('id');

      var href = links.eq(index).prop('href');
      var title = links.eq(index).parent().parent().parent().parent().find("[rel='" + id + "-title']").eq(0).html();
      if (typeof title == 'undefined') {
        title = '';
      }
      var descr = links.eq(index).parent().parent().parent().parent().find("[rel='" + id + "-desc']").eq(0).html();
      if (typeof descr == 'undefined') {
        descr = '';
      }

      imgs.push(href);
      titles.push(title.trim());
      descrs.push(descr.trim());

    });
    //var cur = link_obj.getAttribute('href');
    /*ttt!!! test correct later*/

    var imgs_json = JSON.stringify(imgs);
    var titles_json = JSON.stringify(titles);
    var descrs_json = JSON.stringify(descrs);

    /*data to send by AJAX*/
    var data = {
      action: 'wdwt_lightbox',
      imgs: imgs_json,
      titles: titles_json,
      descrs: descrs_json,
      cur: cur,
    };
    /*sanitize here !!!*/
    /*security ttt!!!*/
    this.createpopup(admin_ajax_url, data, 0, width, height, 1, 'testpopup', 5);

  },

  /*saurontheme_createpopup*/
  createpopup: function (url, data_send, current_view, width, height, duration, description, lifetime)
  {
    if (this.issauronPopUpOpened) {
      return
    }
    ;
    this.issauronPopUpOpened = true;
    if (this.hasalreadyreceivedpopup(description) || this.isunsupporteduseragent()) {
      return;
    }

    jQuery("html").attr("style", "overflow:hidden !important;");

    popup_el = '<div id="saurontheme_popup_loading_' + current_view + '" class="saurontheme_popup_loading"></div>'
      + '<div id="saurontheme_popup_overlay_' + current_view + '" class="saurontheme_popup_overlay" onclick="wdwt_lbox.destroypopup(1000)"></div>';
    //add styles for popup ttt!!!
    jQuery("body").append(popup_el);

    jQuery("#saurontheme_popup_loading_" + current_view).css({display: "block"});
    jQuery("#saurontheme_popup_overlay_" + current_view).css({display: "block"});

    jQuery.post(url, data_send, function (data)
    {

      var popup = jQuery(
        '<div id="saurontheme_popup_wrap" class="saurontheme_popup_wrap" style="' +
        ' width:' + width + 'px;' +
        ' height:' + height + 'px;' +
        ' margin-top:-' + height / 2 + 'px;' +
        ' margin-left: -' + width / 2 + 'px; ">' +
        data +
        '</div>')
        .hide()
        .appendTo("body");
      wdwt_lbox.showpopup(description, lifetime, popup, duration);
    }).success(function (jqXHR, textStatus, errorThrown)
    {
      jQuery("#saurontheme_popup_loading_" + current_view).css({display: "none !important;"});
    });
  },
  /*saurontheme_showpopup*/
  showpopup: function (description, lifetime, popup, duration)
  {
    this.issauronPopUpOpened = true;
    popup.show();
    this.receivedpopup(description, lifetime);
  },
  /*saurontheme_hasalreadyreceivedpopup*/
  hasalreadyreceivedpopup: function (description)
  {
    if (document.cookie.indexOf(description) > -1) {
      delete document.cookie[document.cookie.indexOf(description)];
    }
    return false;
  },
  /*saurontheme_receivedpopup*/

  receivedpopup: function (description, lifetime)
  {
    var date = new Date();
    date.setDate(date.getDate() + lifetime);
    document.cookie = description + "=true;expires=" + date.toUTCString() + ";path=/";
  },
  /*saurontheme_isunsupporteduseragent*/
  isunsupporteduseragent: function ()
  {
    return (!window.XMLHttpRequest);
  },
  /*saurontheme_destroypopup*/

  destroypopup: function (duration)
  {
    if (document.getElementById("saurontheme_popup_wrap") != null) {
      if (typeof jQuery().fullscreen !== 'undefined' && jQuery.isFunction(jQuery().fullscreen)) {
        if (jQuery.fullscreen.isFullScreen()) {
          jQuery.fullscreen.exit();
        }
      }
      setTimeout(function ()
      {
        jQuery(".saurontheme_popup_wrap").remove();
        jQuery(".saurontheme_popup_loading").remove();
        jQuery(".saurontheme_popup_overlay").remove();
        jQuery(document).off("keydown");
        jQuery("html").attr("style", "");
        jQuery(window).trigger('resize');//for resizing thumbs after lightbox closing
      }, 20);
    }
    this.issauronPopUpOpened = false;
    var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
    var viewportmeta = document.querySelector('meta[name="viewport"]');
    if (isMobile && viewportmeta) {
      viewportmeta.content = 'width=device-width, initial-scale=1';
    }
    var scrrr = jQuery(document).scrollTop();
    /*window.location.hash = "";*/
    jQuery(document).scrollTop(scrrr);
    if (typeof sauron_playInterval !== "undefined") {
      clearInterval(sauron_playInterval);
    }
  },


}