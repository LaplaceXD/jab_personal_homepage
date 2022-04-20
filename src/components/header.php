<?php function render_header($entry, $logo, $pages, $query_prefix) { ?>
<header>
    <a href="<?php echo $entry; ?>">
      <img class="logo" src="<?php echo $logo; ?>" alt="logo" />
    </a>
    <div class="hamburger js-hamburger" role="button" data-toggle="nav"></div>

    <nav class="nav" data-modal="nav">
      <div class="glowing-circle"></div>
      <ul class="nav__links">
        <?php
          foreach($pages as $page=>$data) {
            if(!property_exists($data, "hidden")) {
              $link_elem = Generate::link_element($entry . $query_prefix . $page, $data->name);
              $list_item = Generate::list_element("nav__link", $link_elem);

              echo "$list_item\n\t\t  ";
            }
          }
        ?>  
      </ul>
    </nav>
  </header>
<?php } ?>