<?php

include_once('db.php');
include_once('./controllers/home.php');
include_once('./controllers/login.php');
include_once('./controllers/connected.php');
include_once('./controllers/logout.php');
include_once('./controllers/user_info.php');

session_start();

/*
  On a ajouté une méthode "isRestricted" aux contrôleurs.
  Si elle retourne true, la page correspondante n'est accessible
  qu'aux utilisateurs authentifiés.
*/

$action = 'home';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

$controller;
switch ($action) {
  case 'connected':
    $controller = new ConnectedController($db);
    break;
  case 'login':
    $controller = new LoginController($db);
    break;
  case 'user_info':
    $controller = new UserInfoController($db);
    break;
  case 'logout':
    $controller = new LogoutController($db);
    break;
  case 'home':
  default:
    $controller = new HomeController($db);
    break;
}

/*
  Si la page n'est accessible qu'aux utilisateurs authentifiés
  et que l'utilisateur ne l'est pas, remplacer $controller
  par le contrôleur de login.
*/
if ($controller->isRestricted() && !isset($_SESSION['username'])) {
  $controller = new LoginController($db);
}

if (!empty($_POST)) {
  $controller->handlePost($_SESSION, $_GET, $_POST);
} else {
  $controller->handle($_SESSION, $_GET);
}

?>
