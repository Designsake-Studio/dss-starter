var Animated = function($) {

  var _init = function() {
    $('.animation, .animation-visible').each(function() {
      var $element = $(this);
      $element.waypoint(function() {
        var delay = 0;
        if ($element.attr('data-delay')) delay = parseInt($element.attr('data-delay'), 0);
        if (!$element.hasClass('animated')) {
          setTimeout(function() {
              $element.addClass('animated ' + $element.attr('data-animation'));
          }, delay);
        }
        delay = 0;
      }, {
        offset: '80%'
      });
    });
  };

  var _showAnimated = function() {
    $('.animation, .animation-visible').each(function() {
      $(this).addClass('animated');
    });
  };

  return {
    init: _init,
    ShowAnimated: _showAnimated
  };

}(jQuery);
