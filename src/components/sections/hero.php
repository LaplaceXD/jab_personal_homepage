<section class="hero">
  <p class="hero__subtitle"><?php echo $content->subtitle; ?></p>
  <?php 
    $title = Generate::heading_element("hero__title", is_object($content->title) ? $content->title->content : $content->title);
    
    if(is_object($content->title)) {
      $highlight = Generate::span_element("hero__title--highlight", $content->title->highlight);
      $title = str_replace($content->title->highlight, $highlight, $title);
    }
    
    echo $title . "\n";
  ?>
  <?php if(property_exists($content, "img")) { ?>
    <div class="glowing-circle">
      <img class="hero__img" src="<?php echo $content->img->src; ?>" alt="<?php echo $content->img->alt; ?>"/>
    </div>
  <?php } ?>
  <p class="hero__content"><?php echo $content->description; ?></p>
  <?php 
    if(property_exists($content, "buttons")) {
      foreach($content->buttons as $button) {
        $button_text = "";
        if(is_object($button)) {
          if(property_exists($button, "left_icon")) {
            ob_start();
            include($button->left_icon);
            $button_text .= ob_get_clean();
          }
          
          $button_text .= $button->text;
      
          if(property_exists($button, "right_icon")) {
            ob_start();
            include($button->right_icon);
            $button_text .= ob_get_clean();
          }
        }

        $class = "hero__btn btn";
        if(property_exists($button, "id")) $class .= " js-" . $button->id;

        echo Generate::button_element($class, is_object($button) ? $button_text : $button);
      }
    }
  ?>
</section>