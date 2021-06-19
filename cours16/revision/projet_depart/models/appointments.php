<?php

class AppointmentsModel {
  private $db;
  
  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    /* AJOUTER DU CODE CI-DESSOUS */

    /* FIN DU CODE AJOUTÉ */
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
    /* AJOUTER DU CODE CI-DESSOUS */

    /* FIN DU CODE AJOUTÉ */
  }

  function delete($confirmationNumber) {
    /* AJOUTER DU CODE CI-DESSOUS */

    /* FIN DU CODE AJOUTÉ */
  }
}

?>