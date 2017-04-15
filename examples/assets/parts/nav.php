<?php
$current_page = end(explode('/', $_SERVER['SCRIPT_NAME']));
$pages = array(
  'retina.php' => 'Retina',
  'browser.php' => 'Browser Data',
  'mobile.php' => 'Mobile Detect',
  'geolocation.php' => 'Geolocation'
);
?>
<div class="container">
  <ul class="nav nav-pills pull-right">
    <?php foreach($pages as $url => $caption) {
      echo '<li class="nav-item">';
      echo '<a class="nav-link'.($current_page == $url ? ' active' : '').'" href="'.$url.'">'.$caption.'</a>';
      echo '</li>'."\n";
    }
    ?>
  </ul>
</div>
<div class="clearfix"></div>
