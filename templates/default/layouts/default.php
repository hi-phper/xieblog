<?php
/**
 * @copyright Copyright (C) 2015 hiphper, All rights reserved.
 * @license GNU/GPL V2 http://gnu.org/licenses/gpl-2.0.html
 * @author hiphper at 163 dot com
 * @link https://github.com/hi-phper/xieblog
 */

$assets = $config->get('base_url') . 'templates/' . $config->get('template') . '/assets';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $config->get('description'); ?>">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $assets; ?>/images/favicon.ico">

    <title><?php echo $config->get('title'); ?> - <?php echo $config->get('subtitle'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $assets; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $assets; ?>/css/blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title"><a href="<?php echo $config->get('base_url'); ?>" title="<?php echo $config->get('subtitle'); ?>"><?php echo $config->get('title'); ?></a></h1>
        <p class="lead blog-description"><?php echo $config->get('description'); ?></p>
      </div>

      <div class="row">

        <div class="col-sm-12 blog-main">
          <?php echo $content_layout; ?>

        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>Powered by <a href="https://github.com/hi-phper/xieblog">xieblog</a></p>
      <p>
        <a href="#">返回顶部</a>
      </p>
    </footer>

  </body>
</html>
