/**
 * @file      PhpClientData JavaScript class {@link https://github.com/dmhendricks/PhpClientData|PhpClientData}
 * @version   0.1.0
 * @author    Daniel M. Hendricks - https://www.danhendricks.com
 * @license   GPL-2.0
 */

(function (scope, doc, nav, undefined) {

  'use strict';
  var _clientObjects = {};
  var _cookieName = 'remote_client_data';

  var PhpClientData = function(alt_cookie_name) {
    _cookieName = alt_cookie_name || _cookieName;
    return this;
  };

  PhpClientData.prototype = {

    add: function(key, obj) {
      eval('_clientObjects.' + key + ' = obj;');
    },
    save: function(expires, disable_refresh) {
      var update = !disable_refresh && (this.getCookie(_cookieName) === undefined || this.getCookie(_cookieName) !== JSON.stringify(_clientObjects));

      if(!nav.cookieEnabled) {
        console.warn('[PhpClientData] Cookies are disabled.');
      } else if(update) {
        this.setCookie(_cookieName, '');
        this.setCookie(_cookieName, JSON.stringify(_clientObjects), expires);
        location.reload();
      }
    },
    setCookie: function(key, obj, expires) {
      // Expiration in seconds, null or 0 for session cookie only
      expires = expires || '';
      if(expires) {
        var exp = new Date();
        exp.setTime(exp.getTime() + (expires * 1000));
        expires = '; expires='+exp.toUTCString();
      }
      doc.cookie = key + "=" + encodeURIComponent(obj) + expires + "; path=/";
    },
    getCookie: function(key) {
      var value = "; " + doc.cookie;
      var parts = value.split("; " + key + "=");
      if (parts.length == 2) return decodeURIComponent(parts.pop().split(";").shift());
    },
    isSet: function(_var, key) {
      key = key || _cookieName;
      var obj = this.getCookie(key) ? JSON.parse(this.getCookie(key)) : undefined;
      var result = undefined;
      if(obj !== undefined) result = eval("(typeof obj."+_var+");");
      return result !== 'undefined';
    }
  }

  scope.PhpClientData = PhpClientData;

})(window, document, navigator);
