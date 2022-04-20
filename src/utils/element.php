<?php
  abstract class Element {
    const SCRIPT = "<script\$placeholder></script>";
    const LINK = "<link\$placeholder />";
    const A = "<a\$placeholder>\$children</a>";
    const LIST_ITEM = "<li\$placeholder>\$children</li>";
    const HEADING = "<h\$level\$placeholder>\$children</h\$level>";
    const SPAN = "<span\$placeholder>\$children</span>";
    const P = "<p\$placeholder>\$children</p>";
    const BUTTON = "<button\$placeholder>\$children</button>";
  }
?>