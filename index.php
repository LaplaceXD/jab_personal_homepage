<?php include "src/components/template/top_content.php"; ?>
  <main>
    <div class="container">
      <div class="<?php echo $current_page; ?>">
        <?php
          $content = $pages[$current_page]->content;
          
          include "src/components/sections/hero.php";
          switch($current_page) {
            case "about":
              $snippets = (array) $content->snippets;
              include "src/components/sections/snippets.php";
              break;
            case "games":
              $games = $content->games;
              include "src/components/sections/showcase.php";
              break;
            case "gallery":
              $images = $content->images;
              include "src/components/sections/gallery.php";
              break;
          }
        ?>
      </div>
    </div>
    <?php include "src/components/modal.php"; ?>
  </main>
<?php include "src/components/template/bottom_content.php"; ?>