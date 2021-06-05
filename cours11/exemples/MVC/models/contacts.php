<?php

class ContactModel {
  private $db;

  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('SELECT id, prenom AS first_name, nom AS last_name FROM contacts');
    return $query->fetchAll();
  }

  function get($id) {
    $contactQuery = $this->db->prepare('SELECT id, prenom AS first_name, nom AS last_name FROM  contacts WHERE id = ?');
    $contactQuery->execute([ $id ]);
    $contact = $contactQuery->fetch();

    $phoneQuery = $this->db->prepare('
      SELECT numero_tel AS phone_number, types_numero_tel.description AS phone_number_type
        FROM numeros_tel
        JOIN types_numero_tel
          ON types_numero_tel.code = numeros_tel.type_numero_tel
        WHERE contact_id = ?
    ');
    $phoneQuery->execute([$id]);

    $addressQuery = $this->db->prepare('
      SELECT adresse AS address, types_adresse.description AS address_type
        FROM adresses JOIN types_adresse
          ON types_adresse.code = adresses.type_adresse
        WHERE contact_id = ?'
    );
    $addressQuery->execute(array($id));

    $emailQuery = $this->db->prepare('
      SELECT courriel AS email, types_courriel.description AS email_type
        FROM courriels
        JOIN types_courriel
          ON types_courriel.code = courriels.type_courriel
        WHERE contact_id = ?
    ');
    $emailQuery->execute(array($id));

    $r = array_merge(
      $contact,
      ['phoneNumbers' => $phoneQuery->fetchAll()],
      ['addresses' => $addressQuery->fetchAll()],
      ['emailAddresses' => $emailQuery->fetchAll()],
    );

    return $r;
  }

  function insert($firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses) {
    try {
      $this->db->beginTransaction();
    
      $query = $this->db->prepare('INSERT INTO contacts (prenom, nom) VALUES (?, ?) RETURNING id');
      $query->execute([$firstName, $lastName]);
      $contactID = $query->fetchColumn(); // Retourne la valeur du champ dans le cas où une requête retourne un seul champ

      foreach ($phoneNumbers as $phoneNumberTypeCode => $phoneNumber) {
        $query = $this->db->prepare("INSERT INTO numeros_tel(contact_id, type_numero_tel, numero_tel) VALUES(?, ?, ?)");
        $query->execute([ $contactID, $phoneNumberTypeCode, $phoneNumber ]);
      }

      foreach ($addresses as $addressTypeCode => $address) {
        $query = $this->db->prepare("INSERT INTO numeros_tel(contact_id, type_numero_tel, numero_tel) VALUES(?, ?, ?)");
        $query->execute([ $contactID, $addressTypeCode, $address ]);
      }

      foreach ($emailAddresses as $emailAddressTypeCode => $emailAddress) {
        $query = $this->db->prepare("INSERT INTO courriels(contact_id, type_courriel, courriel) VALUES(?, ?, ?)");
        $query->execute([ $contactID, $emailAddressTypeCode, $emailAddress ]);
      }

      $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollback();
      throw $e;
    }
  }

  function update($id, $firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses) {
    try {
      $this->db->beginTransaction();

      $currentData = $this->get($id);

      if ($currentData['first_name'] !== $firstName || $currentData['lastName'] !== $lastName) {
        $query = $this->db->prepare('UPDATE contacts SET prenom = ?, nom = ? WHERE id = ?');
        $query->execute([ $firstName, $lastName, $id ]);
      }

      $response = $this->db->query('SELECT code FROM types_adresse');
      foreach ($response as $addressTypeData) {
        $addressTypeCode = $addressTypeData['code'];
  
        // Si un champ de coordonnée a été vidé, supprimer la donnée.
        if (empty($adresses[$addresses]) && !empty($currentData['addresses'][$addressTypeCode])) {
          $query = $this->db->prepare("DELETE FROM adresses WHERE contact_id = ? AND type_adresse = '$addressTypeCode'");
          $query->execute([ $id ]);
        }
        // Si une coordonnée a été ajoutée, insérer la donnée.
        else if (!empty($addresses[$addressTypeCode]) && empty($currentData['addresses'][$addressTypeCode])) {
          $query = $this->db->prepare("INSERT INTO adresses (contact_id, type_adresse, adresse) VALUES (?, '$addressTypeCode', ?)");
          $query->execute([ $id, $addresses[$addressTypeCode] ]);
        }
        // Si une coordonnée a été modifiée, mettre à jour la donnée.
        else if ($addresses[$addressTypeCode] !== $currentData['addresses'][$addressTypeCode]) {
          $query = $this->db->prepare("UPDATE adresses SET adresse = ? WHERE contact_id = ? AND type_adresse = '$addressTypeCode'");
          $query->execute([ $addresses[$addressTypeCode], $id ]);
        }
      }

      $this->db->rollback();
    } catch (Exception $e) {
      $this->db->rollback();
      throw $e;    }
  }

  function delete($id) {
    $query = $this->db->prepare('DELETE FROM contacts WHERE id = ?');
    $query->execute([ $id ]);
  }
}

?>