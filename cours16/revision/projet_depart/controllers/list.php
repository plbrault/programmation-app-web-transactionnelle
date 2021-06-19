<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');

class ListController extends Controller {
  function handle($get) {
    $wrongPassword = false; // Pour que la vue sache qu'elle ne doit pas afficher de message "Mauvais mot de passe"

    include(__DIR__ . '/../views/list_password_form.php');
  }

  function handlePost($get, $post) {
    // Valider le mot de passe saisi
    if (!isset($post['password']) || $post['password'] !== 'rutabaga') {
      $wrongPassword = true;

      include(__DIR__ . '/../views/list_password_form.php');
    } else {
      $model = new AppointmentsModel($this->db);
      $appointments = $model->getAll();

      include(__DIR__ . '/../views/list.php');
    }
  }
}

?>