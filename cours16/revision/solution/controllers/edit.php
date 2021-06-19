<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');

class EditController extends Controller {
  function handle($get) {
    if (isset($get['confirmation_number'])) {
      $model = new AppointmentsModel($this->db);
      $appointment = $model->get($get['confirmation_number']);

      if ($appointment) {
        include(__DIR__ . '/../views/edit_form.php');
      } else {
        $invalidConfirmationNumber = true;
        include(__DIR__ . '/../views/confirmation_number_form.php');
      }
    } else {
      $invalidConfirmationNumber = false;
      include(__DIR__ . '/../views/confirmation_number_form.php');
    }
  }

  function handlePost($get, $post) {
    
  }
}

?>