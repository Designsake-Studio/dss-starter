// She Speaks in Code
// Author: galen.strasen

var SlickSlider = function(element) { // ----- static module

  var _init = function() {

    $('.js-slider').slick({
      dots: false,
      arrows: false,
      autoplay: true,
      fade: true
    });

  };

  return {
      init: _init
  };

}(jQuery);