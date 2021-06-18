<?php

include_once(__DIR__ . '/../controller.php');

class ListController extends Controller {
  function handle($get) {
    include(__DIR__ . '/../views/list_password_form.php');
  }
}

?>