<?php 
  function get_page_numbers($pages) {
    $arr = array();
    $page_number = 1;
    foreach($pages as $page => $data) {
      if(!property_exists($data, "hidden")) {
        $arr[$page] = $page_number;
        $page_number++;
      }
    }

    return $arr;
  }
?>