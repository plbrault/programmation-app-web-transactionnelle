<?php

class AppointmentsModel {
  private $db;
  
  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('
      SELECT no_confirmation AS confirmation_number,
             date,
             heure AS time,
             nom AS last_name,
             prenom AS first_name,
             no_tel AS phone_number,
             courriel AS email
          FROM rendezvous
          ORDER BY date, time
    ');
    return $query->fetchAll();
  }
}

?>