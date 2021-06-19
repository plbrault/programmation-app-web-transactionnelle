<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');
include_once(__DIR__ . '/../utils/getDateList.php');

class DeleteController extends Controller {
  function handle($get) {
    if (isset($get['confirmation_number'])) {
      $confirmationNumber = $get['confirmation_number'];

      $model = new AppointmentsModel($this->db);
      $model->delete($confirmationNumber);

      include(__DIR__ . '/../views/delete_confirmation.php');
    }
  }
}

?>