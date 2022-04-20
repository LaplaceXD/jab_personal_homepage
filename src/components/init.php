<?php
  $data_content = file_get_contents("src/content.json"); 
  if(!$data_content) {
    echo "An unexpected error occured";
    exit();
  }  
  $data = json_decode($data_content);  

  if(!isset($_GET[$data->config->prefix])) {
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Content-Type: text/html; charset=utf-8");
    header("Location:" . $data->config->entry . "?" . $data->config->prefix . "=home");
  }

  include_once("src/utils/page.php");
  require_once("src/utils/generate.php");
  require_once("src/utils/element.php");
?>