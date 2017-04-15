<!doctype html>
<?php
  require '../dist/PhpClientData.php';
  $client = new TwoLab\PhpClientData\Client();
  $clientData = $client->data;

  $page_config = array( 'title' => 'Geolocation Experiment', 'css' => array( '//cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.min.css' ) );
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

          <p class="alert alert-danger">This example still has bugs and does not work in all circumstances. It is a work-in-progress.</p>

          <?php if(isset($clientData->coords)): ?>
          <ul>
            <li><strong>Latitude:</strong> <?php echo $clientData->coords->latitude; ?></li>
            <li><strong>Longitude:</strong> <?php echo $clientData->coords->longitude; ?></li>
            <li><strong>Language:</strong> <span class="flag-icon flag-icon-<?php echo strtolower(end(explode('-', $clientData->language))) ?>"></span> <?php echo $clientData->language; ?></li>
          </ul>
          <?php else: ?>
            <p>Loading...</p>
          <?php endif; ?>

        </div>

        <p class="alert alert-warning"><strong>Note:</strong> Chrome will show a warning in the console if not loaded over HTTPS.</p>

        <hr />

        <h4>Object Output</h4>

        <?php echo isset($client) ? $client : '<pre>undefined</pre>'; ?>

        <h4>JavaScript</h4>

        <pre><code class="javascript">
var phpClientData = new PhpClientData();
var cookieIsSet = phpClientData.isSet('language');

if(!cookieIsSet) {
  navigator.geolocation.getCurrentPosition(function(position) {
    phpClientData.add('coords', { 'latitude': position.coords.latitude, 'longitude': position.coords.longitude } );
    phpClientData.add('language', navigator.language);
    phpClientData.save(60); // Expire after 60 seconds
  });
}
        </code></pre>

      </div>
    </div>
  </div>

  <?php include 'assets/parts/footer.php'; ?>

  <script type="text/javascript">

    var phpClientData = new PhpClientData();
    var cookieIsSet = phpClientData.isSet('language');

    if(!cookieIsSet) {
      navigator.geolocation.getCurrentPosition(function(position) {
        phpClientData.add('coords', { 'latitude': position.coords.latitude, 'longitude': position.coords.longitude } );
        phpClientData.add('language', navigator.language);
        phpClientData.save(60); // Expire after 60 seconds
      });
    }

  </script>

</body>
</html>
