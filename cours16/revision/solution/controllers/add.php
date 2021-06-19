<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/appointments.php');

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
  }
}

?>