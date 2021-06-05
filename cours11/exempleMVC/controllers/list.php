<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/contacts.php');

class ListController extends Controller {
  function handle($get) {
    $model = new ContactModel($this->db);

    $contacts = $model->getAll();

    include(__DIR__ . '/../views/list.php');
  }
}

?>