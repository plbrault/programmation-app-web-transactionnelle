<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/tasks.php');

class TodolistController extends Controller {
  function handle($get) {
    $model = new TasksModel($this->db);
    $tasks = $model->getAll();

    include(__DIR__ . '/../views/todolist.php');
  }
}

?>