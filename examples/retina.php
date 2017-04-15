<!doctype html>
<?php
  require '../dist/PhpClientData.php';
  $client = new TwoLab\PhpClientData\Client('custom_retina_cookie'); // Custom cookie key/name
  $clientData = $client->data;

  $page_config = array( 'title' => 'Retina Check', 'js' => array( '//cdn.jsdelivr.net/mobile-detect.js/1.3.6/mobile-detect.min.js' ) );
?>
<html>
<?php include 'assets/parts/head.php'; ?>
<body>

  <div class="container" id="main">
    <?php include 'assets/parts/nav.php'; ?>
    <div class="row">
      <div class="col">

        <div id="result">
          <h3><?php echo $page_config['title']; ?></h3>

          <?php
            if(isset($client->data->devicePixelRatio)) {
              echo '<p>This display '.($client->data->devicePixelRatio == 2 ? '<strong class="text-success">DOES</strong>' : '<strong class="text-danger">DOES NOT</strong>' ).' support Retina.';
            } else {
                echo '<pre>undefined</pre>';
            }
          ?>

        </div>

        <hr />

        <h4>Object Output</h4>

        <?php echo isset($client) ? $client : '<pre>undefined</pre>'; ?>

        <h4>JavaScript</h4>

        <pre><code class="javascript">
// Source: https://github.com/hgoebl/mobile-detect.js
var md = new MobileDetect(window.navigator.userAgent);
var is_mobile = md.mobile() !== null;

var phpClientData = new PhpClientData();
phpClientData.add('isMobile', is_mobile);
if(is_mobile) {
  phpClientData.add('type', md.mobile());
  phpClientData.add('browser', md.userAgent());
}
phpClientData.add('viewportWidth', document.documentElement.clientWidth);
phpClientData.save();
        </code></pre>

      </div>
    </div>
  </div>

  <?php include 'assets/parts/footer.php'; ?>

  <script type="text/javascript">

    var _cookieName = '<?php echo $client->getCookieName(true); ?>';
    var phpClientData = new PhpClientData(_cookieName);
    phpClientData.add('devicePixelRatio', window.devicePixelRatio);
    phpClientData.add('customCookieName', _cookieName);
    phpClientData.save();

  </script>

</body>
</html>
