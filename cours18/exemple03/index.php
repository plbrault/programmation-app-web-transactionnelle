<?php

include_once('db.php');
include_once('./controllers/login.php');
include_once('./controllers/connected.php');

// Démarrer le système de session. Doit absolument être appelé avant tout code HTML pour pouvoir utiliser les variables de session.
session_start();

// On ajoute deux contrôleurs pour nous approcher un peu plus de notre architecture MVC habituelle.

$controller;
if (!isset($_SESSION['username'])) {
  // L'utilisateur n'est pas connecté
  $controller = new LoginController($db);
} else {
  // L'utilisateur est connecté
  $controller = new ConnectedController($db);
}

if (!empty($_POST)) {
  $controller->handlePost($_SESSION, $_GET, $_POST);
} else {
  $controller->handle($_SESSION, $_GET);
}

?>
