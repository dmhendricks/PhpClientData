var PHP_CLIENT_DATA_EDGE = {};

(function($) {

	PHP_CLIENT_DATA_EDGE.Util = {

    replaceContent: function(elm) {

      var logo = $('<img>');
      logo.attr('src', 'assets/images/microsoft-edge.svg').css('height', '50px').css('width', 'auto').css('display', 'block').css('margin-top', '12px');

      elm.replaceClass('alert-warning', 'alert-info');
      elm.html('The following image is being displayed by a JavaScript file that was injected server-side when Microsoft Edge was detected:').append(logo);
		}

	}

	PHP_CLIENT_DATA_EDGE.Util.replaceContent($('#edge'));

})(window.jQuery || window.Zepto);
