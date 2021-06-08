<?php

class DistributorModel {
  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('SELECT code, nom AS name FROM diffuseurs');
    return $query->fetchAll();
  }
}

?>
