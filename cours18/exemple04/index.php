<?php

include_once('db.php');
include_once('./controllers/login.php');
include_once('./controllers/connected.php');
include_once('./controllers/logout.php');
include_once('./controllers/user_info.php');

session_start();

$controller;
if (!isset($_SESSION['username'])) {
  // L'utilisateur n'est pas connecté
  $controller = new LoginController($db);
  /*
    On a modifié le LoginController pour diriger soit vers la page "connected", soit
    vers le formulaire de login avec un message d'erreur.
  */
} else {
  // L'utilisateur est connecté

  /*
    On ajoute notre gestion d'actions habituelle.

    On a les actions "connected", "user_info" et "logout".
    La page "connected" contient un lien vers les actions "user_info" et "logout".

    Note: puisque nos actions ne sont pas des verbes, il pourrait être approprié d'employer un autre
    terme (par exemple, "page"). Il s'agit simplement d'un choix de conception. Au final, on voudrait
    probablement utiliser la réécriture d'URL de toute façon!
  */

  $action = 'connected';
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  }

  switch ($action) {
    case 'user_info':
      $controller = new UserInfoController($db);
      break;
    case 'logout':
      $controller = new LogoutController($db);
      break;
    case 'connected':
    default:
      $controller = new ConnectedController($db);
  }
}

if (!empty($_POST)) {
  $controller->handlePost($_SESSION, $_GET, $_POST);
} else {
  $controller->handle($_SESSION, $_GET);
}

?>
