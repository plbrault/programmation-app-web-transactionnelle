<?php

include_once(__DIR__ . '/../controller.php');

class LogoutController extends Controller {
  function handle(&$session, $get) {
    session_unset();

    header('Location: index.php');
  }
}

?>