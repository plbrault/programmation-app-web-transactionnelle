<?php

/*
  Modifier cette constante selon votre cas (doit correspondre à l'emplacement de ce fichier à partir de htdocs)
  *** Ne PAS omettre les barres obliques au début et à la fin ***
*/
const BASE_URL = "/cours15/exemple/api/";

include_once('../db.php');
include_once('../models/tasks.php');

$model = new TasksModel($db);

function sendResponse($code, $body = null) {
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

  exit;
}

// Récupère la route utilisée et la sépare selon les '/'
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Récupère l'URL incluant BASE_URL
$route = str_replace(BASE_URL, '', $url); // Récupère la route en retirant BASE_URL de l'URL
$routeParts = explode( '/', $route ); // Retourne un tableau contenant les parties de la route (ex: tasks/42 -> ['tasks', '42'])

// Récupère le paramètre facultatif "id" s'il est présent
$taskId = null;
if (isset($routeParts[1])) {
  $taskId = intval($routeParts[1]);
}

// S'assure qu'il n'y a pas autre chose après le paramètre "id"
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
    if ($taskId) {
      $task = $model->get($taskId);
      if ($task) {
        sendResponse(200, $task);
      } else {
        sendResponse(404);
      }
    } else {
      $tasks = $model->getAll();
      sendResponse(200, $tasks);
    }
  case 'PUT':
    if (!$taskId) { // On veut absolument un ID avec un PUT (mise à jour)
      sendResponse(404);
    }

    if (
      !isset($body['description'])
      || !isset($body['is_checked'])
      || !is_string($body['description'])
      || !is_bool($body['is_checked'])
    ) {
      sendResponse(400);
    }

    $task = $model->get($taskId);
    if (!$task) {
      sendResponse(404);
    }

    $model->update($taskId, $body['description'], $body['is_checked']);
    break;
  default:
    sendResponse(404);
}

?>
