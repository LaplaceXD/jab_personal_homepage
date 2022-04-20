<?php 
  require_once("src/components/init.php");
  require_once("src/components/meta.php");
  require_once("src/components/header.php");
  require_once("src/components/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
  <?php
    $pages = (array) $data->pages;
    $current_page = $_GET[$data->config->prefix];

    render_meta(
      $data->title,
      $data->config->css,
      $data->config->js,
      $pages[$current_page]->css ?? null
    );  
  ?>
  <body>
    <?php 
      render_header(
        $data->config->entry,
        $data->logo,
        $pages,
        "?" . $data->config->prefix . "="
      )
    ?>

