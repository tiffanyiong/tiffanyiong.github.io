// On Document Load
jQuery(window).load(function(){
    //site loader
    jQuery('#wraploader').hide();
});

// On Document Ready
jQuery(document).ready(function ($) {
  
    // Full Navigation
    $('#menu-toggle').click(function(){
      $('.site-header-menu').css({'transform':'scale(1)','borderRadius':'0'});
    });

    $('#menu-toggle-close').click(function(){
      $('.site-header-menu').css({'transform':'scale(0)','borderRadius':'100%'});
    });

    // hoverdir
    jQuery('ul#da-thumbs > li ').each( function() { 
      $(this).hoverdir();
    });

    /*wow jQuery*/
    wow = new WOW({
        boxClass: 'evision-animate'
      }
    )

    wow.init();

    // slick jQuery 
    jQuery('.carousel-group').slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      lazyLoad: 'ondemand',
      responsive: [
         {
           breakpoint: 1024,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             infinite: true,
             dots: true
           }
         },
         {
           breakpoint: 768,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         },
         {
           breakpoint: 481,
           settings: {
             slidesToShow: 1,
             slidesToScroll: 1
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
       ]
    });

    // back to top animation

    $('#gotop').on('click', function(){
      $('body').animate({scrollTop: '0px'},1000);
    });

    // header fix
    $(window).scroll(function() {
      
      var fixedBackgroundColor       = 'rgba(0,0,0,0.7)',
          fixedBackgroundTransparent = 'transparent',
          scrollTopPosition          = $('body').scrollTop(),
          selectedHeader             = $('.wrapper-site-identity'),
          selectedHeaderHidden       = $(selectedHeader).find('.site-description'),
          fixedBackgroundNoSlider    = selectedHeader.hasClass('no-slider');

      selectedHeaderHidden.show();

      /*if( fixedBackgroundNoSlider ){
        selectedHeader.css( 'background-color', fixedBackgroundColor );
      } else {
        selectedHeader.css( 'background-color', fixedBackgroundTransparent );
      }
*/

      if( scrollTopPosition > 5 ){

         if( fixedBackgroundNoSlider ){
            selectedHeader.css( 'background-color', fixedBackgroundColor );
          } else {
            selectedHeader.css( 'background-color', fixedBackgroundColor );
          }

          // selectedHeader.css( 'background-color', fixedBackgroundColor );
          selectedHeaderHidden.display = 'none';
          selectedHeaderHidden.hide();
      } else {
        if( fixedBackgroundNoSlider ){
           selectedHeader.css( 'background-color', fixedBackgroundColor );
         } else {
           selectedHeader.css( 'background-color', fixedBackgroundTransparent );
         }
      }
      // selectedHeader.css( 'background-color', fixedBackgroundColor );
      // back to top button visible on scroll
      if( scrollTopPosition > 240 ) {
        $('#gotop').css({'bottom': 25});
      } else {
        $('#gotop').css({'bottom': -100});
      }
    });
    // popup for image in isotope
    $( '#port-gallery' ).photobox( '.element-item .popup-open', {
     time:0,
     zoomable:false
     //single: true
    });


    jQuery('#go-bottom').on('click', function(e){
      e.preventDefault();
      var target = this.hash,
          topVal = 0,
        addition = 0;
        if( jQuery(target).length > 0 ) {
          topVal = jQuery(target).offset().top
        }


        if( jQuery(window).width() > 767 ) {
          addition = parseInt(jQuery('.wrapper-site-identity').height() + 15) ;
        }
          


       jQuery('html,body').animate({
          scrollTop: parseInt( topVal ) - addition
        },500);
    });

});

