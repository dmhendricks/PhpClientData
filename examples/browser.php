<!doctype html>
<?php
  require '../dist/PhpClientData.php';
  $client = new TwoLab\PhpClientData\Client();
  $clientData = $client->data;

  $page_config = array( 'title' => 'Browser Data Example', 'js' => array( 'assets/js/pgwbrowser.min.js' ) );
?>
<html>
<?php include 'assets/parts/head.php'; ?>
<body>

  <div class="container" id="main">
    <?php include 'assets/parts/nav.php'; ?>
    <div class="row">
      <div class="col">

        <h3><?php echo $page_config['title']; ?></h3>

        <?php if(isset($clientData->agent)): ?>
        <ul>
          <li><strong>Name:</strong> <?php echo $clientData->agent->name; ?></li>
          <li><strong>Version:</strong> <?php echo $clientData->agent->version; ?></li>
          <li><strong>Operating System:</strong> <?php echo $clientData->os->name.' ('.$clientData->os->version.')'; ?></li>
          <li><strong>Device Properties</strong>:
            <ul>
              <li><strong>Viewport Dimensions:</strong> <?php echo implode('x', $clientData->viewport->dimensions); ?></li>
              <li><strong>Orientation:</strong> <?php echo ucfirst($clientData->viewport->orientation); ?></li>
              <li><strong>Touch Device:</strong> <?php echo var_export($clientData->device->touchEnabled); ?></li>
              <li><strong>Retina:</strong> <?php echo var_export($clientData->device->isRetina); ?></li>
              <li><strong>Pixel Ratio:</strong> <?php echo $clientData->device->pixelRatio; ?></li>
            </ul>
        </ul>

        <p id="edge" class="alert alert-warning">If you were viewing this page using Microsoft Edge, a special JavaScript file would be injected server-side and this box would turn blue and display an image.</p>

        <?php else: ?>
          <pre>undefined</pre>
        <?php endif; ?>

        <hr />

        <h4>Object Output</h4>
        <?php echo isset($client) ? $client : '<pre>undefined</pre>'; ?>

        <h4>JavaScript</h4>
        <pre><code class="javascript">
// Reference: http://pgwjs.com/pgwbrowser/
var pgwBrowser = $.pgwBrowser();
var phpClientData = new PhpClientData();

phpClientData.add('agent', { 'name': pgwBrowser.browser.name, 'version': pgwBrowser.browser.majorVersion });
phpClientData.add('viewport', { 'dimensions': [pgwBrowser.viewport.width, pgwBrowser.viewport.height], 'orientation': pgwBrowser.viewport.orientation });
phpClientData.add('os', { 'name': pgwBrowser.os.name, 'version': pgwBrowser.os.fullVersion });
phpClientData.add('device', { 'touchEnabled': pgwBrowser.display.touch, 'isRetina': pgwBrowser.display.retina, 'pixelRatio': pgwBrowser.display.pixelRatio });
phpClientData.save(60); // expire cookie after 60 seconds
        </code></pre>

      </div>
    </div>
  </div>

  <?php include 'assets/parts/footer.php'; ?>

  <script>

    // Reference: http://pgwjs.com/pgwbrowser/
    var pgwBrowser = $.pgwBrowser();
    var phpClientData = new PhpClientData();

    phpClientData.add('agent', { 'name': pgwBrowser.browser.name, 'version': pgwBrowser.browser.majorVersion });
    phpClientData.add('viewport', { 'dimensions': [pgwBrowser.viewport.width, pgwBrowser.viewport.height], 'orientation': pgwBrowser.viewport.orientation });
    phpClientData.add('os', { 'name': pgwBrowser.os.name, 'version': pgwBrowser.os.fullVersion });
    phpClientData.add('device', { 'touchEnabled': pgwBrowser.display.touch, 'isRetina': pgwBrowser.display.retina, 'pixelRatio': pgwBrowser.display.pixelRatio });
    phpClientData.save(60); // expire cookie after 60 seconds

  </script>

  <?php if(isset($clientData->agent) && $clientData->agent->name == 'Edge'): ?>
  <!-- Special JavaScript for Microsoft Edge -->
  <script src="assets/js/edge.js"></script>
  <?php endif; ?>

</body>
</html>
