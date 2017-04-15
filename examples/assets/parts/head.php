<head>
  <meta charset="utf-8">
  <title>PhpClientData - <?php echo $page_config['title']; ?></title>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
  <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <?php if(isset($page_config['js'])) foreach($page_config['js'] as $js) { echo '<script src="'.$js.'"></script>'; } ?>
  <?php if(isset($page_config['css'])) foreach($page_config['css'] as $css) { echo '<link rel="stylesheet" href="'.$css.'" />'; } ?>
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/highlight.zenburn.min.css">
  <script src="assets/js/highlight.pack.min.js"></script>
  <script src="../dist/js/PhpClientData.min.js"></script>
</head>
