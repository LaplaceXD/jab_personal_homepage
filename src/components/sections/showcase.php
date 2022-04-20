<ul class="showcase">
  <?php
    foreach($games as $game) {
      $header = Generate::heading_element("showcase__title", $game->name, 3);
      $desc = Generate::text_element("showcase__description", substr($game->description, 0, 64) . "...");
      $list_item = Generate::list_element(
        "showcase__item js-modal-btn",
        $header . "\n" . $desc,
        array(
          "style" => "--bg-img: url('" . $game->img->css_src . "')",
          "data-modal-type" => "game",
          "data-modal-id" => $game->name
        )
      );

      echo $list_item . "\n";
    }
  ?>
</ul>