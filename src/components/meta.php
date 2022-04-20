<?php function render_meta($title, $css, $js, $specific_css) { ?>
<head>  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="apple-touch-icon" sizes="180x180" href="src/img/icons/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="src/img/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/img/icons/favicon/favicon-16x16.png">

    <title><?php echo $title; ?></title>
    <?php
      foreach($css as $item) echo "\n\t" . Generate::css_element("src/css/", $item);

      if($specific_css != null) echo "\n\t" . Generate::css_element("src/css/page-specific/", $specific_css);
      
      echo "\n";
      foreach($js as $item) echo "\n\t" . Generate::js_element("src/js/", $item);

      echo "\n";
    ?>
  </head>
<?php } ?>
