<?php

include_once('db.php');

include_once('controllers/home.php');
include_once('controllers/list.php');

$action = 'home';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

$controller;
switch ($action) {
  case 'list':
    $controller = new ListController($db);
    break;
  case 'home':
  default:
    $controller = new HomeController($db);
}

if (!empty($_POST)) {
  $controller->handlePost($_GET, $_POST);
} else {
  $controller->handle($_GET);
}

?>