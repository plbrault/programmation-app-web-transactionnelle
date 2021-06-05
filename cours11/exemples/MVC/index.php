<?php

include_once('db.php');

include_once('controllers/list.php');
include_once('controllers/display.php');

$action = 'list';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

$controller;
switch ($action) {
  case 'display':
    $controller = new DisplayController($db);
    break;
  case 'list':
  default:
    $controller = new ListController($db);
}

if (!empty($_POST)) {
  $controller->handlePost($_GET, $_POST);
} else {
  $controller->handle($_GET, $_POST);
}

?>