<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/contacts.php');

class DisplayController extends Controller {
  function handle($get) {
    $model = new ContactModel($this->db);

    $id = $get['id'];
    $contact = $model->get($id);

    include(__DIR__ . '/../views/display.php');
  }
}

?>