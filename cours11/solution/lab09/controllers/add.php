<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . "/../models/distributors.php");
include_once(__DIR__ . '/../models/series.php');

class AddController extends Controller {
  function handle($get) {
    $distributorModel = new DistributorModel($this->db);
    $distributors = $distributorModel->getAll();

    include(__DIR__ . '/../views/add.php');
  }

  function handlePost($get, $post) {
    if (
      !isset($post['titre'])
      || !isset($post['diffuseur'])
      || !isset($post['nbSaisons'])
      || !isset($post['nbEpisodes'])
      || !isset($post['nbEpisodesVus'])
    ) {
      exit;
    }

    $title = trim($post['titre']);
    $distributorCode = trim($post['diffuseur']);

    if (empty($title) || empty($distributorCode)) {
      exit;
    }

    $nbSeasons = intval($_POST['nbSaisons']);
    $nbEpisodes = intval($_POST['nbEpisodes']);
    $nbViewedEpisodes = intval($_POST['nbEpisodesVus']);

    $model = new SeriesModel($this->db);
    $id = $model->insert($title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes);
 
    header("Location: ?action=display&id=$id");
  }
}

?>