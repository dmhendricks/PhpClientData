/*
 * @preserve: JavaScript functions for PhpClientData examples
 */

// jQuery replaceClass function: https://github.com/monolithed/jQuery-Plugins
!function(s){s.fn.replaceClass=function(s,a){var e=a||s;return e&&this.removeClass(a?s:this.className).addClass(e),this}}(window.jQuery || window.Zepto);

// Highlight code examples
hljs.initHighlightingOnLoad();

(function($) {

  // Tooltips... Tooltips everywhere. -Buzz Lightyear
  $('[data-toggle="tooltip"]').tooltip();

})(window.jQuery);
