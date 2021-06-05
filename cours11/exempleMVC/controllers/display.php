<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/contacts.php');

class DisplayController extends Controller {
  function handle($get) {
    if (!isset($get['id'])) {
      throw new Exception('Parameter `id` is missing.');
    }
    $id = intval($get['id']);

    $model = new ContactModel($this->db);

    $contact = $model->get($id);

    include(__DIR__ . '/../views/display.php');
  }
}

?>