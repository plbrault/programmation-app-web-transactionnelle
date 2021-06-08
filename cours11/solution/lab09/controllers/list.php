<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/series.php');

class ListController extends Controller {
  function handle($get) {
    $model = new SeriesModel($this->db);

    $series = $model->getAll();

    include(__DIR__ . '/../views/list.php');
  }
}

?>