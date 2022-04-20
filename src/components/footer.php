<?php 
  function render_footer($pages, $current_page, $socials) {
    $page_numbers = get_page_numbers($pages);
    $page_number = $page_numbers[$current_page] ?? 0;
    $total_pages = count($page_numbers);
?>
    <footer>
      <div class="page">
        <p class="page__number"><?php echo str_pad($page_number, 2, "0", STR_PAD_LEFT); ?></p>
        <hr class="page__divider" />
        <p class="page__total"><?php echo str_pad($total_pages, 2, "0", STR_PAD_LEFT); ?></p>
      </div>
      <ul class="socials">
        <?php
          foreach($socials as $social) {
            ob_start();
            include($social->icon);
            $icon = ob_get_clean();

            $link_elem = Generate::link_element($social->href, $icon, "_blank");
            $list_item = Generate::list_element("socials__link", $link_elem);
            
            echo "$list_item\n\t\t";
          } 

          echo "\n";
        ?>
      </ul>
      <p class="copyright">&copy; <?php echo date("Y"); ?> Jonh Alexis Buot. All rights reserved.</p>
    </footer>
<?php } ?>