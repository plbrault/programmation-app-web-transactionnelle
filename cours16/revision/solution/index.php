<?php

include_once('db.php');

include_once('controllers/add.php');
include_once('controllers/edit.php');
include_once('controllers/home.php');
include_once('controllers/list.php');
include_once('controllers/delete.php');

$action = 'home';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

$controller;
switch ($action) {
  case 'add':
    $controller = new AddController($db);
    break;
  case 'edit':
    $controller = new EditController($db);
    break;
  case 'list':
    $controller = new ListController($db);
    break;
  case 'delete':
    $controller = new DeleteController($db);
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