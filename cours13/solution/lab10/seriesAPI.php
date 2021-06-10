<?php

/*
  Exemple de code PHP pour implanter les routes d'API suivantes:
  GET /series
  GET /series/{id}
  POST /series
  PUT /series/{id}
  DELETE /series/{id}

  Modifier cette constante selon votre cas (doit correspondre à l'emplacement de ce fichier à partir de htdocs)
  *** Ne PAS omettre les barres obliques au début et à la fin ***
*/
const BASE_URL = "/cours13/solution/lab10/";

include_once('db.php');
include_once('seriesModel.php');

$model = new SeriesModel($db);

/*
  On crée une fonction pour nous aider à retourner une réponse
  avec le bon code d'état HTTP.
*/
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
    $jsonBody = json_encode($body); // La fonction json_encode convertit un tableau ou un tableau associatif en JSON
    echo $jsonBody; // On utilise echo pour placer le JSON dans le corps de la réponse
  }

  // On arrête le script pour s'assurer de ne rien envoyer d'autre
  exit;
}

// Récupère la route utilisée et la sépare selon les '/'
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Récupère l'URL incluant BASE_URL
$route = str_replace(BASE_URL, '', $url); // Récupère la route en retirant BASE_URL de l'URL
$routeParts = explode( '/', $route ); // Retourne un tableau contenant les parties de la route (ex: /students/42 -> ['students', '42'])

// Récupère le paramètre facultatif "id" s'il est présent
$serieId = null;
if (isset($routeParts[1])) {
  $serieId = intval($routeParts[1]);
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
    if ($serieId) {
      $serie = $model->get($serieId);
      if ($serie) {
        sendResponse(200, $serie);
      } else { // La série n'existe pas
        sendResponse(404);
      }
    } else {
      $series = $model->getAll();
      sendResponse(200, $series);
    }
    break;
  case 'POST':
    if ($serieId) {
      sendResponse(404); // On ne veut pas d'ID avec POST (création)
    }

    if (
      !isset($body['title'])
      || !isset($body['distributor_code'])
      || !isset($body['nb_seasons'])
      || !isset($body['nb_episodes'],)
      || !isset($body['nb_viewed_episodes'])
    ) {
      sendResponse(400);
    }

    $title = $body['title'];
    $distributorCode = $body['distributor_code'];
    $nbSeasons = intval($body['nb_seasons']);
    $nbEpisodes = intval($body['nb_episodes']);
    $nbViewedEpisodes = intval($body['nb_viewed_episodes']);

    $model->insert($title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes);
    break;
  case 'PUT':
    if (!$serieId) { // On veut absolument un ID avec un PUT (mise à jour)
      sendResponse(404);
    }

    if (
      !isset($body['title'])
      || !isset($body['distributor_code'])
      || !isset($body['nb_seasons'])
      || !isset($body['nb_episodes'],)
      || !isset($body['nb_viewed_episodes'])
    ) {
      sendResponse(400);
    }

    $serie = $model->get($serieId);
    if (!$serie) {
      sendResponse(404);
    }

    $title = $body['title'];
    $distributorCode = $body['distributor_code'];
    $nbSeasons = intval($body['nb_seasons']);
    $nbEpisodes = intval($body['nb_episodes']);
    $nbViewedEpisodes = intval($body['nb_viewed_episodes']);

    $model->update($serieId, $title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes);
    break;
  case 'DELETE':
    if (!$serieId) { // On veut absolument un ID avec un DELETE
      sendResponse(404);
    }
    $model->delete($serieId);
    break;
  default:
    sendResponse(404);
}

?>
