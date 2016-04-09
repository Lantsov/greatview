<?php
// main nav
function getMenu()
{
  ob_start();
  include $_SERVER['DOCUMENT_ROOT'].'/front/main_nav.php';
  return ob_get_clean();
}



?>