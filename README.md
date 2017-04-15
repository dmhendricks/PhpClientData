# PhpClientData

**Note:** This is under development and contains many bugs. Use with caution.

PhpClientData are a couple of simple PHP/JavaScript classes for tranferring client side data to PHP. I originally started to work on this because I wanted to use the remote device's pixel ratio for a PHP project.

It has no dependencies, though you will noticed that I used several libraries in the examples for convenience.

If you discover a bug, please feel free to [report it](https://github.com/dmhendricks/PhpClientData/issues) (or better yet, help me fix it).

## How It Works

It's simple - It stores client-side data (for example, device pixel ratio, GPS coordinates, viewport size, or whatever you desire) in cookies via JavaScript which is then accessible by PHP.

## Examples

These examples have issues with various browsers and don't always work.

* [Retina Check](https://www.danhendricks.com/demo/PhpClientData/examples/retina.php) - This example passes the remote device pixel ratio to PHP. It seems to be pretty reliable on multiple browsers and both Windows and Mac.
* [Browser Data](https://www.danhendricks.com/demo/PhpClientData/examples/browser.php) - This uses a forked [PgwBrowser](http://pgwjs.com/pgwbrowser/) to pass various information about the device such as browser, operating system, viewport information, etc. It seems to work well on Chrome, Safari and Edge, but I have noticed some issues on Firefox and Internet Explorer.
* [Mobile Detect](https://www.danhendricks.com/demo/PhpClientData/examples/mobile.php) - Uses the [mobile-detect.js](https://github.com/hgoebl/mobile-detect.js) plugin to determine if a device is mobile and pull its viewport size. It seems to be fairly reliable on most browsers.
* [Geolocation Experiment](https://www.danhendricks.com/demo/PhpClientData/examples/geolocation.php) - This one pulls the GPS coordinates of the remote and passes them from PHP. It is not reliable, is slow, and doesn't always work. I have had random issues with Firefox and it's a complete disaster on Internet Explorer. It seems to work well with Edge.

## Usage Instructions

Simply include the `dist/PhpClientDatsa.php` file in your project as well as `dist/js/PhpClientData.min.js` in your project. See the `examples` folder for more detail.

	<!doctype html>
	<?php
      require 'dist/PhpClientData.php';
      $client = new TwoLab\PhpClientData\Client();
      $clientData = $client->data;
	?>
	<html>
    <head>
    	<script src="dist/js/PhpClientData.min.js"></script>
    </head>
	<body>

	<p><strong>Device Pixel Ratio:</strong> <?php echo $client->devicePixelRatio; ?></p>

	<script type="text/javascript">
	    var _cookieName = '<?php echo $client->getCookieName(true); ?>';
	    var phpClientData = new PhpClientData(_cookieName);
	    phpClientData.add('devicePixelRatio', window.devicePixelRatio);
	    phpClientData.save();
    </script>

	</body>
    </html>

(Note: I have `xdebug` installed for the prettier `var_dumps`, so your mileage may vary.)

## Changelog

**15 Apr 2017** - Initial commit.

![Settings Page](https://raw.githubusercontent.com/dmhendricks/PhpClientData/master/examples/assets/images/php-client-data-mockup.png "Clever Mockup")
