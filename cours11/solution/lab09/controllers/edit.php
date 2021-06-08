<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/distributors.php');
include_once(__DIR__ . '/../models/series.php');

class EditController extends Controller {
  function handle($get) {
    if (!isset($get['id'])) {
      throw new Exception('Parameter `id` is missing.');
    }
    $id = intval($get['id']);

    $distributorModel = new DistributorModel($this->db);
    $seriesModel = new SeriesModel($this->db);

    $serie = $seriesModel->get($id);
    $distributors = $distributorModel->getAll();

    include(__DIR__ . '/../views/edit.php');
  }

  function handlePost($get, $post) {
    if (!isset($get['id'])) {
      throw new Exception('Parameter `id` is missing.');
    }
    $id = intval($get['id']);

    if (
      !isset($post['titre'])
      || !isset($post['diffuseur'])
      || !isset($post['nbSaisons'])
      || !isset($post['nbEpisodes'])
      || !isset($post['nbEpisodesVus'])
    ) {
      exit;
    }
    if (empty($post['titre']) || empty($post['diffuseur'])) {
      exit;
    }

    $title = trim($_POST['titre']);
    $distributorCode = trim($_POST['diffuseur']);
    $nbSeasons = intval($_POST['nbSaisons']);
    $nbEpisodes = intval($_POST['nbEpisodes']);
    $nbViewedEpisodes = intval($_POST['nbEpisodesVus']);

    $model = new SeriesModel($this->db);
    $model->update($id, $title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes);

    header("Location: ?action=display&id=$id");
  }
}

?>