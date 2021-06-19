<?php

/*
  Modifier cette constante selon votre cas (doit correspondre à l'emplacement de ce fichier à partir de htdocs)
  *** Ne PAS omettre les barres obliques au début et à la fin ***
*/
const BASE_URL = "/cours16/revision/solution/api/";

include_once('../db.php');
include_once('../models/appointments.php');

$model = new AppointmentsModel($db);

function sendResponse($code, $body = null, $exception = null) {
  $statusCodes = array(
    200 => "200 OK",
    400 => "400 Bad Request",
    401 => "401 Unauthorized",
    403 => "403 Forbidden",
    404 => "404 Not found",
    500 => "500 Internal Server Error"
  );

  header('HTTP/1.1 '. $statusCodes[$code]);
  header('Content-Type: application/json; charset=utf-8');

  if ($body) {
    $jsonBody = json_encode($body);
    echo $jsonBody;
  }

  if ($exception) {
    throw $exception;
  }
  exit;
}

// Récupère la route utilisée et la sépare selon les '/'
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Récupère l'URL incluant BASE_URL
$route = str_replace(BASE_URL, '', $url); // Récupère la route en retirant BASE_URL de l'URL
$routeParts = explode( '/', $route ); // Retourne un tableau contenant les parties de la route (ex: tasks/42 -> ['tasks', '42'])

// Récupère le paramètre facultatif "confirmation_number" s'il est présent
$confirmationNumber = null;
if (isset($routeParts[1])) {
  $confirmationNumber = intval($routeParts[1]);
}

// S'assure qu'il n'y a pas autre chose après le paramètre "confirmationNumber"
if (count($routeParts) > 2) {
  sendResponse(404);
}

// Récupère la méthode HTTP utilisée (GET, POST, etc)
$method = $_SERVER['REQUEST_METHOD'];

// Récupère le corps de la requête (s'il y a lieu)
$jsonBody = file_get_contents('php://input');
$body = json_decode($jsonBody, true);

switch ($method) {
  case 'GET':
    if ($confirmationNumber) {
      sendResponse(404); // Route avec un numéro de confirmation non implantée car non nécessaire pour compléter le laboratoire
    }
    $appointments = $model->getAll();
    sendResponse(200, $appointments);
  default:
    sendResponse(404);
}

?>
