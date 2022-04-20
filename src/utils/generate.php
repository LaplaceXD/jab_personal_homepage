<?php
  class Generate {
    static function element($element, $attributes, $children = "", $level = "") {
      $str = "";
      foreach($attributes as $key=>$value) {
        $str .= ' ' . $key . '="' . $value . '"';
      }

      $string_element = str_replace("\$placeholder", $str, $element);
      $string_element = str_replace("\$level", $level, $string_element);
      return str_replace("\$children", $children, $string_element);
    }

    static function js_element($dir, $item) {
      return self::element(Element::SCRIPT, array("src" => $dir . $item));
    }

    static function css_element($dir, $item) {
      return self::element(Element::LINK, array("rel" => "stylesheet", "type" => "text/css", "href" => $dir . $item));
    }

    static function link_element($link, $content = "", $target = null, $class = null) {
      $attr = array("href" => $link);
      if($target) $attr["target"] = $target;
      if($class) $attr["class"] = $class;

      return self::element(Element::A, $attr, $content);
    }

    static function list_element($class, $content = "", $attributes = null) {
      $attr = array("class" => $class);
      if($attributes) $attr = array_merge($attr, $attributes);
      
      return self::element(Element::LIST_ITEM, $attr, $content);
    }
    
    static function heading_element($class, $text = "", $level = 1) {
      return self::element(Element::HEADING, array("class" => $class), $text, $level);
    }
    
    static function text_element($class, $text = "") {
      return self::element(Element::P, array("class" => $class), $text);
    }
    
    static function span_element($class, $text = "") {
      return self::element(Element::SPAN, array("class" => $class), $text);
    }
    
    static function button_element($class, $content = "", $attributes = null) {
      $attr = array("class" => $class);
      if($attributes) $attr = array_merge($attr, $attributes);

      return self::element(Element::BUTTON, $attr, $content);
    }
  }
?>