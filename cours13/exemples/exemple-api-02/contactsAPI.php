<?php

/*
  Exemple de code PHP pour implanter les routes d'API suivantes:
  GET /contacts
  GET /contacts/{id}
  POST /contacts
  PUT /contacts/{id}
  DELETE /contacts/{id}

  Modifier cette constante selon votre cas (doit correspondre à l'emplacement de ce fichier à partir de htdocs)
  *** Ne PAS omettre les barres obliques au début et à la fin ***
*/
const BASE_URL = "/cours13/exemples/exemple-api-02/";

include_once('db.php');
include_once('contactsModel.php');

$model = new ContactModel($db);

/*
  On crée une fonction pour nous aider à retourner une réponse
  avec le bon code d'état HTTP.
*/
function sendResponse($code, $body = null) {
  $statusCodes = array(
    200 => "200 OK",
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
$contactId = null;
if (isset($routeParts[1])) {
  $contactId = intval($routeParts[1]);
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
    if ($contactId) {
      $contact = $model->get($contactId);
      sendResponse(200, $contact);
    } else {
      $contacts = $model->getAll();
      sendResponse(200, $contacts);
    }
    break;
  case 'POST':
    if ($contactId) {
      sendResponse(404); // On ne veut pas d'ID avec POST (création)
    }
    // TODO: validation
    $model->insert($body['first_name'], $body['last_name'], $body['phone_numbers'], $body['addresses'], $body['email_addresses']);
    break;
  case 'PUT':
    if (!$contactId) { // On veut absolument un ID avec un PUT (mise à jour)
      sendResponse(404);
    }
    // TODO: validation
    $model->update($contactId, $body['first_name'], $body['last_name'], $body['phone_numbers'], $body['addresses'], $body['email_addresses']);
    break;
  case 'DELETE':
    if (!$contactId) { // On veut absolument un ID avec un DELETE
      sendResponse(404);
    }
    $model->delete($contactId);
    break;
  default:
    sendResponse(404);
}

?>
