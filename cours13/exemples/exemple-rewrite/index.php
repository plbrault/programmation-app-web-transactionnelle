<?php

include_once('db.php');

include_once('controllers/list.php');
include_once('controllers/display.php');
include_once('controllers/add.php');
include_once('controllers/edit.php');
include_once('controllers/delete.php');

$action = 'list';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

$controller;
switch ($action) {
  case 'display':
    $controller = new DisplayController($db);
    break;
  case 'add':
    $controller = new AddController($db);
    break;
  case 'edit':
    $controller = new EditController($db);
    break;
  case 'delete':
    $controller = new DeleteController($db);
    break;
  case 'list':
  default:
    $controller = new ListController($db);
}

if (!empty($_POST)) {
  $controller->handlePost($_GET, $_POST);
} else {
  $controller->handle($_GET);
}

?>