<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');
include_once(__DIR__ . '/../utils/getDateList.php');
include_once(__DIR__ . '/../utils/getTimeList.php');

// Fonction qui génère un numéro de confirmation aléatoire
function generateConfirmationNumber() {
  return strtoupper(bin2hex(random_bytes(3))); // Génération d'un numéro de confirmation aléatoire
}

// Contrôleur de création de rendez-vous
class AddController extends Controller {
  function handle($get) {
    // Générer la liste des dates à afficher dans la liste déroulante
    $dateList = getDateList(time() + 24 * 3600, 10);

    // Générer la liste des heures à afficher
    $timeList = getTimeList(9, 17);
    
    include(__DIR__ . '/../views/add.php');
  }

  function handlePost($get, $post) {
    if (
      !isset($post['date'])
      || !isset($post['time'])
      || !isset($post['last_name'])
      || !isset($post['first_name'])
      || !isset($post['phone_number'])
      || !isset($post['email'])
    ) {
      exit('Invalid data received.');
    }

    $confirmationNumber = generateConfirmationNumber();

    $model = new AppointmentsModel($this->db);
    $model->insert($confirmationNumber, $post['date'], $post['time'], $post['last_name'], $post['first_name'], $post['phone_number'], $post['email']);

    include(__DIR__ . '/../views/confirmation.php');
  }
}

?>