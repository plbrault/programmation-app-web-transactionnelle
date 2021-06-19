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

  function get($confirmationNumber) {
    $query = $this->db->prepare('
      SELECT no_confirmation AS confirmation_number,
            date,
            heure AS time,
            nom AS last_name,
            prenom AS first_name,
            no_tel AS phone_number,
            courriel AS email
        FROM rendezvous
        WHERE no_confirmation = ?
    ');
    $query->execute([$confirmationNumber]);
    return $query->fetch();
  }

  function insert($confirmationNumber, $date, $time, $lastName, $firstName, $phoneNumber, $email) {
    /* AJOUTER DU CODE CI-DESSOUS */

    /* FIN DU CODE AJOUTÉ */
  }

  function update($confirmationNumber, $date, $time, $lastName, $firstName, $phoneNumber, $email) {
    $query = $this->db->prepare('UPDATE rendezvous SET date = ?, heure = ?, nom = ?, prenom = ?, no_tel = ?, courriel = ? WHERE no_confirmation = ?');
    $query->execute([ $date, $time, $lastName, $firstName, $phoneNumber, $email, $confirmationNumber ]);
  }

  function delete($confirmationNumber) {
    $query = $this->db->prepare('DELETE FROM rendezvous WHERE no_confirmation = ?');
    $query->execute([ $confirmationNumber ]);
  }
}

?>