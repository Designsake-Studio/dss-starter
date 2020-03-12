// She Speaks in Code
// Author: galen.strasen


var Lightbox = function(element) { // ----- static module

    var _init = function() {

      $('.js-popup-img').magnificPopup({
        type:'image',
        mainClass: 'lightbox',
        gallery:{
          enabled:true
        }
      });

      $('.js-popup-video').magnificPopup({
        type: 'iframe',
        mainClass: 'lightbox',
        fixedContentPos: true,
        preloader: false
      });

      // TESTIMONIAL TRIGGER
      $('.js-post-type').magnificPopup({
        delegate: 'a.js-trigger',
        type: 'ajax',
        fixedBgPos: true,
        mainClass: 'lightbox',
        gallery: {
          enabled: true
        }
      });

      $('.js-o-trigger, .js-o-trigger > a').magnificPopup({
        type: 'inline',
        mainClass: 'lightbox',
        fixedContentPos: true
      });

    };

    // output/public
    return {
        init: _init
    };
}(jQuery);
