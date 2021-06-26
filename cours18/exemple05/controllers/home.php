<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/users.php');

class HomeController extends Controller {
  function handle(&$session, $get) {
    if (isset($session['username'])) {
      header('Location: ?action=connected');
    } else {
      include(__DIR__ . '/../views/home.php');
    }
  }

  function isRestricted() {
    return false;
  }
}

?>