<?php
class ViewHelper
{
  static  function parser($file)
    {
        $html = file_get_contents($file);
        echo $html;
    }
}
?>