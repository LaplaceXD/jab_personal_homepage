<div class="snippets">
  <?php
    foreach($snippets as $snippet => $snippet_content) {
      if($snippet_content->type == "redirect") {
        echo Generate::link_element($snippet_content->href, $snippet_content->name, null, "snippets__btn");
      } elseif($snippet_content->type == "toggle") {
        echo Generate::button_element("snippets__btn js-modal-btn", $snippet_content->name, array("data-modal-content" => $snippet));
      }
    }
  ?>
</div>