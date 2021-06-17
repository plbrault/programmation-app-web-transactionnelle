<?php

include_once('db.php');
include_once('controllers/todolist.php');

$controller = new TodolistController($db);

$controller->handle($_GET);

?>
