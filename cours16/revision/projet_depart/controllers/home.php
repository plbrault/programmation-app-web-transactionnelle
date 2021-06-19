<?php

include_once(__DIR__ . '/../controller.php');

class HomeController extends Controller {
  function handle($get) {
    include(__DIR__ . '/../views/home.php');
  }
}

?>