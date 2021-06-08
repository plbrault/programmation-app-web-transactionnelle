<?php

class SeriesModel {
  private $db;

  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('SELECT id, titre AS title, diffuseurs.nom AS distributor_name FROM series JOIN diffuseurs ON series.diffuseur = diffuseurs.code ORDER BY titre');;
    return $query->fetchAll();
  }

  function get($id) {
    $query = $this->db->prepare(
      'SELECT titre AS title, diffuseur AS distributor_code, diffuseurs.nom AS distributor_name, nbSaisons AS nb_seasons, nbEpisodes AS nb_episodes, nbEpisodesVus AS nb_viewed_episodes
        FROM series JOIN diffuseurs ON diffuseurs.code = series.diffuseur WHERE id = ?'
    );
    $query->execute(array($id));

    return $query->fetch();
  }

  function insert($title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes) {
    $query = $this->db->prepare('INSERT INTO series(titre, diffuseur, nbSaisons, nbEpisodes, nbEpisodesVus) VALUES(?, ?, ?, ?, ?) RETURNING id');
    $query->execute([ $title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes ]);

    return $query->fetchColumn();
  }

  function update($id, $title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes) {
    $query = $this->db->prepare('UPDATE series SET titre = ?, diffuseur = ?, nbSaisons = ?, nbEpisodes = ?, nbEpisodesVus = ? WHERE id = ?');
    $query->execute([ $title, $distributorCode, $nbSeasons, $nbEpisodes, $nbViewedEpisodes, $id ]);
  }

  function delete($id) {
    $query = $this->db->prepare('DELETE FROM series WHERE id = ?');
    $query->execute([ $id ]);
  }
}
