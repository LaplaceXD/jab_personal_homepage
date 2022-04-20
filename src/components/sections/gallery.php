<ul class="showcase">
  <?php 
    foreach($images as $image) {
      $list_item = Generate::list_element(
        "showcase__item js-modal-btn",
        "",
        array(
          "style" => "--bg-img: url('" . $image->css_src . "')",
          "data-modal-type" => "gallery",
          "data-modal-id" => $image->name
        )
      );

      echo $list_item . "\n";
    }
  ?>
</ul>