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
    $confirmationNumber = generateConfirmationNumber();

    /* AJOUTER DU CODE CI-DESSOUS */

    /* FIN DU CODE AJOUTÉ */
    
    include(__DIR__ . '/../views/confirmation.php');
  }
}

?>