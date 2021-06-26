<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/users.php');

class ConnectedController extends Controller {
  function handle(&$session, $get) {
    $username = $session['username'];
    include(__DIR__ . '/../views/connected.php');
  }

  function isRestricted() {
    return true;
  }
}

?>