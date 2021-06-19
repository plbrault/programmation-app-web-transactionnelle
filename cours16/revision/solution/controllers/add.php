<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');

// Fonction qui génère un numéro de confirmation aléatoire
function generateConfirmationNumber() {
  return strtoupper(bin2hex(random_bytes(3))); // Génération d'un numéro de confirmation aléatoire
}

// Contrôleur de création de rendez-vous
class AddController extends Controller {
  function handle($get) {
    // Générer la liste des date à afficher ($dateList)
    $firstDateToDisplay = time() + 24 * 3600;
    $nextDate = $firstDateToDisplay;
    $dateList = [];
    for ($i = 0; $i < 10; $i++) { // La liste inclut les 10 dates suivant la date courante
      $nextDate = time() + $i * 24 * 3600;
      $dateString = date('Y-m-d', $nextDate);
      array_push($dateList, $dateString);
    }

    // Générer la liste des heures à afficher ($timeList)
    $firstTimeToDisplay = 8 * 3600; // 9h
    $lastTimeToDisplay = 16 * 3600; // 17h
    $timeList = [];
    for ($time = $firstTimeToDisplay; $time <= $lastTimeToDisplay; $time += 0.5 * 3600) {
      array_push($timeList, date('H:i' , $time));
    }
    
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