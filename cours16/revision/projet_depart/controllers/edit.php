<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');
include_once(__DIR__ . '/../utils/getDateList.php');

class EditController extends Controller {
  function handle($get) {
    if (isset($get['confirmation_number'])) {
      $confirmationNumber = $get['confirmation_number'];

      $model = new AppointmentsModel($this->db);
      $appointment = $model->get($confirmationNumber);

      if ($appointment) {
        // Générer la liste des dates à afficher dans la liste déroulante
        $dateList = getDateList(time() + 24 * 3600, 10);
        if (!in_array($appointment['date'], $dateList)) {
          array_push($dateList, $appointment['date']);
        }

        // Générer la liste des heures à afficher
        $timeList = getTimeList(9, 17);

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
    $confirmationNumber = $post['confirmation_number'];

    /* AJOUTER DU CODE CI-DESSOUS */

    /* FIN DU CODE AJOUTÉ */

    include(__DIR__ . '/../views/edit_confirmation.php');
  }
}

?>